<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Crear Beneficio
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('benefits/add') ?>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="name_benefit">Beneficio</label>
                            <input type="text" name="name_benefit" id="name_benefit" class="form-control" value="<?php echo set_value('name_benefit') ?>" required="" />
                            <?php echo form_error('name_benefit') ?>
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