<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Crear Bodega</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('warehouses/add') ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name_warehouse">Nombre Bodega</label>
                            <input type="text" name="name_warehouse" id="name_warehouse" class="form-control" value="<?php echo set_value('name_warehouse') ?>" required="" />
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