<?php

$id_pago = $_GET['id'];
$id_estudiante = $_GET['id_estudiante'];
include('../../app/config.php');
require_once('../../public/TCPDF-main/tcpdf.php');
include('../../app/controllers/configuraciones/institucion/listado_de_instituciones.php');
include ('../../app/controllers/estudiantes/datos_del_estudiante.php');
include ('../../app/controllers/pagos/datos_pago_estudiante.php');

error_reporting(E_ALL & ~E_NOTICE);
    ini_set('display_errors', 0);
    ini_set('log_errors', 1);
    ob_end_clean();


// Inicia el documento PDF
$pdf = new TCPDF();
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, array(215,280), true, 'UTF-8', false);
$pdf->setPrintHeader(false); // Desactivar encabezado
$pdf->AddPage();


// Configuración de fuente
$pdf->SetFont('helvetica', 'B', 12);

// set margins
$pdf->setMargins(10, 10, 10);
$pdf->setFooterMargin(PDF_MARGIN_FOOTER);


// Texto centrado
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(0, 20, 'COMPROMISOS INSTITUCIONALES', 0, 1, 'C');
// Compromisos
$pdf->Ln(5);

$pdf->SetFont('helvetica', '', 10);
$pdf->MultiCell(0, 10, "1.- Me comprometo a utilizar el uniforme único de la especialidad\n2.- Me comprometo a realizar las Practicas Pre Profesionales para aprobar el modulo\n3.- Me comprometo a participar en todas las actividades programadas por la institucion", 0, 'L');




// Espacio entre filas
$pdf->Ln(3);  // Salto de línea para separar la nueva fila

// Definir anchos de cada columna en la fila de 4 columnas
$widthCol1 = 30;  // Ancho de la primera columna
$widthCol2 = 30;  // Ancho de la segunda columna
$widthCol3 = 40;  // Ancho de la tercera columna
$widthCol4 = 45;  // Ancho de la cuarta columna
$widthCol5 = 50;  // Ancho de la cuarta columna

// Configurar la fuente y estilo para la nueva fila
$pdf->SetFillColor(200, 200, 200);  // Valores RGB (rojo, verde, azul)
$pdf->SetFont('helvetica', 'B', 9);

// Columna 1
$pdf->Cell($widthCol1, 7, 'ANO', 1, 0, 'C', 1);

// Columna 2
$pdf->SetFont('helvetica', '', 9);
$pdf->Cell($widthCol2, 7, '2024', 1, 0, 'C', 0);

// Columna 3
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol3, 7, '', 'LR', 0, 'C', 0);

// Columna 4
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol4, 7, 'CÓDIGO DE INSCRIPCIÓN', 1, 0, 'C', 1);

// Columna 5
$pdf->SetFont('helvetica', '', 9);
$pdf->Cell($widthCol5, 7, '0707844-', 1, 1, 'C', 0);  // Último parámetro como 1 para el salto de línea



// Salto de línea para separar secciones
$pdf->Ln(3);

// Encabezado para datos del estudiante
$pdf->SetFont('helvetica', 'B', 9);
$pageWidth = $pdf->getPageWidth();
$marginLeft = $pdf->getMargins()['left'];
$marginRight = $pdf->getMargins()['right'];
$availableWidth = $pageWidth - $marginLeft - $marginRight;

// Texto de la fila adicional
$textoFilaUnica = 'DATOS DEL CETPRO';

// Dibujar la fila con una sola columna
$pdf->Cell($availableWidth, 8, $textoFilaUnica, 1, 1, 'L', 0);


// Fila 9 - Tres columnas, cada una con su propio ancho
$widthCol1 = 48;  // Ancho de la primera columna
$widthCol2 = 147;  // Ancho de la segunda columna


$pdf->SetFillColor(200, 200, 200);  // Valores RGB (rojo, verde, azul)
$pdf->SetFont('helvetica', 'B', 9);

// Columna 1
$pdf->Cell($widthCol1, 7, 'NOMBRE', 1, 0, 'C', 1);

// Columna 2
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol2, 7, 'CETPRO I.E.S.T.P. MARIA ROSARIO ARAOZ PINTO', 1, 0, 'C', 0);




// Fila 9 - Tres columnas, cada una con su propio ancho

$pdf->Ln();  // Salto de línea

