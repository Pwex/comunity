<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Información</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        </div>
        <div class="box-body">
            <?php if (count($notification_details_single) > 0): ?>
                <ul class="list-group">
                    <li class="list-group-item">
                        <p class="lead">
                            <?php if ($notification_details_single[0]['type_of_notification'] == 'error_access_other_user'): ?>
                                <i class="fa fa-warning text-danger"></i> 
                                Se ha denegado el acceso al siguiente dispositivo <strong><?php echo $notification_details_single[0]['ip_error_access'] ?>,</strong> parece que este dispositivo ha intentado acceder cuando estabas usando nuestro servicio. Te recomendamos que intente de cambiar tu clave de acceso por seguridad. <a href="<?php echo base_url('change_password_user') ?>">Ingresa al área de perfil y cambio de clave</a>
                            <?php endif ?>
                            <?php if ($notification_details_single[0]['type_of_notification'] == 'change_password'): ?>
                                <i class="fa fa-check-circle text-success"></i> 
                                Cambio de clave de seguridad, desde el dispositivo <strong><?php echo $notification_details_single[0]['ip_error_access'] ?>,</strong> fue procesada de forma exitosa
                            <?php endif ?>
                        </p>
                    </li>
                </ul>
            <?php else: ?>
                <p class="lead">Disculpe pero la notificación solicitada no existe</p>   
            <?php endif ?>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->          