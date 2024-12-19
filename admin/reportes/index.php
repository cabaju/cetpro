<?php
ob_start();  // Inicia el búfer de salida
include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
include ('../../app/controllers/kardex/listado_kardexs.php');

if (isset($_GET['reporte'])) {
    $reporte = $_GET['reporte'];
    if ($reporte == '2024') {
        header("Location: ../reportes/reporte_2024.php");
        exit();
    } elseif ($reporte == '2025') {
        header("Location: ../reportes/reporte_2025.php");
        exit();
    } elseif ($reporte == '2026') { // Nueva condición para el reporte 2026
        header("Location: ../reportes/reporte_2026.php");
        exit();
    }
}


?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h1>Listado de Estudiantes Inclusivos</h1>
            </div>
            <br>
            <div class="row">

                <div class="col-md-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Estudiantes Inclusivos</h3>
                            <div class="card-tools">
                                <form action="" method="GET" id="reportForm" target="_blank">
                                    <div class="input-group">
                                        <select class="form-control form-control-lg" name="reporte" id="reporte">
                                            <option value="" selected disabled>Seleccione una opción</option>
                                            <option value="2024">Reporte 2024</option>
                                            <option value="2025">Reporte 2025</option>
                                            <option value="2026">Reporte 2026</option>
                                            <!-- Agregar más opciones según sea necesario -->
                                        </select>
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary btn-lg">
                                                <i class="fas fa-print"></i> Generar Reporte
                                            </button>
                                            <a href="<?=APP_URL;?>/admin/estudiantes" class="btn btn-secondary btn-lg">Volver</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                                <thead>
                                <tr>
                                    <th style="font-size: 14px;"><center>Nro</center></th>
                                    <th style="font-size: 14px;"><center>Código</center></th>
                                    <th style="font-size: 14px;"><center>Periodo</center></th>
                                    <th style="font-size: 14px;"><center>Apellidos y Nombres</center></th>
                                    <th style="font-size: 14px;"><center>DISCAPACIDAD</center></th>
                                    <th style="font-size: 14px;"><center>DNI</center></th>
                                    <th style="font-size: 14px;"><center>Fecha de nacimiento</center></th>
                                    <th style="font-size: 14px;"><center>Docente</center></th>
                                    <th style="font-size: 14px;"><center>Grado</center></th>
                                    <th style="font-size: 14px;"><center>Conadis</center></th>
                                    <th style="font-size: 14px;"><center>Acciones</center></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $contador_estudiantes = 0;
                                foreach ($estudiantes as $estudiante){
                                    $id_estudiante = $estudiante['id_estudiante'];
                                    $contador_estudiantes = $contador_estudiantes +1; 
                                    $fecha_inicio = !empty($grado['inicio']) ? date('d/m/Y', strtotime($grado['inicio'])) : 'No definida';
                                    $fecha_termino = !empty($grado['termino']) ? date('d/m/Y', strtotime($grado['termino'])) : 'No definida';
                                    $fecha_nacimientos = !empty($estudiante['fecha_nacimiento']) ? date('d/m/Y', strtotime($estudiante['fecha_nacimiento'])) : 'No definida';
                                        ?>
                                        <tr>
                                        <td style="text-align: center"><?=$contador_estudiantes;?></td>
                                        <td style="font-size: 14px;"><?=$estudiante['codigo'];?></td>
                                        <td style="font-size: 14px;"><?=$estudiante['rude'];?></td>
                                        <td style="text-align: rigth; font-size: 14px;"><?=$estudiante['apellidos']."  ".$estudiante['apellidosM']." , ".$estudiante['nombres'];?></td>
                                        <td style="font-size: 14px;"><?=$estudiante['discapacidad'];?></td>
                                        <td style="font-size: 14px;"><?=$estudiante['ci'];?></td>
                                        <td style="text-align: center"><?=$fecha_nacimientos;?></td>  <!-- Fecha de inicio formateada -->
                                        <td style="text-align: rigth; font-size: 14px;"><?=$estudiante['apellido_docente']." , ".$estudiante['nombre_docente'];?></td>
                                        <td style="font-size: 14px;"><?=$estudiante['curso']." | ".$estudiante['paralelo'];?></td>
                                        <!-- <td style="font-size: 14px;"><?=$estudiante['conadis'];?></td> -->
                                        <td style="font-size: 14px;">
                                            <?php if (!empty($estudiante['conadis'])): ?>
                                                <img src="<?=APP_URL."/public/images/configuracion/".$estudiante['conadis'];?>" alt="Conadis" style="max-width: 70px; max-height: 70px;">
                                            <?php else: ?>
                                                No disponible
                                            <?php endif; ?>
                                        </td>
                                        <!-- <td style="font-size: 14px;">
                                            <?php
                                            if($estudiante['estado'] == "1") echo "ACTIVO";
                                            else echo "INACTIVO";
                                            ?>
                                        </td> -->
                                        <td style="text-align: center">
                                            <div class="btn-group" role="group" aria-label="Basic example">
                                                <a href="../estudiantes/show_inclusivo.php?id=<?=$id_estudiante;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a>
                                                <!-- <a href="show.php?id=<?=$id_estudiante;?>" type="button" class="btn btn-info btn-sm"><i class="bi bi-eye"></i></a> -->
                                                <!-- <a href="edit.php?id=<?=$id_estudiante;?>" type="button" class="btn btn-success btn-sm"><i class="bi bi-pencil"></i></a> -->
                                                <!-- <form action="<?=APP_URL;?>/app/controllers/estudiantes/delete.php" onclick="preguntar<?=$id_estudiante;?>(event)" method="post" id="miFormulario<?=$id_estudiante;?>">
                                                    <input type="text" name="id_estudiante" value="<?=$id_estudiante;?>" hidden>
                                                    <button type="submit" class="btn btn-danger btn-sm" style="border-radius: 0px 5px 5px 0px"><i class="bi bi-trash"></i></button>
                                                </form> -->
                                                <script>
                                                    function preguntar<?=$id_estudiante;?>(event) {
                                                        event.preventDefault();
                                                        Swal.fire({
                                                            title: 'Eliminar registro de Estudiante',
                                                            text: '¿Desea eliminar este registro?',
                                                            icon: 'question',
                                                            showDenyButton: true,
                                                            confirmButtonText: 'Eliminar',
                                                            confirmButtonColor: '#a5161d',
                                                            denyButtonColor: '#270a0a',
                                                            denyButtonText: 'Cancelar',
                                                        }).then((result) => {
                                                            if (result.isConfirmed) {
                                                                var form = $('#miFormulario<?=$id_estudiante;?>');
                                                                form.submit();
                                                            }
                                                        });
                                                    }
                                                </script>

                                            </div>
                                        </td>
                                    </tr>
                                    <!-- <tr data-turno="<?=$estudiante['turno'];?>" data-grado="<?=$estudiante['grado'];?>">
                                       
                                    </tr> -->
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
    
</div>
<!-- /.content-wrapper -->

<?php

include ('../../admin/layout/parte2.php');
include ('../../layout/mensajes.php');

?>

<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
            "language": {
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Estudiantes",
                "infoEmpty": "Mostrando 0 a 0 de 0 Estudiantes",
                "infoFiltered": "(Filtrado de _MAX_ total Estudiantes)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Estudiantes",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscador:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                }
            },
            "responsive": true, "lengthChange": true, "autoWidth": false,
            buttons: [{
                extend: 'collection',
                text: 'Reportes',
                orientation: 'landscape',
                buttons: [{
                    text: 'Copiar',
                    extend: 'copy',
                    exportOptions: {
                        columns: ':not(:last-child)' // Excluye la última columna
                    }
                }, {
                    extend: 'pdf',
                    orientation: 'landscape', // Configura la orientación horizontal
                    pageSize: 'A4', // Configura el tamaño de página
                    exportOptions: {
                        columns: ':not(:last-child)' // Excluye la última columna
                    },
                        customize: function(doc) {
                        doc.defaultStyle.fontSize = 7;
                        doc.pageMargins = [10, 10, 10, 10];
                    }
                    
                }, {
                    extend: 'csv',
                    exportOptions: {
                        columns: ':not(:last-child)' // Excluye la última columna
                    }
                }, {
                    extend: 'excel',
                    exportOptions: {
                        columns: ':not(:last-child)' // Excluye la última columna
                    }
                }, {
                    text: 'Imprimir',
                    extend: 'print',
                    exportOptions: {
                        columns: ':not(:last-child)' // Excluye la última columna
                    }
                }]
            },
            {
                    extend: 'colvis',
                    text: 'Visor de columnas',
                    collectionLayout: 'fixed four-column'
                }
            ],
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>