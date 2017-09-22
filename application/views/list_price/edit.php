<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Editar Listado de Precios
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('list-price/edit/'.$this->uri->segment(3)) ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name_list_price">Nombre</label>
                            <input type="text" name="name_list_price" id="name_list_price" class="form-control" value="<?php echo set_value('name_list_price', $information_list_price[0]["name_list_price"]) ?>" required="" />
                            <?php echo form_error('name_list_price') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="description_list_price">Descripción</label>
                            <input type="text" name="description_list_price" id="description_list_price" class="form-control" value="<?php echo set_value('description_list_price', $information_list_price[0]["description_list_price"]) ?>" required="" />
                            <?php echo form_error('description_list_price') ?>
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