$widthCol1 = 48;  // Ancho de la primera columna
$widthCol2 = 40;  // Ancho de la segunda columna
$widthCol3 = 52;  // Ancho de la tercera columna
$widthCol4 = 55;  // Ancho de la cuarta columna

$pdf->SetFont('helvetica', 'B', 9);

// Columna 1
$pdf->Cell($widthCol1, 7, 'RESOLUCIÓN DE CREACIÓN', 1, 0, 'C', 1);

// Columna 2
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol2, 7, ' R.M. Nº 0400-70-ED', 1, 0, 'C', 0);

// Columna 3
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol3, 7, 'RESOLUCIÓN DE CONVERSIÓN', 1, 0, 'C', 1);

// Columna 4
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol4, 7, ' R.M. Nº 0400-70-ED-3456', 1, 0, 'C', 0);

// Fila 10 - Tres columnas, cada una con su propio ancho

$pdf->Ln();  // Salto de línea

$widthCol1 = 48;  // Ancho de la primera columna
$widthCol2 = 30;  // Ancho de la segunda columna
$widthCol3 = 44;  // Ancho de la tercera columna
$widthCol4 = 25;  // Ancho de la cuarta columna
$widthCol5 = 23;  // Ancho de la quinta columna
$widthCol6 = 25;  // Ancho de la sexta columna

$pdf->SetFont('helvetica', 'B', 9);

// Columna 1
$pdf->Cell($widthCol1, 7, 'GESTIÓN PÚBLICA', 1, 0, 'C', 1);

// Columna 2
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol2, 7, 'PÚBLICA', 1, 0, 'C', 0);

// Columna 3
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol3, 7, 'GESTIÓN PRIVADA', 1, 0, 'C', 1);

// Columna 4
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol4, 7, 'PRIVADA', 1, 0, 'C', 0);

// Columna 5
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol5, 7, 'CONVENIO', 1, 0, 'C', 1);

// Columna 6
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol6, 7, 'CONVENIO', 1, 1, 'C', 0);




$widthCol1 = 48;  // Ancho de la primera columna
$widthCol2 = 30;  // Ancho de la segunda columna
$widthCol3 = 44;  // Ancho de la tercera columna
$widthCol4 = 25;  // Ancho de la cuarta columna
$widthCol5 = 23;  // Ancho de la quinta columna
$widthCol6 = 25;  // Ancho de la sexta columna

$pdf->SetFont('helvetica', 'B', 9);

// Columna 1
$pdf->Cell($widthCol1, 7, 'DEPARTAMENTO', 1, 0, 'C', 1);

// Columna 2
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol2, 7, 'LIMA', 1, 0, 'C', 0);

// Columna 3
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol3, 7, 'DRE', 1, 0, 'C', 1);

// Columna 4
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol4, 7, 'LIMA', 1, 0, 'C', 0);

// Columna 5
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol5, 7, 'UGEL', 1, 0, 'C', 1);

// Columna 6
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol6, 7, '01 SJM', 1, 1, 'C', 0);



// Espacio entre las filas anteriores y la nueva fila


// Definir anchos de cada columna en la nueva fila de 4 columnas
$widthCol1 = 48;  // Ancho de la primera columna
$widthCol2 = 40;  // Ancho de la segunda columna
$widthCol3 = 52;  // Ancho de la tercera columna
$widthCol4 = 55;  // Ancho de la cuarta columna

// Definir fuente y estilo para la nueva fila
$pdf->SetFont('helvetica', 'B', 9);

// Nueva fila - Columna 1
$pdf->Cell($widthCol1, 7, 'PROVINCIA', 1, 0, 'C', 1);

// Nueva fila - Columna 2
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol2, 7, 'LIMA', 1, 0, 'C', 0);

// Nueva fila - Columna 3
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol3, 7, 'DISTRITO', 1, 0, 'C', 1);

// Nueva fila - Columna 4
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol4, 7, 'LURIN', 1, 1, 'C', 0);


// Espacio entre la fila anterior y la nueva fila de 5 columnas


// Definir anchos de cada columna en la nueva fila de 5 columnas
$widthCol1 = 24;  // Ancho de la primera columna
$widthCol2 = 24;  // Ancho de la segunda columna
$widthCol3 = 56;  // Ancho de la tercera columna
$widthCol4 = 55;  // Ancho de la cuarta columna
$widthCol5 = 18;  // Ancho de la quinta columna
$widthCol6 = 18;  // Ancho de la quinta columna

