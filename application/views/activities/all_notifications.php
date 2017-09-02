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
            <ul class="list-group">
                <?php foreach ($all_notification_details as $key => $value): ?>
                    <li class="list-group-item" style="margin-top: 8px;">
                        <p class="lead" style="margin-bottom: 0;"><strong><?php echo date('d-m-Y H:i:s', strtotime($value['date'])) ?></strong></p>
                        <p class="lead" style="margin-bottom: 0;"> 
                            <?php if ($value['type_of_notification'] == 'error_access_other_user'): ?>
                                Se ha denegado el acceso al siguiente dispositivo <strong><?php echo $value['ip_error_access'] ?>,</strong> parece que este dispositivo ha intentado acceder cuando estabas usando nuestro servicio. Te recomendamos que intente de cambiar tu clave de acceso por seguridad. <a href="<?php echo base_url('change_password_user') ?>">Ingresa al área de perfil y cambio de clave</a>
                            <?php endif ?>
                            <?php if ($value['type_of_notification'] == 'change_password'): ?>
                                Cambio de clave de seguridad, desde el dispositivo <strong><?php echo $value['ip_error_access'] ?>,</strong> fue procesada de forma exitosa
                            <?php endif ?>
                        <hr />
                        <?php if ($value['status'] == 0): ?>
                            <span style="background-color: #8bc34a; color: #fff; padding: 5px;">Estatus: Revisado</span> 
                                <a href="<?php echo base_url('delete_notifications').'/'.$value['notifications'] ?>" style="color: #f44336; font-size: 24px; float: right; margin-left: 5px;"><i class=" fa fa-trash"></i></a> 
                            </p>
                        <?php endif ?>
                        <?php if ($value['status'] == 1): ?>
                            <span style="background-color: #f44336; color: #fff; padding: 5px;">Estatus: Pendiente</span> 
                                <a href="<?php echo base_url('delete_notifications').'/'.$value['notifications'] ?>" style="color: #f44336; font-size: 24px; float: right; margin-left: 5px;"><i class=" fa fa-trash"></i></a> 
                                <a href="<?php echo base_url('accept_notifications').'/'.$value['notifications'] ?>" style="color: #8bc34a; font-size: 24px; float: right;"><i class=" fa fa-check-circle"></i> | </a> 
                            </p>
                        <?php endif ?>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            
        </div>
        <!-- /.box-footer-->
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->          