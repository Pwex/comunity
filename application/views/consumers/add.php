<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Crear consumidor</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('consumers/add') ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="document_type">Tipo Documento</label>
                            <?php echo form_dropdown('document_type', $document_types, set_value('document_type'), 'class="form-control input-lg" required=""'); ?>
                            <?php echo form_error('document_type') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="document">Número Documento</label>
                            <input type="text" name="document" id="id_document" class="form-control input-lg" value="<?php echo set_value('document') ?>" required="" />
                            <?php echo form_error('document') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name">Nombres</label>
                            <input type="text" name="name" id="name" class="form-control input-lg" value="<?php echo set_value('name') ?>" required="" />
                            <?php echo form_error('name') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="last_name">Apellidos</label>
                            <input type="text" name="last_name" id="last_name" class="form-control  input-lg" value="<?php echo set_value('last_name') ?>" required="" />
                            <?php echo form_error('last_name') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control  input-lg" value="<?php echo set_value('email') ?>" required="" />
                            <?php echo form_error('email') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="country">País</label>
                            <?php echo form_dropdown('country', $countrys, set_value('country'), 'class="form-control input-lg" required=""'); ?>
                            <?php echo form_error('country') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="cities">Ciudad</label>
                            <?php echo form_dropdown('cities', $cities, set_value('cities'), 'class="form-control input-lg" required=""'); ?>
                            <?php echo form_error('cities') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="sex">Sexo </label>
                            <?php echo form_dropdown('sex', $sex, set_value('sex'), 'class="form-control input-lg" required=""'); ?>
                            <?php echo form_error('sex') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="birth_date">Fecha Nacimiento </label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="birth_date" id="datemask" class="form-control input-lg" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php echo set_value('birth_date') ?>">
                                <?php echo form_error('birth_date') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="height">Estatura </label>
                            <input type="text" name="height" id="height" class="form-control input-lg" value="<?php echo set_value('height') ?>" />
                            <?php echo form_error('height') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="weight">Peso </label>
                            <input type="text" name="weight" id="weight" class="form-control input-lg" value="<?php echo set_value('weight') ?>" />
                        </div>
                    </div>
                </div>
                <p></p>
                <br />
                <div class="row">
                    <div class="col-sm-12">
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <button type="reset"  class="btn btn-default btn-lg" style="border-right: 1px solid #000 !important;">Cancelar</button>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-default btn-lg">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
</section>
<!-- /.content -->   