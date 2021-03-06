<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Editar Presentaciones
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('presentation/edit/'.$this->uri->segment(3)) ?>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="name_presentation">Presentación</label>
                            <input type="text" name="name_presentation" id="name_presentation" class="form-control" value="<?php echo set_value('name_presentation', $information_presentation[0]["name_presentation"]) ?>" required="" />
                            <?php echo form_error('name_presentation') ?>
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