<?php

include ('../../../app/config.php');


$rol_id = $_POST['rol_id'];
$email = $_POST['email'];
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

$profesion = "ESTUDIANTE";
$nivel_id = $_POST['nivel_id'];
$grado_id = $_POST['grado_id'];
$rude = $_POST['rude'];
$nombres_apellidos_ppff = $_POST['nombres_apellidos_ppff'];
$ci_ppf = $_POST['ci_ppf'];
$celular_ppff = $_POST['celular_ppff'];
$ocupacion_ppff = $_POST['ocupacion_ppff'];
$ref_nombre = $_POST['ref_nombre'];
$ref_colegio = $_POST['ref_colegio'];
$ref_celular = $_POST['ref_celular'];

$id_usuario = $_POST['id_usuario'];
$id_persona = $_POST['id_persona'];
$id_estudiante = $_POST['id_estudiante'];
$id_ppff = $_POST['id_ppff'];

// $foto = $_POST['foto'];
// $ci1 = $_POST['ci1'];
// $conadis = $_POST['conadis'];
// $conadis1 = $_POST['conadis1'];

$fechaHora = date('Y-m-d H:i:s'); // Fecha y hora actual



$sql_select = "SELECT foto, ci1, conadis, conadis1 FROM personas WHERE id_persona = :id_persona";
$stmt_select = $pdo->prepare($sql_select);
$stmt_select->execute([':id_persona' => $id_persona]);
$valores_anteriores = $stmt_select->fetch(PDO::FETCH_ASSOC);

$foto = $valores_anteriores['foto'];
$ci1 = $valores_anteriores['ci1'];
$conadis = $valores_anteriores['conadis'];
$conadis1 = $valores_anteriores['conadis1'];


