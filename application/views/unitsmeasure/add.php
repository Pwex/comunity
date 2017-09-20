<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Crear Unidad de Medida
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('unitsmeasure/add') ?>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="unit_measure">Unidad medida</label>
                            <input type="text" name="unit_measure" id="unit_measure" class="form-control" value="<?php echo set_value('unit_measure') ?>" required="" />
                            <?php echo form_error('unit_measure') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="abbreviation">Abreviatura</label>
                            <input type="text" name="abbreviation" id="abbreviation" class="form-control" value="<?php echo set_value('abbreviation') ?>" required="" />
                            <?php echo form_error('abbreviation') ?>
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