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
    <div class="box box-danger">
        <div class="box-header">
            <?php if ($this->uri->segment(2) == 'success'): ?>
                <div class="row" style="margin-top: 0.8em">
                    <div class="col-sm-12" style="margin-bottom: -1.5em">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4>
                                <i class="icon fa fa-check"></i> Exitoso
                            </h4>
                            El registro ingresado se ha almacenado correctamente.
                        </div>
                    </div>
                </div>
                <p></p>
            <?php endif ?>
            <?php if ($this->uri->segment(2) == 'success-delete'): ?>
                <div class="row" style="margin-top: 0.8em">
                    <div class="col-sm-12" style="margin-bottom: -1.5em">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4>
                                <i class="icon fa fa-trash"></i> Exitoso
                            </h4>
                            El registro seleccionado ha sido eliminado correctamente.
                        </div>
                    </div>
                </div>
                <p></p>
            <?php endif ?>
            <?php if ($this->uri->segment(2) == 'success-edit'): ?>
                <div class="row" style="margin-top: 0.8em">
                    <div class="col-sm-12" style="margin-bottom: -1.5em">
                        <div class="alert alert-info alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4>
                                <i class="icon fa fa-pencil"></i> Exitoso
                            </h4>
                            El registro seleccionado ha sido actualizado correctamente.
                        </div>
                    </div>
                </div>
                <p></p>
            <?php endif ?>
            <blockquote style="margin-bottom: 0">
                Listado de Proveedores <?php echo $this->uri->segment(1)  ?>
                <span style="float: right; margin-top: -4px;">
                    <a href="<?php echo base_url('partners/add') ?>" class="btn btn-primary" title="Agregar Proveedor">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </span>
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" id="container-box-datatable">
            <div class="bar-disable">Enviando información al proveedor...</div>
            <table class="table table-responsive table-bordered table-hover" id="table-default">
                <thead>
                    <th>Nombre</th>
                    <th>Pais</th>
                    <th>Tipo Dcto</th>
                    <th>Documento</th>
                    <th style="width: 15%">Opciones</th>
                </thead>
                <tfoot>
                    <th>Nombre</th>
                    <th>Pais</th>
                    <th>Tipo Dcto</th>
                    <th>Documento</th>
                    <th>Opciones</th>
                </tfoot>
                <tbody>
                    <?php foreach ($full_listing as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['name_partner'] ?></td>
                            <td><?php echo $value['name_country'] ?></td>
                            <td><?php echo $value['document_type'] ?></td>
                            <td><?php echo $value['id_partner'] ?></td>
                            <td>
                                <div class="btn-group btn-group-justified">
                                    <div class="btn-group">
                                        <button type="button" <?php if($value['email_sending_status'] == 1){ echo 'style="background-color:#4caf50; border-color:#4caf50;"'; } ?> value="<?php echo $value['email_partner'] ?>" id="<?php echo $value['id_partner'] ?>" company="<?php echo $value['name_partner'] ?>" language="<?php echo $value['language'] ?>" class="btn btn-primary btn-block btn-sm" title="<?php if($value['email_sending_status'] == 0){ echo 'Enviar'; } else{ echo 'Reenviar'; } ?>">
                                            <?php if ($value['email_sending_status'] == 0): ?>
                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>
                                            <?php else: ?>
                                                <i class="fa fa-share" aria-hidden="true"></i>
                                            <?php endif ?>
                                        </button>
                                    </div>
                                    <a href="<?php echo base_url('partners/edit/').$value['id_partner'] ?>" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger btn-delete btn-sm" id="<?php echo $value['id_partner'] ?>"><i class="fa fa-trash"></i></button>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
    <div id="dialog-confirm" title="¿Desea eliminar el registro?" style="display: none;">
        <p>
            <span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Estas seguro de seguir y ejecutar está acción, recuerda que no tienes ninguna opción para recuperar este registro
        </p>
    </div>

    </div>
</section>