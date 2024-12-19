<?php

include ('../../../app/config.php');

$foto = $_POST['foto'];
$id_usuario = $_POST['id_usuario'];
$id_persona = $_POST['id_persona'];
$id_estudiante = $_POST['id_estudiante'];
$id_ppff = $_POST['id_ppff'];
$rol_id = $_POST['rol_id'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$ci = $_POST['ci'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$celular = $_POST['celular'];
$email = $_POST['email'];
$direccion = $_POST['direccion'];
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
$profesion = "ESTUDIANTE";


if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {

    echo "<pre>";
    print_r($_FILES['file']);
    echo "</pre>";



    // Crear un nombre único para la imagen
    $nombre_del_archivo = date('Y-m-d-H-i-s') . '-' . $_FILES['file']['name'];

    // Ruta absoluta para la carpeta de destino
    $location = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $nombre_del_archivo;

    // Intentar mover el archivo
    if (move_uploaded_file($_FILES['file']['tmp_name'], $location)) {
        $foto = $nombre_del_archivo; // Guardar el nombre para la base de datos
        echo "Archivo cargado correctamente: " . $foto;
    } else {
        echo "Error al mover el archivo. Verifica permisos de la carpeta: " . $location;
        exit;
    }
} else {
    echo "No se subió ningún archivo o hubo un error.";
    print_r($_FILES); // Depuración
    exit;
}


///////////////////////// ACTUALIZAR A LA TABLA USUARIOS
$password = password_hash($ci, PASSWORD_DEFAULT);

$sentencia = $pdo->prepare('UPDATE usuarios
       SET  rol_id=:rol_id,
            email=:email,
            password=:password,
            fyh_actualizacion=:fyh_actualizacion
      WHERE id_usuario =:id_usuario');

$sentencia->bindParam(':rol_id',$rol_id);
$sentencia->bindParam(':email',$email);
$sentencia->bindParam(':password',$password);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam('id_usuario',$id_usuario);
$sentencia->execute();


var_dump($foto);
var_dump($id_persona);


$sentencia_check = $pdo->prepare('SELECT foto FROM personas WHERE id_persona = :id_persona');
$sentencia_check->bindParam(':id_persona', $id_persona);
$sentencia_check->execute();
$resultado = $sentencia_check->fetch(PDO::FETCH_ASSOC);
var_dump($resultado); // Verifica si la foto ya estaba en la base de datos

//////////////////////// ACTUALIZAR A LA TABLA PERSONAS
$sentencia = $pdo->prepare('UPDATE personas
       SET  nombres=:nombres,
            apellidos=:apellidos,
            ci=:ci,
            fecha_nacimiento=:fecha_nacimiento,
            celular=:celular,
            profesion=:profesion,
            direccion=:direccion,
            foto=:foto,
            fyh_actualizacion=:fyh_actualizacion
      where id_persona=:id_persona ');

$sentencia->bindParam(':nombres',$nombres);
$sentencia->bindParam(':apellidos',$apellidos);
$sentencia->bindParam(':ci',$ci);
$sentencia->bindParam(':fecha_nacimiento',$fecha_nacimiento);
$sentencia->bindParam(':celular',$celular);
$sentencia->bindParam(':profesion',$profesion);
$sentencia->bindParam(':direccion',$direccion);
$sentencia->bindParam(':foto',$foto);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_persona',$id_persona);


if ($sentencia->execute()) {
    echo "Datos actualizados correctamente en la tabla personas.";
} else {
    echo "Error al actualizar la tabla personas.";
    print_r($sentencia->errorInfo()); // Mostrar error SQL
}


/////////////////////// ACTUALIZAR A LA TABLA ESTUDIANTES
$sentencia = $pdo->prepare('UPDATE estudiantes
        SET nivel_id=:nivel_id,
            grado_id=:grado_id,
            rude=:rude,
            fyh_actualizacion=:fyh_actualizacion
        where id_estudiante=:id_estudiante');

$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':grado_id',$grado_id);
$sentencia->bindParam(':rude',$rude);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_estudiante',$id_estudiante);
$sentencia->execute();



/////////////////////// ACTUALIZAR A LA TABLA PPFFS
$sentencia = $pdo->prepare('UPDATE ppffs
        SET nombres_apellidos_ppff=:nombres_apellidos_ppff,
            ci_ppf=:ci_ppf,
            celular_ppff=:celular_ppff,
            ocupacion_ppff=:ocupacion_ppff,
            ref_nombre=:ref_nombre,
            ref_parentezco=:ref_parentezco,
            ref_celular=:ref_celular,
            fyh_actualizacion=:fyh_actualizacion
    WHERE id_ppff =:id_ppff');

$sentencia->bindParam(':nombres_apellidos_ppff',$nombres_apellidos_ppff);
$sentencia->bindParam(':ci_ppf',$ci_ppf);
$sentencia->bindParam(':celular_ppff',$celular_ppff);
$sentencia->bindParam(':ocupacion_ppff',$ocupacion_ppff);
$sentencia->bindParam(':ref_nombre',$ref_nombre);
$sentencia->bindParam(':ref_parentezco',$ref_parentezco);
$sentencia->bindParam(':ref_celular',$ref_celular);
$sentencia->bindParam('fyh_actualizacion',$fechaHora);
$sentencia->bindParam(':id_ppff',$id_ppff);


if($sentencia->execute()){
    echo 'Datos actualizados correctamente.';
    session_start();
    $_SESSION['mensaje'] = "Se actualizó correctamente.";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/estudiantes");

}else{
   

    $_SESSION['mensaje'] = "Error al actualizar.";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}