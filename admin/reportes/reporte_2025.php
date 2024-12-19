<?php
ob_start();  // Inicia un buffer de salida

require_once ('../../app/config.php');
require_once('../../reportes/fpdf.php'); 
require_once('../../admin/pagos/cn.php'); 

class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        if ($this->PageNo() == 1) { // Logo solo en la primera página
            $this->Image('../../public/images/configuracion/cetpro.png', 250, 10, 20); // Posición del logo
        } else {
            $this->Image('../../public/images/configuracion/cetpro.png', 250, 10, 20); // Cambiar tamaño o ajustar
        }

        // Título en todas las páginas
        $this->SetFont('Arial', 'B', 16); 
        $this->Cell(0, 10, utf8_decode('REPORTE DE ESTUDIANTES INCLUSIVOS'), 0, 1, 'C');
        $this->Ln(5); // Espacio después del título
    }

    // Pie de página
    function Footer()
    {
        $this->SetY(-11);
        $this->SetFont('Arial', 'I', 8);
        $this->Cell(0, 10, utf8_decode('Página ' . $this->PageNo() . '/{nb}'), 0, 0, 'C');
    }
}


require('../../admin/pagos/cn.php');

$sql_estudiantes = "SELECT * FROM usuarios as usu 
INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario 
INNER JOIN estudiantes as est ON est.persona_id = per.id_persona
INNER JOIN grados as gra ON gra.id_grado = est.grado_id
INNER JOIN ppffs as ppf ON ppf.estudiante_id = est.id_estudiante
WHERE est.estado = '1' AND per.discapacidad IS NOT NULL
  AND per.discapacidad != '' 
  AND per.discapacidad != 'NINGUNA'
  AND (est.rude LIKE '2025-1%' OR est.rude LIKE '2025-2%')
  ORDER BY est.rude ASC, per.apellidos ASC
";

$resultado = $mysqli->query($sql_estudiantes);

$pdf = new PDF('L', 'mm', array(210, 297)); // Tamaño de página A4 horizontal
$pdf->AliasNbPages(); // Alias para el número total de páginas
$pdf->SetMargins(10, 20, 10); // Márgenes: izquierdo, superior, derecho
$pdf->SetAutoPageBreak(true, 10); // Salto de página automático con margen inferior
$pdf->AddPage(); // Añadir una nueva página


// Encabezado de la tabla
$pdf->SetFillColor(200, 200, 200); // Color de fondo para el encabezado
$pdf->SetFont('Times', 'B', 14);
// $pdf->Rect(10, 10, 277, 190); // Marco general de la tabla
$pdf->SetFont('Arial', 'B', 9);

$pdf->Cell(11, 7, 'Orden', 1, 0, 'C', true);
$pdf->Cell(15, 7, 'Periodo', 1, 0, 'C', true);
$pdf->Cell(45, 7, 'Apellidos y Nombres', 1, 0, 'C', true);
$pdf->Cell(19, 7, 'DNI/CE', 1, 0, 'C', true);
$pdf->Cell(90, 7, 'Discapacidad', 1, 0, 'C', true);
$pdf->Cell(40, 7, 'Docente', 1, 0, 'C', true);
$pdf->Cell(45, 7, 'Curso', 1, 1, 'C', true);

// Fuente para los datos
$pdf->SetFont('Arial', '', 8);
$fill = false;
$contador = 1;

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    // Relleno de los datos en la tabla
    while ($row = $resultado->fetch_assoc()) {
        $rude = utf8_decode($row['rude']);
        $nombre_completo = utf8_decode($row['apellidos'] . ' ' . $row['apellidosM'] . ' ' . $row['nombres']);
        $ci = utf8_decode($row['ci']);
        $discapacidad = utf8_decode($row['discapacidad']);
        $docente = utf8_decode($row['apellido_docente'] . ' ' . $row['nombre_docente']);
        // $curso = utf8_decode($row['curso']);
        $curso = utf8_decode($row['curso']); // Puedes ajustar si el grado es diferente al curso

        $pdf->Cell(11, 6, $contador, 1, 0, 'C', $fill);  
        $pdf->Cell(15, 6, utf8_decode($row['rude']), 1, 0, 'C', $fill);
        $pdf->Cell(45, 6, $nombre_completo, 1 , 0, 'L', $fill); 
        $pdf->Cell(19, 6, utf8_decode($row['ci']), 1, 0, 'C', $fill);  
        $pdf->Cell(90, 6, $discapacidad, 1, 0, 'L', $fill);
        $pdf->Cell(40, 6, $docente, 1, 0, 'L', $fill);
        $pdf->Cell(45, 6, $curso, 1, 1, 'L', $fill);
        
        $fill = !$fill; 
        $contador++;
    }
} else {
    // Mensaje si no hay estudiantes
    $pdf->Cell(0, 10, 'No se encontraron estudiantes.', 1, 1, 'C');
}

// Salida del archivo PDF
$pdf->Output('I', 'reporte_estudiantes_inclusivos_2025.pdf');

// Cerrar conexión
$mysqli->close();
?>
