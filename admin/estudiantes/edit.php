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

                                                <option value="PROFESIONAL  UNIVERSITARIO INCOMPLETO"<?= $gradoinst== 'PROFESIONAL  UNIVERSITARIO INCOMPLETO' ? 'selected' : ''; ?>>PROFESIONAL  UNIVERSITARIO INCOMPLETO</option>  
                                                <option value="PROFESIONAL   UNIVERSITARIO"<?= $gradoinst== 'PROFESIONAL   UNIVERSITARIO' ? 'selected' : ''; ?>>PROFESIONAL   UNIVERSITARIO</option> 
                                                <option value="POST GRADO"<?= $gradoinst== 'POST GRADO' ? 'selected' : ''; ?>>POST GRADO</option>          
                                            </select>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Estudiante Inclusivo</label>
                                            <select name="inclusivo" class="form-control" required>
                                                <option value="" disabled <?= empty($inclusivo) ? 'selected' : ''; ?>>Seleccione una opción</option>
                                                <option value="SI" <?= $inclusivo == 'SI' ? 'selected' : ''; ?>>SI</option>
                                                <option value="NO" <?= $inclusivo == 'NO' ? 'selected' : ''; ?>>NO</option>
                                            </select>
                                        </div>
                                    </div> -->
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="inclusivo">Estudiante Inclusivo</label>
                                            <select name="inclusivo" id="inclusivo" class="form-control" required>
                                                <option value="" disabled <?= empty($inclusivo) ? 'selected' : ''; ?>>Seleccione una opción</option>
                                                <option value="SI" <?= isset($inclusivo) && $inclusivo === 'SI' ? 'selected' : ''; ?>>SI</option>
                                                <option value="NO" <?= isset($inclusivo) && $inclusivo === 'NO' ? 'selected' : ''; ?>>NO</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Discapacidad</label>
                                            <select name="discapacidad" class="form-control">
                                                <option value="" disabled <?= empty($discapacidad) ? 'selected' : ''; ?>>Seleccione una opción</option>
                                                <option value="NINGUNA" <?= $discapacidad == 'NINGUNA' ? 'selected' : ''; ?>>NINGUNA</option>
                                                <option value="DISCAPACIDAD AUDITIVA - HIPOACUSIA" <?= $discapacidad == 'DISCAPACIDAD AUDITIVA - HIPOACUSIA' ? 'selected' : ''; ?>>DISCAPACIDAD AUDITIVA - HIPOACUSIA</option>
                                                <option value="DISCAPACIDAD AUDITIVA - SORDERA TOTAL" <?= $discapacidad == 'DISCAPACIDAD AUDITIVA - SORDERA TOTAL' ? 'selected' : ''; ?>>DISCAPACIDAD AUDITIVA - SORDERA TOTAL</option>
                                                <option value="DISCAPACIDAD FÍSICA O MOTORA" <?= $discapacidad == 'DISCAPACIDAD FÍSICA O MOTORA' ? 'selected' : ''; ?>>DISCAPACIDAD FÍSICA O MOTORA</option>
                                                <option value="DISCAPACIDAD INTELECTUAL - RETARDO MENTAL LIGERO" <?= $discapacidad == 'DISCAPACIDAD INTELECTUAL - RETARDO MENTAL LIGERO' ? 'selected' : ''; ?>>DISCAPACIDAD INTELECTUAL - RETARDO MENTAL LIGERO</option>
                                                <option value="DISCAPACIDAD INTELECTUAL - RETARDO MENTAL MODERADO" <?= $discapacidad == 'DISCAPACIDAD INTELECTUAL - RETARDO MENTAL MODERADO' ? 'selected' : ''; ?>>DISCAPACIDAD INTELECTUAL - RETARDO MENTAL MODERADO</option>
                                                <option value="DISCAPACIDAD INTELECTUAL - RETARDO MENTAL GRAVE" <?= $discapacidad == 'DISCAPACIDAD INTELECTUAL - RETARDO MENTAL GRAVE' ? 'selected' : ''; ?>>DISCAPACIDAD INTELECTUAL - RETARDO MENTAL GRAVE</option>
                                                <option value="DISCAPACIDAD VISUAL - BAJA VISIÓN" <?= $discapacidad == 'DISCAPACIDAD VISUAL - BAJA VISIÓN' ? 'selected' : ''; ?>>DISCAPACIDAD VISUAL - BAJA VISIÓN</option>
                                                <option value="DISCAPACIDAD VISUAL - CEGUERA" <?= $discapacidad == 'DISCAPACIDAD VISUAL - CEGUERA' ? 'selected' : ''; ?>>DISCAPACIDAD VISUAL - CEGUERA</option>
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
                                <br>
                                Seleccionar nuevamente las imagenes
                                <br>
                                <br>
                                        <div class="row">
                                            <!-- <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">DNI / CE</label>
                                                    <input type="file" name="file_foto" id="file_foto" class="form-control">
                                                    <br>
                                                    <center>
                                                        <output id="list_foto">
                                                            <img src="<?=APP_URL."/public/images/configuracion/".$foto;?>" width="50px" alt="">
                                                        </output>
                                                    </center>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">DNI / CE</label>
                                                    <input type="file" name="file_ci1" id="file_ci1" class="form-control">
                                                    <br>
                                                    <center>
                                                        <output id="list_ci1">
                                                            <img src="<?=APP_URL."/public/images/configuracion/".$ci1;?>" width="50px" alt="">
                                                        </output>
                                                    </center>
                                                </div>
                                            </div>        
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">DNI CONADIS</label>
                                                    <input type="file" name="file_conadis" id="file_conadis" class="form-control">
                                                    <br>
                                                    <center>
                                                        <output id="list_conadis">
                                                            <img src="<?=APP_URL."/public/images/configuracion/".$conadis;?>" width="50px" alt="">
                                                        </output>
                                                    </center>
                                                </div>
                                            </div>
                                    
                                            <div class="col-md-3">
                                                <div class="form-group">
                                                    <label for="">DNI CONADIS</label>
                                                    <input type="file" name="file_conadis1" id="file_conadis1" class="form-control">
                                                    <br>
                                                    <center>
                                                        <output id="list_conadis1">
                                                            <img src="<?=APP_URL."/public/images/configuracion/".$conadis1;?>" width="50px" alt="">
                                                        </output>
                                                    </center>
                                                </div>
                                            </div> -->


                                            <!-- Imagen DNI / CE -->
                                            <div class="col-md-3">
    <div class="form-group">
        <label for="file_foto">DNI / CE</label>
        <input type="file" name="file_foto" id="file_foto" class="form-control">
        <br>
        <center>
            <output id="list_foto">
                <?php if (!empty($foto)): ?>
                    <img src="<?= APP_URL . "/public/images/configuracion/" . htmlspecialchars($foto); ?>" width="50px" alt="DNI / CE">
                <?php else: ?>
                    <span>No hay imagen disponible</span>
                <?php endif; ?>
            </output>
        </center>
    </div>
