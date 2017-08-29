<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pwex | Restaurar Clave</title>
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
            <?php if ($this->uri->segment(2) == 'invalid-email'): ?>
                <div class="container" style="padding-top: 3em; margin-bottom: -8.5em;">
                    <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>
                            <i class="icon fa fa-ban"></i> Alerta
                        </h4>
                            Los datos ingresado son incorrectos, el correo electrónico no existe
                    </div>
                </div>
                <?php endif ?>
                <?php if ($this->uri->segment(2) == 'confirm-email'): ?>
                    <div class="container" style="padding-top: 3em; margin-bottom: -8.5em;">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4>
                                <i class="icon fa fa-check"></i> Exito
                            </h4>
                                En hora buena se han enviado los datos necesarios a tu correo electrónico para que recuperes tu clave de seguridad
                        </div>
                    </div>
            <?php endif ?>
        <div class="login-box">
            <div class="login-logo" style="margin-bottom: 0;">
                <img src="<?php echo base_url('assets/dist/img/pwex.png') ?>" class="img-logo" />
                <a href="<?php echo site_url() ?>" style="letter-spacing: 0.2em">ADMINISTRADOR</a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">
                <p class="login-box-msg" style="font-size: 1.5em; margin-top: -0.7em;">Restablecer mi clave de acceso</p>
                <?php echo form_open('reset-key') ?>
                    <div class="form-group has-feedback">
                        <input name="email" id="email" type="email" class="form-control" placeholder="Correo electrónico" required="" value="<?php echo set_value('email') ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <?php echo form_error('email') ?>
                    </div>
                    <div class="form-group has-feedback">
                        <input name="email_confirm" id="email_confirm" type="email" class="form-control" placeholder="Confirmar correo electrónico" required="" value="<?php echo set_value('email_confirm') ?>">
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                        <?php echo form_error('email_confirm') ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar</button>
                        </div>
                        <div class="col-xs-6">
                            <button type="reset" class="btn btn-default btn-block btn-flat" id="btn-cancel">Cancelar</button>
                        </div>
                    </div>
                </form>
                <p></p>
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