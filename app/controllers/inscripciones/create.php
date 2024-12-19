<?php


include ('../../../app/config.php');


$rol_id = $_POST['rol_id'];
$ci = $_POST['ci'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$apellidosM = $_POST['apellidosM'];
$sexo = $_POST['sexo'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];

$pais = $_POST['pais'];
$lugar = $_POST['lugar'];
$departamento = $_POST['departamento'];
$provincia = $_POST['provincia'];
$distrito = $_POST['distrito'];
$direccion = $_POST['direccion'];

$trabaja = $_POST['trabaja'];
$ocupacion = $_POST['ocupacion'];
$estado_civil = $_POST['estado_civil'];

$gradoinst = $_POST['gradoinst'];
$inclusivo = $_POST['inclusivo'];
$discapacidad = $_POST['discapacidad'];

$celular = $_POST['celular'];
$email = $_POST['email'];
$profesion = "ESTUDIANTE";
$nivel_id = $_POST['nivel_id'];
$grado_id = $_POST['grado_id'];
$rude = $_POST['rude'];
$nombres_apellidos_ppff = $_POST['nombres_apellidos_ppff'];
$ci_ppf = $_POST['ci_ppf'];
$celular_ppff = $_POST['celular_ppff'];
$ocupacion_ppff = $_POST['ocupacion_ppff'];
$ref_nombre = $_POST['ref_nombre'];
$ref_parentezco = $_POST['ref_parentezco'];
$ref_celular = $_POST['ref_celular'];

$pdo->beginTransaction();

$foto = null; // Valor por defecto
$ci1 = null; // Valor por defecto
$conadis = null; // Valor por defecto
$conadis1 = null; // Valor por defecto

if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
    // Crear un nombre único y seguro para la imagen
    $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
    $nombre_del_archivo = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $extension;

    // Ruta absoluta para la carpeta de destino
    $location = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $nombre_del_archivo;

    // Verificar permisos antes de intentar mover el archivo
    if (!is_writable(dirname($location))) {
        die("Error: La carpeta de destino no tiene permisos de escritura.");
    }

    // Intentar mover el archivo
    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
        $foto = $nombre_del_archivo; // Guardar el nombre para la base de datos
        echo "Archivo cargado correctamente: " . $foto;
    } else {
        die("Error al mover el archivo. Verifica permisos de la carpeta: " . $location);
    }
} else {
    die("Error al cargar el archivo. Código de error: " . ($_FILES['file']['error'] ?? 'No definido'));
}



if (isset($_FILES['file_ci1']) && $_FILES['file_ci1']['error'] === UPLOAD_ERR_OK) {
    // Crear un nombre único y seguro para la imagen
    $extension = pathinfo($_FILES['file_ci1']['name'], PATHINFO_EXTENSION);
    $nombre_del_archivo_ci1 = date('Y-m-d-H-i-s') . '-ci1-' . uniqid() . '.' . $extension;

    // Ruta absoluta para la carpeta de destino
    $lruta_ci1 = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $nombre_del_archivo_ci1;

    // Verificar permisos antes de intentar mover el archivo
    if (!is_writable(dirname($lruta_ci1))) {
        die("Error: La carpeta de destino no tiene permisos de escritura.");
    }

    // Intentar mover el archivo
    if (move_uploaded_file($_FILES['file_ci1']['tmp_name'], $lruta_ci1)) {
        $ci1 = $nombre_del_archivo_ci1; // Guardar el nombre para la base de datos
        echo "Archivo CONADIS cargado correctamente: " . $ci1;
    } else {
        die("Error al mover el archivo. Verifica permisos de la carpeta: " . $lruta_ci1);
    }
} else {
    die("Error al cargar el archivo. Código de error: " . ($_FILES['file_ci1']['error'] ?? 'No definido'));
}



if (isset($_FILES['file_conadis']) && $_FILES['file_conadis']['error'] === UPLOAD_ERR_OK) {
    // Crear un nombre único y seguro para la imagen
    $extension = pathinfo($_FILES['file_conadis']['name'], PATHINFO_EXTENSION);
    $nombre_del_archivo_conadis = date('Y-m-d-H-i-s') . '-conadis-' . uniqid() . '.' . $extension;

    // Ruta absoluta para la carpeta de destino
    $lruta_conadis = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $nombre_del_archivo_conadis;

    // Verificar permisos antes de intentar mover el archivo
    if (!is_writable(dirname($lruta_conadis))) {
        die("Error: La carpeta de destino no tiene permisos de escritura.");
    }

    // Intentar mover el archivo
    if (move_uploaded_file($_FILES['file_conadis']['tmp_name'], $lruta_conadis)) {
        $conadis = $nombre_del_archivo_conadis; // Guardar el nombre para la base de datos
        echo "Archivo CONADIS cargado correctamente: " . $conadis;
    } else {
        die("Error al mover el archivo. Verifica permisos de la carpeta: " . $lruta_conadis);
    }
} else {
    die("Error al cargar el archivo. Código de error: " . ($_FILES['file_conadis']['error'] ?? 'No definido'));
}


