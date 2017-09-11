<style type="text/css">
    .img {
        cursor: pointer;
        height: 14.4em;
        width: 14.4em;
    }
    .filtr-container {
        margin-left: 3px;
    }
    .main-manager {
        width: 100%;
        margin-left: -1.15em;
    }
</style>
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
                            <label for="name">Nombre</label>
                            <input type="text" name="name_category" id="name_category" class="form-control" placeholder="Nombre de la categoría" value="<?php echo set_value('name_category', $information_category[0]["name_category"]) ?>" required="" />
                            <?php echo form_error('name') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_father_category">Categoría</label>
                            <?php echo form_dropdown('id_father_category', $category, set_value('id_father_category',$information_category[0]["id_father_category"]), 'class="form-control" required=""'); ?>
                            <?php echo form_error('id_father_category') ?>
                        </div>
                    </div>
                </div>
                <!-- Shuffle & Sort Controls -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <ul class="sortandshuffle" style="margin-left: -40px">
                                <!-- Basic shuffle control -->
                                <label for="filtr-search">Buscar</label>:<br />
                                <input type="text" class="filtr-search" name="filtr-search" id="filtr-search" data-search>
                                <select data-sortOrder class="filtr-search" style="padding: 0.4em; height: 34px">
                                    <option value="domIndex">
                                        Posición
                                    </option>
                                    <option value="sortData">
                                        Descripción
                                    </option>
                                </select>
                                <!-- Basic sort controls consisting of asc/desc button and a select -->
                                <li style="text-align: center; padding: 6px 15px; background-color: #009688;" class="sort-btn active" data-sortAsc>Asc</li>
                                <li style="text-align: center; padding: 6px 15px; background-color: #009688;" class="sort-btn" data-sortDesc>Desc</li>
                                <li style="text-align: center; padding: 6px 15px; background-color: #009688;" class="shuffle-btn" data-shuffle>Aleatorio</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row main-manager">
                    <!-- This is the set up of a basic gallery, your items must have the categories they belong to in a data-category
                        attribute, which starts from the value 1 and goes up from there -->
                    <div class="filtr-container" style="margin-left: 8px">
                        <?php foreach ($list_images as $key => $value): ?>
                            <div class="col-xs-6 col-sm-3 col-md-2 filtr-item" data-category="1, 5" data-sort="<?php echo $value['name'] ?>">
                                <label>
                                    <?php echo form_checkbox('images[]', $value['file'], in_array($value['file'], $status)); ?> 
                                    <span style="display: block; margin-top: -22px; margin-left: 1.3em">Seleccionar</span>
                                </label>
                                <img class="img img-responsive center-block" src="<?php echo base_url('assets/dist/img/multimedia/images/').$value['file_name'] ?>" />
                                <span class="item-desc"><?php echo $value['name'] ?></span>
                            </div>
                        <?php endforeach ?>
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