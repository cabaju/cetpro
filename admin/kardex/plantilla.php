<?php
require('../../reportes/fpdf.php');

require ('../../app/config.php');


class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    // $this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'Reporte de alumnos',1,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(30,10, 'Nombre', 1 , 0 , 'C', 0);
    $this->Cell(35,10, 'Apellidos Paterno', 1 , 0 , 'C', 0);
    $this->Cell(35,10, 'Apellido Materno', 1 , 0 , 'C', 0); 
    $this->Cell(35,10, 'Docente', 1 , 0 , 'C', 0); 
    $this->Cell(30,10, 'Sexo', 1 , 1 , 'C', 0);      

    
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
$id_estudiante = $_GET['id'];

// Consulta para obtener los datos del estudiante específico
$consulta = "SELECT * FROM usuarios as usu 
INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario 
INNER JOIN estudiantes as est ON est.persona_id = per.id_persona
INNER JOIN grados as gra ON gra.id_grado = est.grado_id
INNER JOIN ppffs as ppf ON ppf.estudiante_id = est.id_estudiante
WHERE est.estado = '1' AND est.id_estudiante = '$id_estudiante'";

$resultado = $mysqli->query($consulta);

















$pdf = new PDF();

$pdf->AliasnbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);
// $pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(30,10, $row['nombres'], 1 , 0 , 'C', 0);
    $pdf->Cell(35,10, $row['apellidos'], 1 , 0 , 'C', 0);
    $pdf->Cell(35,10, $row['apellidosM'], 1 , 0 , 'C', 0);
    $pdf->Cell(35,10, $row['apellido_docente'], 1 , 0 , 'C', 0);
    $pdf->Cell(30,10, $row['sexo'], 1 , 1 , 'C', 0);
}

$pdf->Output();
