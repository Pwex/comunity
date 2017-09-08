<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Editar Ciudad
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('cities/edit/'.$this->uri->segment(3)) ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Ciudad</label>
                            <input type="text" name="name_city" id="name_city" class="form-control" placeholder="Nombre de la categoría" value="<?php echo set_value('name_city', $information_cities[0]["name_city"]) ?>" required="" />
                            <?php echo form_error('name') ?>
                        </div>
                    </div>
                </div>
 
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_country">País</label>
                            <?php echo form_dropdown('id_country', $countrys, set_value('id_country',$information_country[0]["id_country"]), 'class="form-control" required=""'); ?>
                            <?php echo form_error('id_country') ?>
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