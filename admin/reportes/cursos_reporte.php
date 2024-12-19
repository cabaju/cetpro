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
        $this->Cell(0, 10, utf8_decode('REPORTE DE ESTUDIANTES'), 0, 1, 'C');
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
WHERE est.estado = '1'
ORDER BY per.apellidos ASC
";

$resultado = $mysqli->query($sql_estudiantes);

$pdf = new PDF('L', 'mm', array(210, 297)); // Tamaño de página A4 horizontal
$pdf->AliasNbPages(); // Alias para el número total de páginas
$pdf->SetMargins(10, 20, 10); // Márgenes: izquierdo, superior, derecho
$pdf->SetAutoPageBreak(true, 10); // Salto de página automático con margen inferior
$pdf->AddPage(); // Añadir una nueva página

// TÍTULO DEL REPORTE
// $pdf->SetFont('Arial', 'B', 16); 
// $pdf->Cell(0, 10, utf8_decode('REPORTE DE ESTUDIANTES'), 0, 1, 'C');
// $pdf->Ln(5); 


// Encabezado de la tabla
$pdf->SetFillColor(200, 200, 200); // Color de fondo para el encabezado
$pdf->SetFont('Times', 'B', 14);
// $pdf->Rect(10, 10, 277, 190); // Marco general de la tabla
$pdf->SetFont('Arial', 'B', 9);

$pdf->Cell(10, 7, 'Orden', 1, 0, 'C', true);
$pdf->Cell(20, 7, 'Periodo', 1, 0, 'C', true);
$pdf->Cell(60, 7, 'Apellidos y Nombres', 1, 0, 'C', true);
$pdf->Cell(25, 7, 'DNI/CE', 1, 0, 'C', true);
$pdf->Cell(70, 7, 'Curso', 1, 0, 'C', true);
$pdf->Cell(40, 7, 'Docente', 1, 0, 'C', true);
$pdf->Cell(32, 7, 'Grado', 1, 1, 'C', true);

// Fuente para los datos
$pdf->SetFont('Arial', '', 8);
$fill = false;
$contador = 1;

// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    // Relleno de los datos en la tabla
    while ($row = $resultado->fetch_assoc()) {
        $nombre_completo = utf8_decode($row['apellidos'] . ' ' . $row['apellidosM'] . ' ' . $row['nombres']);
        $docente = utf8_decode($row['apellido_docente'] . ' ' . $row['nombre_docente']);
        $curso = utf8_decode($row['curso']);
        $grado = utf8_decode($row['curso']); // Puedes ajustar si el grado es diferente al curso

        $pdf->Cell(10, 6, $contador, 1, 0, 'C', $fill);  
        $pdf->Cell(20, 6, utf8_decode($row['rude']), 1, 0, 'C', $fill);
        $pdf->Cell(60, 6, $nombre_completo, 1 , 0, 'L', $fill); 
        $pdf->Cell(25, 6, utf8_decode($row['ci']), 1, 0, 'C', $fill);  
        $pdf->Cell(70, 6, $curso, 1, 0, 'L', $fill);
        $pdf->Cell(40, 6, $docente, 1, 0, 'L', $fill);
        $pdf->Cell(32, 6, $grado, 1, 1, 'L', $fill);
        
        $fill = !$fill; 
        $contador++;
    }
} else {
    // Mensaje si no hay estudiantes
    $pdf->Cell(0, 10, 'No se encontraron estudiantes.', 1, 1, 'C');
}

// Salida del archivo PDF
$pdf->Output('I', 'reporte_estudiantes.pdf');

// Cerrar conexión
$mysqli->close();
?>
