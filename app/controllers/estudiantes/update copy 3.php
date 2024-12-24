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

$foto = $_POST['foto'];
$ci1 = $_POST['ci1'];
$conadis = $_POST['conadis'];
$conadis1 = $_POST['conadis1'];

$fechaHora = date('Y-m-d H:i:s'); // Fecha y hora actual


if($_FILES['file_foto']['name'] != null){
    $nombre_del_archivo =  date('Y-m-d-H-i-s').$_FILES['file_foto']['name'];
    // $location = "../../../../public/images/configuracion/".$nombre_del_archivo;
    $location = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $nombre_del_archivo;
    move_uploaded_file($_FILES['file_foto']['tmp_name'],$location);
    $foto = $nombre_del_archivo;
}else{
    if($foto == ""){
        $foto = "";
    }else{
        $foto = $_POST['foto'];
    }
}

if($_FILES['file_ci1']['name'] != null){
    $nombre_del_archivo_ci1 =  date('Y-m-d-H-i-s').$_FILES['file_ci1']['name'];
    // $location = "../../../../public/images/configuracion/".$nombre_del_archivo_ci1;
    $location = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $nombre_del_archivo_ci1;
    move_uploaded_file($_FILES['file_ci1']['tmp_name'],$location);
    $ci1 = $nombre_del_archivo_ci1;
}else{
    if($ci1 == ""){
        $ci1 = "";
    }else{
        $ci1 = $_POST['ci1'];
    }
}

if($_FILES['file_conadis']['name'] != null){
    $nombre_del_archivo_conadis =  date('Y-m-d-H-i-s').$_FILES['file_conadis']['name'];
    // $location = "../../../../public/images/configuracion/".$nombre_del_archivo_conadis;
    $location = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $nombre_del_archivo_conadis;
    move_uploaded_file($_FILES['file_conadis']['tmp_name'],$location);
    $conadis = $nombre_del_archivo_conadis;
}else{
    if($conadis == ""){
        $conadis = "";
    }else{
        $conadis = $_POST['conadis'];
    }
}

if($_FILES['file_conadis1']['name'] != null){
    $nombre_del_archivo_conadis1 =  date('Y-m-d-H-i-s').$_FILES['file_conadis1']['name'];
    // $location = "../../../../public/images/configuracion/".$nombre_del_archivo_conadis1;
    $location = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $nombre_del_archivo_conadis1;
    move_uploaded_file($_FILES['file_conadis1']['tmp_name'],$location);
    $conadis1 = $nombre_del_archivo_conadis1;
}else{
    if($conadis1 == ""){
        $conadis1 = "";
    }else{
        $conadis1 = $_POST['conadis1'];
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
           SET foto = :foto, ci1= :ci1, conadis = :conadis, conadis1= :conadis1, ci = :ci, nombres = :nombres, apellidos = :apellidos, apellidosM = :apellidosM, 
               sexo = :sexo, fecha_nacimiento = :fecha_nacimiento, pais = :pais, lugar = :lugar, 
               departamento = :departamento, provincia = :provincia, distrito = :distrito, direccion = :direccion, 
               trabaja = :trabaja, ocupacion = :ocupacion, estado_civil = :estado_civil, gradoinst = :gradoinst, 
               inclusivo = :inclusivo, discapacidad = :discapacidad, celular = :celular, profesion = :profesion, 
               fyh_actualizacion = :fyh_actualizacion
           WHERE id_persona = :id_persona');
    $sentencia->bindParam(':foto', $foto);
    $sentencia->bindParam(':ci1', $ci1);
    $sentencia->bindParam(':conadis', $conadis);
    $sentencia->bindParam(':conadis1', $conadis1);
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

    if($sentencia->execute()){
        echo 'success';
        session_start();
        $_SESSION['mensaje'] = "Se actualizó los datos de configuración de la manera correcta en la base de datos";
        $_SESSION['icono'] = "success";
        header('Location:'.APP_URL."/admin/estudiantes");
    //header('Location:' .$URL.'/');
    }else{
        //echo 'error al registrar a la base de datos';
        session_start();
        $_SESSION['mensaje'] = "Error no se pudo registrar en la base datos, comuniquese con el administrador";
        $_SESSION['icono'] = "error";
        ?><script>window.history.back();</script><?php
    }
    
