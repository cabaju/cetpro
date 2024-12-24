<?php
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
// include ('../../admin/inscripciones/buscar.php');
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
                <h1>Registro de Matrícula</h1>
            </div>
            <br>

            <form action="<?=APP_URL;?>/app/controllers/inscripciones/create.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><b>Llene los datos del estudiante</b></h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
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
                                            <!-- <input type="number" name="ci" class="form-control" required> -->
                                            <input type="number" name="ci" class="form-control" id="dni" required onblur="buscarEstudiante()">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Nombres</label>
                                            <input type="text" name="nombres" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellido Paterno</label>
                                            <input type="text" name="apellidos" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellido Materno</label>
                                            <input type="text" name="apellidosM" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Sexo</label>
                                            <select name="sexo" id="sexo" class="form-control">
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="HOMBRE">HOMBRE</option>
                                            <option value="MUJER">MUJER</option>
                                            </select>
                                        </div>                                    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Fecha de nacimiento</label>
                                            <input type="date" name="fecha_nacimiento" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">País</label>
                                            <input type="text" name="pais" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Lugar de Nacimiento</label>
                                            <input type="text" name="lugar" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Departamento de Residencia</label>
                                            <input type="text" name="departamento" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Provincia de Residencia</label>
                                            <input type="text" name="provincia" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Distrito de Residencia</label>
                                            <input type="text" name="distrito" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Domicilio de Residencia</label>
                                            <input type="text" name="direccion" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Trabaja</label>
                                            <select name="trabaja" id="trabaja" class="form-control">
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                            </select>
                                        </div>                                    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Ocupación</label>
                                            <input type="text" name="ocupacion" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Estado Civil</label>
                                            <select name="estado_civil" id="estado_civil" class="form-control">
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="SOLTERO">SOLTERO(A)</option>
                                            <option value="CASADO">CASADO</option>
                                            <option value="DIVORSIADO">DIVORCIADO(A)</option> 
                                            <option value="CONVIVIENTE">CONVIVIENTE</option>
                                            <option value="VIUDA">VIUDA(O)</option>     
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Grado de Instrucción</label>
                                            <select name="gradoinst" id="gradoinst" class="form-control">
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="SIN ESTUDIO">SIN ESTUDIO</option>
                                            <option value="EDUCACION PRIMARIA INCOMPLETA">EDUCACION PRIMARIA INCOMPLETA</option>
                                            <option value="EDUCACION PRIMARIA">EDUCACION PRIMARIA</option> 
                                            <option value="EDUCACION SECUNDARIA INCOMPLETA">EDUCACION SECUNDARIA INCOMPLETA</option>
                                            <option value="EDUCACION SECUNDARIA">EDUCACION SECUNDARIA</option> 
                                            <option value="AUXILIAR TECNICO INCOMPLETA">AUXILIAR TECNICO INCOMPLETA</option>  
                                            <option value="AUXILIAR TECNICO">AUXILIAR TECNICO</option>  
                                            <option value="TECNICO INCOMPLETA">TECNICO INCOMPLETA</option>
                                            <option value="TECNICO">TECNICO</option>   
                                            <option value="PROFESIONAL TECNICO INCOMPLETA">PROFESIONAL TECNICO INCOMPLETA</option>   
                                            <option value="PROFESIONAL TECNICO">PROFESIONAL TECNICO</option>   
                                            <option value="PROFESIONAL  NO  UNIVERSITARIO INCOMPLETO">PROFESIONAL  NO  UNIVERSITARIO INCOMPLETO</option>   
                                            <option value="PROFESIONAL  NO  UNIVERSITARIO">PROFESIONAL  NO  UNIVERSITARIO</option> 
                                            <option value="PROFESIONAL  UNIVERSITARIO INCOMPLETO">PROFESIONAL  UNIVERSITARIO INCOMPLETO</option>  
                                            <option value="PROFESIONAL   UNIVERSITARIO">PROFESIONAL   UNIVERSITARIO</option> 
                                            <option value="POST GRADO">POST GRADO</option>          
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="inclusivo">Estudiante Inclusivo</label>
                                            <select name="inclusivo" id="inclusivo" class="form-control" required>
                                                <option value="" selected disabled>Seleccione una opción</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                        </div> 
                                    </div>                                   
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Discapacidad</label>
                                            <select name="discapacidad" id="discapacidad" class="form-control">
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="NINGUNA">NINGUNA</option>
                                            <option value="DISCAPACIDAD AUDITIVA - HIPOACUSIA">DISCAPACIDAD AUDITIVA - HIPOACUSIA</option>
                                            <option value="DISCAPACIDAD AUDITIVA - SORDERA TOTAL">DISCAPACIDAD AUDITIVA - SORDERA TOTAL</option>
                                            <option value="DISCAPACIDAD FÍSICA O MOTORA">DISCAPACIDAD FÍSICA O MOTORA</option>
                                            <option value="DISCAPACIDAD INTELECTUAL - RETARDO MENTAL LIGERO">DISCAPACIDAD INTELECTUAL - RETARDO MENTAL LIGERO</option>
                                            <option value="DISCAPACIDAD INTELECTUAL - RETARDO MENTAL MODERADO">DISCAPACIDAD INTELECTUAL - RETARDO MENTAL MODERADO</option>
                                            <option value="DISCAPACIDAD INTELECTUAL - RETARDO MENTAL GRAVE">DISCAPACIDAD INTELECTUAL - RETARDO MENTAL LGRAVE</option>
                                            <option value="DISCAPACIDAD VISUAL - BAJA VISIÓN">DISCAPACIDAD VISUAL - BAJA VISIÓN</option>
                                            <option value="DISCAPACIDAD VISUAL - CEGUERA">DISCAPACIDAD VISUAL - CEGUERA</option>
                                            </select>
                                        </div>                                    
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" name="celular" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Correo</label>
                                            <input type="email" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                        <div class="row">
                                            <div class="col-md-3">
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
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-warning">
                            <div class="card-header">
                                <h3 class="card-title"><b>Llene los datos académicos</b></h3>
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
                                            <!-- Este campo de texto se actualizará al seleccionar un código en el selector anterior -->
                                            <input type="text" name="curso_especialidad" id="curso_especialidad" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Docente</label>
                                            <!-- Este campo de texto se actualizará al seleccionar un código en el selector anterior -->
                                            <input type="text" name="docente" id="docente" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Semestre</label>
                                            <!-- Este campo de texto se actualizará al seleccionar un código en el selector anterior -->
                                            <input type="text" name="semestre" id="semestre" class="form-control" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label for="">RUDE</label>
                                            <input type="text" name="rude" class="form-control" required>
                                        </div>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-outline card-danger">
                            <div class="card-header">
                                <h3 class="card-title"><b>Datos del Estudiante por convenio</b></h3>
                            </div>
                            <div class="card-body">
                            <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ref_nombre">Grado de Estudios Secundarios Actual</label>
                                            <select name="ref_nombre" id="ref_nombre" class="form-control" required>
                                                <option value="" selected disabled>Seleccione una opción</option>
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
                                            <label for="ref_colegio">Institución Educativa de Procedencia</label>
                                            <select name="ref_colegio" id="ref_colegio" class="form-control" required>
                                                <option value="" selected disabled>Seleccione una opción</option>
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
                                            <input type="texto" name="ref_celular" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Apellidos y Nombres (Padre o Madre)</label>
                                            <input type="text" name="nombres_apellidos_ppff" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">DNI/CE</label>
                                            <input type="text" name="ci_ppf" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Celular</label>
                                            <input type="number" name="celular_ppff" class="form-control" required>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Ocupación</label>
                                            <input type="text" name="ocupacion_ppff" class="form-control" required>
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
                            <button type="submit" class="btn btn-primary btn-lg">Registrar</button>
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
    // Función para actualizar el curso según el código seleccionado
    function actualizarCurso() {
        // Obtiene el selector de código y el input de curso
        const codigoSelect = document.getElementById("grado_id");
        const cursoEspecialidadInput = document.getElementById("curso_especialidad");
        const docenteInput = document.getElementById("docente");
        const semestreInput = document.getElementById("semestre");
        // const nivelInput = document.getElementById("nivel");

        // Asegúrate de que se ha seleccionado una opción válida
        if (codigoSelect.selectedIndex > 0) {
            // Obtiene el texto del atributo data-curso de la opción seleccionada
            const curso = codigoSelect.options[codigoSelect.selectedIndex].getAttribute("data-curso");
            const docente = codigoSelect.options[codigoSelect.selectedIndex].getAttribute("data-docente");
            const semestre = codigoSelect.options[codigoSelect.selectedIndex].getAttribute("data-semestre");
            // const nivel = codigoSelect.options[codigoSelect.selectedIndex].getAttribute("data-nivel");

            // Actualiza el campo de texto con el curso correspondiente
            cursoEspecialidadInput.value = curso ? curso : "";
            docenteInput.value = docente ? docente : "";
            semestreInput.value = semestre ? semestre : "";
            // nivelInput.value = nivel? nivel : "";
        } else {
            // Si no hay una opción seleccionada, limpia el campo de curso
            cursoEspecialidadInput.value = "";
            docenteInput.value = "";
        }
    }

    // function archivo(evt) {
    //     var files = evt.target.files; // FileList object
    //     for (var i = 0, f; f = files[i]; i++) {
    //         if (!f.type.match('image.*')) continue;

    //         var reader = new FileReader();
    //         reader.onload = (function (theFile) {
    //             return function (e) {
    //                 var targetId = evt.target.id === 'file_foto' ? 'list_ci1' : 'list_conadis'  ;
    //                 document.getElementById(targetId).innerHTML = [
    //                     '<img class="thumb thumbnail" src="', e.target.result, 
    //                     '" width="300px" title="', escape(theFile.name), '"/>'
    //                 ].join('');
    //             };
    //         })(f);
    //         reader.readAsDataURL(f);
    //     }
    // }
    // document.getElementById('file_foto').addEventListener('change', archivo, false);
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
                // Identificar el elemento correcto según el ID del input
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

                // Mostrar vista previa en el elemento correspondiente
                document.getElementById(targetId).innerHTML = [
                    '<img class="thumb thumbnail" src="', e.target.result, 
                    '" width="100px" title="', escape(theFile.name), '"/>'
                ].join('');
            };
        })(f);
        reader.readAsDataURL(f); // Leer el archivo como DataURL
    }
}

// Asignar eventos a cada input
document.getElementById('file_foto').addEventListener('change', archivo, false);
document.getElementById('file_ci1').addEventListener('change', archivo, false);
document.getElementById('file_conadis').addEventListener('change', archivo, false);
document.getElementById('file_conadis1').addEventListener('change', archivo, false);









    </script>


<?php

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');

?>
