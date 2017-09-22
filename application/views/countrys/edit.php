<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Editar Pais</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('countrys/edit/'.$this->uri->segment(3)) ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Pais</label>
                            <input type="text" name="name_country" id="name_country" class="form-control" value="<?php echo set_value('name_country', $information_country[0]["name_country"]) ?>" required="" />
                            <?php echo form_error('name') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="coin">Moneda</label>
                            <input type="text" name="coin" id="coin" class="form-control" value="<?php echo set_value('coin', $information_country[0]["coin"]) ?>" required="" />
                            <?php echo form_error('coin') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="input-group">
                            <input type="number" name="tax_iva" id="tax_iva" class="form-control" value="<?php echo set_value('tax_iva', $information_country[0]["tax_iva"]) ?>" required="" />
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