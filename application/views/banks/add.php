<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Crear Banco
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('banks/add') ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name_bank">Banco</label>
                            <input type="text" name="name_bank" id="name_bank" class="form-control" value="<?php echo set_value('name_bank') ?>" required="" />
                            <?php echo form_error('name_bank') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_country">País</label>
                            <?php echo form_dropdown('id_country', $countrys, set_value('id_country'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('id_country') ?>
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