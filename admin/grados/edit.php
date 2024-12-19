<?php

$id_grado = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/grados/datos_grados.php');
include ('../../app/controllers/niveles/listado_de_niveles.php');

?>


<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <div class="row">
                <h1>Editar los datos: <?=$curso;?></h1>
            </div>
            <br>
            <div class="container-fluid">

            <div class="col-md-12 custom-width-card">
                    <div class="card card-outline card-success">
                        <div class="card-header">
                            <h3 class="card-title">Llene los datos</h3>
                        </div>
                        <div class="card-body">
                            <form action="<?=APP_URL;?>/app/controllers/grados/update.php" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Periodo de Gestión</label>
                                            <input type="text" name="id_grado" value="<?=$id_grado;?>" hidden>
                                            <select name="nivel_id" id="" class="form-control">
                                                <?php
                                                foreach ($niveles as $nivele){
                                                    ?>
                                                    <option value="<?=$nivele['id_nivel'];?>"<?=$nivel_id==$nivele['id_nivel'] ? 'selected' : ''?>><?=$nivele['nivel'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nivel del Curso</label>
                                            <input type="text" name="id_grado" value="<?=$id_grado;?>" hidden>
                                            <select name="nivel_grado" id="" class="form-control">
                                                <option value="Programa de Estudio"<?=$nivel_grado=='Programa de Estudio' ? 'selected' : ''?>>Programa de Estudio</option>
                                                <option value="Módulo Ocupacional"<?=$nivel_grado=='Módulo Ocupacional' ? 'selected' : ''?>>Módulo Ocupacional</option>
                                            </select>
                                        </div>
                                    </div>
                                   <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Programa o Módulos</label>
                                            <select name="paralelo" id="" class="form-control">
                                                <option value="Estética Personal"<?=$paralelo=='Estética Personal' ? 'selected' : ''?>>Estética Personal</option>
                                                <option value="Textil y Confección"<?=$paralelo=='Textil y Confección' ? 'selected' : ''?>>Textil y Confección</option>
                                                <option value="Artesanía y Manualidades"<?=$paralelo=='Artesanía y Manualidades' ? 'selected' : ''?>>Artesanía y Manualidades</option>
                                                <option value="Computación e Informática"<?=$paralelo=='Computación e Informática' ? 'selected' : ''?>>Computación e Informática</option>
                                                <option value="Carpinteria"<?=$paralelo=='Carpinteria' ? 'selected' : ''?>>Carpinteria</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Especialidad</label>
                                            <select name="curso" id="" class="form-control">
                                                <option value="Peluquería y Barberia - 1"<?=$curso=='Peluquería y Barberia - 1' ? 'selected' : ''?>>Peluquería y Barberia - 1</option>
                                                <option value="Corte y Ensamblaje - 1"<?=$curso=='Corte y Ensamblaje - 1' ? 'selected' : ''?>>Corte y Ensamblaje - 1</option>
                                                <option value="Decoración de Eventos Especiales - 1"<?=$curso=='Decoración de Eventos Especiales - 1' ? 'selected' : ''?>>Decoración de Eventos Especiales - 1</option>
                                                <option value="Muñecos Country Decorativos - 2"<?=$curso=='Muñecos Country Decorativos - 2' ? 'selected' : ''?>>Muñecos Country Decorativos - 2</option>
                                                <option value="Pirograbado - 3"<?=$curso=='Pirograbado - 3' ? 'selected' : ''?>>Pirograbado - 3</option>
                                                <option value="Repujado y Pintado - 4"<?=$curso=='Repujado y Pintado - 4' ? 'selected' : ''?>>Repujado y Pintado - 4</option>
                                                <option value="Digitación - 1"<?=$curso=='Digitación - 1' ? 'selected' : ''?>>Digitación - 1</option>
                                                <option value="Ofimática - 2"<?=$curso=='Ofimática - 2' ? 'selected' : ''?>>Ofimática - 2</option>
                                                <option value="Atención de Cabinas de Internet - 3"<?=$curso=='Atención de Cabinas de Internet - 3' ? 'selected' : ''?>>Atención de Cabinas de Internet - 3</option>
                                                <option value="Manejo de Sistemas Operativos, Utilitarios y TICS - 4"<?=$curso=='Manejo de Sistemas Operativos, Utilitarios y TICS - 4' ? 'selected' : ''?>>Manejo de Sistemas Operativos, Utilitarios y TICS - 4</option>
                                                <option value="Presentación Gráfica de Publicidad - 5"<?=$curso=='Presentación Gráfica de Publicidad - 5' ? 'selected' : ''?>>Presentación Gráfica de Publicidad - 5</option>
                                                <option value="Edición de Audio y Video - 6"<?=$curso=='Edición de Audio y Video - 6' ? 'selected' : ''?>>Edición de Audio y Video - 6</option>
                                                <option value="Mantenimiento Básico en Carpinteria - 1"<?=$curso=='Mantenimiento Básico en Carpinteria - 1' ? 'selected' : ''?>>Mantenimiento Básico en Carpinteria - 1</option>
                                                <option value="Diseño y Construcción de Muebles en Melamina - 2"<?=$curso=='Diseño y Construcción de Muebles en Melamina - 2' ? 'selected' : ''?>>Diseño y Construcción de Muebles en Melamina - 2</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="apellido_docente">Apellido del Docente</label>
                                            <input type="text" name="apellido_docente" id="apellido_docente" class="form-control" value="<?=$apellido_docente ? $apellido_docente : ''?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="nombre_docente">Nombre del Docente</label>
                                            <input type="text" name="nombre_docente" id="nombre_docente" class="form-control" value="<?=$nombre_docente ? $nombre_docente : ''?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="inicio">Fecha de Inicio</label>
                                            <input type="date" name="inicio" id="inicio" class="form-control" value="<?=$inicio ? $inicio : ''?>" required>
                                            <small class="form-text text-muted">Formato: DD/MM/YYYY</small>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="termino">Fecha de Termino</label>
                                            <input type="date" name="termino" id="termino" class="form-control" value="<?=$termino ? $termino : ''?>" required>
                                            <small class="form-text text-muted">Formato: DD/MM/YYYY</small>
                                        </div>
                                    </div> 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="frecuencia">Frecuencia de Estudio</label>
                                            <input type="text" name="frecuencia" id="frecuencia" class="form-control" value="<?=$frecuencia ? $frecuencia : ''?>" required>
                                        </div>
                                    </div> 
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Turno</label>
                                            <select name="turno_grado" id="" class="form-control">
                                                <option value="MAÑANA"<?=$turno_grado=='MAÑANA' ? 'selected' : ''?>>MAÑANA</option>
                                                <option value="TARDE"<?=$turno_grado=='TARDE' ? 'selected' : ''?>>TARDE</option>
                                                <option value="NOCHE"<?=$turno_grado=='NOCHE' ? 'selected' : ''?>>NOCHE</option>
                                            </select>
                                        </div>
                                    </div>                                                                      
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="semestre">Semestre</label>
                                            <input type="text" name="semestre" id="semestre" class="form-control" value="<?=$semestre ? $semestre : ''?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="codigo">Código</label>
                                            <input type="text" name="codigo" id="codigo" class="form-control" value="<?=$codigo ? $codigo : ''?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success">Actualizar</button>
                                            <a href="<?=APP_URL;?>/admin/grados" class="btn btn-secondary ml-2">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
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
