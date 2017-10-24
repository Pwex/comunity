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
                <span style="float: right; margin-top: -4px;">
                    <a href="<?php echo base_url('donwload') ?>" class="btn btn-success btn-sm" title="Descargar Excel de Proveedores">
                        Excel de Proveedores
                    </a>
                </span>
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" id="container-box-datatable">
            <div class="bar-disable">Enviando información al proveedor...</div>
            <table class="table table-responsive table-bordered table-hover" id="table-default">
                <thead>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                    <th>Contacto</th>
                    <th>Correo</th>
                    <th>Idioma</th>  
                    <th>País</th>  
                    <th>Opciones</th>  
                </thead>
                <tfoot>
                    <th>Fecha</th>
                    <th>Proveedor</th>
                    <th>Contacto</th>
                    <th>Correo</th>
                    <th>Idioma</th>  
                    <th>País</th>  
                    <th>Opciones</th>    
                </tfoot>
                <tbody>
                    <?php foreach ($registered_suppliers as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['datestamp'] ?></td>
                            <td><?php echo $value['company_name'] ?></td>
                            <td><?php echo $value['contact_name'] ?></td>
                            <td><?php echo strtolower($value['email_address']) ?></td>
                            <td><?php echo $value['language'] ?></td>
                            <td><?php echo $value['country'] ?></td>
                            <td>
                                <button type="button" <?php if($value['email_sending_status'] == 1){ echo 'style="background-color:#4caf50; border-color:#4caf50;"'; } ?> value="<?php echo $value['email_address'] ?>" id="<?php echo $value['id'] ?>" company_name="<?php echo $value['company_name'] ?>" language="<?php echo $value['language'] ?>" class="btn btn-primary btn-block btn-sm" title="<?php if($value['email_sending_status'] == 0){ echo 'Enviar'; } else{ echo 'Reenviar'; } ?>">
                                    <?php if ($value['email_sending_status'] == 0): ?>
                                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                    <?php else: ?>
                                        <i class="fa fa-share" aria-hidden="true"></i>
                                    <?php endif ?>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<!-- /.content -->   