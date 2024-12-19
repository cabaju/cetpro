<?php

$id_estudiante = $_GET['id'];
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');

include ('../../app/controllers/estudiantes/datos_del_estudiante.php');

include ('../../app/controllers/roles/listado_de_roles.php');
include ('../../app/controllers/niveles/listado_de_niveles.php');
include ('../../app/controllers/grados/listado_de_grados.php');



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h1>Modificación de datos del estudiante: <?=$apellidos." ".$nombres;?> </h1>
            </div>
            <br>

            <form action="<?=APP_URL;?>/app/controllers/estudiantes/update.php" method="post">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title"><b>Llene los datos del estudiante</b></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" value="<?=$id_usuario;?>" name="id_usuario" hidden>
                                            <input type="text" value="<?=$id_persona;?>" name="id_persona" hidden>
                                            <input type="text" value="<?=$id_estudiante;?>" name="id_estudiante" hidden>
                                            <input type="text" value="<?=$id_ppff;?>" name="id_ppff" hidden>
                                            <label for="">Nombre del rol</label>
                                            <a href="<?=APP_URL;?>/admin/roles/create.php" style="margin-left: 5px" class="btn btn-primary btn-sm"><i class="bi bi-file-plus"></i></a>
                                            <div class="form-inline">
                                                <select name="rol_id" id="" class="form-control">
                                                    <?php
                                                    foreach ($roles as $role){ ?>
                                                        <option value="<?=$role['id_rol'];?>" <?=$role['nombre_rol']=="ESTUDIANTE" ? 'selected' : ''?>><?=$role['nombre_rol'];?></option>
                                                        <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" value="<?=$nombres;?>" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos</label>
                                            <input type="text" name="apellidos" value="<?=$apellidos;?>" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Carnet de identidad</label>
                                            <input type="number" name="ci" value="<?=$ci;?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" value="<?=$fecha_nacimiento;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" name="celular" value="<?=$celular;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Correo</label>
                                            <input type="email" name="email" value="<?=$email;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Dirección</label>
                                            <input type="address" name="direccion" value="<?=$direccion;?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title"><b>Llene los datos académicos (Seleccionar nuevamente los datos) </b></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Periodo de Gestión</label>
                                            <select name="nivel_id" id="" class="form-control">
                                            <option value="" disabled selected>Elije una opción</option>
                                                <?php
                                                foreach ($niveles as $nivele){ ?>
                                                    <option value="<?=$nivele['id_nivel'];?>"><?=$nivele['nivel'];?></option>
                                                    <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Código del Curso</label>
                                            <select name="grado_id" id="grado_id" class="form-control" onchange="actualizarCurso()">
                                            <option value="" disabled selected>Elije una opción</option>
                                                <?php foreach ($grados as $grado) { ?>
                                                    <option value="<?=$grado['id_grado'];?>" data-curso="<?=$grado['curso']." || ".$grado['paralelo'];?>">
                                                        <?=$grado['codigo'];?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Curso - Especialidad</label>
                                            <input type="text" name="curso_especialidad" id="curso_especialidad" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Rude</label>
                                            <input type="text" name="rude" class="form-control" value="<?=$rude;?>" required>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                <!-- <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title"><b>Llene los datos académicos</b></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Periodo de Gestión</label>
                                            <select name="nivel_id" id="" class="form-control">
                                                <option value="" disabled>Elije una opción</option>
                                                <?php foreach ($niveles as $nivele) { ?>
                                                    <option value="<?=$nivele['id_nivel'];?>" 
                                                        <?= ($nivele['id_nivel'] == $nivel_id) ? 'selected' : ''; ?>>
                                                        <?=$nivele['nivel'];?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Código del Curso</label>
                                            <select name="grado_id" id="grado_id" class="form-control" onchange="actualizarCurso()">
                                                <option value="" disabled>Elije una opción</option>
                                                <?php foreach ($grados as $grado) { ?>
                                                    <option value="<?=$grado['id_grado'];?>" 
                                                        <?= ($grado['id_grado'] == $grado_id_seleccionado) ? 'selected' : ''; ?>
                                                        data-curso="<?=$grado['curso']." || ".$grado['paralelo'];?>">
                                                        <?=$grado['codigo'];?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>

                                   
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="">Curso - Especialidad</label>
                                            <input type="text" name="curso_especialidad" id="curso_especialidad" class="form-control" 
                                                value="<?=$curso_especialidad;?>" readonly>
                                        </div>
                                    </div>

                                    
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">Rude</label>
                                            <input type="text" name="rude" class="form-control" value="<?=$rude;?>" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title"><b>Datos del Estudiante por convenio</b></h3>
                            </div>
                            <div class="card-body">
                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="">Grado de Estudios Secundarios Actual</label>
                                            <select name="ref_nombre" value="<?=$ref_nombre;?>" class="form-control">
                                            <!-- <option value="" disabled selected>Elije una opción</option> -->
                                            <option value="NINGUNA">NINGUNA</option>
                                            <option value="SEGUNDO AÑO DE SECUNDARIA">SEGUNDO AÑO DE SECUNDARIA</option>
                                            <option value="TERCER AÑO DE SECUNDARIA">TERCER AÑO DE SECUNDARIA</option>
                                            <option value="CUARTO AÑO DE SECUNDARIA">CUARTO AÑO DE SECUNDARIA</option>
                                            <option value="QUINTO AÑO DE SECUNDARIA">QUINTO AÑO DE SECUNDARIA</option>
                                            </select>
                                        </div>                                    
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="">Institución Educativa de Procedencia</label>
                                            <select name="ref_parentezco" value="<?=$ref_parentezco;?>" class="form-control">
                                            <!-- <option value="" disabled selected>Elije una opción</option> -->
                                            <option value="NINGUNA">NINGUNA</option>
                                            <option value="6008 JOSÉ ANTONIO DAPELO">6008 JOSÉ ANTONIO DAPELO</option> 
                                            <option value="6023 JULIO CESAR ROJAS">6023 JULIO CESAR ROJAS</option>
                                            <option value="6030 VICTOR ANDRES BELAUNDE DIEZ CANSECO">6030 VICTOR ANDRES BELAUNDE DIEZ CANSECO</option>
                                            <option value="7061 HEROES DE SAN JUAN ">7061 HEROES DE SAN JUAN</option>  
                                            <option value="7098 RODRIGO LARA BONILLA">7098 RODRIGO LARA BONILLA</option>
                                            <option value="7104 RAMIRO PRIALE PRIALE">7104 RAMIRO PRIALE PRIALE</option>
                                            <option value="7267 SEÑOR DE LOS MILAGROS">7267 SEÑOR DE LOS MILAGROS</option>
                                            <option value="CEBA JOSÉ FAUSTINO SÁNCHEZ CARRIÓN">CEBA JOSÉ FAUSTINO SÁNCHEZ CARRIÓN</option>
                                            <option value="IEAC CASA ABIERTA DE NAZARETH">IEAC CASA ABIERTA DE NAZARETH</option> 
                                            <option value="JOSE FAUSTINO SANCHEZ CARRION">JOSE FAUSTINO SANCHEZ CARRION</option> 
                                            <option value="MIGUEL GRAU SEMINARIO">MIGUEL GRAU SEMINARIO</option>  
                                            <option value="SAN JOSÉ DE PUNTA NEGRA">SAN JOSÉ DE PUNTA NEGRA</option>  
                                            <option value="OTROS - PONER EL NOMBRE DE LA iNSTITUCIÓN">OTROS - PONER EL NOMBRE DE LA iNSTITUCIÓN</option> 
                                            </select>
                                        </div>                                    
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Otras Instituciones</label>
                                            <input type="text" name="ref_celular" class="form-control" value="<?=$ref_celular;?>" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos y Nombres (Padre o Madre)</label>
                                            <input type="text" name="nombres_apellidos_ppff" value="<?=$nombres_apellidos_ppff;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">DNI/CE</label>
                                            <input type="text" name="ci_ppf" class="form-control" value="<?=$ci_ppf;?>" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" name="celular_ppff" value="<?=$celular_ppff;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Ocupación</label>
                                            <input type="text" name="ocupacion_ppff" value="<?=$ocupacion_ppff;?>" class="form-control" required>
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
                            <button type="submit" class="btn btn-success btn-lg">Actualizar</button>
                            <a href="<?=APP_URL;?>/admin/estudiantes" class="btn btn-secondary btn-lg">Cancelar</a>
                        </div>
                    </div>
                </div>

            </form>

            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
    
    function actualizarCurso() {
        
        const codigoSelect = document.getElementById("grado_id");
        const cursoEspecialidadInput = document.getElementById("curso_especialidad");

        
        if (codigoSelect.selectedIndex > 0) {
            
            const curso = codigoSelect.options[codigoSelect.selectedIndex].getAttribute("data-curso");

           
            cursoEspecialidadInput.value = curso ? curso : "";
        } else {
            
            cursoEspecialidadInput.value = "";
        }
    }
</script>

<!-- <script>

    function actualizarCurso() {
        const select = document.getElementById('grado_id');
        const selectedOption = select.options[select.selectedIndex];
        const cursoEspecialidad = selectedOption.getAttribute('data-curso');
        document.getElementById('curso_especialidad').value = cursoEspecialidad;
    }


    window.onload = function () {
        actualizarCurso();
    };
</script> -->

<?php

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');

?>
