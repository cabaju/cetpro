<?php
$sql_grados = "SELECT * FROM grados as gra INNER JOIN niveles as niv ON gra.nivel_id = niv.id_nivel 
where gra.estado = '1' and id_grado = '$id_grado'  ";
$query_grados = $pdo->prepare($sql_grados);
$query_grados->execute();
$grados = $query_grados->fetchAll(PDO::FETCH_ASSOC);


foreach ($grados as $grado){
    $id_grado = $grado['id_grado'];
    $nivel_id = $grado['nivel_id'];
    $curso = $grado['curso'];
    $paralelo = $grado['paralelo'];
    $nivel = $grado['nivel'];
    $turno = $grado['turno'];
    $fyh_creacion = $grado['fyh_creacion'];
    $estado = $grado['estado'];
}


foreach ($grados as $grado){
    $id_grado = $grado['id_grado'];
    $nivel_id = $grado['nivel_id'];
    $nivel_grado = $grado['nivel_grado'];
    $semestre = $grado['semestre'];
    $codigo = $grado['codigo'];
    $curso = $grado['curso'];
    $paralelo = $grado['paralelo'];
    $turno_grado = $grado['turno_grado'];
    $apellido_docente = $grado['apellido_docente'];
    $nombre_docente = $grado['nombre_docente'];
    $inicio = $grado['inicio'];
    $termino = $grado['termino'];
    $frecuencia = $grado['frecuencia'];
    $fyh_creacion = $grado['fyh_creacion'];
    $estado = $grado['estado'];
}
