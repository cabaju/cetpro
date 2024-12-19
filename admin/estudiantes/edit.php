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
                <h1>Modificar datos del estudiante: <?=$apellidos." ".$nombres;?> </h1>
            </div>
            <br>
            <form action="<?=APP_URL;?>/app/controllers/estudiantes/update.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title"><b>Editar datos del estudiante</b></h3>
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
                                            <label for="">DNI/CE</label>
                                            <input type="text" name="ci" value="<?=$ci;?>" class="form-control" required>
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
                                            <label for="">Apellido Paterno</label>
                                            <input type="text" name="apellidos" value="<?=$apellidos;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellido Materno</label>
                                            <input type="text" name="apellidosM" value="<?=$apellidosM;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Sexo</label>
                                            <select name="sexo" class="form-control" required>
                                                <option value="" disabled <?= empty($sexo) ? 'selected' : ''; ?>>Seleccione una opción</option>
                                                <option value="HOMBRE" <?= $sexo == 'HOMBRE' ? 'selected' : ''; ?>>HOMBRE</option>
                                                <option value="MUJER" <?= $sexo == 'MUJER' ? 'selected' : ''; ?>>MUJER</option>
                                            </select>
                                        </div>                                    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" value="<?=$fecha_nacimiento;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">País</label>
                                            <input type="text" name="pais" value="<?=$pais;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Lugar de Nacimiento</label>
                                            <input type="text" name="lugar" value="<?=$lugar;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Departamento de Residencia</label>
                                            <input type="text" name="departamento" value="<?=$departamento;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Provincia de Residencia</label>
                                            <input type="text" name="provincia" value="<?=$provincia;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Distrito de Residencia</label>
                                            <input type="text" name="distrito" value="<?=$distrito;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Domicilio de Residencia</label>
                                            <input type="text" name="direccion" value="<?=$direccion;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Trabaja</label>
                                            <select name="trabaja" class="form-control" required>
                                                <option value="" disabled <?= empty($trabaja) ? 'selected' : ''; ?>>Seleccione una opción</option>
                                                <option value="SI" <?= $trabaja == 'SI' ? 'selected' : ''; ?>>SI</option>
                                                <option value="NO" <?= $trabaja == 'NO' ? 'selected' : ''; ?>>NO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Ocupación</label>
                                            <input type="text" name="ocupacion" value="<?=$ocupacion;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Estado CiviL</label>
                                            <select name="estado_civil" class="form-control" required>
                                                <option value="" disabled <?= empty($estado_civil) ? 'selected' : ''; ?>>Seleccione una opción</option>
                                                <option value="SOLTERO(A)" <?= $estado_civil == 'SOLTERO(A)' ? 'selected' : ''; ?>>SOLTERO(A)</option>
                                                <option value="CASADO(A)" <?= $estado_civil == 'CASADO(A)' ? 'selected' : ''; ?>>CASADO(A)</option>
                                                <option value="DIVORCIADO(A)" <?= $estado_civil == 'DIVORCIADO(A)' ? 'selected' : ''; ?>>DIVORCIADO(A)</option>
                                                <option value="CONVIVIENTE" <?= $estado_civil == 'CONVIVIENTE' ? 'selected' : ''; ?>>CONVIVIENTE</option>
                                                <option value="VIUDA(O)" <?= $estado_civil== 'VIUDA(O)' ? 'selected' : ''; ?>>VIUDA(O)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Grado de Instrucción</label>
                                            <select name="gradoinst" class="form-control" required>
                                                <option value="" disabled <?= empty($gradoinst) ? 'selected' : ''; ?>>Seleccione una opción</option>
                                                <option value="SIN ESTUDIO" <?= $gradoinst == 'SIN ESTUDIO' ? 'selected' : ''; ?>>SIN ESTUDIO</option>
                                                <option value="EDUCACIÓN PRIMARIA INCOMPLETA" <?= $gradoinst == 'EDUCACIÓN PRIMARIA INCOMPLETA' ? 'selected' : ''; ?>>EDUCACIÓN PRIMARIA INCOMPLETA</option>
                                                <option value="EDUCACIÓN PRIMARIA" <?= $gradoinst == 'EDUCACIÓN PRIMARIA' ? 'selected' : ''; ?>>EDUCACIÓN PRIMARIA</option>
                                                <option value="EDUCACIÓN SECUNDARIA INCOMPLETA" <?= $gradoinst == 'EDUCACIÓN SECUNDARIA INCOMPLETA' ? 'selected' : ''; ?>>EDUCACIÓN SECUNDARIA INCOMPLETA</option>
                                                <option value="EDUCACIÓN SECUNDARIA" <?= $gradoinst== 'EDUCACIÓN SECUNDARIA' ? 'selected' : ''; ?>>EDUCACIÓN SECUNDARIA</option>


                                                <option value="AUXILIAR TÉCNICO INCOMPLETA" <?= $gradoinst == 'AUXILIAR TÉCNICO INCOMPLETA' ? 'selected' : ''; ?>>AUXILIAR TÉCNICO INCOMPLETA</option>
                                                <option value="AUXILIAR TÉCNICO" <?= $gradoinst == 'AUXILIAR TÉCNICO' ? 'selected' : ''; ?>>AUXILIAR TÉCNICO</option>
                                                <option value="TÉCNICO INCOMPLETA" <?= $gradoinst == 'TÉCNICO INCOMPLETA' ? 'selected' : ''; ?>>TÉCNICO INCOMPLETA</option>
                                                <option value="TÉCNICO" <?= $gradoinst == 'TÉCNICO' ? 'selected' : ''; ?>>TÉCNICO</option>

                                                <option value="PROFESIONAL TÉCNICO INCOMPLETA" <?= $gradoinst== 'PROFESIONAL TÉCNICO INCOMPLETA' ? 'selected' : ''; ?>>PROFESIONAL TÉCNICO INCOMPLETA</option>
                                                <option value="PROFESIONAL TÉCNICO" <?= $gradoinst== 'PROFESIONAL TÉCNICO' ? 'selected' : ''; ?>>PROFESIONAL TÉCNICO</option>
                                                <option value="PROFESIONAL  NO  UNIVERSITARIO INCOMPLETO" <?= $gradoinst== 'PROFESIONAL  NO  UNIVERSITARIO INCOMPLETO' ? 'selected' : ''; ?>>PROFESIONAL  NO  UNIVERSITARIO INCOMPLETO</option>
                                                <option value="PROFESIONAL  NO  UNIVERSITARIO" <?= $gradoinst== 'PROFESIONAL  NO  UNIVERSITARIO' ? 'selected' : ''; ?>>PROFESIONAL  NO  UNIVERSITARIO</option>

                                  

                                                <option value="PROFESIONAL  UNIVERSITARIO INCOMPLETO"<?= $gradoinst== 'PROFESIONAL TÉCNICO' ? 'selected' : ''; ?>>PROFESIONAL  UNIVERSITARIO INCOMPLETO</option>  
                                                <option value="PROFESIONAL   UNIVERSITARIO"<?= $gradoinst== 'PROFESIONAL TÉCNICO' ? 'selected' : ''; ?>>PROFESIONAL   UNIVERSITARIO</option> 
                                                <option value="POST GRADO"<?= $gradoinst== 'PROFESIONAL TÉCNICO' ? 'selected' : ''; ?>>POST GRADO</option>          
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Estudiante Inclusivo</label>
                                            <select name="inclusivo" class="form-control" required>
                                                <option value="" disabled <?= empty($inclusivo) ? 'selected' : ''; ?>>Seleccione una opción</option>
                                                <option value="SI" <?= $inclusivo == 'SI' ? 'selected' : ''; ?>>SI</option>
                                                <option value="NO" <?= $inclusivo == 'NO' ? 'selected' : ''; ?>>NO</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Discapacidad</label>
                                            <select name="discapacidad" class="form-control">
                                                <option value="" disabled <?= empty($inclusivo) ? 'selected' : ''; ?>>Seleccione una opción</option>
                                                <option value="NINGUNA" <?= $inclusivo == 'NINGUNA' ? 'selected' : ''; ?>>NINGUNA</option>
                                                <option value="DISCAPACIDAD AUDITIVA - HIPOACUSIA" <?= $inclusivo == 'DISCAPACIDAD AUDITIVA - HIPOACUSIA' ? 'selected' : ''; ?>>DISCAPACIDAD AUDITIVA - HIPOACUSIA</option>
                                                <option value="DISCAPACIDAD AUDITIVA - SORDERA TOTAL" <?= $inclusivo == 'DISCAPACIDAD AUDITIVA - SORDERA TOTAL' ? 'selected' : ''; ?>>DISCAPACIDAD AUDITIVA - SORDERA TOTAL</option>
                                                <option value="DISCAPACIDAD FÍSICA O MOTORA" <?= $inclusivo == 'DISCAPACIDAD FÍSICA O MOTORA' ? 'selected' : ''; ?>>DISCAPACIDAD FÍSICA O MOTORA</option>
                                                <option value="DISCAPACIDAD INTELECTUAL - RETARDO MENTAL LIGERO" <?= $inclusivo == 'DISCAPACIDAD INTELECTUAL - RETARDO MENTAL LIGERO' ? 'selected' : ''; ?>>DISCAPACIDAD INTELECTUAL - RETARDO MENTAL LIGERO</option>
                                                <option value="DISCAPACIDAD INTELECTUAL - RETARDO MENTAL MODERADO" <?= $inclusivo == 'DISCAPACIDAD INTELECTUAL - RETARDO MENTAL MODERADO' ? 'selected' : ''; ?>>DISCAPACIDAD INTELECTUAL - RETARDO MENTAL MODERADO</option>
                                                <option value="DISCAPACIDAD INTELECTUAL - RETARDO MENTAL GRAVE" <?= $inclusivo == 'DISCAPACIDAD INTELECTUAL - RETARDO MENTAL GRAVE' ? 'selected' : ''; ?>>DISCAPACIDAD INTELECTUAL - RETARDO MENTAL GRAVE</option>
                                                <option value="DISCAPACIDAD VISUAL - BAJA VISIÓN" <?= $inclusivo == 'DISCAPACIDAD VISUAL - BAJA VISIÓN' ? 'selected' : ''; ?>>DISCAPACIDAD VISUAL - BAJA VISIÓN</option>
                                                <option value="DISCAPACIDAD VISUAL - CEGUERA" <?= $inclusivo == 'DISCAPACIDAD VISUAL - CEGUERA' ? 'selected' : ''; ?>>DISCAPACIDAD VISUAL - CEGUERA</option>
                                            </select>
                                        </div>                                    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="celular" name="celular" value="<?=$celular;?>" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Correo</label>
                                            <input type="email" name="email" value="<?=$email;?>" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">DNI / CE</label>
                                                    <input type="file" name="file" id="file" class="form-control">
                                                    <br>
                                                    <center>
                                                        <output id="list_dni">
                                                            <img src="<?=APP_URL."/public/images/configuracion/".$foto;?>" width="200px" alt="">
                                                        </output>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">DNI / CE</label>
                                                    <input type="file" name="file_ci1" id="file_ci1" class="form-control">
                                                    <br>
                                                    <center>
                                                        <output id="list_ci1">
                                                            <img src="<?=APP_URL."/public/images/configuracion/".$ci1;?>" width="200px" alt="">
                                                        </output>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">DNI CONADIS</label>
                                                    <input type="file" name="file_conadis" id="file_conadis" class="form-control">
                                                    <br>
                                                    <center>
                                                        <output id="list_conadis">
                                                            <img src="<?=APP_URL."/public/images/configuracion/".$conadis;?>" width="200px" alt="">
                                                        </output>
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
                        <div class="card card-outline card-success">
                            <div class="card-header">
                                <h3 class="card-title"><b>Llene los datos académicos (Seleccionar nuevamente los datos) </b></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-md-2">
    <div class="form-group">
        <label for="">Periodo de Gestión</label>
        <select name="nivel_id" class="form-control" required>
            <option value="" disabled <?= empty($nivel_id) ? 'selected' : ''; ?>>Elije una opción</option>
            <?php
            foreach ($niveles as $nivele) { 
                // Comparación asegurando tipos de datos consistentes
                $selected = ((string)$nivele['id_nivel'] === (string)$nivel_id) ? 'selected' : '';
                ?>
                <option value="<?=$nivele['id_nivel'];?>" <?= $selected; ?>><?=$nivele['nivel'];?></option>
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

<?php

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');

?>

<script> 
    function archivo(evt) {
        var files = evt.target.files; // FileList object
        for (var i = 0, f; f = files[i]; i++) {
            if (!f.type.match('image.*')) continue;

            var reader = new FileReader();
            reader.onload = (function (theFile) {
                return function (e) {
                    document.getElementById("list").innerHTML = [
                        '<img class="thumb thumbnail" src="', e.target.result, 
                        '" width="300px" title="', escape(theFile.name), '"/>'
                    ].join('');
                };
            })(f);
            reader.readAsDataURL(f);
        }
    }
    document.getElementById('file').addEventListener('change', archivo, false);
</script>
