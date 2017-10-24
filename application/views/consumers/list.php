<!-- Main content -->
<section class="content">
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
    <?php endif ?>
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
            <blockquote style="margin-bottom: 0">
                Listado completo de consumidores
                <span style="float: right; margin-top: -4px;">
                    <a href="<?php echo base_url('consumers/add') ?>" class="btn btn-primary btn-sm" title="Crear consumidor">
                        <i class="fa fa-plus-circle"></i>
                    </a>
                </span>
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" id="container-box-datatable">
            <table class="table table-responsive table-bordered table-hover" id="table-default">
                <thead>
                    <th>Nombres y Apellidos</th>
                    <th>Correo Electrónico</th>  
                    <th>Estado</th>
                </thead>
                <tfoot>
                    <th>Nombres y Apellidos</th>
                    <th>Correo Electrónico</th>  
                    <th>Estado</th>
                </tfoot>
                <tbody>
                    <?php foreach ($full_listing as $key => $value): ?>
                        <tr>
                            <td><a href="<?php echo base_url('view-consumer-profile/').$value['id_client'] ?>"><?php echo $value['name'].' '.$value['last_name'] ?></a></td>
                            <td><?php echo $value['email'] ?></td>
                            <td>
                                <?php 
                                    if ($value['status'] == 1) {
                                        echo 'Activo';
                                    } else {
                                        echo 'Inactivo';
                                    }
                                ?>
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
<!-- /.content -->   