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
        $this->Ln(0);// Salto de línea
        $this->SetFillColor(200, 200, 200); // COLOR DEL FONDO PONER 1 PARA ACTIVAR
        $this->SetFont('Times','B',13);
        $this->Cell(0, 5, utf8_decode('CARNET DE REGISTRO DEL CONADIS'), 0, 1, 'C');
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


$pdf = new PDF('P', 'mm', array(215, 280)); // Tamanho de página 215 x 280 mm
$pdf->AliasnbPages(); // Alias para el número total de páginas
$pdf->setMargins(10, 5, 10); // margenes
$pdf->setAutoPageBreak(true, 5); // Margen inferior
$pdf->AddPage(); // Añadir una nueva página
$pdf->SetFont('Arial','',9); // Configuración de fuente
$pdf->Ln(0);  // Salto de línea para separar la nueva fila
$pdf->SetFillColor(200,200,200); // Color de fondo para el encabezado
$pdf->SetFont('Times','B',12);

// Consulta para obtener los datos del estudiante
$id_estudiante = $_GET['id'];
$consulta = "SELECT * FROM usuarios as usu 
INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario 
INNER JOIN estudiantes as est ON est.persona_id = per.id_persona
INNER JOIN grados as gra ON gra.id_grado = est.grado_id
INNER JOIN ppffs as ppf ON ppf.estudiante_id = est.id_estudiante
WHERE est.estado = '1' AND est.id_estudiante = '$id_estudiante'";

while ($row = $resultado->fetch_assoc()) {
    $pdf->Cell(195, 6.5, utf8_decode($row['apellidos']. ' ' . $row['apellidosM'] . ' ' . $row['nombres']), 0, 1, 'C', 0);
    // Configurar fuente
    

    // Ruta completa de la foto
    //  $ruta_conadis = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $row['conadis'];
    //  $ruta_conadis1 = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $row['conadis1'];

    
    // if (file_exists($ruta_conadis)) {
        
    //     $pdf->Image($ruta_conadis, 10, 25, 195, 230); // Cambia las coordenadas y tamaño según necesites
    // } else {
        
    //     $pdf->Cell(0, 10, utf8_decode('Foto no disponible'), 0, 1, 'C');
    // }

       // Ruta completa de las imágenes
       $ruta_conadis = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $row['conadis'];
       $ruta_conadis1 = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $row['conadis1'];
   
    // Verificar y agregar la primera imagen (CONADIS)
    if (file_exists($ruta_conadis)) {
        $pdf->Image($ruta_conadis, 60, 25, 90, 100); // Ajusta posición (x, y) y tamaño (ancho, alto)
    } else {
        $pdf->SetFont('Arial', 'I', 10);
        $pdf->SetXY(10, 25); // Posicionar el texto donde iría la imagen
        $pdf->Cell(90, 10, utf8_decode('Imagen CONADIS no disponible'), 1, 1, 'C');
    }

    // Verificar y agregar la segunda imagen (CONADIS1)
    if (file_exists($ruta_conadis1)) {
        $pdf->Image($ruta_conadis1, 60, 135, 90, 100); // Posición y tamaño ajustados para la segunda imagen
    } else {
        $pdf->SetFont('Arial', 'I', 10);
        $pdf->SetXY(10, 135); // Posicionar el texto donde iría la imagen
        $pdf->Cell(90, 10, utf8_decode('Imagen CONADIS1 no disponible'), 1, 1, 'C');
    }

       $pdf->Ln(130);



    $nombre_archivo = utf8_decode($row['apellidos'] . '_' . $row['apellidosM'] . '_' . $row['nombres']);
    $nombre_archivo = str_replace(' ', '_', $nombre_archivo); // Reemplaza los espacios por guiones bajos
    $nombre_archivo .= '.pdf'; // Extensión del archivo

    header('Content-Type: application/pdf');  // Establece el tipo de contenido como PDF
    header('Content-Disposition: inline; filename="' . $nombre_archivo . '"');  // El nombre del archivo

    ob_end_clean();  // Limpia el buffer de salida y previene que se envíe cualquier cosa
 
    $pdf->Output('I', $nombre_archivo); // 'I' para mostrar el PDF en el navegador
    
    

}


