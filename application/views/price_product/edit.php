<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Editar Precios de Productos
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('price-product/edit/'.$this->uri->segment(3)) ?>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="id_list_price">Tipo de cuenta</label>
                            <?php echo form_dropdown('id_list_price', $list_price, set_value('id_list_price', $information_price_product[0]['id_list_price']), 'class="form-control select2" required=""'); ?>
                            <?php echo form_error('id_list_price') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_country_price">País</label>
                            <?php echo form_dropdown('id_country_price', $country, set_value('id_country_price', $information_price_product[0]['id_country_price']), 'class="form-control select2" required=""'); ?>
                            <?php echo form_error('id_country_price') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="id_product_price">Producto</label>
                            <?php echo form_dropdown('id_product_price', $products, set_value('id_product_price', $information_price_product[0]['id_product_price']), 'class="form-control select2" required=""'); ?>
                            <?php echo form_error('id_product_price') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="price">Precio</label>
                            <input type="number" name="price" id="price" class="form-control" value="<?php echo set_value('price', $information_price_product[0]['price']) ?>" required="" />
                            <?php echo form_error('price') ?>
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