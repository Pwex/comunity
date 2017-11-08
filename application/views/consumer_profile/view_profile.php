<style type="text/css">
    .btn {
        background: #f8fafc;
        border-color: #f2f2f2;
        color: #5d5c5c;
        text-align: left;
        padding-top: 20px;
        padding-bottom: 20px;
    }
    .span-description {
        float: right;
    }
</style>
<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                <i class="fa fa-user-circle"></i> <?php echo $name_consumer[0]['name'].' '.$name_consumer[0]['last_name'] ?>
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
                <div class="col-xs-12 no-padding" style="margin-top: 5px">
                    <a href="<?php echo base_url('consumers/poll/').$this->uri->segment(2) ?>" class="btn btn-primary btn-block btn-lg">
                        <span class="span-description"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
                        Encuestas
                    </a>
                </div>
                <div class="col-xs-12 no-padding" style="margin-top: 15px">
                    <a href="<?php echo base_url('consumers/measuring/').$this->uri->segment(2) ?>" class="btn btn-primary btn-block btn-lg">
                        <span class="span-description"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                        Medición
                    </a>
                </div>
                <div class="col-xs-12 no-padding" style="margin-top: 15px">
                    <a href="#" class="btn btn-primary btn-block btn-lg">
                        <span class="span-description"><i class="fa fa-star" aria-hidden="true"></i></span>
                        Recomendaciones
                    </a>
                </div>
                <div class="col-xs-12 no-padding" style="margin-top: 15px">
                    <a href="#" class="btn btn-primary btn-block btn-lg">
                        <span class="span-description"><i class="fa fa-th" aria-hidden="true"></i></span>
                        Resultados
                    </a>
                </div>
                <div class="col-xs-12 no-padding" style="margin-top: 15px">
                    <a href="#" class="btn btn-primary btn-block btn-lg">
                        <span class="span-description"><i class="fa fa-line-chart" aria-hidden="true"></i></span>
                        Progreso
                    </a>
                </div>
                <div class="col-xs-12 no-padding" style="margin-top: 15px">
                    <a href="#" class="btn btn-primary btn-block btn-lg">
                        <span class="span-description"><i class="fa fa-cubes" aria-hidden="true"></i></span>
                        Compras
                    </a>
                </div>
        </div>
    </div>
</section>
<!-- /.content -->   
<?php if ($this->uri->segment(3) == 'success'): ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/alertify/css/alertify.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/alertify/css/themes/bootstrap.min.css') ?>">
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/alertify/alertify.min.js') ?>"></script>
    <script type="text/javascript">
        alertify.set('notifier','position', 'top-center');
        alertify.success('Registro Guardado Correctamente');
    </script>
<?php endif ?>