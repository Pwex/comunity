<?php echo form_open('categories/add', 'autocomplete="off"') ?>
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Crear Categoría
                <div class="col-sm-6 col-xs-6 col-md-3 pull-right">
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <button type="submit" class="btn btn-default" data-toggle="tooltip" title="Almacenar información"><i class="fa fa-check" aria-hidden="true"></i></button>
                        </div>
                        <div class="btn-group">
                            <button type="reset"  class="btn btn-default" data-toggle="tooltip" title="Cancelar información"><i class="fa fa-ban" aria-hidden="true"></i></button>
                        </div>
                        <a href="<?php echo base_url('categories') ?>" class="btn btn-default" data-toggle="tooltip" title="Listado de Categorías"><i class="fa fa-table" aria-hidden="true"></i></a>
                    </div>
                </div>
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label class="id_catalogue">Categoría Principal</label>
                        <?php echo form_dropdown('id_catalogue', $catalogue, set_value('id_category'), 'class="form-control select2" id="id_catalogue"') ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <label for="id_father_category">Categoría Padre</label>
                        <select name="id_father_category" id="id_father_category" class="form-control select2">
                            <option value="0">NO APLICA NINGUNA</option>
                            <?php foreach($catalogue_group as $id => $value_catalogue): ?>
                                <optgroup label="<?php echo $value_catalogue['name_catalogue'] ?>" value="<?php echo $value_catalogue['id'] ?>">  
                                    <?php foreach ($category as $key => $value): ?>
                                        <?php if ($value_catalogue['id'] == $value['id'] and $value['id_father_category'] == 0): ?>
                                            <option value="<?php echo $value['id_category'] ?>">&nbsp&nbsp<?php echo $value['name_category'] ?></option>
                                            
                                            <?php foreach ($category as $key_item1 => $item1): ?>
                                                <?php if ($item1['id_father_category'] == $value['id_category']): ?>
                                                    <option value="<?php echo $item1['id_category'] ?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $item1['name_category'] ?></option>
                                                    
                                                    <?php foreach ($category as $key_item2 => $item2): ?>
                                                        <?php if ($item2['id_father_category'] == $item1['id_category']): ?>
                                                            <option value="<?php echo $item2['id_category'] ?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $item2['name_category'] ?></option>
                                                            
                                                            <!-- Generador de item de categorías -->

                                                            <?php foreach ($category as $key_item3 => $item3): ?>
                                                                <?php if ($item3['id_father_category'] == $item2['id_category']): ?>
                                                                    <option value="<?php echo $item3['id_category'] ?>">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $item3['name_category'] ?></option>
                                                                <?php endif ?>
                                                            <?php endforeach ?>

                                                        <?php endif ?>
                                                    <?php endforeach ?>

                                                <?php endif ?>
                                            <?php endforeach ?>

                                        <?php endif ?>
                                    <?php endforeach ?>
                                </optgroup>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('id_father_category') ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label for="name_category">Nueva Categoría</label>
                        <input type="text" name="name_category" id="name_category" class="form-control" value="<?php echo set_value('name_category') ?>" required="" />
                        <?php echo form_error('name_category') ?>
                    </div>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</section>
<!-- /.content --> 