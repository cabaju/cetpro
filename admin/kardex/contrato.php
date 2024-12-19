<?php

ob_start(); // Inicia el buffer al comienzo del archivo


// Include the main TCPDF library (search for installation path).
$id_estudiante = $_GET['id'];
include ('../../app/config.php');
require_once('../../public/TCPDF-main/tcpdf.php');

include ('../../app/controllers/configuraciones/institucion/listado_de_instituciones.php');
include ('../../app/controllers/estudiantes/datos_del_estudiante.php');


//////////////////////////traendo datos de la institución
foreach ($instituciones as $institucione){
    $nombre_institucion = $institucione['nombre_institucion'];
    $direccion = $institucione['direccion'];
    $telefono = $institucione['telefono'];
    $celular = $institucione['celular'];
    $correo = $institucione['correo'];
    $logo = $institucione['logo'];
}



foreach ($estudiantes as $estdudiante){
    $nombres = $estudiante['nombres'];
    $apellidos = $estudiante['apellidos'];
    $apellidosM = $estudiante['apellidosM'];
    $departamento = $estudiante['departamento'];
    $provincia = $estudiante['provincia'];
    $distrito = $estudiante['distrito'];
    $sexo = $estudiante['sexo'];
    $gradoinst = $estudiante['gradoinst'];
}
//////////////////////////traendo datos de la institución




// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(216,280), true, 'UTF-8', false);

// set document information
$pdf->setCreator(PDF_CREATOR);
$pdf->setAuthor(APP_NAME);
$pdf->setTitle(APP_NAME);
$pdf->setSubject(APP_NAME);
$pdf->setKeywords(APP_NAME);

// set default header data
$pdf->setHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 001', PDF_HEADER_STRING, array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->setDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->setMargins(10, 3, 10);
$pdf->setHeaderMargin(PDF_MARGIN_HEADER);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);

$pdf->setPrintHeader(false);

// set auto page breaks
$pdf->setAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set default font subsetting mode
$pdf->setFontSubsetting(true);


$pdf->setFont('Times', '', 11);

// Add a page
// This method has several options, check the source code documentation for more information.
$pdf->AddPage();

// set text shadow effect
//$pdf->setTextShadow(array('enabled'=>true, 'depth_w'=>0.2, 'depth_h'=>0.2, 'color'=>array(196,196,196), 'opacity'=>1, 'blend_mode'=>'Normal'));


$style = array(
    'border' => 0,
    'vpadding' => '3',
    'hpadding' => '3',
    'fgcolor' => array(0, 0, 0),
    'bgcolor' => false, //array(255,255,255)
    'module_width' => 1, // width of a single module in points
    'module_height' => 1 // height of a single module in points
);
$QR = 'Este contrato es verificado por el sistema de inscripción de la Unidad Educativa '.$nombre_institucion.', 
por el El/la Señor(a) '.$nombres_apellidos_ppff.' con C.I.: Nro '.$ci_ppf.' habil por derecho en '.$fechaHora;
$pdf->write2DBarcode($QR,'QRCODE,L',  175,10,30,30, $style);


// Set some content to print
$html = '

<table border="0">
<tr>
    <td width="150px" style="text-align: center"><img src="../../public/images/configuracion/'.$logo.'" width="80px" alt=""></td>
    <td width="400px"></td>
</tr>
<tr>
     <td style="text-align: center">
        <b>'.$nombre_institucion.'</b> <br>
        <small>'.$direccion.'</small> <br>
        <small>'.$telefono.' '.$celular.'</small>
     </td>
     <td style="text-align: center"><h2><b><u>CONTRATO DE MATRÍCULA ESCOLAR PARA ESTUDIANTE DE '.$nivel.'</u></b></h2></td>
</tr>
</table>


<br><br>

<table border="1" cellpadding="5" cellspacing="0" style="text-align: center;">
    <tr bgcolor="#F0F0F0">
        <th><b>Nombre</b></th>
        <th><b>Apellidos</b></th>
        <th><b>Sexo</b></th>
        <th><b>Departamento</b></th>
    </tr>
    <tr>
        <td>'.$nombres.'</td>
        <td>'.$apellidos.' '.$apellidosM.'</td>
        <td>'.$sexo.'</td>
        <td>'.$departamento.'</td>
    </tr>
</table>
<br><br>
Fecha: '.$dia_actual.' de '.$mes_actual.' de '.$ano_actual.'
</p>
   
';

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------


ob_end_clean(); // Limpia el buffer justo antes de generar el PDF
$pdf->Output('comprobante_estudiante.pdf', 'I');




//============================================================+
// END OF FILE
//============================================================+
