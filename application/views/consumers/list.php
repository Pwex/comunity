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
                    <th>Nombres</th>
                    <th>Email</th>
                    <th>Pais</th>
                    <th>Opciones</th>  
                </thead>
                <tfoot>
                    <th>Nombres</th>
                    <th>Email</th>
                    <th>Pais</th>
                    <th>Opciones</th>  
                </tfoot>
                <tbody>
                    <?php foreach ($full_listing as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['name'].' '.$value['last_name'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td><?php echo $value['name_country'] ?></td>
                            <td>
                                <a href="<?php echo base_url('consumers/poll/').$value['id_client'] ?>" class="btn btn-info btn-sm">
                                    <i class="fa fa-book"></i>
                                </a>
                                <a href="<?php echo base_url('consumers/measuring/').$value['id_client'] ?>" class="btn btn-info btn-sm">
                                    <i class="fa fa-heartbeat"></i>
                                </a>
                                <a href="<?php echo base_url('consumers/edit/').$value['id_client'] ?>" class="btn btn-warning btn-sm">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-delete btn-sm" id="<?php echo $value['id_client'] ?>">
                                    <i class="fa fa-trash"></i>
                                </button>
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