<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <?php echo form_open('shop-layout') ?>
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Configuración eCommerce
                <span style="float: right;">
                    <button type="submit" class="btn btn-success" title="Almacenar cambios">
                        <i class="fa fa-save"></i>
                    </button>
                </span>
            </blockquote>
            <?php if ($this->uri->segment(2) == 'success'): ?>
                <div class="row" style="margin-top: 0.8em">
                    <div class="col-sm-12" style="margin-bottom: -1.5em">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4>
                                <i class="icon fa fa-check"></i> Exitoso
                            </h4>
                            El registro ha sido actualizado correctamente.
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 style="margin-top: 0;">Información General</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="shop">Nombre de la tienda</label>
                            <input type="text" name="shop" id="shop" class="form-control" value="<?php echo set_value('shop', $row[0]['shop']) ?>" required="" />
                            <?php echo form_error('shop') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Correo Electrónico</label>
                            <input type="text" name="email" id="email" class="form-control" value="<?php echo set_value('email', $row[0]['email']) ?>" required="" />
                            <?php echo form_error('email') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="phone">Teléfono</label>
                            <input type="text" name="phone" id="phone" class="form-control" value="<?php echo set_value('phone', $row[0]['phone']) ?>" required="" />
                            <?php echo form_error('phone') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="movil">Celular</label>
                            <input type="text" name="movil" id="movil" class="form-control" value="<?php echo set_value('movil', $row[0]['movil']) ?>" required="" />
                            <?php echo form_error('movil') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="address">Ubicación</label>
                            <input type="text" name="address" id="address" class="form-control" value="<?php echo set_value('address', $row[0]['address']) ?>" required="" />
                            <?php echo form_error('address') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4 style="margin-top: 0;">Redes Sociales</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="facebook">Facebook</label>
                            <input type="text" name="facebook" id="facebook" class="form-control" value="<?php echo set_value('facebook', $row[0]['facebook']) ?>"  />
                            <?php echo form_error('facebook') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="twitter">Twitter</label>
                            <input type="text" name="twitter" id="twitter" class="form-control" value="<?php echo set_value('twitter', $row[0]['twitter']) ?>"  />
                            <?php echo form_error('twitter') ?>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="linkedin">Linkedin</label>
                            <input type="text" name="linkedin" id="linkedin" class="form-control" value="<?php echo set_value('linkedin', $row[0]['linkedin']) ?>"  />
                            <?php echo form_error('linkedin') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <h4 style="margin-top: 0;">Marca</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="copyright">Copyright</label>
                            <input type="text" name="copyright" id="copyright" class="form-control" value="<?php echo set_value('copyright', $row[0]['copyright']) ?>" required="" />
                            <?php echo form_error('copyright') ?>
                        </div>
                    </div>
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
</section>
<!-- /.content -->   