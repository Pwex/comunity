<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Editar Parámetros de Filtro
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('shop-layout-filter-item/edit/'.$this->uri->segment(3)) ?>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_filter_categories">Filtro</label>
                            <?php echo form_dropdown('id_filter_categories', $list_filter, set_value('id_filter_categories', $information_edit_filter_item[0]['id_filter_categories']), 'class="form-control" id="id_filter_categories"') ?>
                            <p>Seleccione un filtro para crear el parámetro</p>
                            <?php echo form_error('id_filter_categories') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="settings">Parámetro</label>
                            <input type="text" name="settings" id="settings" class="form-control" value="<?php echo set_value('settings', $information_edit_filter_item[0]['settings']) ?>" required="" />
                            <?php echo form_error('settings') ?>
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