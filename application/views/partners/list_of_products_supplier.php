<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Listado de Productos
                <span style="float: right;">
                    <?php echo $get_name_partner[0]['name_partner'] ?> 
                    <i class="fa fa-building-o" aria-hidden="true"></i>
                </span>
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" id="container-box-datatable">
            <table class="table table-responsive table-bordered table-hover" id="table-default">
                <thead>
                    <th>Producto</th>
                    <th>Bodega</th>  
                    <th>Rack</th>
                    <th>Ubicación</th>
                    <th>Stock</th>
                    <th>Ranking</th>
                    <th style="width: 15%">Opciones</th>
                </thead>
                <tfoot>
                    <th>Producto</th>
                    <th>Bodega</th>  
                    <th>Rack</th>
                    <th>Ubicación</th>
                    <th>Stock</th>
                    <th>Ranking</th>
                    <th>Opciones</th>
                </tfoot>
                <tbody>
                    <?php foreach ($list_of_products_supplier as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['name_product'] ?></td>
                            <td>Panama</td>
                            <td>5</td>
                            <td>12</td>
                            <td>25</td>
                            <td>45</td>
                            <td>
                                <div class="btn-group btn-group-justified">
                                    <a href="#" class="btn btn-default btn-sm"><i class="fa fa-search"></i></a>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
    </div>
</section>
<!-- /.content -->   