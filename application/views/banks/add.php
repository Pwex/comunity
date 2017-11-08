<?php echo form_open('banks/add', 'autocomplete="off"') ?>
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Crear Banco
                <div class="col-sm-6 col-xs-6 col-md-3 pull-right">
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-default" data-toggle="tooltip" title="Almacenar información"><i class="fa fa-check" aria-hidden="true"></i></button>
                        </div>
                        <div class="btn-group">
                            <button type="reset"  class="btn btn-default" data-toggle="tooltip" title="Cancelar información"><i class="fa fa-ban" aria-hidden="true"></i></button>
                        </div>
                        <a href="<?php echo base_url('banks') ?>" class="btn btn-default" data-toggle="tooltip" title="Listado de Bancos"><i class="fa fa-table" aria-hidden="true"></i></a>
                    </div>
                </div>
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
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
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name_bank">Banco</label>
                            <input type="text" name="name_bank" id="name_bank" class="form-control" value="<?php echo set_value('name_bank') ?>" required="" />
                            <?php echo form_error('name_bank') ?>
                        </div>
                    </div>
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
</section>