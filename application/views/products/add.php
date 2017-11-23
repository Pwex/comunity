<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/bootstrap-tags/bootstrap-tagsinput.css') ?>">
<style type="text/css">
    .bootstrap-tagsinput {
        width: 100%;
    }
    .bg-aqua, .callout.callout-info, .alert-info, .label-info, .modal-info .modal-body {
        background-color: #2196F3 !important;
    }
    .container-tab {
        width: 100%;
    }
    .img {
        border-radius: 5px;
        border: 2px solid rgb(236, 236, 236);
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
    .categories-container {
        background: rgb(251, 249, 249);
        border-radius: 5px;
        border: 1px solid #eee;
        margin-left: 1em;
        margin-right: 1em;
        padding: 0.6em 0.5em;
    }
    .form-select-checkbox {
        cursor: pointer;
        font-weight: normal;
        margin-right: 15px;
        vertical-align: sub;
    }
    .form-checkbox {
        vertical-align: top;
    }
        @media (max-width: 425px) {
            .box-body {
                padding: 0.8em 1em;
            }
        }
</style>
<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Crear Producto</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open_multipart('products/add', 'autocomplete="off"') ?>
                <!-- Custom Tabs (Pulled to the right) -->
                <div class="col-xs-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs pull-right">
                            <li class="">
                                <a href="#tab_6" data-toggle="tab" aria-expanded="false">SEO</a>
                            </li>
                            <li class="">
                                <a href="#tab_5" data-toggle="tab" aria-expanded="false">Transporte</a>
                            </li>
                            <li class="">
                                <a href="#tab_4" data-toggle="tab" aria-expanded="false">Imagenes</a>
                            </li>
                            <li class="" style="display: none;" id="tab3_nav">
                                <a href="#tab_3" data-toggle="tab" aria-expanded="false">Especificos</a>
                            </li>
                            <li class="">
                                <a href="#tab_2" data-toggle="tab" aria-expanded="false">Caracteristicas</a>
                            </li>
                            <li class="active">
                                <a href="#tab_1" data-toggle="tab" aria-expanded="true">basicos</a>
                            </li>
                            <li class="pull-left header">
                                <i class="fa fa-cubes"></i> Productos
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <strong>General</strong>
                                <p>Ingresar toda la información general del producto, esta sera utilizada para la publicación del mismo.</p>
                                <div class="container-tab">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="id_product">Código</label>
                                                <input type="text" name="id_product" id="id_product" class="form-control" value="<?php echo set_value('id_product') ?>" required="" />
                                                <?php echo form_error('id_product') ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <label for="id_provider">Proveedor</label>
                                                <?php echo form_dropdown('id_provider', $provider, set_value('id_provider'), 'class="form-control select2" id="id_provider"') ?>
                                                <?php echo form_error('id_provider') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="short_name">Nombre corto (máximo 20 caracteres)</label>
                                                <input type="text" name="short_name" id="short_name" class="form-control" value="<?php echo set_value('short_name') ?>" required="" maxlength="20" />
                                                <?php echo form_error('short_name') ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <label for="name_product">Nombre largo (máximo 80 caracteres)</label>
                                                <input type="text" name="name_product" id="name_product" class="form-control" value="<?php echo set_value('name_product') ?>" required="" maxlength="80" />
                                                <?php echo form_error('name_product') ?>
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
                                                <label for="ean14_product">EAN 14</label>
                                                <input type="text" name="ean14_product" id="ean14_product" class="form-control" value="<?php echo set_value('ean14_product') ?>" required="" />
                                                <?php echo form_error('ean14_product') ?>
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
                                                <label for="id_catalogue">Categoría Principal</label>
                                                <?php echo form_dropdown('id_catalogue', $catalogue, set_value('id_catalogue'), 'class="form-control" id="id_catalogue" required=""'); ?>
                                                <?php echo form_error('id_catalogue') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="description_product">Descripción</label>
                                                <textarea name="description_product" id="description_product" rows="2" class="form-control"><?php echo set_value('description_product'); ?></textarea>
                                                <?php echo form_error('description_product') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="cost_in_dollars">Costo en Dólares</label>
                                                <input type="number" name="cost_in_dollars" id="cost_in_dollars" class="form-control" value="<?php echo set_value('cost_in_dollars') ?>" required="" />
                                                <?php echo form_error('cost_in_dollars') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="enabled_product">Estatus</label>
                                                <?php echo form_dropdown('enabled_product', $status, set_value('enabled_product'), 'class="form-control"'); ?>
                                                <?php echo form_error('enabled_product') ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="form-group">
                                                <label for="availability">Visualización</label><br />
                                                <label class="form-select-checkbox"><?php echo form_checkbox('availability[]', 1, TRUE, 'class="form-checkbox minimal-red"') ?> EN TODOS LOS PERFILES</label>
                                                <label class="form-select-checkbox"><?php echo form_checkbox('availability[]', 2, set_value('availability'), 'class="form-checkbox minimal-red"') ?> ECOMMERCE</label>
                                                <label class="form-select-checkbox"><?php echo form_checkbox('availability[]', 3, set_value('availability'), 'class="form-checkbox minimal-red"') ?> CENTROS DE BIENESTAR</label>
                                                <label class="form-select-checkbox"><?php echo form_checkbox('availability[]', 4, set_value('availability'), 'class="form-checkbox minimal-red"') ?> COACH</label>
                                                <?php echo form_error('availability') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_2">
                                <strong>Características</strong>
                                <p>Por favor seleccione las descripciones físicas que tiene el producto.</p>
                                <div class="container-tab">
                                    <div class="row" id="section_id_presentation">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="id_presentation">Presentación</label>
                                                <?php echo form_dropdown('id_presentation', $presentation, set_value('id_presentation'), 'class="form-control" id="id_presentation" required=""'); ?>
                                                <?php echo form_error('id_presentation') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="id_category">Categoría Padre</label>
                                                <select name="id_category" id="id_category" class="form-control select2">
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
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="status_filter_products">Filtro de Búsqueda</label>
                                                <?php echo form_dropdown('status_filter_products', $status_filter_products, set_value('status_filter_products'), 'class="form-control" id="status_filter_products" required=""'); ?>
                                                <?php echo form_error('status_filter_products') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="display: none;" id="container_status_filter_products">
                                        <div class="col-md-12">
                                            <div class="form-group"> 
                                                <label for="filter_product" id="status_filter_products_label"></label>
                                                <select name="filter_product[]" id="filter_product" class="form-control select2" data-placeholder="Seleccionar..." multiple="" disabled=""></select>
                                                <?php echo form_error('filter_product') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="container_sellos" style="display: none;">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="id_seals">Sellos</label>
                                                <?php echo form_dropdown('id_seals[]', $seals, set_value('id_seals'), 'data-placeholder="Seleccionar..." multiple="" class="form-control select2"'); ?>
                                                <?php echo form_error('id_seals') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="id_component">Activos</label><br />
                                                <?php echo form_dropdown('id_component[]', $components, set_value('id_component'), 'data-placeholder="Seleccionar..." multiple="" class="form-control select2"'); ?>
                                                <?php echo form_error('id_component') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="id_benefit">Beneficios</label>
                                                <?php echo form_dropdown('id_benefits[]', $benefits, set_value('id_benefit'), 'data-placeholder="Seleccionar..." multiple="" class="form-control select2" style="widht:100%"'); ?>
                                                <?php echo form_error('id_benefit') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="section-aparatologia">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="model">Modelo</label>
                                                    <input type="text" name="model" id="model" class="form-control" value="<?php echo set_value('model') ?>" maxlength="20" />
                                                    <?php echo form_error('model') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="id_certifications">Certificados</label>
                                                    <?php echo form_dropdown('id_certifications[]', $certifications, set_value('id_id_certifications'), 'data-placeholder="Seleccionar..." multiple="" class="form-control select2"'); ?>
                                                    <?php echo form_error('id_certifications') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="aparatology_precautions">Precauciones</label>
                                                    <textarea name="aparatology_precautions" id="aparatology_precautions" rows="2" class="form-control"><?php echo set_value('aparatology_precautions'); ?></textarea>
                                                    <?php echo form_error('aparatology_precautions') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="contraindications_aparatologia">Contraindicaciones</label>
                                                    <textarea name="contraindications_aparatologia" id="contraindications_aparatologia" rows="2" class="form-control"><?php echo set_value('contraindications_aparatologia'); ?></textarea>
                                                    <?php echo form_error('contraindications_aparatologia') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="contains">Contiene</label>
                                                    <textarea name="contains" id="contains" rows="2" class="form-control"><?php echo set_value('contains'); ?></textarea>
                                                    <?php echo form_error('contains') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="mode_of_use">Modo de uso</label>
                                                    <textarea name="mode_of_use" id="mode_of_use" rows="2" class="form-control"><?php echo set_value('mode_of_use'); ?></textarea>
                                                    <?php echo form_error('mode_of_use') ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_3">
                                <strong>Específicos</strong>
                                <p>Por favor seleccione los datos específicos del producto a publicar.</p>
                                <div class="container-tab">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="sanitary_registration">Registro sanitario</label>
                                                <input type="text" name="sanitary_registration" id="sanitary_registration" class="form-control" value="<?php echo set_value('sanitary_registration') ?>" maxlength="20" />
                                                <?php echo form_error('sanitary_registration') ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <div class="form-group">
                                                <label for="date_expiration_sanitary_registration">Fecha de Vencimiento</label>
                                                <input type="text" name="date_expiration_sanitary_registration" id="date_expiration_sanitary_registration" class="form-control" value="<?php echo set_value('date_expiration_sanitary_registration') ?>"  maxlength="20" />
                                                <?php echo form_error('date_expiration_sanitary_registration') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="indications">Indicaciones de uso</label>
                                                <textarea name="indications" id="indications" rows="2" class="form-control"><?php echo set_value('indications'); ?></textarea>
                                                <?php echo form_error('indications') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="contraindications">Contraindicaciones</label>
                                                <textarea name="contraindications" id="contraindications" rows="3" class="form-control"><?php echo set_value('contraindications'); ?></textarea>
                                                <?php echo form_error('contraindications') ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="precautions">Precauciones y Almacenamiento</label>
                                                <textarea name="precautions" id="precautions" rows="3" class="form-control"><?php echo set_value('precautions'); ?></textarea>
                                                <?php echo form_error('precautions') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="labeled">Rotulado</label>
                                                <textarea name="labeled" id="labeled" rows="2" class="form-control"><?php echo set_value('labeled'); ?></textarea>
                                                <?php echo form_error('labeled') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" id="container_nutritional" style="display: none;">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="nutritional">Tabla Nutricional</label>
                                                <input type="file" name="nutritional" class="form-control" />
                                                <?php echo form_error('nutritional') ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_4">
                                <!-- Shuffle & Sort Controls -->
                                    <div class="row">
                                        <label style="padding-left: 1em;">Búsqueda por categorías</label>
                                        <ul class="simplefilter categories-container">
                                            <li class="active" data-filter="all" style="text-align: center;padding: 6px 15px;background-color: #f7f8f9;color: #444444;border: 1px solid #eae7e7;">TODAS</li>
                                            <?php foreach ($categories_images as $key => $value): ?>
                                                <li data-filter="<?php echo $value['id_category'] ?>" style="text-align: center;padding: 6px 15px;background-color: #f7f8f9;color: #444444;border: 1px solid #eae7e7;"><?php echo $value['name_category'] ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
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
                                                    <li style="text-align: center;padding: 6px 15px;background-color: #f7f8f9;color: #444444;border: 1px solid #eee;" class="shuffle-btn" data-shuffle>CARGAR MEDIOS</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row main-manager">
                                        <!-- This is the set up of a basic gallery, your items must have the categories they belong to in a data-category
                                            attribute, which starts from the value 1 and goes up from there -->
                                        <div class="filtr-container" style="display: none; margin-left: 8px; padding: 0px; position: relative; height: 246.594px;">
                                            <?php foreach ($list_images as $key => $value): ?>
                                                <div class="col-xs-6 col-sm-3 col-md-2 filtr-item" data-category="<?php echo $value['id_category'] ?>" data-sort="<?php echo $value['name'] ?>" style="position: absolute;">
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

                            <div class="tab-pane" id="tab_5">
                                <strong>Dimensiones</strong>
                                <p>Proporciona los datos necesarios para calcular el costo de la logistica del producto.</p>
                                <div class="container-tab">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="grammage">Contenido Neto</label>
                                                <input type="number" name="grammage" id="grammage" class="form-control" value="<?php echo set_value('grammage') ?>" />
                                                <?php echo form_error('grammage') ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="id_unitsmeasure">Unidad de Medida</label>
                                                <?php echo form_dropdown('id_unitsmeasure', $unitsmeasure, set_value('id_unitsmeasure'), 'data-placeholder="Seleccionar..." class="form-control"'); ?>
                                                <?php echo form_error('id_unitsmeasure') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="width">Ancho (cm)</label>
                                                <input type="number" name="width" id="width" class="form-control" value="<?php echo set_value('width') ?>" required="" />
                                                <?php echo form_error('width') ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="high">Altura (cm)</label>
                                                <input type="number" name="high" id="high" class="form-control" value="<?php echo set_value('high') ?>" />
                                                <?php echo form_error('high') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="depth">Profundidad (cm)</label>
                                                <input type="number" name="depth" id="depth" class="form-control" value="<?php echo set_value('depth') ?>" />
                                                <?php echo form_error('depth') ?>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="weight">Peso Total (Contenido neto más envase kg)</label>
                                                <input type="number" name="weight" id="weight" class="form-control" value="<?php echo set_value('weight') ?>" />
                                                <?php echo form_error('weight') ?>
                                            </div>
                                        </div>
                                    </div>    
                                </div>
                            </div>

                            <div class="tab-pane" id="tab_6">
                                <strong>Posicionamiento</strong>
                                <p>Ayuda a que el producto tenga un buen posicionamiento en la busqueda de los navegadores.</p>
                                <div class="container-tab">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="meta_title">Meta Título</label>
                                                <input type="text" name="meta_title" id="meta_title" class="form-control" value="<?php echo set_value('meta_title') ?>"  />
                                                <?php echo form_error('meta_title') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="url">Url Amigable</label>
                                                <input type="text" name="url" id="url" class="form-control" value="<?php echo set_value('url') ?>" />
                                                <?php echo form_error('url') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="keywords">Keywords (Palabras clave)</label>
                                                <input type="text" name="keywords" id="keywords" class="form-control" value="<?php echo set_value('keywords') ?>" data-role="tagsinput" style="width: 100%" /> 
                                                <?php echo form_error('keywords') ?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="meta_description">Meta Descripción</label>
                                                <textarea name="meta_description" id="meta_description" rows="8" class="form-control"><?php echo set_value('meta_description'); ?></textarea>
                                                <?php echo form_error('meta_description') ?>
                                            </div>
                                        </div>
                                    </div>  
                                    <!-- nav-tabs-custom -->
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary">Enviar</button>
                                                <button type="reset"  class="btn btn-default">Cancelar</button>
                                            </div>
                                        </div>
                                    </div> 
                                </div>
                            </div>

                        </div>
                        <!-- /.tab-content -->
                    </div>
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
</section>
<!-- /.content -->      
<script type="text/javascript" src="<?php echo base_url('assets/plugins/bootstrap-tags/bootstrap-tagsinput.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#keywords').tagsinput({
            tagClass: 'label label-primary'
        });
    });
