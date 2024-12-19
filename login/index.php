<?php
include ('../app/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=APP_NAME;?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?=APP_URL;?>/public/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?=APP_URL;?>/public/dist/css/adminlte.min.css">
    <!-- Sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        
        body {
    background-image: url('<?=APP_URL;?>/admin/imagen/cetpro.jpg'); /* Ruta de la imagen */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    }

    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <!-- <h3 href=""><b><?=APP_NAME;?></b></h3> -->
    </div>
    <!-- /.login-logo -->
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">INICIO DE SESIÓN</p>
            
            <hr>

            <form action="controller_login.php" method="post">
                <div class="input-group mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="input-group mb-3">
                    <button class="btn btn-primary btn-block" type="submit">Ingresar</button>
                </div>
            </form>
            <div class="text-center mt-3">
            <img src="/proyectos/colegio/public/images/configuracion/cetpro.png" alt="Logo" style="max-width: 100px;">
            </div>


            <!-- <p style="text-align: justify"><b>Nota: </b> Puedes probar este sistema con las siguiente cuentas.
            <hr>
            <small>Cuenta de administrador</small>
            <br>
            <b>Cuenta: </b>admin@admin.com
            <br>
            <b>Contraseña: </b>12345678
            <hr>
            <small>Cuenta de docente</small>
            <br>
            <b>Cuenta: </b>docente1@admin.com
            <br>
            <b>Contraseña: </b>12345678
            <hr>
            <small>Cuenta de estudiante</small>
            <br>
            <b>Cuenta: </b>willms.drew@example.org
            <br>
            <b>Contraseña: </b>75670921
            </p> -->

            <?php
            session_start();
            if(isset($_SESSION['mensaje'])){
                $mensaje = $_SESSION['mensaje'];
                ?>
                <script>
                    Swal.fire({
                        position: "top-end",
                        icon: "error",
                        title: "<?=$mensaje;?>",
                        showConfirmButton: false,
                        timer: 4000
                    });
                </script>
            <?php
                session_destroy();
            }
            ?>

        </div>
        <!-- /.login-card-body -->
    </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?=APP_URL;?>/public/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=APP_URL;?>/public/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=APP_URL;?>/public/dist/js/adminlte.min.js"></script>
</body>
</html>
