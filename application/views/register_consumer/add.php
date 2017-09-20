<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Crear consumidor</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('register_consumer/add') ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="input-group">
                            <!-- <label for="email">Correo electrónico</label> -->
                            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                            <input type="email" name="email" id="email" placeholder="Correo electrónico" class="form-control" value="<?php echo set_value('email') ?>" required="" />
                            <?php echo form_error('email') ?>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <!-- <label for="name">Nombres</label> -->
                            <input type="text" name="name" id="name" placeholder="Nombres" class="form-control" value="<?php echo set_value('name') ?>" required="" />
                            <?php echo form_error('name') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <!-- <label for="last_name">Apellidos</label> -->
                            <input type="text" name="last_name" id="last_name" placeholder="Apellidos" class="form-control" value="<?php echo set_value('last_name') ?>" required="" />
                            <?php echo form_error('last_name') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="input-group">
                            <!-- <label for="document_type">Tipo Documento</label> -->
                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                            <?php echo form_dropdown('document_type', $document_types, set_value('document_type'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('document_type') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <!-- <label for="document">Número Documento</label> -->
                            <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                            <input type="text" name="document" id="id_document" placeholder="Número documento" class="form-control" value="<?php echo set_value('document') ?>" required="" />
                            <?php echo form_error('document') ?>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="input-group">
                            <!-- <label for="country">País</label> -->
                            <span class="input-group-addon"><i class="fa fa-flag"></i></span>
                            <?php echo form_dropdown('country', $countrys, set_value('country'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('country') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <!-- <label for="cities">Ciudad</label> -->
                            <span class="input-group-addon"><i class="fa fa-map"></i></span>
                            <?php echo form_dropdown('cities', $cities, set_value('cities'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('cities') ?>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="input-group">
                            <!-- <label for="sex">Sexo </label> -->
                            <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                            <?php echo form_dropdown('sex', $sex, set_value('sex'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('sex') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <!-- <label for="birth_date">Fecha Nacimiento </label> -->
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="birth_date" id="datemask" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="<?php echo set_value('birth_date') ?>">
                                <?php echo form_error('birth_date') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="input-group">
                            <!-- <label for="height">Estatura </label> -->
                            <span class="input-group-addon"><i class="fa fa-child"></i></span>
                            <input type="text" name="height" id="height" placeholder="Estatura en cm" class="form-control" value="<?php echo set_value('height') ?>" />
                            <?php echo form_error('height') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="input-group">
                            <!-- <label for="weight">Peso </label> -->
                            <span class="input-group-addon"><i class="fa fa-balance-scale"></i></span>
                            <input type="text" name="weight" id="weight" placeholder="Peso en KG" class="form-control" value="<?php echo set_value('weight') ?>" />
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="submit" class="btn btn-info">Enviar y Encuestar</button>
                            <button type="reset"  class="btn btn-default">Cancelar</button>
                        </div>
                    </div>
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
</section>
<!-- /.content -->   