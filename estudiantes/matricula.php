<?php
ob_start();  // Inicia un buffer de salida



require_once ('../../app/config.php');
require_once('../../reportes/fpdf.php'); 
require_once('../../admin/estudiantes/matricula.php'); 




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

// require('../../admin/pagos/cn.php');
require('../../admin/estudiantes/matricula.php'); 

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

    // Configurar fuente
    $pdf->SetFont('Times', 'B', 12); 

    // LOGO
    // Ajusta el nombre del archivo del logo y su tamaño
    $pdf->Image('../../public/images/configuracion/cetpro.png', 15, 10, 30); // Ajusta las coordenadas y el tamaño según lo necesites

    // Espacio entre el logo y el texto central
    $pdf->SetX(10);

    // TÍTULO CENTRAL
    $pdf->SetFont('Times', 'B', 22); 
    $pdf->Cell(0, 5, utf8_decode('FICHA DE INSCRIPCIÓN'), 0, 1, 'C');
    $pdf->SetFont('Times', 'B', 14); 
    $pdf->Cell(0, 10, utf8_decode('EDUCACIÓN TÉCNICO - PRODUCTIVA'), 0, 1, 'C');

    // Espacio entre el título y el cuadro
    $pdf->SetY(10);
    $pdf->SetX(174);

    // CUADRO A LA DERECHA FOTO DEL ALUMNO
    $pdf->Cell(30, 30, '', 1, 1, 'C'); // Celda vacía con borde para el cuadro

    // $pdf->Image('../../public/images/configuracion/risco.jpg', 174, 10, 30);

    $pdf->Ln(9); // Espacio extra si se necesita después de esta sección


    $pdf->Ln(9);

    $pdf->Cell(30, 6.5, utf8_decode(' AÑO'), 1, 0, 'C', 1);
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(30, 6.5, utf8_decode($row['rude']), 1, 0, 'C', 0);
    $pdf->Cell(40, 6.5, '', 'LR', 0, 'C', 0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(45, 6.5, utf8_decode('CÓDIGO DE INSCRIPCIÓN '), 1, 0, 'L', 1);
    $pdf->SetFont('Times','B',10);
    $pdf->Cell(50, 6.5, utf8_decode( '0707844-' .$row['id_usuario']), 1, 1, 'C', 0);
    $pdf->Ln(4);

    // $row['apellido_docente'] . ' ' . $row['nombre_docente']),


    $pdf->SetFont('Times','B',9);
    $pdf->Cell(195,6.5, 'DATOS DEL CETPRO', 1 , 1 , 'L', 0);
    $pdf->Ln(0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(47,6.5, 'NOMBRE', 1 , 0 , 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(148, 6.5, utf8_decode('CETPRO JÓSE FAUSTINO SÁNCHEZ CARRIÓN'), 1 , 1 , 'C', 0);
    $pdf->Ln(0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(47,6.5, utf8_decode('RESOLUCIÓN DE CREACIÓN'), 1 , 0 , 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(42,6.5, utf8_decode('R.M. Nº 0400-70-ED'), 1 , 0 , 'L', 0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(52,6.5, utf8_decode('RESOLUCIÓN DE CONVERSIÓN'), 1 , 0 , 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(54,6.5, utf8_decode('R.M. Nº 0400-70-ED-3456'), 1 , 1 , 'L', 0);
    $pdf->Ln(0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(47,6.5, utf8_decode('GESTIÓN PÚBLICA'), 1 , 0 , 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(30,6.5, utf8_decode('PÚBLICA'), 1 , 0 , 'L', 0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(44,6.5, utf8_decode('GESTIÓN PRIVADA'), 1 , 0 , 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(25,6.5, utf8_decode(''), 1 , 0 , 'L', 0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(23,6.5, utf8_decode('CONVENIO'), 1 , 0 , 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(26,6.5, utf8_decode(''), 1 , 1 , 'L', 0);
    $pdf->Ln(0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(47,6.5, utf8_decode('DEPARTAMENTO'), 1 , 0 , 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(30,6.5, utf8_decode('LIMA'), 1 , 0 , 'L', 0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(44,6.5, utf8_decode('DRE'), 1 , 0 , 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(25,6.5, utf8_decode('LIMA'), 1 , 0 , 'L', 0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(23,6.5, utf8_decode('UGE'), 1 , 0 , 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(26,6.5, utf8_decode('01 SJM'), 1 , 1 , 'L', 0);
    $pdf->Ln(0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(47,6.5, utf8_decode('PROVINCIA'), 1 , 0 , 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(30,6.5, utf8_decode('LIMA'), 1 , 0 , 'L', 0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(44,6.5, utf8_decode('DISTRITO'), 1 , 0 , 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(74,6.5, utf8_decode('LURIN'), 1 , 1 , 'L', 0);
    $pdf->Ln(0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(47,6.5, utf8_decode('LUGAR'), 1 , 0 , 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(20,6.5, utf8_decode('LURIN'), 1 , 0 , 'L', 0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(54,6.5, utf8_decode('DIRECCIÓN (Av., Jr., Calle, Psje.)'), 1 , 0 , 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(51,6.5, utf8_decode('CALLE CASTILLA 5TA CUADRA'), 1 , 0 , 'L', 0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(11,6.5, utf8_decode('N°'), 1 , 0 , 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(12,6.5, utf8_decode('S/N'), 1 , 1 , 'L', 0);
    $pdf->Ln(3);// Salto de línea

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
    $pdf->Cell(55, 6.5, 'EDAD', 1, 0, 'C', 1);
    $pdf->Cell(55, 6.5, 'ESTADO CIVIL', 1, 0, 'C', 1);
    $pdf->Cell(60, 6.5, utf8_decode('GRADO DE INSTRUCCIÓN'), 1, 0, 'C', 1);
    $pdf->Cell(25, 6.5, 'DNI / CE', 1, 1, 'C', 1); // Salto de línea después de la última celda
    $pdf->Ln(0);

    $fecha_nacimiento = $row['fecha_nacimiento']; // Obtener la fecha de nacimiento desde la consulta
    $fecha_nacimiento_dt = new DateTime($fecha_nacimiento); // Calcular la edad
    $fecha_nacimiento_dt = new DateTime($fecha_nacimiento);
    $fecha_actual = new DateTime();
    $edad = $fecha_actual->diff($fecha_nacimiento_dt)->y;
    $pdf->Cell(55, 6.5, utf8_decode($edad), 1, 0, 'C', 0);
    // $pdf->Cell(55, 6.5, utf8_decode($row['edad']), 1, 0, 'C', 0);
    $pdf->Cell(55, 6.5, utf8_decode($row['estadocivil']), 1, 0, 'C', 0);
    $pdf->Cell(60, 6.5, utf8_decode($row['gradoinst']), 1, 0, 'C', 0);
    $pdf->Cell(25, 6.5, utf8_decode($row['ci']), 1, 1, 'C', 0);
    $pdf->Ln(0);
    $pdf->Cell(55, 6.5, 'DOMICILIO (Av., Jr., Calle, Psje.)', 1, 0, 'C', 1);
    $pdf->Cell(140, 6.5, utf8_decode($row['direccion']), 1, 1, 'C', 0);
    $pdf->Ln(0);
    $pdf->Cell(32.5, 6.5, 'DEPARTAMENTO', 1, 0, 'C', 1);
    $pdf->Cell(32.5, 6.5, utf8_decode($row['departamento']), 1, 0, 'C', 0);
    $pdf->Cell(32.5, 6.5, 'PROVINCIA', 1, 0, 'C', 1);
    $pdf->Cell(32.5, 6.5, utf8_decode($row['provincia']), 1, 0, 'C', 0);
    $pdf->Cell(32.5, 6.5, 'DISTRITO', 1, 0, 'C', 1);
    $pdf->Cell(32.5, 6.5, utf8_decode($row['distrito']), 1, 1, 'C', 0);
    $pdf->Ln(0);
    $pdf->Cell(65, 6.5, 'LUGAR DE NACIMIENTO', 1, 0, 'C', 1);
    $pdf->Cell(65, 6.5, utf8_decode('TELÉFONO'), 1, 0, 'C', 1);
    $pdf->Cell(65, 6.5, utf8_decode('CORREO ELECTRÓNICA'), 1, 1, 'C', 1);
    $pdf->Ln(0);
    $pdf->Cell(65, 6.5, utf8_decode($row['nacimiento']), 1, 0, 'C', 0);
    $pdf->Cell(65, 6.5, utf8_decode($row['celular']), 1, 0, 'C', 0);
    $pdf->Cell(65, 6.5, utf8_decode($row['email']), 1, 1, 'C', 0);
    $pdf->Ln(3);
    $pdf->Cell(195, 6.5, utf8_decode('DATOS ACADÉMICOS'), 1, 1, 'L', 0);
    $pdf->Ln(0);
    $pdf->Cell(20, 6.5, 'CICLO', 1, 0, 'L', 1);
    $pdf->SetFont('Times','',8);
    $pdf->Cell(30, 6.5, utf8_decode('BÁSICO'), 1, 0, 'C', 0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(70, 6.5, utf8_decode('OPCIÓN OCUPACIONAL/ESPECIALIDAD'), 1, 0, 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(75, 6.5, utf8_decode($row['curso']), 1, 1, 'L', 0);
    $pdf->Ln(0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(20, 6.5, utf8_decode('MÓDULO'), 1, 0, 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(75, 6.5, utf8_decode($row['paralelo']), 1, 0, 'L', 0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(30, 6.5, utf8_decode('DOCENTE'), 1, 0, 'L', 1);
    $pdf->SetFont('Times','',8);
    $pdf->Cell(70, 6.5, utf8_decode($row['apellido_docente'] . ' ' . $row['nombre_docente']), 1, 1, 'L', 0); // Concatenación de apellido y nombre
    $pdf->Ln(0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(20, 6.5, utf8_decode('HORARIO'), 1, 0, 'L', 1);
    $pdf->SetFont('Times','',8);
    $pdf->Cell(55, 6.5, utf8_decode($row['frecuencia']), 1, 0, 'L', 0);
    $pdf->SetFont('Times','B',9);
    $pdf->Cell(20, 6.5, utf8_decode('DURACIÓN'), 1, 0, 'L', 1);
    $pdf->SetFont('Times','',8);
    $pdf->Cell(20, 6.5, utf8_decode('300 HORAS'), 1, 0, 'L', 0);
    $pdf->SetFont('Times','B',9);
    $fecha_inicio = date("d/m/Y", strtotime($row['inicio'])); // Convertir la fecha al formato deseado
    $pdf->Cell(20, 6.5, utf8_decode('INICIO'), 1, 0, 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(20, 6.5, utf8_decode($fecha_inicio), 1, 0, 'C', 0); // Mostrar la fecha convertida en el formato d/m/Y
    $pdf->SetFont('Times','B',9);
    $fecha_termino = date("d/m/Y", strtotime($row['termino'])); // Convertir la fecha al formato deseado
    $pdf->Cell(20, 6.5, utf8_decode('TERMINO'), 1, 0, 'L', 1);
    $pdf->SetFont('Times','',9);
    $pdf->Cell(20, 6.5, utf8_decode($fecha_termino), 1, 1, 'C', 0); // Mostrar la fecha convertida en el formato d/m/Y
    $pdf->Ln(1);
    // Fecha actual en el formato deseado
    // Obtener la fecha actual en el formato requerido
    $fecha_actual = date("d") . ' de ' . date("F") . ' de ' . date("Y");
    $fecha_actual = str_replace(
        ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'],
        $fecha_actual
    );
    // Configurar la fuente para el mensaje
    $pdf->SetFont('Times', '', 14);
    $pdf->Cell(0, 10, utf8_decode('Lurín, ' . $fecha_actual), 0, 1, 'L');
    $pdf->Ln(13);
      
   // Configurar la fuente
    $pdf->SetFont('Times', '', 10);

    // Espacio para la firma del estudiante
    $pdf->Cell(97.5, 5, '_________________________', 0, 0, 'C');

    $pdf->Cell(97.5, 5, '_________________________', 0, 1, 'C');

    // Espacio para la descripción de la firma
    $pdf->Cell(97.5, 5, 'Firma', 0, 0, 'C');
 
    $pdf->Cell(97.5, 5, 'Firma, Sellos, Post Firma', 0, 1, 'C');

    // Espacio para los títulos debajo de cada firma
    $pdf->Cell(97.5, 5, 'ESTUDIANTE', 0, 0, 'C');

    $pdf->Cell(97.5, 5, 'COORDINADOR', 0, 1, 'C');

    $pdf->Ln(5);

    $pdf->SetFont('Times', '', 10);

    // Espacio para la firma del estudiante
  
    
    $pdf->Cell(195, 5, '_________________________', 0, 1, 'C');

    // Espacio para la descripción de la firma
    
   
    $pdf->Cell(195, 5, 'Firma, Sellos, Post Firma', 0, 1, 'C');

    // Espacio para los títulos debajo de cada firma

    $pdf->Cell(195, 5, 'DIRECTOR', 0, 1, 'C');



    
    // Asegúrate de que no haya salida previa

    
    // Genera el nombre del archivo PDF
    $nombre_archivo = utf8_decode($row['apellidos'] . '_' . $row['apellidosM'] . '_' . $row['nombres']);
    $nombre_archivo = str_replace(' ', '_', $nombre_archivo); // Reemplaza los espacios por guiones bajos
    $nombre_archivo .= '.pdf'; // Extensión del archivo
    
    // Enviar encabezados HTTP para el PDF
    header('Content-Type: application/pdf');  // Establece el tipo de contenido como PDF
    header('Content-Disposition: inline; filename="' . $nombre_archivo . '"');  // El nombre del archivo

    ob_end_clean();  // Limpia el buffer de salida y previene que se envíe cualquier cosa
    
    // Crear el PDF con el nombre del archivo generado
    $pdf->Output('I', $nombre_archivo); // 'I' para mostrar el PDF en el navegador
    
    

}


