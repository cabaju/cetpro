<?php

include ('../../../app/config.php');

$id_grado = $_POST['id_grado'];
$nivel_id = $_POST['nivel_id'];
$semestre = $_POST['semestre'];
$nivel_grado = $_POST['nivel_grado'];
$codigo = $_POST['codigo'];
$curso = $_POST['curso'];
$paralelo = $_POST['paralelo'];
$turno_grado = $_POST['turno_grado'];
$apellido_docente = $_POST['apellido_docente'];
$nombre_docente = $_POST['nombre_docente'];
$inicio = $_POST['inicio'];
$termino = $_POST['termino'];
$frecuencia = $_POST['frecuencia'];



$sentencia = $pdo->prepare('UPDATE grados
SET nivel_id=:nivel_id,
    semestre=:semestre,
    nivel_grado=:nivel_grado,
    codigo=:codigo,
    curso=:curso,
    paralelo=:paralelo,
    turno_grado=:turno_grado,
    apellido_docente=:apellido_docente,
    nombre_docente=:nombre_docente,
    inicio=:inicio,
    termino=:termino,
    frecuencia=:frecuencia,
    fyh_actualizacion=:fyh_actualizacion
WHERE id_grado=:id_grado');




// $fechaHora = date('Y-m-d H:i:s');

$sentencia->bindParam(':id_grado',$id_grado);
$sentencia->bindParam(':nivel_id',$nivel_id);
$sentencia->bindParam(':nivel_grado',$nivel_grado);
$sentencia->bindParam(':semestre',$semestre);
$sentencia->bindParam(':codigo',$codigo);
$sentencia->bindParam(':curso',$curso);
$sentencia->bindParam(':paralelo',$paralelo);
$sentencia->bindParam(':turno_grado',$turno_grado);
$sentencia->bindParam(':apellido_docente',$apellido_docente);
$sentencia->bindParam(':nombre_docente',$nombre_docente);
$sentencia->bindParam(':inicio',$inicio);
$sentencia->bindParam(':termino',$termino);
$sentencia->bindParam(':frecuencia',$frecuencia);
$sentencia->bindParam(':fyh_actualizacion',$fechaHora);





if($sentencia->execute()){
    echo 'success';
    session_start();
    $_SESSION['mensaje'] = "Se actualizó el grado de la manera correcta en la base de datos";
    $_SESSION['icono'] = "success";
    header('Location:'.APP_URL."/admin/grados");
//header('Location:' .$URL.'/');
}else{
    echo 'error al registrar a la base de datos';
    session_start();
    $_SESSION['mensaje'] = "Error no se pudo actualizar en la base datos, comuniquese con el administrador";
    $_SESSION['icono'] = "error";
    ?><script>window.history.back();</script><?php
}