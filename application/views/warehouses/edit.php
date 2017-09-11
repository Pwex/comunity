<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Editar Bodega</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('warehouses/edit/'.$this->uri->segment(3)) ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name_warehouse">Nombre Bodega</label>
                            <input type="text" name="name_warehouse" id="name_warehouse" class="form-control" value="<?php echo set_value('name_warehouse', $warehouse[0]["name_warehouse"]) ?>" required="" />
                            <?php echo form_error('name_warehouse') ?>
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