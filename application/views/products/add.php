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
            <h3 class="box-title">Agregar Producto</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('products/add') ?>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Custom Tabs (Pulled to the right) -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs pull-right">
                                <li class="">
                                    <a href="#tab_5" data-toggle="tab" aria-expanded="false">SEO</a>
                                </li>
                                <li class="">
                                    <a href="#tab_4" data-toggle="tab" aria-expanded="false">Trasnporte</a>
                                </li>
                                <li class="">
                                    <a href="#tab_3" data-toggle="tab" aria-expanded="false">Imágenes</a>
                                </li>
                                <li class="">
                                    <a href="#tab_2" data-toggle="tab" aria-expanded="false">Características</a>
                                </li>
                                <li class="active">
                                    <a href="#tab_1" data-toggle="tab" aria-expanded="true">Ajustes básicos</a>
                                </li>
                                <li class="pull-left header">
                                    <i class="fa fa-cubes"></i> Productos
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <strong>General</strong>
                                    <p>Ingresar toda la información general del producto, esta sera utilizada para la publicación del mismo.</p>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="id_product">Código</label>
                                                    <input type="text" name="id_product" id="id_product" class="form-control" value="<?php echo set_value('id_product') ?>" required="" />
                                                    <?php echo form_error('id_product') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="name_product">Producto</label>
                                                    <input type="text" name="name_product" id="name_product" class="form-control" value="<?php echo set_value('name_product') ?>" required="" />
                                                    <?php echo form_error('name_product') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="description_product">Descripción</label>
                                                    <?php echo form_textarea('description_product', set_value('description_product'), 'id="description_product" class="form-control"') ?>
                                                    <?php echo form_error('description_product') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="ean13_product">EAN 13</label>
                                                    <input type="text" name="ean13_product" id="ean13_product" class="form-control" value="<?php echo set_value('ean13_product') ?>" required="" />
                                                    <?php echo form_error('ean13_product') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="id_typeinventory">Tipo Inventario</label>
                                                    <?php echo form_dropdown('id_typeinventory', $typesinventory, set_value('id_typeinventory'), 'class="form-control" required=""'); ?>
                                                    <?php echo form_error('id_typeinventory') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="id_category">Categoría</label>
                                                    <?php echo form_dropdown('id_category', $category, set_value('id_category'), 'class="form-control" required=""'); ?>
                                                    <?php echo form_error('id_category') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_2">
                                    <strong>Características</strong>
                                    <p>Por favor seleccione las descripciones físicas que tiene el producto.</p>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="id_benefit">Beneficios</label>
                                                    <?php echo form_dropdown('id_benefits[]', $benefits, set_value('id_benefit'), 'data-placeholder="Seleccionar..." multiple="" class="form-control select2" style="widht:100%"'); ?>
                                                    <?php echo form_error('id_benefit') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="id_component">Componentes</label><br />
                                                    <?php echo form_dropdown('id_component[]', $components, set_value('id_component'), 'data-placeholder="Seleccionar..." multiple="" class="form-control select2"'); ?>
                                                    <?php echo form_error('id_component') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="id_seals">Sellos</label>
                                                    <?php echo form_dropdown('id_seals[]', $seals, set_value('id_seals'), 'data-placeholder="Seleccionar..." multiple="" class="form-control select2"'); ?>
                                                    <?php echo form_error('id_seals') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="enabled_product">Estatus</label>
                                                    <?php echo form_dropdown('enabled_product', $status, set_value('enabled_product'), 'class="form-control"'); ?>
                                                    <?php echo form_error('enabled_product') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="availability">Donde se visualizará</label>
                                                    <?php echo form_dropdown('availability', $availability, set_value('availability'), 'class="form-control"'); ?>
                                                    <?php echo form_error('availability') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_3">
                                    <!-- Shuffle & Sort Controls -->
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <h4>Seleccionar Imágenes</h4>
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
                                                        <li style="text-align: center;padding: 6px 15px;background-color: #f7f8f9;color: #444444;border: 1px solid #eee;" class="sort-btn active" data-sortAsc>Asc</li>
                                                        <li style="text-align: center;padding: 6px 15px;background-color: #f7f8f9;color: #444444;border: 1px solid #eee;" class="sort-btn" data-sortDesc>Desc</li>
                                                        <li style="text-align: center;padding: 6px 15px;background-color: #f7f8f9;color: #444444;border: 1px solid #eee;" class="shuffle-btn" data-shuffle>Mostrar todas las imagenes</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row main-manager">
                                            <!-- This is the set up of a basic gallery, your items must have the categories they belong to in a data-category
                                                attribute, which starts from the value 1 and goes up from there -->
                                            <div class="filtr-container" style="margin-left: 8px; padding: 0px; position: relative; height: 246.594px;">
                                                <?php foreach ($list_images as $key => $value): ?>
                                                    <div class="col-xs-6 col-sm-3 col-md-2 filtr-item" data-category="1, 5" data-sort="<?php echo $value['name'] ?>" style="position: absolute;">
                                                        <label>
                                                            <?php echo form_checkbox('images[]', $value['file']); ?> 
                                                            <span style="display: block; margin-top: -22px; margin-left: 1.3em">Seleccionar</span>
                                                        </label>
                                                        <img class="img img-responsive center-block" src="<?php echo base_url('assets/dist/img/multimedia/images/').$value['file_name'] ?>" />
                                                        <span class="item-desc"><?php echo $value['name'] ?></span>
                                                    </div>
                                                <?php endforeach ?>
                                            </div>
                                        </div>
                                </div>
                                <div class="tab-pane" id="tab_4">
                                    <strong>Dimensiones</strong>
                                    <p>Proporciona los datos necesarios para calcular el costo de la logistica del producto.</p>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="width">Ancho</label>
                                                    <input type="number" name="width" id="width" class="form-control" value="<?php echo set_value('width') ?>" required="" />
                                                    <?php echo form_error('width') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="high">Altura</label>
                                                    <input type="number" name="high" id="high" class="form-control" value="<?php echo set_value('high') ?>" required="" />
                                                    <?php echo form_error('high') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="depth">Profundidad</label>
                                                    <input type="number" name="depth" id="depth" class="form-control" value="<?php echo set_value('depth') ?>" required="" />
                                                    <?php echo form_error('depth') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="weight">Peso</label>
                                                    <input type="number" name="weight" id="weight" class="form-control" value="<?php echo set_value('weight') ?>" required="" />
                                                    <?php echo form_error('weight') ?>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                                <div class="tab-pane" id="tab_5">
                                    <strong>Posicionamiento</strong>
                                    <p>Ayuda a que el producto tenga un buen posicionamiento en la busqueda de los navegadores.</p>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="url">Url amigable</label>
                                                    <input type="text" name="url" id="url" class="form-control" value="<?php echo set_value('url') ?>" required="" />
                                                    <?php echo form_error('url') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="meta_title">Meta Titutlo</label>
                                                    <input type="text" name="meta_title" id="meta_title" class="form-control" value="<?php echo set_value('meta_title') ?>" required="" />
                                                    <?php echo form_error('meta_title') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="meta_description">Meta Descripción</label>
                                                    <?php echo form_textarea('meta_description', set_value('meta_description'), 'id="meta_description" class="form-control"') ?>
                                                    <?php echo form_error('meta_description') ?>
                                                </div>
                                            </div>
                                        </div>   
                                    </div>
                                </div>
                            </div>
                            <!-- /.tab-content -->
                        </div>
                        <!-- nav-tabs-custom -->
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