try {

    $pdo->beginTransaction(); 

// FOTO
if (isset($_FILES['file_foto']) && $_FILES['file_foto']['error'] === UPLOAD_ERR_OK) {
    $extension = pathinfo($_FILES['file_foto']['name'], PATHINFO_EXTENSION);
    $nombre_del_archivo = date('Y-m-d-H-i-s') . '.' . uniqid() . '.' . $extension;
    $location = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $nombre_del_archivo;
if (move_uploaded_file($_FILES['file_foto']['tmp_name'], $location)) {
    $foto = $nombre_del_archivo;
}
}


// CI1
if (isset($_FILES['file_ci1']) && $_FILES['file_ci1']['error'] === UPLOAD_ERR_OK) {
    $extension = pathinfo($_FILES['file_ci1']['name'], PATHINFO_EXTENSION);
    $nombre_del_archivo_ci1 = date('Y-m-d-H-i-s') . '.' . uniqid() . '.' . $extension;
    $lruta_ci1 = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $nombre_del_archivo_ci1;
if (move_uploaded_file($_FILES['file_ci1']['tmp_name'], $lruta_ci1)) {
    $ci1 = $nombre_del_archivo_ci1;
}
}
// CONADIS
if (isset($_FILES['file_conadis']) && $_FILES['file_conadis']['error'] === UPLOAD_ERR_OK) {
    $extension = pathinfo($_FILES['file_conadis']['name'], PATHINFO_EXTENSION);
    $nombre_del_archivo_conadis = date('Y-m-d-H-i-s') . '.' . uniqid() . '.' . $extension;
    $lruta_conadis = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $nombre_del_archivo_conadis;
if (move_uploaded_file($_FILES['file_conadis']['tmp_name'], $lruta_conadis)) {
    $conadis = $nombre_del_archivo_conadis;
}
}

// CONADIS1
if (isset($_FILES['file_conadis1']) && $_FILES['file_conadis1']['error'] === UPLOAD_ERR_OK) {
    $extension = pathinfo($_FILES['file_conadis1']['name'], PATHINFO_EXTENSION);
    $nombre_del_archivo_conadis1 = date('Y-m-d-H-i-s') . '.' . uniqid() . '.' . $extension;
    $lruta_conadis1 = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $nombre_del_archivo_conadis1;
if (move_uploaded_file($_FILES['file_conadis']['tmp_name'], $lruta_conadis1)) {
    $conadis1 = $nombre_del_archivo_conadis1;
}
}



    // ACTUALIZAR A LA TABLA USUARIOS
    $password = password_hash($ci, PASSWORD_DEFAULT);
    $sentencia = $pdo->prepare('UPDATE usuarios
           SET rol_id = :rol_id, email = :email, password = :password, fyh_actualizacion = :fyh_actualizacion
           WHERE id_usuario = :id_usuario');
    $sentencia->bindParam(':rol_id', $rol_id);
    $sentencia->bindParam(':email', $email);
    $sentencia->bindParam(':password', $password);
    $sentencia->bindParam(':fyh_actualizacion', $fechaHora);
    $sentencia->bindParam(':id_usuario', $id_usuario);
    $sentencia->execute();

    // ACTUALIZAR A LA TABLA PERSONAS
    $sentencia = $pdo->prepare('UPDATE personas
           SET foto = :foto, ci = :ci, nombres = :nombres, apellidos = :apellidos, apellidosM = :apellidosM, 
               sexo = :sexo, fecha_nacimiento = :fecha_nacimiento, pais = :pais, lugar = :lugar, 
               departamento = :departamento, provincia = :provincia, distrito = :distrito, direccion = :direccion, 
               trabaja = :trabaja, ocupacion = :ocupacion, estado_civil = :estado_civil, gradoinst = :gradoinst, 
               inclusivo = :inclusivo, discapacidad = :discapacidad, celular = :celular, profesion = :profesion, 
               fyh_actualizacion = :fyh_actualizacion
           WHERE id_persona = :id_persona');
    $sentencia->bindParam(':foto', $foto);
    $sentencia->bindParam(':ci', $ci);
    $sentencia->bindParam(':nombres', $nombres);
    $sentencia->bindParam(':apellidos', $apellidos);
    $sentencia->bindParam(':apellidosM', $apellidosM);
    $sentencia->bindParam(':sexo', $sexo);
    $sentencia->bindParam(':fecha_nacimiento', $fecha_nacimiento);
    $sentencia->bindParam(':pais', $pais);
    $sentencia->bindParam(':lugar', $lugar);
    $sentencia->bindParam(':departamento', $departamento);
    $sentencia->bindParam(':provincia', $provincia);
    $sentencia->bindParam(':distrito', $distrito);
    $sentencia->bindParam(':direccion', $direccion);
    $sentencia->bindParam(':trabaja', $trabaja);
    $sentencia->bindParam(':ocupacion', $ocupacion);
    $sentencia->bindParam(':estado_civil', $estado_civil);
    $sentencia->bindParam(':gradoinst', $gradoinst);
    $sentencia->bindParam(':inclusivo', $inclusivo);
    $sentencia->bindParam(':discapacidad', $discapacidad);
    $sentencia->bindParam(':celular', $celular);
    $sentencia->bindParam(':profesion', $profesion);
    $sentencia->bindParam(':fyh_actualizacion', $fechaHora);
    $sentencia->bindParam(':id_persona', $id_persona);
    $sentencia->execute();

    // ACTUALIZAR A LA TABLA ESTUDIANTES
    $sentencia = $pdo->prepare('UPDATE estudiantes
            SET nivel_id = :nivel_id, grado_id = :grado_id, rude = :rude,
             fyh_actualizacion = :fyh_actualizacion
            WHERE id_estudiante = :id_estudiante');
    $sentencia->bindParam(':nivel_id', $nivel_id);
    $sentencia->bindParam(':grado_id', $grado_id);
    $sentencia->bindParam(':rude', $rude);
    $sentencia->bindParam(':fyh_actualizacion', $fechaHora);
    $sentencia->bindParam(':id_estudiante', $id_estudiante);
    $sentencia->execute();

    // ACTUALIZAR A LA TABLA PPFFS
    $sentencia = $pdo->prepare('UPDATE ppffs
            SET nombres_apellidos_ppff = :nombres_apellidos_ppff, ci_ppf = :ci_ppf,
                 celular_ppff = :celular_ppff, ocupacion_ppff = :ocupacion_ppff,
                 ref_nombre = :ref_nombre, ref_colegio = :ref_colegio, 
                ref_celular = :ref_celular, fyh_actualizacion = :fyh_actualizacion
            WHERE id_ppff = :id_ppff');
    $sentencia->bindParam(':nombres_apellidos_ppff', $nombres_apellidos_ppff);
    $sentencia->bindParam(':ci_ppf', $ci_ppf);
    $sentencia->bindParam(':celular_ppff', $celular_ppff);
    $sentencia->bindParam(':ocupacion_ppff', $ocupacion_ppff);
    $sentencia->bindParam(':ref_nombre', $ref_nombre);
    $sentencia->bindParam(':ref_colegio', $ref_colegio);
    $sentencia->bindParam(':ref_celular', $ref_celular);
    $sentencia->bindParam(':fyh_actualizacion', $fechaHora);
    $sentencia->bindParam(':id_ppff', $id_ppff);
    $sentencia->execute();

    $pdo->commit();

    echo 'Datos actualizados correctamente.';
    session_start();
    $_SESSION['mensaje'] = "Se actualizó correctamente los datos.";
    $_SESSION['icono'] = "success";
    header('Location:' . APP_URL . "/admin/estudiantes");
} catch (Exception $e) {
    // Revertir transacción en caso de error
    $pdo->rollBack();
    echo 'Error al actualizar: ' . $e->getMessage();
}
