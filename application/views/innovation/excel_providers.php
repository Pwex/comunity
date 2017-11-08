<style type="text/css">
    .bar-disable {
        display: none; 
        background: rgb(248, 250, 252);
        border: 1px solid #eee;
        color: #4a4a4a;
        font-size: 21px;
        padding: 56px;
        position: absolute;
        text-align: center;
        top: 45%;
        width: 93.6%;
        z-index: 10;
    }
</style>
<!-- Main content -->
<section class="content">
    <div class="box  box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Registro de Proveedores
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" id="container-box-datatable">
            <div>
                <p style="text-transform: uppercase;"><strong>Instrucciones: botones de envio de email:</strong></p>
                <p style="text-transform: uppercase;">
                    <span style="background-color: #2196f3; border-radius: 2px; color: #fff; padding: 8px;">1) Solicitud información de productos</span>
                    <span style="background-color: #F44336; border-radius: 2px; color: #fff; padding: 8px;">2) Rechazar proveedores y finalizar proceso</span>
                    <span style="float: right;">
                        <a href="<?php echo base_url('donwload') ?>" class="btn btn-success btn-sm" title="Descargar Excel de Proveedores" style="padding-left: 20px; padding-right: 20px; font-size: 14px;">
                            Descargar Proveedores
                        </a>
                    </span>
                </p>
            </div>
            <br />
            <div class="bar-disable">Enviando información al proveedor...</div>
            <table class="table table-responsive table-bordered table-hover" id="table-default">
                <thead>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                    <th>Rigistro Compañia</th>
                    <th>Contacto</th>
                    <th>Correo</th>
                    <th>Idioma</th>  
                    <th>País</th>  
                    <th style="width: 15%">Opciones</th>  
                </thead>
                <tfoot>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                    <th>Rigistro Compañia</th>
                    <th>Contacto</th>
                    <th>Correo</th>
                    <th>Idioma</th>  
                    <th>País</th>  
                    <th>Opciones</th>    
                </tfoot>
                <tbody>
                    <?php foreach ($registered_suppliers as $key => $value): ?>
                        <tr>
                            <td><?php echo date('d-m-Y H:i', strtotime($value['datestamp'])) ?></td>
                            <td><?php echo $value['company_name'] ?></td>
                            <td><?php echo $value['company_register'] ?></td>
                            <td><?php echo $value['contact_name'] ?></td>
                            <td><?php echo strtolower($value['email_address']) ?></td>
                            <td><?php echo $value['language'] ?></td>
                            <td><?php echo $value['country'] ?></td>
                            <td>
                                <div class="btn-group btn-group-justified">
                                    <div class="btn-group">
                                        <button type="button" <?php if($value['email_sending_status'] == 1){ echo 'style="background-color:#1976D2; border-color:#1976D2;"'; } ?> value="<?php echo $value['email_address'] ?>" id="<?php echo $value['id'] ?>" company_name="<?php echo $value['company_name'] ?>" language="<?php echo $value['language'] ?>" class="btn btn-primary btn-sm" title="<?php if($value['email_sending_status'] == 0){ echo 'Enviar'; } else{ echo 'Reenviar'; } ?>">
                                            <?php if ($value['email_sending_status'] == 0): ?>
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <?php else: ?>
                                                <i class="fa fa-share" aria-hidden="true"></i>
                                            <?php endif ?>
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" <?php if($value['sending_email_rejected_provider'] == 1){ echo 'style="color:#fff; background-color:#d32f2f; border-color:#d32f2f;"'; } else { echo 'style="background-color:#F44336; border-color:#F44336; color: #fff;"'; } ?> value="<?php echo $value['email_address'] ?>" id="<?php echo $value['id'] ?>" company_name="<?php echo $value['company_name'] ?>" language="<?php echo $value['language'] ?>" class="btn btn-sending-email-rejected-provider btn-block btn-sm" title="<?php if($value['sending_email_rejected_provider'] == 0){ echo 'Enviar | Proceso Rechazado'; } else{ echo 'Reenviar'; } ?>">
                                            <?php if ($value['sending_email_rejected_provider'] == 0): ?>
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <?php else: ?>
                                                <i class="fa fa-share" aria-hidden="true"></i>
                                            <?php endif ?>
                                        </button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function(){
        $('button.btn-sending-email-rejected-provider').on('click', function(){
            $('#container-box-datatable').css('color', '#e2e2e2');
            $('button.btn-sending-email-rejected-provider').css('opacity', '0.1');
            $('button.btn, a.btn').prop("disabled",true);
            $('.bar-disable').show(500);
            var email        = $(this).attr('value');
            var id           = $(this).attr('id');
            var language     = $(this).attr('language');
            var company_name = $(this).attr('company_name');
            $.ajax({
                url  : '<?php echo base_url('sending-email-rejected-provider') ?>',
                data : { id: id, email: email, company_name: company_name, language: language },
                type : 'POST',
                success : function(response){
                    console.log(response);
                },
                complete: function(){
                    setTimeout(function(){
                        $('#container-box-datatable').css('color', '#333333');
                        $('button.btn-sending-email-rejected-provider').css('opacity', '1');
                        $('button.btn, a.btn').prop("disabled",false);
                        $('button.btn-sending-email-rejected-provider').prop('title', 'Reenviar');
                        $('.bar-disable').hide(500);
                        $('button.btn-sending-email-rejected-provider[id=' + id + ']').css('background-color', '#d32f2f');
                        $('button.btn-sending-email-rejected-provider[id=' + id + ']').css('border-color', '#d32f2f');
                        $('button.btn-sending-email-rejected-provider[id=' + id + ']').empty().html('<i class="fa fa-share" aria-hidden="true"></i>');
                    }, 2500);
                },
                error : function(){
                    alert('Ha ocurrido un error...');
                }
            });
        });
    });
</script>