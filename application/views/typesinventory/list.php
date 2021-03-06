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
                Listado de Tipos Inventario
                <span style="float: right; margin-top: -4px;">
                    <a href="<?php echo base_url('typesinventory/add') ?>" class="btn btn-primary" title="Agregar Tipo Inventario">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </span>
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" id="container-box-datatable">
            <table class="table table-responsive table-bordered table-hover" id="table-default">
                <thead>
                    <th>Código</th>
                    <th>Tipo Inventario</th>
                    <th style="width: 15%">Opciones</th>  
                </thead>
                <tfoot>
                    <th>Código</th>
                    <th>Tipo Inventario</th>
                    <th>Opciones</th>  
                </tfoot>
                <tbody>
                    <?php foreach ($full_listing as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['id_typeinventory'] ?></td>
                            <td><?php echo $value['type_inventory'] ?></td>
                            <td>
                                <div class="btn-group btn-group-justified">  
                                    <a href="<?php echo base_url('typesinventory/edit/').$value['id_typeinventory'] ?>" class="btn btn-warning btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger btn-delete btn-sm" id="<?php echo $value['id_typeinventory'] ?>">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </div>
                                </div>
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