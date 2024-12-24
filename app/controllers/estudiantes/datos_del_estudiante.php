<?php

$sql_estudiantes = "SELECT *, est.nivel_id as nivel_id FROM usuarios as usu 
INNER JOIN roles as rol ON rol.id_rol = usu.rol_id 
INNER JOIN personas as per ON per.usuario_id = usu.id_usuario 
INNER JOIN estudiantes as est ON est.persona_id = per.id_persona
INNER JOIN niveles as niv ON niv.id_nivel = est.nivel_id
INNER JOIN grados as gra ON gra.id_grado = est.grado_id
INNER JOIN ppffs as ppf ON ppf.estudiante_id = est.id_estudiante
 where est.estado = '1' and est.id_estudiante = '$id_estudiante' ";
$query_estudiantes = $pdo->prepare($sql_estudiantes);
$query_estudiantes->execute();
$estudiantes = $query_estudiantes->fetchAll(PDO::FETCH_ASSOC);



foreach ($estudiantes as $estudiante){
    $id_estudiante = $estudiante['id_estudiante'];
    $id_usuario = $estudiante['id_usuario'];
    $id_persona = $estudiante['id_persona'];
    $id_ppff = $estudiante['id_ppff'];

    $foto = $estudiante['foto'];
    $ci1 = $estudiante['ci1'];
    $conadis = $estudiante['conadis'];
    $conadis1 = $estudiante['conadis1'];
    $rol_id = $estudiante['rol_id'];
    $ci = $estudiante['ci'];
    $nombre_rol = $estudiante['nombre_rol'];
    $nombres = $estudiante['nombres'];
    $apellidos = $estudiante['apellidos'];
    $apellidosM = $estudiante['apellidosM'];
    $sexo = $estudiante['sexo'];
    $fecha_nacimiento = $estudiante['fecha_nacimiento'];
    $pais = $estudiante['pais'];
    $lugar = $estudiante['lugar'];
    $departamento = $estudiante['departamento'];
    $provincia = $estudiante['provincia'];
    $distrito = $estudiante['distrito'];
    $direccion = $estudiante['direccion'];
    $trabaja = $estudiante['trabaja'];
    $ocupacion = $estudiante['ocupacion'];
    $estado_civil = $estudiante['estado_civil'];
    $gradoinst = $estudiante['gradoinst'];
    $inclusivo= $estudiante['inclusivo'];
    $discapacidad = $estudiante['discapacidad'];  
    $celular = $estudiante['celular'];
    $email = $estudiante['email'];

    $nivel_grado = $estudiante['nivel_grado'];
    $grado_id = $estudiante['grado_id'];
    $codigo = $estudiante['codigo'];
    $curso = $estudiante['curso'];
    $paralelo = $estudiante['paralelo'];
    $rude = $estudiante['rude'];
    $nombres_apellidos_ppff = $estudiante['nombres_apellidos_ppff'];
    $ci_ppf = $estudiante['ci_ppf'];
    $celular_ppff = $estudiante['celular_ppff'];
    $ocupacion_ppff = $estudiante['ocupacion_ppff'];
    $ref_nombre = $estudiante['ref_nombre'];
    $ref_colegio = $estudiante['ref_colegio'];
    $ref_celular = $estudiante['ref_celular'];
    $fyh_creacion = $estudiante['fyh_creacion'];
    $estado = $estudiante['estado'];
    $apellido_docente = $estudiante['apellido_docente'];
    $nombre_docente = $estudiante['nombre_docente'];
    $turno_grado = $estudiante['turno_grado'];
    $inicio = $estudiante['inicio']; 
    $termino = $estudiante['termino']; 
    $frecuencia = $estudiante['frecuencia']; 
    $nivel = $estudiante['nivel']; 
}
