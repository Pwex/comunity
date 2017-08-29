<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pwex | Confirmar Email</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
        <!-- iCheck -->
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/square/blue.css') ?>">
        <!-- style default -->
        <style type="text/css">
            .login-box-body, .register-box-body, .login-page, .register-page  {
                background: #f9f9f9;
            }
            .img-logo {
                width: 5em;
            }
            .msg-error {
                font-size: 16px;
                margin-top: 5px;
            }
            .bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
                background-color: #8BC34A !important;
                border-color: #8BC34A !important;
            }
        </style>
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo" style="margin-bottom: 0;">
                <img src="<?php echo base_url('assets/dist/img/pwex.png') ?>" class="img-logo" />
                <a href="<?php echo site_url() ?>" style="letter-spacing: 0.2em">ADMINISTRADOR</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <h1 class="text-center text-success" style="margin-top: 0; font-size: 5em;"><i class="fa fa-check-circle"></i></h1>
                <p class="text-center lead">En buena hora has cambiado tu clave de seguridad</p>
                <div>
                    <p><a href="<?php echo base_url() ?>" class="lead">Iniciar sesión</a><br>
                    <a href="register.html" class="text-center lead">Registrar una nueva membresía</a></p>
                    <p class="footer">© 2017-<?php echo date('Y') ?> Pwex Todos los derechos reservados.</p>
                </div>
            </div>
            <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->
        <!-- jQuery 3 -->
        <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
        <!-- iCheck -->
        <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
        <script>
            $(document).ready(function(){
                $('#btn-cancel').on('click', function(){
                    $('#email').val('');
                    $('#email_confirm').val('');
                    $('#email').focus();
                });
            });
            $(function () {
              $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
              });
            });
        </script>
    </body>
</html>