// Configurar la fuente y estilo para la nueva fila
$pdf->SetFont('helvetica', 'B', 9);

// Nueva fila - Columna 1
$pdf->Cell($widthCol1, 7, 'LUGAR', 1, 0, 'C', 1);

// Nueva fila - Columna 2
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol2, 7, 'LURÍN', 1, 0, 'C', 0);

// Nueva fila - Columna 3
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol3, 7, 'DIRECCIÓN (Av., Jr., Calle, Psje.)', 1, 0, 'C', 1);

// Nueva fila - Columna 4
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol4, 7, 'CALLE CASTILLA 5TA CUADRA', 1, 0, 'C', 0);

// Nueva fila - Columna 5
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol5, 7, 'N°', 1, 0, 'C', 1);

// Nueva fila - Columna 6
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol6, 7, 'S/N', 1, 1, 'C', 0);



// Salto de línea para separar secciones
$pdf->Ln(3);

// Encabezado para datos del estudiante
$pdf->SetFont('helvetica', 'B', 9);
$pageWidth = $pdf->getPageWidth();
$marginLeft = $pdf->getMargins()['left'];
$marginRight = $pdf->getMargins()['right'];
$availableWidth = $pageWidth - $marginLeft - $marginRight;

// Texto de la fila adicional
$textoFilaUnica = 'DATOS DEL ESTUDIANTE';

// Dibujar la fila con una sola columna
$pdf->Cell($availableWidth, 8, $textoFilaUnica, 1, 1, 'L', 0);


// Fila 1 - Cambiamos los anchos
$widthCol1 = 55;
$widthCol2 = 55;
$widthCol3 = 60;
$widthCol4 = 25;
$pdf->SetFont('helvetica', 'B', 9);
$pdf->SetFillColor(200, 200, 200);  // Valores RGB (rojo, verde, azul)
$pdf->Cell($widthCol1, 6, 'APELLIDO PATERNO', 1, 0, 'C', 1);
$pdf->Cell($widthCol2, 6, 'APELLIDO MATERNO', 1, 0, 'C', 1);
$pdf->Cell($widthCol3, 6, 'NOMBRES', 1, 0, 'C', 1);
$pdf->Cell($widthCol4, 6, 'SEXO', 1, 1, 'C', 1);

// Fila 2 - Cambiamos los anchos
$widthCol1 = 55;
$widthCol2 = 55;
$widthCol3 = 60;
$widthCol4 = 25;
$pdf->SetFont('helvetica', '', 8); 

$pdf->Cell($widthCol1, 7, $apellidos, 1, 0, 'C', 0);
$pdf->Cell($widthCol2, 7, 'VELA', 1, 0, 'C', 0);
$pdf->Cell($widthCol3, 7, 'ALDO', 1, 0, 'C', 0);
$pdf->Cell($widthCol4, 7, 'Femenino', 1, 1, 'C', 0);










// Fila 3 - Cambiamos los anchos nuevamente
$widthCol1 = 55;
$widthCol2 = 55;
$widthCol3 = 60;
$widthCol4 = 25;
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol1, 6, 'EDAD', 1, 0, 'C', 1);
$pdf->Cell($widthCol2, 6, 'ESTADO CIVIL', 1, 0, 'C', 1);
$pdf->Cell($widthCol3, 6, 'GRADO DE INSTRUCCIÓN', 1, 0, 'C', 1);
$pdf->Cell($widthCol4, 6, 'DNI/CE', 1, 1, 'C', 1);

// Fila 4 - Cambiamos los anchos nuevamente
$widthCol1 = 55;
$widthCol2 = 55;
$widthCol3 = 60;
$widthCol4 = 25;
$pdf->SetFont('helvetica', '', 8); 
$pdf->Cell($widthCol1, 7, '30', 1, 0, 'C', 0);
$pdf->Cell($widthCol2, 7, 'SOLTERO', 1, 0, 'C', 0);
$pdf->Cell($widthCol3, 7, '5° SECUNDARIA', 1, 0, 'C', 0);
$pdf->Cell($widthCol4, 7, '44573939', 1, 1, 'C', 0);


