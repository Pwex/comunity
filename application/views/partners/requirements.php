<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pwex</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
        <!-- Theme style -->
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css') ?>">
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
        <!-- Main -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/main.css') ?>">
        <style>
            .btn-group, .btn-group-vertical {
                width: 100%;
            }
            .btn-check-main {
                font-size: 1.1em;
                padding: 10px 2px;
                width: 12.5%;
            }
            .btn-check-main2 {
                font-size: 1.1em;
                padding: 10px 2px;
                width: 10%;
            }
            .btn-check-main3 {
                font-size: 1.1em;
                padding: 10px 2px;
                width: 18%;
            }
            .btn-check-main50 {
                font-size: 1.1em;
                padding: 10px 2px;
                width: 50%;
            }

            .btn-check-main25 {
                font-size: 1.1em;
                padding: 10px 2px;
                width: 25%;
            }
            .btn span.glyphicon {               
            opacity: 0;             
            }
            .btn.active span.glyphicon {                
            opacity: 1;             
            }  
        </style>
    </head>
<body>



<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Requerimientos</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('partners/requirements/'.$this->uri->segment(3)) ?>
            <!-- /.box-header -->
            <div class="row">
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Nombre del producto</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input type="text" name="loan_quota_partner" id="loan_quota_partner" class="form-control" value="<?php echo set_value('loan_quota_partner') ?>" />
                            <?php echo form_error('loan_quota_partner') ?>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="form-group">
                        <label>Categoría principal</label>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <input type="text" name="term_days_partner" id="term_days_partner" class="form-control" value="<?php echo set_value('term_days_partner') ?>" />
                            <?php echo form_error('term_days_partner') ?>
                    </div>
                </div>
            </div>
 
            <br>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-info">Adicionar tro producto</button>
                        <button type="submit" class="btn btn-primary">Guardar y Enviar</button>
                        <button type="reset"  class="btn btn-default">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</section>
<!-- /.content -->   
<!-- jQuery 3 -->
<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>
</body>
</html>