<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Crear Filtros y Búsqueda
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('shop-layout-filter/add') ?>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_catalogue">Categoría Principal</label>
                            <?php echo form_dropdown('id_catalogue', $list_catalogue, set_value('id_catalogue'), 'class="form-control" id="id_catalogue"'); ?>
                            <?php echo form_error('id_catalogue') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="name_filter">Filtro de Búsqueda</label>
                            <input type="text" name="name_filter" id="name_filter" class="form-control" value="<?php echo set_value('name_filter') ?>" required="" />
                            <?php echo form_error('name_filter') ?>
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