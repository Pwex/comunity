<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pwex | Cambiar Clave</title>
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
                <p class="login-box-msg" style="font-size: 1.5em; margin-top: -0.7em;">Cambiar mi clave de seguridad</p>
                <?php echo form_open('restore-key') ?>
                    <div class="form-group has-feedback">
                        <input name="password" id="password" type="password" class="form-control" placeholder="Nueva clave de seguridad" required="" value="<?php echo set_value('password') ?>">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <?php echo form_error('password') ?>
                    </div>
                    <div class="form-group has-feedback">
                        <input name="password_confirm" id="password_confirm" type="password" class="form-control" placeholder="Confirmar clave de seguridad" required="" value="<?php echo set_value('password_confirm') ?>">
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                        <?php echo form_error('password_confirm') ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar</button>
                        </div>
                        <div class="col-xs-6">
                            <button type="reset" class="btn btn-default btn-block btn-flat" id="btn-cancel">Cancelar</button>
                        </div>
                    </div>
                    <input type="hidden" name="id"  value="<?php if (!isset($id)) { echo $this->uri->segment(3); } else { echo $id; } ?>">
                    <input type="hidden" name="key" value="<?php if (!isset($key)){ echo $this->uri->segment(2); } else { echo $key; } ?>">
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