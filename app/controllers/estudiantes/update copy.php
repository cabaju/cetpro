<?php

include ('../../../app/config.php');


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
$ref_colegio = $_POST['ref_colegio'];
$ref_celular = $_POST['ref_celular'];
$profesion = "ESTUDIANTE";



$foto = null; // Valor por defecto
$ci1 = null; // Valor por defecto
$conadis = null; // Valor por defecto
$conadis1 = null; // Valor por defecto


if (isset($_FILES['file_foto']) && $_FILES['file_foto']['error'] === UPLOAD_ERR_OK) {
    // Crear un nombre único y seguro para la imagen
    $extension = pathinfo($_FILES['file_foto']['name'], PATHINFO_EXTENSION);
    $nombre_del_archivo = date('Y-m-d-H-i-s') . '-foto-' . uniqid() . '.' . $extension;

    // Ruta absoluta para la carpeta de destino
    $location = $_SERVER['DOCUMENT_ROOT'] . "/proyectos/colegio/public/images/configuracion/" . $nombre_del_archivo;

    // Verificar permisos antes de intentar mover el archivo
    if (!is_writable(dirname($location))) {
        die("Error: La carpeta de destino no tiene permisos de escritura.");
    }

    // Intentar mover el archivo
    if (move_uploaded_file($_FILES['file_foto']['tmp_name'], $location)) {
        $foto = $nombre_del_archivo; // Guardar el nombre para la base de datos
        echo "Archivo cargado correctamente: " . $foto;
    } else {
        die("Error al mover el archivo. Verifica permisos de la carpeta: " . $location);
    }
} else {
    die("Error al cargar el archivoxxxxx. Código de error: " . ($_FILES['file_foto']['error'] ?? 'No definido'));
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


// var_dump($foto);
// var_dump($ci1);
// var_dump($conadis);
// var_dump($conadis1);
// var_dump($id_persona);


// $sentencia_check = $pdo->prepare('SELECT foto FROM personas WHERE id_persona = :id_persona');
// $sentencia_check->bindParam(':id_persona', $id_persona);
// $sentencia_check->execute();
// $resultado = $sentencia_check->fetch(PDO::FETCH_ASSOC);
// var_dump($resultado); 

//////////////////////// ACTUALIZAR A LA TABLA PERSONAS
$sentencia = $pdo->prepare('UPDATE personas
       SET  foto=:foto,
            ci1=:ci1,
            conadis=:conadis,
            conadis1=:conadis1,
            ci=:ci,
            nombres=:nombres,
            apellidos=:apellidos,
            apellidosM=:apellidosM,
            sexo=:sexo,
            fecha_nacimiento=:fecha_nacimiento,

            pais=:pais,
            lugar=:lugar,
            departamento=:departamento,
            provincia=:provincia,
            distrito=:distrito,
            direccion=:direccion,

            trabaja=:trabaja,
            ocupacion=:ocupacio,

            celular=:celular,
            profesion=:profesion,
            estado_civil=:estado_civil,
            gradoinst=:gradoinst,
            inclusivo=:inclusivo,
            discapacidad=:discapacidad,

            celular=:celular,
            profesion=:profesion,
            fyh_actualizacion=:fyh_actualizacion
      where id_persona=:id_persona ');


$sentencia->bindParam(':id_persona',$id_persona);

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
            ref_colegio=:ref_colegio,
            ref_celular=:ref_celular,
            fyh_actualizacion=:fyh_actualizacion
    WHERE id_ppff =:id_ppff');

$sentencia->bindParam(':nombres_apellidos_ppff',$nombres_apellidos_ppff);
$sentencia->bindParam(':ci_ppf',$ci_ppf);
$sentencia->bindParam(':celular_ppff',$celular_ppff);
$sentencia->bindParam(':ocupacion_ppff',$ocupacion_ppff);
$sentencia->bindParam(':ref_nombre',$ref_nombre);
$sentencia->bindParam(':ref_colegio',$ref_colegio);
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