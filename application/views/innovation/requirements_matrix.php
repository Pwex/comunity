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
                <?php if (count($requirements_matrix) > 0): ?>
                    <span style="float: right; margin-top: -4px;">
                        <a href="<?php echo base_url('donwload-requirements') ?>" class="btn btn-success btn-sm" title="Descargar Excel de Proveedores">
                            Excel Matriz Requerimientos
                        </a>
                    </span>
                <?php endif ?>
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" id="container-box-datatable">
            <div class="bar-disable">Enviando información al proveedor...</div>
            <table class="table table-responsive table-bordered table-hover" id="table-default">
                <thead>
                    <th>Proveedor</th>  
                    <th>Correo electronico</th>  
                    <th>Productos</th>  
                    <th>Categoría</th> 
                    <th style="width: 15%" class="th-option">Opciones</th> 
                </thead>
                <tfoot>
                    <th>Proveedor</th>  
                    <th>Correo electronico</th>  
                    <th>Productos</th>  
                    <th>Categoría</th>     
                    <th>Opciones</th>
                </tfoot>
                <tbody>
                    <?php foreach ($requirements_matrix as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['company_name'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['product_name'] ?></td>
                            <td><?php echo $value['categories'] ?></td>
                            <td class="th-option">
                                <div class="btn-group btn-group-justified">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-default btn-sm btn-view-requirements" data-toggle="modal" data-target="#information-requirements-matrix" id="<?php echo $value['id'] ?>" title="Ver información">
                                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                        </button>
                                    </div>
                                    <div class="btn-group">
                                        <button type="button" <?php if($value['email_sending_status'] == 1){ echo 'style="background-color:#4caf50; border-color:#4caf50;"'; } ?> value="<?php echo $value['email'] ?>" id="<?php echo $value['id'] ?>" product_name="<?php echo $value['product_name'] ?>" company_name="<?php echo $value['company_name'] ?>" language="<?php echo $value['language'] ?>" class="btn btn-primary btn-block btn-sm" title="<?php if($value['email_sending_status'] == 0){ echo 'Enviar'; } else{ echo 'Reenviar'; } ?>">
                                            <?php if ($value['email_sending_status'] == 0): ?>
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
<!-- /.content -->   
<!-- Modal -->
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
            <div class="modal-body" style="padding-top: 50px; padding-bottom: 50px">
                
            </div>
        </div>
    </div>
</div>