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
    <div style="position: absolute; z-index: 1; right: 5px; top: 139px;">
        <a href="<?php echo base_url('consumers/add') ?>" class="btn btn-link" title="Crear consumidor"><i class="fa fa-plus-circle fa-3x"></i></a>
    </div>
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
                            <td><?php echo date('d-m-Y', strtotime($value['date_register'])) ?></td>
                            <td>Activo</td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
</section>
<!-- /.content -->   