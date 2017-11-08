<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Listado de Productos
                <span style="float: right; margin-top: -4px;">
                    <a href="<?php echo base_url('products/add') ?>" class="btn btn-primary" title="Agregar Producto">
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
                    <th>EAN 13</th>
                    <th>Nombre</th>
                    <th>Categoría Principal</th>
                    <th>Categoría Padre</th>  
                    <th>Estatus</th>  
                    <th style="width: 12%">Opciones</th>
                </thead>
                <tfoot>
                    <th>Código</th>
                    <th>EAN 13</th>
                    <th>Nombre</th>
                    <th>Categoría Principal</th>
                    <th>Categoría Padre</th>  
                    <th>Estatus</th>  
                    <th>Opciones</th>
                </tfoot>
                <tbody>
                    <?php foreach ($full_listing as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['id_product'] ?></td>
                            <td><?php echo $value['ean13_product'] ?></td>
                            <td><?php echo $value['name_product'] ?></td>
                            <td><?php echo $value['name_catalogue'] ?></td>
                            <td><?php echo $value['name_category'] ?></td>
                            <td>
                                <?php 
                                    if ($value['enabled_product'] == 1) {
                                        echo "Activo"; 
                                    } else {
                                        echo "Inactivo";
                                    } 
                                ?>
                            </td>
                            <td>
                                <div class="btn-group btn-group-justified">
                                    <a href="<?php echo base_url('products/edit/').$value['id_product'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-danger btn-delete btn-sm" id="<?php echo $value['id_product'] ?>"><i class="fa fa-trash"></i></button>
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
<!-- /.content -->
<?php if ($this->uri->segment(2) == 'success' or $this->uri->segment(2) == 'success-edit' or $this->uri->segment(2) == 'success-delete'): ?>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/alertify/css/alertify.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/alertify/css/themes/bootstrap.min.css') ?>">
    <style type="text/css">
        .alertify-notifier .ajs-message.ajs-warning {
          width: 350px;
          font-weight: bold;
        }
    </style>
    <script type="text/javascript" src="<?php echo base_url('assets/plugins/alertify/alertify.min.js') ?>"></script>
    <?php if ($this->uri->segment(2) == 'success'): ?>
        <script type="text/javascript">
            alertify.set('notifier','position', 'bottom-center');
            alertify.warning('<i class="fa fa-check-square-o fa-lg" aria-hidden="true"></i> | Registro guardado correctamente.');
        </script>
    <?php endif ?>
    <?php if ($this->uri->segment(2) == 'success-edit'): ?>
        <script type="text/javascript">
            alertify.set('notifier','position', 'bottom-center');
            alertify.warning('<i class="fa fa-pencil-square fa-lg" aria-hidden="true"></i> | Registro actualizado correctamente.');
        </script>
    <?php endif ?>
    <?php if ($this->uri->segment(2) == 'success-delete'): ?>
        <script type="text/javascript">
            alertify.set('notifier','position', 'bottom-center');
            alertify.warning('<i class="fa fa-trash fa-lg" aria-hidden="true"></i> | Registro eliminado correctamente.');
        </script>
    <?php endif ?>
<?php endif ?>