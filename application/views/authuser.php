<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pwex | Inicio sesión</title>
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
            a {
                color: #2196f3;
            }
           .login-box-body, .register-box-body, .login-page, .register-page  {
                background: #ffffff;
            }
            .img-logo {
                width: 5em;
            }
            .btn-primary {
                background-color: #2196F3;
                border-color: #2196F3;
            }
            .btn-primary:hover {
                background-color: #1a8de8;
                border-color: #1a8de8;
            }
        </style>
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo" style="margin-bottom: 0;">
                <img src="<?php echo base_url('assets/dist/img/pwex.png') ?>" class="img-logo" />
                <a href="<?php echo site_url() ?>" style="letter-spacing: 0.1em">ADMINISTRATIVO</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg" style="font-size: 1.5em; margin-top: -0.7em;">Iniciar sesión de usuario</p>
                <?php echo form_open('validation/access') ?>
                    <div class="form-group has-feedback">
                        <input name="email" id="email" type="email" class="form-control" placeholder="Correo electrónico" required="">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input name="password" id="password" type="password" class="form-control" placeholder="Clave de seguridad" required="">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <button type="reset" class="btn btn-default btn-block btn-flat" id="btn-cancel">Cancelar</button>
                        </div>
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar</button>
                        </div>
                    </div>
                </form>
                <p></p>
                <div>
                    <p><a href="<?php echo base_url('reset-key') ?>" class="lead">Olvidé mi clave de seguridad</a><br>
                    <a href="register.html" class="text-center lead">Registrar una nueva membresía</a></p>
                    <p class="footer">© 2017-<?php echo date('Y') ?> Pwex Todos los derechos reservados.</p>
                </div>
                <?php if ($this->uri->segment(1) == 'access' and $this->uri->segment(2) == 'denied'): ?>
                    <p></p>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>
                            <i class="icon fa fa-ban"></i> Alerta
                        </h4>
                            Los datos ingresado son incorrectos
                    </div>
                <?php endif ?>
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