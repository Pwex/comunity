<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Listado de Tipos de Proveedor
                <span style="float: right;">
                    <a href="<?php echo base_url('partner_types/add') ?>" class="btn btn-primary" title="Agregar Tipo Proveedor">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </span>
            </blockquote>
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
            <?php endif ?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <table class="table table-responsive table-bordered" id="table-default">
                <thead>
                    <th>Código</th>
                    <th>Tipo Proveedor</th>
                    <th>Opciones</th>  
                </thead>
                <tbody>
                    <?php foreach ($full_listing as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['id_partner_type'] ?></td>
                            <td><?php echo $value['partner_type'] ?></td>
                            <td>
                                <a href="<?php echo base_url('partner_types/edit/').$value['id_partner_type'] ?>" class="btn btn-warning">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-delete" id="<?php echo $value['id_partner_type'] ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
            <div id="dialog-confirm" title="¿Desea eliminar el registro?" style="display: none;">
                <p>
                    <span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>
                    Estas seguro de seguir y ejecutar está acción, recuerda que no tienes ninguna opción para recuperar este registro
                </p>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->   