<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Crear Tipo Movimiento
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('movement_types/add') ?>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_movement_type">Código tipo movimiento</label>
                            <input type="text" name="id_movement_type" id="id_movement_type" class="form-control" value="<?php echo set_value('id_movement_type') ?>" required="" />
                            <?php echo form_error('id_movement_type') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="movement_type">Tipo movimiento</label>
                            <input type="text" name="movement_type" id="movement_type" class="form-control" value="<?php echo set_value('movement_type') ?>" required="" />
                            <?php echo form_error('movement_type') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="module">Módulo</label>
                            <?php echo form_dropdown('module', $modules, set_value('module'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('module') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="affects_inventory">Afecta Inventario</label>
                            <label class="form-select-checkbox"><?php echo form_checkbox('availability[]', 1, 'class="form-checkbox minimal-red"') ?> </label>
                            <?php echo form_error('affects_inventory') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="input_output">Tipo</label>

                            <label class="iradio_minimal-red">
                                <?php echo form_radio('input_output[]', 0, TRUE, 'class="form-checkbox minimal-red"') ?> 
                                Entrada
                            </label>
                            <label class="iradio_minimal-red">
                                <?php echo form_radio('input_output[]', 1, set_value('input_output'), 'class="form-checkbox minimal-red"') ?> 
                                Salida
                            </label>

                            <?php echo form_error('input_output') ?>
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