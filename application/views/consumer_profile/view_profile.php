<style type="text/css">
    .btn {
        background: #000000;
        border-color: #000000;
        color: #ffffff;
        text-align: left;
        padding-top: 15px;
        padding-bottom: 15px;
    }
    .span-description {
        display: inline-flex;
        float: right;
        font-size: 19px;
    }
    .btn-flat {
        border-radius: 2px !important;
    }
    .btn-group-lg>.btn, .btn-lg {
        padding: 16px 5px;
        font-size: 15px;
    }
</style>
<!-- Main content -->
<section class="content">
    <div>
        <p class="text-center" style="margin-bottom: 0px;"><i class="fa fa-user-circle fa-4x" style="color: #000; margin-top: -5px;"></i></p>
        <h3 class="text-center" style="margin-top: 5px;"><strong><?php echo $name_consumer[0]['name'].' '.$name_consumer[0]['last_name'] ?></strong></h3>
    </div>
    <div class="col-xs-6" style="margin-bottom: 10px; padding-left: 0; padding-right: 4px;">
        <a href="<?php echo base_url('consumers/poll/').$this->uri->segment(2) ?>" class="btn btn-primary btn-flat btn-lg btn-block">
            <span class="span-description"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
            Encuestas
        </a>
    </div>
    <div class="col-xs-6" style="margin-bottom: 10px; padding-right: 0; padding-left: 4px;">
        <a href="<?php echo base_url('consumers/measuring/').$this->uri->segment(2) ?>" class="btn btn-primary btn-flat btn-lg btn-block">
            <span class="span-description"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
            Medición
        </a>
    </div>
    <div class="col-xs-6" style="margin-bottom: 10px; padding-left: 0; padding-right: 4px;">
        <a href="#" class="btn btn-primary btn-flat btn-lg btn-block">
            <span class="span-description"><i class="fa fa-star" aria-hidden="true"></i></span>
            Recomendación
        </a>
    </div>
    <div class="col-xs-6" style="margin-bottom: 10px; padding-right: 0; padding-left: 4px;">
        <a href="#" class="btn btn-primary btn-flat btn-lg btn-block">
            <span class="span-description"><i class="fa fa-th" aria-hidden="true"></i></span>
            Resultados
        </a>
    </div>
    <div class="col-xs-6" style="margin-bottom: 10px; padding-left: 0; padding-right: 4px;">
        <a href="#" class="btn btn-primary btn-flat btn-lg btn-block">
            <span class="span-description"><i class="fa fa-line-chart" aria-hidden="true"></i></span>
            Progreso
        </a>
    </div>
    <div class="col-xs-6" style="margin-bottom: 10px; padding-right: 0; padding-left: 4px;">
        <a href="<?php echo base_url('consumer-profile/purchases/').$this->uri->segment(2) ?>" class="btn btn-primary btn-flat btn-lg btn-block">
            <span class="span-description"><i class="fa fa-cubes" aria-hidden="true"></i></span>
            Compras
        </a>
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