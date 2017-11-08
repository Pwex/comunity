<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <?php if ($this->uri->segment(2) == 'success'): ?>
                <div class="row">
                    <div class="col-sm-12">
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
                <div class="row">
                    <div class="col-sm-12">
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
                <div class="row">
                    <div class="col-sm-12">
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
            <blockquote style="margin-bottom: 0; padding-right: 0">
                Listado de consumidores
                <span style="position: absolute; top: 17px; right: 8px;">
                    <a href="<?php echo base_url('consumers/add') ?>" class="btn btn-primary" title="Crear consumidor" style="padding: 5px 10px;"><i class="fa fa-plus-circle" style="font-size: 24px"></i></a>
                </span>
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" id="container-box-datatable">
            <table class="table table-responsive table-bordered table-hover" id="table-default">
                <thead>
                    <th>Nombres y Apellidos</th>
                    <th>Fecha Registro</th>  
                    <th>Estado</th>
                </thead>
                <tfoot>
                    <th>Nombres y Apellidos</th>
                    <th>Fecha Registro</th>  
                    <th>Estado</th>
                </tfoot>
                <tbody>
                    <?php foreach ($full_listing as $key => $value): ?>
                        <tr>
                            <td><a href="<?php echo base_url('view-consumer-profile/').$value['id_client'] ?>"><?php echo $value['name'].' '.$value['last_name'] ?></a></td>
                            <td><?php echo date('d-m-Y H:i:s', strtotime($value['date_register'])) ?></td>
                            <td>Activo</td>
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
<!-- /.content -->   