// Fila 5 - Solo dos columnas, cada una con su propio ancho
$widthCol1 = 55;  // Ancho de la primera columna
$widthCol2 = 140;  // Ancho de la segunda columna
$pdf->SetFont('helvetica', 'B', 9);

// Columna 1
$pdf->Cell($widthCol1, 7, 'DOMICILIO (Av., Jr., Calle, Psje.)', 1, 0, 'C', 1);
$pdf->SetFont('helvetica', '', 8);
// Columna 2
$pdf->Cell($widthCol2, 7, 'Datos de la segunda columna', 1, 1, 'C', 0);



// Fila 6 - Seis columnas, cada una con su propio ancho
$widthCol1 = 32.5;  // Ancho de la primera columna
$widthCol2 = 32.5;  // Ancho de la segunda columna
$widthCol3 = 32.5;  // Ancho de la tercera columna
$widthCol4 = 32.5;  // Ancho de la cuarta columna
$widthCol5 = 32.5;  // Ancho de la quinta columna
$widthCol6 = 32.5;  // Ancho de la sexta columna

$pdf->SetFont('helvetica', 'B', 9);

// Columna 1
$pdf->Cell($widthCol1, 7, 'DEPARTAMENTO', 1, 0, 'C', 1);

// Columna 2
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol2, 7, 'LIMA', 1, 0, 'C', 0);

// Columna 3
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol3, 7, 'PROVINCIA', 1, 0, 'C', 1);

// Columna 4
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol4, 7, 'LIMA', 1, 0, 'C', 0);

// Columna 5
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol5, 7, 'DISTRITO', 1, 0, 'C', 1);

// Columna 6
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol6, 7, 'PUNTA NEGRA', 1, 1, 'C', 0);



// Fila 7 - Tres columnas, cada una con su propio ancho
$widthCol1 = 65;  // Ancho de la primera columna
$widthCol2 = 65;  // Ancho de la segunda columna
$widthCol3 = 65;  // Ancho de la tercera columna
$widthCol3 = 65;  // Ancho de la tercera columna

$pdf->SetFont('helvetica', 'B', 9); // Usamos la fuente normal (sin negrita)

// Columna 1
$pdf->Cell($widthCol1, 7, 'LUGAR', 1, 0, 'C', 1);

// Columna 2
$pdf->Cell($widthCol2, 7, 'TELÉFONO', 1, 0, 'C', 1);

// Columna 3
$pdf->Cell($widthCol3, 7, 'CORREO ELECTRÓNICA', 1, 1, 'C', 1);


// Fila 8 - Tres columnas, cada una con su propio ancho
$widthCol1 = 65;  // Ancho de la primera columna
$widthCol2 = 65;  // Ancho de la segunda columna
$widthCol3 = 65;  // Ancho de la tercera columna

$pdf->SetFont('helvetica', '', 8); // Usamos la fuente normal (sin negrita)

// Columna 1
$pdf->Cell($widthCol1, 7, 'los heros de los apostoles', 1, 0, 'C', 0);

// Columna 2
$pdf->Cell($widthCol2, 7, '998789894', 1, 0, 'C', 0);

// Columna 3
$pdf->Cell($widthCol3, 7, 'miltoncaceresalban_35@gmail.com', 1, 1, 'C', 0);



// Continúa agregando celdas de la misma manera para completar la ficha


$pdf->Ln(3);  // 10 es el espacio en unidades de medida del PDF (por ejemplo, milímetros)


// Encabezado para datos del estudiante
$pdf->SetFont('helvetica', 'B', 9);
$pageWidth = $pdf->getPageWidth();
$marginLeft = $pdf->getMargins()['left'];
$marginRight = $pdf->getMargins()['right'];
$availableWidth = $pageWidth - $marginLeft - $marginRight;

// Texto de la fila adicional
$textoFilaUnica = 'DATOS ACADÉMICOS';

// Dibujar la fila con una sola columna
$pdf->Cell($availableWidth, 8, $textoFilaUnica, 1, 1, 'L', 0);


// Fila 9 - Tres columnas, cada una con su propio ancho
$widthCol1 = 25;  // Ancho de la primera columna
$widthCol2 = 25;  // Ancho de la segunda columna
$widthCol3 = 75;  // Ancho de la tercera columna
$widthCol4 = 70;  // Ancho de la cuarta columna


