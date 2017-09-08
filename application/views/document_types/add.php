<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Agregar Tipo de Documento
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('document_types/add') ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="document_type">Tipo Documento</label>
                            <input type="text" name="document_type" id="document_type" class="form-control" placeholder="Ingresa Tipo de Documento" value="<?php echo set_value('document_type') ?>" required="" />
                            <?php echo form_error('document_type') ?>
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