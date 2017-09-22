<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Registrar Encuesta</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('register_consumer/poll') ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name_country">Aspectos más importantes para mejorar su bienestar?</label>
                            <input type="text" name="name_country" id="name_country" class="form-control" value="<?php echo set_value('name_country') ?>" required="" />
                            <?php echo form_error('name_country') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="form-group">
                            <label for="coin">Moneda</label>
                            <input type="text" name="coin" id="coin" class="form-control" value="<?php echo set_value('coin') ?>" required="" />
                            <?php echo form_error('coin') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="input-group">
                            <input type="number" name="tax_iva" id="tax_iva" class="form-control" value="<?php echo set_value('tax_iva') ?>" required="" />
                            <span class="input-group-addon"><i class="fa fa-percent"></i> Iva</span>
                            <?php echo form_error('tax_iva') ?>
                        </div>
                    </div>
                </div><br />
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