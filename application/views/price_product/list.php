<!-- Main content -->
<section class="content">
    <div class="box">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Listado de Precios de Productos
                <span style="float: right;">
                    <a href="<?php echo base_url('price-product/add') ?>" class="btn btn-primary" title="Agregar Precios de Productos">
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
                    <th>Productos</th>
                    <th>Cuenta</th>
                    <th>Precio</th>
                    <th>País</th>
                    <th>Opciones</th>  
                </thead>
                <tbody>
                    <?php foreach ($full_listing as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['id_price_product'] ?></td>
                            <td><?php echo $value['name_product'] ?></td>
                            <td><?php echo $value['name_list_price'] ?></td>
                            <td><?php echo number_format($value['price'], '2', ',', '.').' '.$value['coin'] ?></td>
                            <td><?php echo $value['name_country'] ?></td>
                            <td>
                                <a href="<?php echo base_url('price-product/edit/').$value['id_price_product'] ?>" class="btn btn-warning">
                                    <i class="fa fa-pencil"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-delete" id="<?php echo $value['id_price_product'] ?>">
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