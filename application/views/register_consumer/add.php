<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Agregar consumidor</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('register_consumer/add') ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" value="<?php echo set_value('email') ?>" required="" />
                            <?php echo form_error('email') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Nombres</label>
                            <input type="text" name="name" id="name" class="form-control" value="<?php echo set_value('name') ?>" required="" />
                            <?php echo form_error('name') ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="last_name">Apellidos</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" value="<?php echo set_value('last_name') ?>" required="" />
                            <?php echo form_error('last_name') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_document_type">Tipo Documento</label>
                            <?php echo form_dropdown('id_document_type', $document_types, set_value('id_document_type'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('id_document_type') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_partner">Número Documento</label>
                            <input type="text" name="id_partner" id="id_document" class="form-control" value="<?php echo set_value('id_partner') ?>" required="" />
                            <?php echo form_error('id_partner') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_country">País</label>
                            <?php echo form_dropdown('id_country', $countrys, set_value('id_country'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('id_country') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_country">Ciudad</label>
                            <?php echo form_dropdown('id_city', $cities, set_value('id_city'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('id_city') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_document_type">Sexo </label>
                            <?php echo form_dropdown('id_document_type', $document_types, set_value('id_document_type'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('id_document_type') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_partner">Fecha Nacimiento </label>
                            <input type="text" name="id_partner" id="id_document" class="form-control" value="<?php echo set_value('id_partner') ?>" required="" />
                            <?php echo form_error('id_partner') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_country">Estatura </label>
                            <input type="text" name="id_partner" id="id_document" class="form-control" value="<?php echo set_value('id_partner') ?>" required="" />
                            <?php echo form_error('id_country') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_country">Peso </label>
                            <input type="text" name="id_partner" id="id_document" class="form-control" value="<?php echo set_value('id_partner') ?>" required="" />
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