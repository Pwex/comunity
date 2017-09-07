<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Agregar Producto</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('products/add') ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="id_product">Código</label>
                            <input type="text" name="id_product" id="id_product" class="form-control" placeholder="Ingresar código de producto" value="<?php echo set_value('id_product') ?>" required="" />
                            <?php echo form_error('id_product') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name_product">Producto</label>
                            <input type="text" name="name_product" id="name_product" class="form-control" placeholder="Ingresar nombre de producto" value="<?php echo set_value('name_product') ?>" required="" />
                            <?php echo form_error('name_product') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="ean13_product">Descripción</label>
                            <input type="text" name="description_product" id="description_product" class="form-control" placeholder="Ingresar descripcion de producto" value="<?php echo set_value('description_product') ?>" />
                            <?php echo form_error('description_product') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="ean13_product">EAN 13</label>
                            <input type="text" name="ean13_product" id="ean13_product" class="form-control" placeholder="Ingresar EAN13 de producto" value="<?php echo set_value('ean13_product') ?>" required="" />
                            <?php echo form_error('ean13_product') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_typeinventory">Tipo Inventario</label>
                            <?php echo form_dropdown('id_typeinventory', $typesinventory, set_value('id_typeinventory'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('id_typeinventory') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_category">Categoría</label>
                            <?php echo form_dropdown('id_category', $category, set_value('id_category'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('id_category') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="id_benefit">Beneficios</label>
                            <?php echo form_dropdown('id_benefit', $benefits, set_value('id_benefit'), 'class="form-control select2" required="" multiple="multiple" data-placeholder="Seleccionar beneficios"'); ?>
                            <?php echo form_error('id_benefit') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="id_component">Componentes</label>
                            <?php echo form_dropdown('id_component', $components, set_value('id_component'), 'class="form-control select2" required="" multiple="multiple" data-placeholder="Seleccionar componentes"'); ?>
                            <?php echo form_error('id_component') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="reset"  class="btn btn-default">Cancelar</button>
                        </div>
                    </div>
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
</section>




<!-- /.content -->   