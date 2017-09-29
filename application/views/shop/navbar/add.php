<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Crear Menú
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('shop-layout-navbar/add') ?>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="navbar">Nombre</label>
                            <input type="text" name="navbar" id="navbar" class="form-control" value="<?php echo set_value('navbar') ?>" required="" />
                            <?php echo form_error('navbar') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="id_position_navbar">Posición</label>
                            <?php echo form_dropdown('id_position_navbar', $nav_position, set_value('id_position_navbar'), 'class="form-control"') ?>
                            <?php echo form_error('id_position_navbar') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="url">Url</label>
                            <input type="url" name="url" id="url" class="form-control" value="<?php echo set_value('url'); ?>" required="" />
                            <?php echo form_error('url') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="status">Estatus</label>
                            <?php echo form_dropdown('status', $nav_status, set_value('status'), 'class="form-control"') ?>
                            <?php echo form_error('status') ?>
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