if (isset($_FILES['file_conadis1']) && $_FILES['file_conadis1']['error'] === UPLOAD_ERR_OK) {
    // Crear un nombre único y seguro para la imagen
    $extension = pathinfo($_FILES['file_conadis1']['name'], PATHINFO_EXTENSION);
    $nombre_del_archivo_conadis1 = date('Y-m-d-H-i-s') . '-conadis1-' . uniqid() . '.' . $extension;

    // Ruta absoluta para la carpeta de destino
    $lruta_conadis1 = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $nombre_del_archivo_conadis1;

    // Verificar permisos antes de intentar mover el archivo
    if (!is_writable(dirname($lruta_conadis1))) {
        die("Error: La carpeta de destino no tiene permisos de escritura.");
    }

    // Intentar mover el archivo
    if (move_uploaded_file($_FILES['file_conadis1']['tmp_name'], $lruta_conadis1)) {
        $conadis1 = $nombre_del_archivo_conadis1; // Guardar el nombre para la base de datos
        echo "Archivo CONADIS cargado correctamente: " . $conadis1;
    } else {
        die("Error al mover el archivo. Verifica permisos de la carpeta: " . $lruta_conadis1);
    }
} else {
    die("Error al cargar el archivo. Código de error: " . ($_FILES['file_conadis1']['error'] ?? 'No definido'));
}



///////////////////////// INSERTAR A LA TABLA USUARIOS
$password = password_hash($ci, PASSWORD_DEFAULT);
try {
$sentencia = $pdo->prepare('INSERT INTO usuarios
         (rol_id, email, password, fyh_creacion, estado)
VALUES ( :rol_id,:email,:password,:fyh_creacion,:estado)');

$sentencia->bindParam(':rol_id',$rol_id);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':password',$password);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);
$sentencia->execute();

$id_usuario = $pdo->lastInsertId();

$direccion = isset($_POST['direccion']) ? $_POST['direccion'] : null;

} catch (PDOException $e) {
    // Manejar error de unicidad u otros errores
    if ($e->getCode() == 23000) { // Código para violación de clave única
        die("Error: El correo electrónico ya está registrado.");
    } else {
        die("Error al insertar en la base de datos: " . $e->getMessage());
    }
}

//////////////////////// INSERTAR A LA TABLA PERSONAS
$sentencia = $pdo->prepare('INSERT INTO personas
         (usuario_id,foto,ci1,conadis,conadis1,ci,nombres,apellidos,apellidosM,sexo,fecha_nacimiento,pais,lugar,departamento,provincia,distrito,direccion,trabaja,ocupacion,estado_civil,gradoinst,inclusivo,discapacidad,celular,profesion,fyh_creacion, estado)
VALUES ( :usuario_id,:foto,:ci1,:conadis,:conadis1,:ci,:nombres,:apellidos,:apellidosM,:sexo,:fecha_nacimiento,:pais,:lugar,:departamento,:provincia,:distrito,:direccion,:trabaja,:ocupacion,:estado_civil,:gradoinst,:inclusivo,:discapacidad,:celular,:profesion,:fyh_creacion,:estado)');

$sentencia->bindParam(':usuario_id',$id_usuario);
$sentencia->bindParam(':foto',$foto);
$sentencia->bindParam(':ci1',$ci1);
$sentencia->bindParam(':conadis',$conadis);
$sentencia->bindParam(':conadis1',$conadis1);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':apellidosM',$apellidosM);
$sentencia->bindParam(':sexo',$sexo);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);

$sentencia->bindParam(':pais',$pais);
$sentencia->bindParam(':lugar',$lugar);
$sentencia->bindParam(':departamento',$departamento);
$sentencia->bindParam(':provincia',$provincia);
$sentencia->bindParam(':distrito',$distrito);
$sentencia->bindParam(':direccion',$direccion);

$sentencia->bindParam(':trabaja',$trabaja);
$sentencia->bindParam(':ocupacion',$ocupacion);
$sentencia->bindParam(':estado_civil',$estado_civil);

$sentencia->bindParam(':gradoinst',$gradoinst);
$sentencia->bindParam(':inclusivo',$inclusivo);
$sentencia->bindParam(':discapacidad',$discapacidad);

$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':profesion',$profesion);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);
$sentencia->execute();

$id_persona = $pdo->lastInsertId();

/////////////////////// INSERTAR A LA TABLA ESTUDIANTES
$sentencia = $pdo->prepare('INSERT INTO estudiantes
         (persona_id, nivel_id, grado_id, rude, fyh_creacion, estado)
VALUES ( :persona_id,:nivel_id,:grado_id,:rude,:fyh_creacion,:estado)');

$sentencia->bindParam(':persona_id',$id_persona);
$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':grado_id',$grado_id);
$sentencia->bindParam(':rude',$rude);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);
$sentencia->execute();

$id_estudiante = $pdo->lastInsertId();


/////////////////////// INSERTAR A LA TABLA PPFFS
$sentencia = $pdo->prepare('INSERT INTO ppffs
         (estudiante_id , nombres_apellidos_ppff, ci_ppf, celular_ppff, ocupacion_ppff, ref_nombre, ref_parentezco, ref_celular, fyh_creacion, estado)
VALUES ( :estudiante_id ,:nombres_apellidos_ppff,:ci_ppf,:celular_ppff,:ocupacion_ppff,:ref_nombre,:ref_parentezco,:ref_celular,:fyh_creacion,:estado)');

$sentencia->bindParam(':estudiante_id',$id_estudiante);
$sentencia->bindParam(':nombres_apellidos_ppff',$nombres_apellidos_ppff);
$sentencia->bindParam(':ci_ppf',$ci_ppf);
$sentencia->bindParam(':celular_ppff',$celular_ppff);
$sentencia->bindParam(':ocupacion_ppff',$ocupacion_ppff);
$sentencia->bindParam(':ref_nombre',$ref_nombre);
$sentencia->bindParam(':ref_parentezco',$ref_parentezco);
$sentencia->bindParam(':ref_celular',$ref_celular);
$sentencia->bindParam(':fyh_creacion',$fechaHora);
$sentencia->bindParam(':estado',$estado_de_registro);

if($sentencia->execute()){
    echo 'success';
    $pdo->commit();
    session_start();
    $_SESSION['mensaje'] = "Se registro al estudiante de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/estudiantes");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    $pdo->rollBack();
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}
