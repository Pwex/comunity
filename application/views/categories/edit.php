<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Editar Categoría
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('categories/edit/'.$this->uri->segment(3)) ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Categoria</label>
                            <input type="text" name="name_category" id="name_category" class="form-control" placeholder="Ingresa un nombre" value="<?php echo set_value('name_category', $information_category[0]["name_category"]) ?>" required="" />
                            <?php echo form_error('name') ?>
                        </div>
                    </div>
                </div>
 
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_father_category">Categoria padre</label>
                            <?php echo form_dropdown('id_father_category', $category, set_value('id_father_category',$information_category[0]["id_father_category"]), 'class="form-control" required=""'); ?>
                            <?php echo form_error('id_father_category') ?>
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