</script>
<script type="text/javascript">
   $(document).ready(function(){
        var normalize = (function() {
            var from = " ", 
                to   = "-",
                mapping = {};
          for(var i = 0, j = from.length; i < j; i++ )
              mapping[ from.charAt( i ) ] = to.charAt( i );
          return function( str ) {
              var ret = [];
              for( var i = 0, j = str.length; i < j; i++ ) {
                  var c = str.charAt( i );
                  if( mapping.hasOwnProperty( str.charAt( i ) ) )
                      ret.push( mapping[ c ] );
                  else
                      ret.push( c );
              }      
              return ret.join( '' );
          }
        })();
        var tabProducts = (function(){
            var id = $('#id_catalogue option:selected').html();
            id = normalize(id.trim());
            if (id == 'APARATOLOGIA-ESTETICA') {
                $('div.section-aparatologia').show();
                $('#tab3_nav').hide();
                $('#container_sellos').hide();
                $('#section_id_presentation').hide();
            } else if(id == 'BELLEZA' || id == 'NUTRICION' || id == 'SALUD' || id == 'SUPLEMENTOS-DIETARIOS') {
                $('div.section-aparatologia').hide();
                $('#tab3_nav').show();
                $('#container_sellos').show();
                $('#section_id_presentation').show();
            }
            if (id == 'APARATOLOGIA-ESTETICA' || id == 'BELLEZA') {
                $('#container_nutritional').hide();
            } else {
                $('#container_nutritional').show();
            }
        });
        tabProducts();
        $('#id_catalogue').change('click', function(){
            tabProducts();
        });
   });
</script>