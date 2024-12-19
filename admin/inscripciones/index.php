<?php

include ('../../app/config.php');
include ('../../admin/layout/parte1.php');
date_default_timezone_set('America/Lima');
$hora_actual = date('H:i:s A'); // Hora actual
?>


<style>
    .content-wrapper {
        background-image: url('../imagen/cetpro.png'); /* Cambia a tu ruta */
        background-size: contain;
        background-position: center;
        background-repeat: no-repeat;
    }

    h2 {
        color: green; /* Asegura legibilidad del texto */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); /* Sombra para destacar el texto */
    }
</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <br>
    <div class="content">
        <div class="container">
            <!-- <div class="row">
                <h1>Inscripciones: <?=$ano_actual;?></h1>
            </div> -->
            <div class="row">
                <!-- <h1>Inscripciones: <?=$ano_actual;?> - <?=date('h:i:s A');?> -->
                <h2>Inscripciones: <?= date('Y'); ?> - <span id="hora"><?= $hora_actual; ?></span></h2>
            </div>

            <br>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="bi bi-person-video"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Inscripciones</span>
                            <a href="create.php" class="btn btn-success btn-sm">MATRÍCULA DEL ESTUDIANTE</a>
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


<script>
    function actualizarHora() {
        const reloj = document.getElementById('hora');
        const ahora = new Date();

        // Formatear la hora como hh:mm:ss AM/PM
        let horas = ahora.getHours();
        const minutos = String(ahora.getMinutes()).padStart(2, '0');
        const segundos = String(ahora.getSeconds()).padStart(2, '0');
        const ampm = horas >= 12 ? 'PM' : 'AM';

        // Convertir a formato 12 horas
        horas = horas % 12;
        horas = horas ? horas : 12; // Convertir '0' a '12'

        reloj.textContent = `${horas}:${minutos}:${segundos} ${ampm}`;
    }

    // Actualizar la hora cada segundo
    setInterval(actualizarHora, 1000);
    // Inicializar con la hora del servidor
    actualizarHora();
</script>