<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Editar Tipo Proveedor
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('partner_types/edit/'.$this->uri->segment(3)) ?>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="name">Tipo Proveedor</label>
                            <input type="text" name="partner_type" id="partner_type" class="form-control" value="<?php echo set_value('partner_type', $information_partner_type[0]["partner_type"]) ?>" required="" />
                            <?php echo form_error('name') ?>
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