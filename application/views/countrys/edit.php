<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Editar Pais</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('countrys/edit/'.$this->uri->segment(3)) ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Pais</label>
                            <input type="text" name="name_country" id="name_country" class="form-control" placeholder="Ingresa el nombre del pais" value="<?php echo set_value('name_country', $information_country[0]["name_country"]) ?>" required="" />
                            <?php echo form_error('name') ?>
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