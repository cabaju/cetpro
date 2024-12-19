<?php

$id_grado = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/grados/datos_grados.php');

?>


<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Curso: <?=$curso." - ".$paralelo;?></h1>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Periodo de Gestión</label>
                                            <p><?=$nivel;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nivel del Curso</label>
                                            <p><?=$nivel_grado;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Programa o Módulos</label>
                                            <p><?=$paralelo;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Especialidad</label>
                                            <p><?=$curso;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Apellidos del Docente</label>
                                            <p><?php echo $grado['apellido_docente']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombres del Docente</label>
                                            <p><?php echo $grado['nombre_docente']; ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha de Inicio</label>
                                            <p><?= date('d/m/Y', strtotime($inicio)); ?></p> 
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha de Término</label>
                                            <p><?= date('d/m/Y', strtotime($termino)); ?></p> 
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Frecuencia de Estudio</label>
                                            <p><?=$frecuencia;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Turnos</label>
                                            <p><?=$turno_grado;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Semestre</label>
                                            <p><?=$semestre;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Código</label>
                                            <p><?=$codigo;?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Fecha y hora de registro</label>
                                            <!-- <p><?=$fyh_creacion;?></p> -->
                                            <p class="large-text"><?= date('d/m/Y H:i:s', strtotime($fyh_creacion)); ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <p>
                                                <?php
                                                if($estado == "1") echo "ACTIVO";
                                                else echo "INACTIVO";
                                                ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group d-flex justify-content-center">
                                            <div class="form-group">
                                                <a href="<?=APP_URL;?>/admin/grados" class="btn btn-secondary">Volver</a>
                                            </div>
                                        </div>
                                    </div>   
                                </div>
                                <!-- <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?=APP_URL;?>/admin/grados" class="btn btn-secondary ml-2">Cancelar</a>
                                        </div>
                                    </div>
                                </div> -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');

?>
