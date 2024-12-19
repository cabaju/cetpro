<?php

$id_estudiante = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/estudiantes/datos_del_estudiante.php');

// Verifica si $fecha_nacimiento está definida y no está vacía
if (isset($fecha_nacimiento) && !empty($fecha_nacimiento)) {
    // Intenta crear un objeto DateTime a partir de la fecha
    $fecha_nacimiento_dt = DateTime::createFromFormat('Y-m-d', $fecha_nacimiento);

    if ($fecha_nacimiento_dt) {
        $hoy = new DateTime();  // Fecha actual
        $edad = $hoy->diff($fecha_nacimiento_dt)->y;  // Calcula la diferencia en años
    } else {
        $edad = 'Fecha inválida';  // Manejo de error si el formato es incorrecto
    }
} else {
    $edad = 'No disponible';  // Si no hay fecha de nacimiento
}


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
            <h1>Datos del estudiante: <?=$apellidos . " " . $apellidosM . " " . $nombres;?></h1>
            </div>
            <br>


                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                            <h2 class="large-text2" class="card-title"><b>Datos del estudiante</b></h2>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Nombre del rol</label>
                                            <p class="large-text"><?=$nombre_rol;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">DNI / CE</label>
                                            <p class="large-text"><?=$ci;?></p>
                                        </div>
                                    </div>                                     
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Nombres</label>
                                            <p class="large-text"><?=$nombres;?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Apellido Paterno</label>
                                            <p class="large-text"><?=$apellidos;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Apellido Materno</label>
                                            <p class="large-text"><?=$apellidosM;?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Sexo</label>
                                            <p class="large-text"><?=$sexo;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Edad</label>
                                            <p class="large-text"><?=$edad;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Fecha de Nacimiento</label>
                                            <?php if (isset($fecha_nacimiento) && !empty($fecha_nacimiento)): ?>
                                                <p class="large-text"><?= date('d/m/Y', strtotime($fecha_nacimiento)); ?></p>
                                            <?php else: ?>
                                                <p>Fecha no disponible</p>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">País</label>
                                            <p class="large-text"><?=$pais;?></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Lugar de Nacimiento</label>
                                            <p class="large-text"><?=$lugar;?></p>
                                        </div>
                                    </div> 
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Departamento de Residencia</label>
                                            <p class="large-text"><?=$departamento;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Provincia de Residencia</label>
                                            <p class="large-text"><?=$provincia;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Distrito de Residencia</label>
                                            <p class="large-text"><?=$distrito;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Dirección</label>
                                            <p class="large-text"><?=$direccion;?></p>
                                        </div>
                                    </div>  
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Trabaja</label>
                                            <p class="large-text"><?=$trabaja;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Ocupación</label>
                                            <p class="large-text"><?=$ocupacion;?></p>
                                        </div>
                                    </div>                                                                                                                                                                                                                     
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Estado Civil</label>
                                            <p class="large-text"><?=$estado_civil;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Grado de Instrucción</label>
                                            <p class="large-text"><?=$gradoinst;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Inclusivo</label>
                                            <p class="large-text"><?=$inclusivo;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Discapacidad</label>
                                            <p class="large-text"><?=$discapacidad;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Celular</label>
                                            <p class="large-text"><?=$celular;?></p>
                                        </div>
                                    </div>                                    
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Correo</label>
                                            <p class="large-text"><?=$email;?></p>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Fecha y hora de registro</label>
                                            <p class="large-text"><?=$fyh_creacion;?></p>
                                        </div>
                                    </div> -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Fecha y hora de registro</label>
                                            <p class="large-text"><?= date('d/m/Y H:i:s', strtotime($fyh_creacion)); ?></p>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Estado</label>
                                            <p class="large-text"><?php
                                                if($estado == "1") echo "ACTIVO";
                                                else echo "INACTIVO";
                                                ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label  class="large-text1" for="">Imagen</label>
                                                    <br><br>
                                                    <center>
                                                        <img src="<?=APP_URL."/public/images/configuracion/".$foto;?>" width="150px" alt="">
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h1 class="large-text2" class="card-title"><b>Datos académicos</b></h1>
                            </div>
                            <div class="card-body">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Nivel del Curso</label>
                                            <p class="large-text3"><?=$nivel_grado;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Especialidad</label>
                                            <p class="large-text3"><?=$curso;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Módulo</label>
                                            <p class="large-text3"><?=$paralelo;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Turno</label>
                                            <p class="large-text3"><?=$turno_grado;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Docente</label>
                                            <p class="large-text3"><?=$apellido_docente." , ".$nombre_docente;?></p>
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Rude</label>
                                            <p class="large-text3"><?=$rude;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Fecha de Inicio</label>
                                            <p class="large-text3"><?= date('d/m/Y', strtotime($inicio)); ?></p>
                                            <!-- <p><?=$inicio;?></p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Fecha de Termino</label>
                                            <p class="large-text3"><?= date('d/m/Y', strtotime($termino)); ?></p>
                                            <!-- <p><?=$termino;?></p> -->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Frecuencia de Estudio</label>
                                            <p class="large-text3"><?=$frecuencia;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Código del Curso</label>
                                            <p class="large-text3"><?=$codigo;?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-info">
                            <div class="card-header">
                                <h3 class="large-text2"><b>Datos del Estudiante por convenio</b></h3>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Grado de Estudios Secundarios Actual</label>
                                            <p class="large-text4"><?=$ref_nombre;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Institución Educativa de Procedencia</label>
                                            <p class="large-text4"><?=$ref_parentezco;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Otras Instituciones</label>
                                            <p class="large-text4"><?=$ref_celular;?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Apellidos y Nombres (Padre o Madre)</label>
                                            <p class="large-text4"><?=$nombres_apellidos_ppff;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label class="large-text1" for="">DNI/CE</label>
                                            <p class="large-text4"><?=$ci_ppf;?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Celular</label>
                                            <p class="large-text4"><?=$celular_ppff;?></p>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label class="large-text1" for="">Ocupación</label>
                                            <p class="large-text4"><?=$ocupacion_ppff;?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <a href="../pagos/matri.php?id=<?=$id_estudiante;?>" class="btn btn-primary btn-lg" target="_blank">Imprimir PDF</a>
                            <a href="../pagos/dni.php?id=<?=$id_estudiante;?>" class="btn btn-danger btn-lg" target="_blank">foto PDF</a>
                            <a href="<?=APP_URL;?>/admin/reportes/alumnos_2025.php" class="btn btn-secondary btn-lg">Volver</a>
                        </div>
                    </div>
                </div>



            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<style>
    .large-text {
        font-size: 18px; /* Cambia el tamaño según prefieras */
        font-weight: bold; /* Opcional: puedes ajustar otros estilos también */
        color: blue;
    }


    .large-text1 {
        font-size: 22px; /* Cambia el tamaño según prefieras */
        font-weight: bold; /* Opcional: puedes ajustar otros estilos también */
    }
    .large-text2 {
        font-size: 26px; /* Cambia el tamaño según prefieras */
        font-weight: bold; /* Opcional: puedes ajustar otros estilos también */
    }
    .large-text3 {
        font-size: 18px; /* Cambia el tamaño según prefieras */
        font-weight: bold;
        color: peru; /* Opcional: puedes ajustar otros estilos también */
    }
    .large-text4 {
        font-size: 18px; /* Cambia el tamaño según prefieras */
        font-weight: bold;
        color: green; /* Opcional: puedes ajustar otros estilos también */
    }
</style>

<?php

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');

?>
