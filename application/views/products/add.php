<style type="text/css">
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
            <h3 class="box-title">Agregar Producto</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('products/add', 'autocomplete="off"') ?>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Custom Tabs (Pulled to the right) -->
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
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="short_name">Nombre corto (máximo 20 caracteres)</label>
                                                    <input type="text" name="short_name" id="short_name" class="form-control" value="<?php echo set_value('short_name') ?>" required="" maxlength="20" />
                                                    <?php echo form_error('short_name') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-9">
                                                <div class="form-group">
                                                    <label for="name_product">Producto (máximo 80 caracteres)</label>
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
                                                    <label for="id_catalogue">Línea de Prodcutos</label>
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
                                    <div class="container">
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
                                            <div class="col-sm-6">
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
                                                        <input type="text" name="model" id="model" class="form-control" value="<?php echo set_value('model') ?>" required="" maxlength="20" />
                                                        <?php echo form_error('model') ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="form-group">
                                                        <label for="certifications">Certificados</label>
                                                        <?php echo form_dropdown('id_certifications[]', $certifications, set_value('id_certifications'), 'data-placeholder="Seleccionar..." multiple="" class="form-control select2"'); ?>
                                                        <?php echo form_error('certifications') ?>
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
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="sanitary_registration">Registro sanitario</label>
                                                    <input type="text" name="sanitary_registration" id="sanitary_registration" class="form-control" value="<?php echo set_value('sanitary_registration') ?>" required="" maxlength="20" />
                                                    <?php echo form_error('sanitary_registration') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <label for="date_expiration_sanitary_registration">Fecha de Vencimiento</label>
                                                    <input type="text" name="date_expiration_sanitary_registration" id="date_expiration_sanitary_registration" class="form-control" value="<?php echo set_value('date_expiration_sanitary_registration') ?>" required="" maxlength="20" />
                                                    <?php echo form_error('date_expiration_sanitary_registration') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="indications">Indicaciones</label>
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
                                                    <label for="precautions">Precauciones</label>
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
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="nutritional">Tabla Nutricional</label>
                                                    <textarea name="nutritional" id="nutritional" rows="2" class="form-control">
                                                        <?php if(!empty(set_value('nutritional'))) { echo set_value('nutritional'); } else { ?>
                                                            <h2 style="text-align: center;">Informaci&oacute;n nutricional</h2>
                                                            <p><strong>Tama&ntilde;o por porci&oacute;n:&nbsp;2 Cucharadas (25g)</strong></p>
                                                            <p>Porciones por envase: 12</p>
                                                            <hr />
                                                            <p><strong>Cantidad por porci&oacute;n</strong></p>
                                                            <hr />
                                                            <p><strong>Calor&iacute;as 90</strong> Kcal &nbsp; &nbsp; &nbsp; &nbsp; Calor&iacute;as de grasa 40</p>
                                                            <hr />
                                                            <table style="height:237px; width:100%">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="width:347px">&nbsp;</td>
                                                                        <td style="text-align:center; width:348px"><strong>Valor Diario%*</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:347px"><strong>Grasa Total 4 g</strong></td>
                                                                        <td style="text-align:center; width:348px"><strong>6%</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:347px">&nbsp; Grasa Saturada 0 g</td>
                                                                        <td style="text-align:center; width:348px">0%</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:347px">&nbsp; Grasa Trans &nbsp; &nbsp; &nbsp;0 g</td>
                                                                        <td style="width:348px">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:347px"><strong>Colesterol 0 mg</strong></td>
                                                                        <td style="text-align:center; width:348px"><strong>0%</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:347px"><strong>Sodio 1 mg</strong></td>
                                                                        <td style="text-align:center; width:348px"><strong>0%</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:347px"><strong>Carbohidrato Total 15 g</strong></td>
                                                                        <td style="text-align:center; width:348px"><strong>5%</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:347px">&nbsp; Fibra Dietaria &nbsp; &nbsp;1 g</td>
                                                                        <td style="text-align:center; width:348px">4%</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:347px">&nbsp; Az&uacute;cares &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 0 g</td>
                                                                        <td style="width:348px">&nbsp;</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="width:347px"><strong>Prote&iacute;na 4 g</strong></td>
                                                                        <td style="text-align:center; width:348px"><strong>8%</strong></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2" style="text-align:center; width:347px">Vitamina A 0% &nbsp; &nbsp;Vitamina C 2%</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2" style="text-align:center; width:347px">Calcio 2%&nbsp; &nbsp; Hierro 12%</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2" style="text-align:center; width:347px">Los porcentajes de valores diarios est&aacute;n basados en una dieta de 2000 calor&iacute;as. Sus valores diarios pueden ser mayores o menores dependiendo de sus necesidades calor&iacute;cas.</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        <?php } ?>
                                                    </textarea>
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
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="id_unitsmeasure">Unidad</label>
                                                    <?php echo form_dropdown('id_unitsmeasure[]', $unitsmeasure, set_value('id_unitsmeasure'), 'data-placeholder="Seleccionar..." class="form-control"'); ?>
                                                    <?php echo form_error('id_unitsmeasure') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="grammage">Cantidad</label>
                                                    <input type="number" name="grammage" id="grammage" class="form-control" value="<?php echo set_value('grammage') ?>" required="" />
                                                    <?php echo form_error('grammage') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="width">Ancho</label>
                                                    <input type="number" name="width" id="width" class="form-control" value="<?php echo set_value('width') ?>" required="" />
                                                    <?php echo form_error('width') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-2">
                                                <div class="form-group">
                                                    <label for="high">Altura</label>
                                                    <input type="number" name="high" id="high" class="form-control" value="<?php echo set_value('high') ?>" required="" />
                                                    <?php echo form_error('high') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="depth">Profundidad</label>
                                                    <input type="number" name="depth" id="depth" class="form-control" value="<?php echo set_value('depth') ?>" required="" />
                                                    <?php echo form_error('depth') ?>
                                                </div>
                                            </div>
                                            <div class="col-sm-4">
                                                <div class="form-group">
                                                    <label for="weight">Peso</label>
                                                    <input type="number" name="weight" id="weight" class="form-control" value="<?php echo set_value('weight') ?>" required="" />
                                                    <?php echo form_error('weight') ?>
                                                </div>
                                            </div>
                                        </div>    
                                    </div>
                                </div>

                                <div class="tab-pane" id="tab_6">
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
                                                    <label for="meta_title">Meta Título</label>
                                                    <input type="text" name="meta_title" id="meta_title" class="form-control" value="<?php echo set_value('meta_title') ?>" required="" />
                                                    <?php echo form_error('meta_title') ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label for="meta_description">Meta Descripción</label>
                                                    <textarea name="meta_description" id="meta_description" rows="2" class="form-control"><?php echo set_value('meta_description'); ?></textarea>
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