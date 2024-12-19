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


// Consulta para obtener los datos del estudiante específico
$id_estudiante = $_GET['id'];
$sql_estudiantes = "SELECT * FROM usuarios as usu 
INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario 
INNER JOIN estudiantes as est ON est.persona_id = per.id_persona
INNER JOIN grados as gra ON gra.id_grado = est.grado_id
INNER JOIN ppffs as ppf ON ppf.estudiante_id = est.id_estudiante
WHERE est.estado = '1'";

$resultado = $mysqli->query($sql_estudiantes);



// Inicia el documento PDF

$pdf = new PDF('P', 'mm', array(215, 280)); // Tamanho de página 215 x 280 mm
$pdf->AliasnbPages(); // Alias para el número total de páginas
$pdf->setMargins(10, 5, 10); // margenes
$pdf->setAutoPageBreak(true, 5); // Margen inferior
$pdf->AddPage(); // Añadir una nueva página
$pdf->SetFont('Arial','',9); // Configuración de fuente
$pdf->Ln(0);  // Salto de línea para separar la nueva fila
$pdf->SetFillColor(200,200,200); // Color de fondo para el encabezado
$pdf->SetFont('Times','B',9);
$pdf->Ln(30);





$pdf->SetFont('Times','B',9);
$pdf->Cell(195,6.5, 'DATOS DEL ESTUDIANTE', 1 , 1 , 'L', 0);
$pdf->Ln(0);

$pdf->SetFont('Times','B',9);
$pdf->Cell(55,6.5, utf8_decode('APELLIDO PATERNO'), 1 , 0 , 'C', 1);
$pdf->Cell(55,6.5, utf8_decode('APELLIDO MATERNO'), 1 , 0 , 'C', 1);
$pdf->Cell(60,6.5, utf8_decode('NOMBRES'), 1 , 0 , 'C', 1);
$pdf->Cell(25,6.5, utf8_decode('SEXO'), 1 , 1 , 'C', 1);
$pdf->Ln(0);

$pdf->Cell(55, 6.5, utf8_decode($row['apellidos']), 1, 0, 'C', 0);
$pdf->Cell(55, 6.5, utf8_decode($row['apellidosM']), 1, 0, 'C', 0);
$pdf->Cell(60, 6.5, utf8_decode($row['nombres']), 1, 0, 'C', 0);
$pdf->Cell(25, 6.5, utf8_decode($row['sexo']), 1, 1, 'C', 0);
$pdf->Ln(0);



    ob_end_clean();  // Limpia el buffer de salida y previene que se envíe cualquier cosa
    
  
    $pdf->Output('I', 'hvhdjflk'); // 'I' para mostrar el PDF en el navegador
    
    




