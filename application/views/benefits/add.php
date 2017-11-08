<?php echo form_open('benefits/add', 'autocomplete="off"') ?>
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Crear Beneficio
                <div class="col-sm-6 col-xs-6 col-md-3 pull-right">
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-default" data-toggle="tooltip" title="Almacenar información"><i class="fa fa-check" aria-hidden="true"></i></button>
                        </div>
                        <div class="btn-group">
                            <button type="reset"  class="btn btn-default" data-toggle="tooltip" title="Cancelar información"><i class="fa fa-ban" aria-hidden="true"></i></button>
                        </div>
                        <a href="<?php echo base_url('benefits') ?>" class="btn btn-default" data-toggle="tooltip" title="Listado de Beneficios"><i class="fa fa-table" aria-hidden="true"></i></a>
                    </div>
                </div>
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name_benefit">Beneficio</label>
                        <input type="text" name="name_benefit" id="name_benefit" class="form-control" value="<?php echo set_value('name_benefit') ?>" required="" />
                        <?php echo form_error('name_benefit') ?>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</section>
<!-- /.content -->   