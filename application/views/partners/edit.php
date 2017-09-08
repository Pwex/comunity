<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Agregar usuarios</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('users/edit/'.$this->uri->segment(3)) ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Nombres</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Ingresar un nombre" value="<?php echo set_value('name', $user[0]["name"]) ?>" required="" />
                            <?php echo form_error('name') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="last_name">Apellidos</label>
                            <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Ingresar un apellido" value="<?php echo set_value('last_name', $user[0]["last_name"]) ?>" required="" />
                            <?php echo form_error('last_name') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="email">Correo electrónico</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Ingresar un correo electrónico" value="<?php echo set_value('email', $user[0]["email"]) ?>" required="" disabled="" />
                            <?php echo form_error('email') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="country">País</label>
                            <?php echo form_dropdown('country', $country, set_value('country', $user[0]["country"]), 'class="form-control" required=""'); ?>
                            <?php echo form_error('country') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="type_of_access">Cuenta</label>
                            <?php echo form_dropdown('type_of_access', $type_of_access, set_value('type_of_access', $user[0]["type_of_access"]), 'class="form-control" required=""'); ?>
                            <?php echo form_error('type_of_access') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="password">Clave de seguridad</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Ingresar un correo electrónico" value="<?php echo set_value('password') ?>" required="" />
                            <?php echo form_error('password') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="confirm_password">Confirmar clave de seguridad</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Ingresar un correo electrónico" value="<?php echo set_value('confirm_password') ?>" required="" />
                            <?php echo form_error('confirm_password') ?>
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
                <input type="hidden" name="email" value="<?php echo $user[0]['email'] ?>">
            <?php echo form_close() ?>
        </div>
    </div>
</section>
<!-- /.content -->   