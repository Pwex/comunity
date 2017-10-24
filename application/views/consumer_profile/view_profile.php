<style type="text/css">
    .btn-group .btn {
        height: 90px;
    }
    .span-description {
        display: inline-block;
        font-size: 18px;
        left: 0;
        position: absolute;
        text-align: center;
        top: 20px;
        width: 100%;
    }
    a.btn {
        font-size: 0.7em;
        font-weight: bold;
        padding-left: 0;
        padding-right: 0;
        padding-top: 30px;
        text-align: center;
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
            <div class="btn-group btn-group-justified">
                <a href="<?php echo base_url('consumers/poll/').$this->uri->segment(2) ?>" class="btn btn-primary">
                    <span class="span-description"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
                    Encuesta
                </a>
                <a href="#" class="btn btn-primary">
                    <span class="span-description"><i class="fa fa-plus-circle" aria-hidden="true"></i></span>
                    Medición
                </a>
                <a href="#" class="btn btn-primary">
                    <span class="span-description"><i class="fa fa-star" aria-hidden="true"></i></span>
                    Recomendaciones
                </a>
            </div>
            <div class="btn-group btn-group-justified" style="margin-top: 10px">
                <a href="#" class="btn btn-primary">
                    <span class="span-description"><i class="fa fa-th" aria-hidden="true"></i></span>
                    Resultados
                </a>
                <a href="#" class="btn btn-primary">
                    <span class="span-description"><i class="fa fa-line-chart" aria-hidden="true"></i></span>
                    Progreso
                </a>
                <a href="#" class="btn btn-primary">
                    <span class="span-description"><i class="fa fa-cubes" aria-hidden="true"></i></span>
                    Compras
                </a>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->   