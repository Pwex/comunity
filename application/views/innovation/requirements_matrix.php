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
                Matriz de Requerimientos
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" id="container-box-datatable">
            <div>
                <p style="text-transform: uppercase;"><strong>Instrucciones: botones de envio de email:</strong></p>
                <p style="text-transform: uppercase;">
                    <span style="background-color: #2196f3; border-radius: 2px; color: #fff; padding: 8px;">1) Solicitud de Muestas</span>
                    <span style="background-color: #ffb031; border-radius: 2px; color: #fff; padding: 8px;">2) Visualización de información</span>
                    <span style="background-color: #F44336; border-radius: 2px; color: #fff; padding: 8px;">3) Finalizar Proceso de Muestras</span>
                    <?php if (count($requirements_matrix) > 0): ?>
                        <span style="float: right;">
                            <a href="<?php echo base_url('donwload-requirements') ?>" class="btn btn-success btn-sm" title="Descargar Excel Matriz Requerimientos" style="padding-left: 20px; padding-right: 20px; font-size: 14px;">
                                Excel Matriz Requerimientos
                            </a>
                        </span>
                    <?php endif ?>
                </p>
            </div>
            <br />
            <div class="bar-disable">Enviando información al proveedor...</div>
            <table class="table table-responsive table-bordered table-hover" id="table-default">
                <thead>
                    <th>Fecha</th>  
                    <th>Proveedor</th>  
                    <th>Correo electronico</th>  
                    <th>Productos</th>  
                    <th>Categoría</th> 
                    <th>País</th> 
                    <th style="width: 20%" class="th-option">Opciones</th> 
                </thead>
                <tfoot>
                    <th>Fecha</th> 
                    <th>Proveedor</th>  
                    <th>Correo electronico</th>  
                    <th>Productos</th>  
                    <th>Categoría</th>     
                    <th>Idioma</th>      
                    <th>Opciones</th>
                </tfoot>
                <tbody>
                    <?php foreach ($requirements_matrix as $key => $value): ?>
                        <tr>
                            <td><?php echo date('d-m-Y H:i', strtotime($value['creation_date'])) ?></td>
                            <td><?php echo $value['company_name'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['product_name'] ?></td>
                            <td><?php echo $value['categories'] ?></td>
                            <td><?php echo $value['language'] ?></td>
                            <td class="th-option">
                                <div class="btn-group btn-group-justified">
                                    <div class="btn-group">
                                        <button type="button" <?php if($value['email_sending_status'] == 1){ echo 'style="background-color:#1976D2; border-color:#1976D2;"'; } ?> value="<?php echo $value['email'] ?>" id="<?php echo $value['id'] ?>" product_name="<?php echo $value['product_name'] ?>" company_name="<?php echo $value['company_name'] ?>" language="<?php echo $value['language'] ?>" category="<?php echo $value['categories'] ?>" class="btn btn-primary btn-block btn-sm" title="<?php if($value['email_sending_status'] == 0){ echo 'Enviar'; } else{ echo 'Reenviar'; } ?>">
                                            <?php if ($value['email_sending_status'] == 0): ?>
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <?php else: ?>
                                                <i class="fa fa-share" aria-hidden="true"></i>
                                            <?php endif ?>
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-warning btn-sm btn-view-requirements" data-toggle="modal" data-target="#information-requirements-matrix" id="<?php echo $value['id'] ?>" title="Ver información">
                                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" <?php if($value['shipping_email_supplier_rejection_matrix'] == 1){ echo 'style="color:#fff; background-color:#d32f2f; border-color:#d32f2f;"'; } else { echo 'style="background-color:#F44336; border-color:#F44336; color: #fff;"'; } ?> value="<?php echo $value['email'] ?>" id="<?php echo $value['id'] ?>" product_name="<?php echo $value['product_name'] ?>" company_name="<?php echo $value['company_name'] ?>" language="<?php echo $value['language'] ?>" category="<?php echo $value['categories'] ?>" class="btn btn-shipping-email-supplier-rejection-matrix btn-block btn-sm" title="<?php if($value['shipping_email_supplier_rejection_matrix'] == 0){ echo 'Enviar | Finalizar Proceso'; } else{ echo 'Reenviar'; } ?>">
                                            <?php if ($value['shipping_email_supplier_rejection_matrix'] == 0): ?>
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
        $('button.btn-shipping-email-supplier-rejection-matrix').on('click', function(){
            $('#container-box-datatable').css('color', '#e2e2e2');
            $('button.btn-shipping-email-supplier-rejection-matrix').css('opacity', '0.1');
            $('button.btn, a.btn').prop("disabled",true);
            $('.bar-disable').show(500);
            var email        = $(this).attr('value');
            var id           = $(this).attr('id');
            var language     = $(this).attr('language');
            var company_name = $(this).attr('company_name');
            $.ajax({
                url  : '<?php echo base_url('shipping-email-supplier-rejection-matrix') ?>',
                data : { id: id, email: email, company_name: company_name, language: language },
                type : 'POST',
                success : function(response){
                    console.log(response);
                },
                complete: function(){
                    setTimeout(function(){
                        $('#container-box-datatable').css('color', '#333333');
                        $('button.btn-shipping-email-supplier-rejection-matrix').css('opacity', '1');
                        $('button.btn, a.btn').prop("disabled",false);
                        $('button.btn-shipping-email-supplier-rejection-matrix').prop('title', 'Reenviar');
                        $('.bar-disable').hide(500);
                        $('button.btn-shipping-email-supplier-rejection-matrix[id=' + id + ']').css('background-color', '#d32f2f');
                        $('button.btn-shipping-email-supplier-rejection-matrix[id=' + id + ']').css('border-color', '#d32f2f');
                        $('button.btn-shipping-email-supplier-rejection-matrix[id=' + id + ']').empty().html('<i class="fa fa-share" aria-hidden="true"></i>');
                    }, 2500);
                },
                error : function(){
                    alert('Ha ocurrido un error...');
                }
            });
        });
    });
</script>   
<style type="text/css">
    ::-webkit-scrollbar {
      width: 1em;
      height: 1em;
    }

    ::-webkit-scrollbar-thumb {
      background: slategray;
    }

    ::-webkit-scrollbar-track {
      background: #b8c0c8;
    }
</style>
<div id="information-requirements-matrix" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title" style="font-family: 'century gothic'; font-size: 18px; ">Matriz de Requerimientos</h4>
            </div>
            <div class="modal-body" style="padding-top: 20px; padding-bottom: 130px">
                
            </div>
        </div>
    </div>
</div>