</div>

<!-- Imagen CI1 -->
<div class="col-md-3">
    <div class="form-group">
        <label for="file_ci1">DNI / CE</label>
        <input type="file" name="file_ci1" id="file_ci1" class="form-control">
        <br>
        <center>
            <output id="list_ci1">
                <?php if (!empty($ci1)): ?>
                    <img src="<?= APP_URL . "/public/images/configuracion/" . htmlspecialchars($ci1); ?>" width="50px" alt="DNI / CE">
                <?php else: ?>
                    <span>No hay imagen disponible</span>
                <?php endif; ?>
            </output>
        </center>
    </div>
</div>

<!-- Imagen CONADIS -->
<div class="col-md-3">
    <div class="form-group">
        <label for="file_conadis">DNI CONADIS</label>
        <input type="file" name="file_conadis" id="file_conadis" class="form-control">
        <br>
        <center>
            <output id="list_conadis">
                <?php if (!empty($conadis)): ?>
                    <img src="<?= APP_URL . "/public/images/configuracion/" . htmlspecialchars($conadis); ?>" width="50px" alt="CONADIS">
                <?php else: ?>
                    <span>No hay imagen disponible</span>
                <?php endif; ?>
            </output>
        </center>
    </div>
</div>

<!-- Imagen CONADIS1 -->
<div class="col-md-3">
    <div class="form-group">
        <label for="file_conadis1">DNI CONADIS</label>
        <input type="file" name="file_conadis1" id="file_conadis1" class="form-control">
        <br>
        <center>
            <output id="list_conadis1">
                <?php if (!empty($conadis1)): ?>
                    <img src="<?= APP_URL . "/public/images/configuracion/" . htmlspecialchars($conadis1); ?>" width="50px" alt="CONADIS1">
                <?php else: ?>
                    <span>No hay imagen disponible</span>
                <?php endif; ?>
            </output>
        </center>
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
                                                    <option value="<?=$grado['id_grado'];?>" 
                                                        data-curso="<?=$grado['curso']." || ".$grado['paralelo'];?>"
                                                        data-docente="<?=$grado['apellido_docente']." , ".$grado['nombre_docente'];?>"
                                                        data-semestre="<?=$grado['semestre'];?>"
                                                    >
                                                        <?=$grado['codigo'];?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Curso - Especialidad</label>
                                            <input type="text" name="curso_especialidad" id="curso_especialidad" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Docente</label>
                                            <input type="text" name="docente" id="docente" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Semestre</label>
                                            <input type="text" name="semestre" id="semestre" class="form-control" readonly>
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
                                            <select name="ref_nombre" class="form-control" required>
                                                <option value="" disabled <?= empty($ref_nombre) ? 'selected' : ''; ?>>Seleccione una opción</option>
                                                <option value="NINGUNA" <?= $ref_nombre == 'NINGUNA' ? 'selected' : ''; ?>>NINGUNA</option>
                                                <option value="SEGUNDO AÑO DE SECUNDARIA" <?= $ref_nombre == 'SEGUNDO AÑO DE SECUNDARIA' ? 'selected' : ''; ?>>SEGUNDO AÑO DE SECUNDARIA</option>
                                                <option value="TERCER AÑO DE SECUNDARIA" <?= $ref_nombre == 'TERCER AÑO DE SECUNDARIA' ? 'selected' : ''; ?>>TERCER AÑO DE SECUNDARIA</option>
                                                <option value="CUARTO AÑO DE SECUNDARIA" <?= $ref_nombre == 'CUARTO AÑO DE SECUNDARIA' ? 'selected' : ''; ?>>CUARTO AÑO DE SECUNDARIA</option>
                                                <option value="QUINTO AÑO DE SECUNDARIA" <?= $ref_nombre == 'QUINTO AÑO DE SECUNDARIA' ? 'selected' : ''; ?>>QUINTO AÑO DE SECUNDARIA</option>
                                            </select>
                                        </div> 
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                        <label for="">Institución Educativa de Procedencia</label>
                                            <select name="ref_colegio" class="form-control" required>
                                            <option value="" disabled <?= empty($ref_colegio) ? 'selected' : ''; ?>>Seleccione una opción</option>
                                            <option value="NINGUNA" <?= $ref_colegio == 'NINGUNA' ? 'selected' : ''; ?>>NINGUNA</option>
                                            <option value="6008 JOSÉ ANTONIO DAPELO" <?= $ref_colegio == '6008 JOSÉ ANTONIO DAPELO' ? 'selected' : ''; ?>>6008 JOSÉ ANTONIO DAPELO</option> 
                                            <option value="6023 JULIO CESAR ROJAS" <?= $ref_colegio == '6023 JULIO CESAR ROJAS' ? 'selected' : ''; ?>>6023 JULIO CESAR ROJAS</option>
                                            <option value="6030 VICTOR ANDRES BELAUNDE DIEZ CANSECO" <?= $ref_colegio == '6030 VICTOR ANDRES BELAUNDE DIEZ CANSECO' ? 'selected' : ''; ?>>6030 VICTOR ANDRES BELAUNDE DIEZ CANSECO</option>
                                            <option value="7061 HEROES DE SAN JUAN" <?= $ref_colegio == '7061 HEROES DE SAN JUAN' ? 'selected' : ''; ?>>7061 HEROES DE SAN JUAN</option>  
                                            <option value="7098 RODRIGO LARA BONILLA" <?= $ref_colegio == '7098 RODRIGO LARA BONILLA' ? 'selected' : ''; ?>>7098 RODRIGO LARA BONILLA</option>
                                            <option value="7104 RAMIRO PRIALE PRIALE" <?= $ref_colegio == '7104 RAMIRO PRIALE PRIALE' ? 'selected' : ''; ?>>7104 RAMIRO PRIALE PRIALE</option>
                                            <option value="7267 SEÑOR DE LOS MILAGROS" <?= $ref_colegio == '7267 SEÑOR DE LOS MILAGROS' ? 'selected' : ''; ?>>7267 SEÑOR DE LOS MILAGROS</option>
                                            <option value="CEBA JOSÉ FAUSTINO SÁNCHEZ CARRIÓN" <?= $ref_colegio == 'CEBA JOSÉ FAUSTINO SÁNCHEZ CARRIÓN' ? 'selected' : ''; ?>>CEBA JOSÉ FAUSTINO SÁNCHEZ CARRIÓN</option>
                                            <option value="IEAC CASA ABIERTA DE NAZARETH" <?= $ref_colegio == 'IEAC CASA ABIERTA DE NAZARETH' ? 'selected' : ''; ?>>IEAC CASA ABIERTA DE NAZARETH</option> 
                                            <option value="JOSE FAUSTINO SANCHEZ CARRION" <?= $ref_colegio == 'JOSE FAUSTINO SANCHEZ CARRION' ? 'selected' : ''; ?>>JOSE FAUSTINO SANCHEZ CARRION</option> 
                                            <option value="MIGUEL GRAU SEMINARIO" <?= $ref_colegio == 'MIGUEL GRAU SEMINARIO' ? 'selected' : ''; ?>>MIGUEL GRAU SEMINARIO</option>  
                                            <option value="SAN JOSÉ DE PUNTA NEGRA" <?= $ref_colegio == 'SAN JOSÉ DE PUNTA NEGRA' ? 'selected' : ''; ?>>SAN JOSÉ DE PUNTA NEGRA</option>  
                                            <option value="OTROS - PONER EL NOMBRE DE LA iNSTITUCIÓN" <?= $ref_colegio == 'TROS - PONER EL NOMBRE DE LA iNSTITUCIÓN' ? 'selected' : ''; ?>>OTROS - PONER EL NOMBRE DE LA iNSTITUCIÓN</option> 
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
                <input type="hidden" name="foto" value="<?= htmlspecialchars($foto); ?>">
                <input type="hidden" name="ci1" value="<?= htmlspecialchars($ci1); ?>">
                <input type="hidden" name="conadis" value="<?= htmlspecialchars($conadis); ?>">
                <input type="hidden" name="conadis1" value="<?= htmlspecialchars($conadis1); ?>">                            
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
        const docenteInput = document.getElementById("docente");
        const semestreInput = document.getElementById("semestre");
        
        if (codigoSelect.selectedIndex > 0) {
            
            const curso = codigoSelect.options[codigoSelect.selectedIndex].getAttribute("data-curso");
            const docente = codigoSelect.options[codigoSelect.selectedIndex].getAttribute("data-docente");
            const semestre = codigoSelect.options[codigoSelect.selectedIndex].getAttribute("data-semestre");
           
            cursoEspecialidadInput.value = curso ? curso : "";
            docenteInput.value = docente ? docente : "";
            semestreInput.value = semestre ? semestre : "";
        } else {
            
            cursoEspecialidadInput.value = "";
            docenteInput.value = "";
        }
    }
