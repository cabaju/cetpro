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

        $this->SetFont('Arial','',18); // stylo del texto y tamano

        $this->Ln(16);// Salto de línea
        $this->SetFillColor(200, 200, 200); // COLOR DEL FONDO PONER 1 PARA ACTIVAR
        $this->SetFont('Times','B',9);
 
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        
        $this->Cell(0, 10, utf8_decode('Pagina ' . $this->PageNo() . '/{nb}'), 0, 0, 'C');

    }

}

require('../../admin/pagos/cn.php');

// Obtener el ID del estudiante de la URL


// Consulta para obtener los datos del estudiante específico

$sql_estudiantes = "SELECT * FROM usuarios as usu 
INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario 
INNER JOIN estudiantes as est ON est.persona_id = per.id_persona
INNER JOIN grados as gra ON gra.id_grado = est.grado_id
INNER JOIN ppffs as ppf ON ppf.estudiante_id = est.id_estudiante
WHERE est.estado = '1' AND per.discapacidad != 'ninguna'";

// Ejecutar la consulta
$resultado = $mysqli->query($sql_estudiantes);

// Inicia el documento PDF

$pdf = new PDF('L', 'mm', array(210, 297)); // Tamanho de página 215 x 280 mm
$pdf->AliasnbPages(); // Alias para el número total de páginas
$pdf->setMargins(15, 5, 15); // margenes
$pdf->setAutoPageBreak(true, 5); // Margen inferior
$pdf->AddPage(); // Añadir una nueva página
$pdf->SetFont('Arial','',9); // Configuración de fuente
$pdf->Ln(0);  // Salto de línea para separar la nueva fila
$pdf->SetFillColor(200,200,200); // Color de fondo para el encabezado
$pdf->SetFont('Times','B',14);


$contador = 1;


// Título del documento
$pdf->Cell(0, 10, 'REPORTE DE ESTUDIANTES CON DISCAPACIDAD', 0, 1, 'C');
$pdf->Ln(15);

// Encabezados de la tabla
$pdf->SetFont('Arial', 'B', 9);
$pdf->SetFillColor(200, 200, 200); // Color de fondo para los encabezados
$pdf->Cell(11, 8, 'Orden', 1, 0, 'C', true); // Nueva columna para el número de orden
$pdf->Cell(45, 8, 'Apellidos y Nombres', 1, 0, 'C', true);
$pdf->Cell(25, 8, 'DNI/CE', 1, 0, 'C', true);
$pdf->Cell(90, 8, 'Discapacidad', 1, 0, 'C', true);
$pdf->Cell(40, 8, 'Docente', 1, 0, 'C', true);
$pdf->Cell(45, 8, 'Grado', 1, 1, 'C', true);

// Fuente para los datos
$pdf->SetFont('Arial', '', 10);




// Verificar si hay resultados
if ($resultado->num_rows > 0) {
    // Relleno de los datos en la tabla
    while ($row = $resultado->fetch_assoc()) {

        $pdf->SetFont('Times', 'B', 12); 

        // LOGO
        // Ajusta el nombre del archivo del logo y su tamaño
        $pdf->Image('../../public/images/configuracion/cetpro.png', 15, 11, 25); // Ajusta las coordenadas y el tamaño según lo necesites
    
        


        $pdf->Ln(0);
        $pdf->SetFont('Times', '', 9); 
        $nombre_completo = utf8_decode($row['apellidos'] . ' ' . $row['apellidosM']. ' ' . $row['nombres']); // Concatenar nombre y apellido
        $ci = utf8_decode($row['ci']);
        $discapacidad = utf8_decode($row['discapacidad']);
        $docente = utf8_decode($row['apellido_docente']. ' ' . $row['nombre_docente']); // Asume que 'docente' está en el resultado
        $grado = utf8_decode($row['curso']); // Asume que 'grado' está en el resultado
        
        // Agregar una fila con los datos
        $pdf->Cell(11, 8, $contador, 1, 0, 'C');  // Número de orden
        $pdf->Cell(45, 8, $nombre_completo, 1);
        $pdf->Cell(25, 8, $ci, 1, 0, 'C');  // Ajusta el ancho según sea necesario
        $pdf->Cell(90, 8, $discapacidad, 1);
        $pdf->Cell(40, 8, $docente, 1);
        $pdf->Cell(45, 8, $grado, 1, 1);

        $contador++;
    }
} else {
    // Mensaje si no hay estudiantes con discapacidad
    $pdf->Cell(0, 10, 'No se encontraron estudiantes con discapacidad.', 1, 1, 'C');
}

// Salida del archivo PDF
$pdf->Output('I', 'reporte_estudiantes_discapacidad.pdf');

// Cerrar conexión
$mysqli->close();
?>