$pdf->SetFont('helvetica', 'B', 9);

// Columna 1
$pdf->Cell($widthCol1, 7, 'CICLO', 1, 0, 'C', 1);

// Columna 2
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol2, 7, 'BÁSICO', 1, 0, 'C', 0);

// Columna 3
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol3, 7, 'OPCIÓN OCUPACIONAL/ESPECIALIDAD', 1, 0, 'C', 1);

// Columna 4
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol4, 7, 'ASISTENTE DE PANADERÍA Y PASTELERIA', 1, 0, 'C', 0);



// Fila 9 - Tres columnas, cada una con su propio ancho

$pdf->Ln();  // Salto de línea

$widthCol1 = 25;  // Ancho de la primera columna
$widthCol2 = 70;  // Ancho de la segunda columna
$widthCol3 = 30;  // Ancho de la tercera columna
$widthCol4 = 70;  // Ancho de la cuarta columna

$pdf->SetFont('helvetica', 'B', 9);

// Columna 1
$pdf->Cell($widthCol1, 7, 'MÓDULO', 1, 0, 'C', 1);

// Columna 2
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol2, 7, 'SOLDADURA ELECTRÍCA', 1, 0, 'C', 0);

// Columna 3
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol3, 7, 'DOCENTE', 1, 0, 'C', 1);

// Columna 4
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol4, 7, 'YAN CISNEROS NAPRANIV', 1, 0, 'C', 0);

// Fila 10 - Tres columnas, cada una con su propio ancho

$pdf->Ln();  // Salto de línea

$widthCol1 = 20;  // Ancho de la primera columna
$widthCol2 = 55;  // Ancho de la segunda columna
$widthCol3 = 20;  // Ancho de la tercera columna
$widthCol4 = 20;  // Ancho de la cuarta columna
$widthCol5 = 20;  // Ancho de la quinta columna
$widthCol6 = 20;  // Ancho de la sexta columna
$widthCol7 = 20;  // Ancho de la septima columna
$widthCol8 = 20;  // Ancho de la octava columna

$pdf->SetFont('helvetica', 'B', 9);

// Columna 1
$pdf->Cell($widthCol1, 7, 'HORARIO', 1, 0, 'C', 1);

// Columna 2
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol2, 7, 'lunes a viernes 6 :00 pm - 10:30pm', 1, 0, 'C', 0);

// Columna 3
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol3, 7, 'DURACIÓN', 1, 0, 'C', 1);

// Columna 4
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol4, 7, '300 HORAS', 1, 0, 'C', 0);

// Columna 5
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol5, 7, 'INICIO', 1, 0, 'C', 1);

// Columna 6
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol6, 7, '12/04/2024', 1, 0, 'C', 0);

// Columna 7
$pdf->SetFont('helvetica', 'B', 9);
$pdf->Cell($widthCol7, 7, 'TERMINO', 1, 0, 'C', 1);

// Columna 8
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell($widthCol8, 7, '12/04/2024', 1, 1, 'C', 0);

    

// Compromisos
$pdf->Ln(5);
$pdf->SetFont('helvetica', 'B', 10);
$pdf->Cell(0, 10, 'COMPROMISOS CON LA INSTITUCIÓN', 0, 1, 'L');

$pdf->SetFont('helvetica', '', 10);
$pdf->MultiCell(0, 10, "1.- Me comprometo a utilizar el uniforme único de la especialidad\n2.- Me comprometo a realizar las Practicas Pre Profesionales para aprobar el modulo\n3.- Me comprometo a participar en todas las actividades programadas por la institucion", 0, 'L');

// Firmas
$pdf->Ln(10);
$pdf->Cell(60, 10, '____________________________', 0, 0, 'C');
$pdf->Cell(60, 10, '____________________________', 0, 0, 'C');
$pdf->Cell(60, 10, '____________________________', 0, 1, 'C');
$pdf->Cell(60, 10, 'ESTUDIANTE', 0, 0, 'C');
$pdf->Cell(60, 10, 'DIRECTOR', 0, 0, 'C');
$pdf->Cell(60, 10, 'COORDINADOR', 0, 1, 'C');

// Salida del documento
$pdf->Output('ficha_matricula.pdf', 'I');