</script>

<?php

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');

?>

<script> 
    // function archivo(evt) {
    //     var files = evt.target.files; 
    //     for (var i = 0, f; f = files[i]; i++) {
    //         if (!f.type.match('image.*')) continue;

    //         var reader = new FileReader();
    //         reader.onload = (function (theFile) {
    //             return function (e) {
    //                 var targetId = evt.target.id === 'file' ? 'list_dni' : 'list_conadis'  ;
    //                 document.getElementById(targetId).innerHTML = [
    //                     '<img class="thumb thumbnail" src="', e.target.result, 
    //                     '" width="300px" title="', escape(theFile.name), '"/>'
    //                 ].join('');
    //             };
    //         })(f);
    //         reader.readAsDataURL(f);
    //     }
    // }
    // document.getElementById('file').addEventListener('change', archivo, false);
    // document.getElementById('file_ci1').addEventListener('change', archivo, false);
    // document.getElementById('file_conadis').addEventListener('change', archivo, false);
    // document.getElementById('file_conadis1').addEventListener('change', archivo, false);


    function archivo(evt) {
    var files = evt.target.files; // FileList object
    for (var i = 0, f; f = files[i]; i++) {
        if (!f.type.match('image.*')) continue; // Validar que sea una imagen
        var reader = new FileReader();
        reader.onload = (function (theFile) {
            return function (e) {
                var targetId;
                switch (evt.target.id) {
                    case 'file_foto':
                        targetId = 'list_foto';
                        break;
                    case 'file_ci1':
                        targetId = 'list_ci1';
                        break;
                    case 'file_conadis':
                        targetId = 'list_conadis';
                        break;
                    case 'file_conadis1':
                        targetId = 'list_conadis1';
                        break;
                    default:
                        console.error('Input desconocido:', evt.target.id);
                        return;
                }
                document.getElementById(targetId).innerHTML = [
                    '<img class="thumb thumbnail" src="', e.target.result, 
                    '" width="100px" title="', escape(theFile.name), '"/>'
                ].join('');
            };
        })(f);
        reader.readAsDataURL(f); 
    }
}

document.getElementById('file_foto').addEventListener('change', archivo, false);
document.getElementById('file_ci1').addEventListener('change', archivo, false);
document.getElementById('file_conadis').addEventListener('change', archivo, false);
document.getElementById('file_conadis1').addEventListener('change', archivo, false);










</script>
