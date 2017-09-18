<style type="text/css">
    .img {
        border-radius: 5px;
        border: 2px solid rgb(236, 236, 236);
        cursor: pointer;
        height: 14.4em;
        width: 14.4em;
    }
    .btn-action-img {
        position: absolute;
        display: none;
    }
        .container-details:hover{
            background-color: #f9f9f9;
        }
    .btn-action-img button {
        border-radius: 0;
        border: 0;
    }
    .filtr-container {
        margin-left: 3px;
    }
    .main-manager {
        width: 99%;
    }
    .categories-container {
        background: rgb(251, 249, 249);
        border-radius: 5px;
        border: 1px solid #eee;
        margin-left: 1em;
        margin-right: 1em;
        padding: 0.6em 0.5em;
    }
</style>
<!-- Main content -->
<section class="content">
    <?php if ($this->uri->segment(2) == 'success-images'): ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>
                            <i class="icon fa fa-check"></i> Exitoso
                        </h4>
                    El archivo ingresado se ha almacenado correctamente.
              </div>
            </div>
        </div>
    <?php endif ?>
    <?php if ($this->uri->segment(2) == 'success-delete-images'): ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>
                            <i class="icon fa fa-trash"></i> Exitoso
                        </h4>
                    El archivo seleccionado ha sido eliminado correctamente.
              </div>
            </div>
        </div>
    <?php endif ?>
    <?php if ($this->uri->segment(2) == 'error-select-images'): ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>
                            <i class="icon fa fa-trash"></i> Alerta
                        </h4>
                    Error no has seleccionado ningun medio para subir...
              </div>
            </div>
        </div>
    <?php endif ?>
    <div class="box box-warning">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Archivos de Imagenes
                <span style="float: right;">
                    <button title="Agregar Archivos" class="btn btn-primary btn-md" id="btn-file-manager" style="width: 10em"><i class="fa fa-plus-circle" id="btn-icon"></i></button>
                </span>
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row" style="display: none;" id="file-manager">
                <?php echo form_open_multipart('multimedia/add-file-manager-images') ?>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label>Categoría</label>
                            <?php echo form_dropdown('id_category', $list_categories, null, 'class="form-control"') ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                            <div class="form-group">
                                <label>Seleccione los recursos</label>
                                <input type="file" name="files">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary" style="width: 10em;">Enviar</button>
                            </div>
                    </div>
                </form>
            </div>
            <div id="main-manager">
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
                                <li style="text-align: center;padding: 6px 15px;background-color: #f7f8f9;color: #444444;border: 1px solid #eee;" class="shuffle-btn" data-shuffle>Aleatorio</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- This is the set up of a basic gallery, your items must have the categories they belong to in a data-category
                        attribute, which starts from the value 1 and goes up from there -->
                    <div class="filtr-container">
                        <?php foreach ($list_images as $key => $value): ?>
                            <div class="col-xs-6 col-sm-3 col-md-2 filtr-item" data-category="<?php echo $value['id_category'] ?>" data-sort="<?php echo $value['name'] ?>">
                                <div class="btn-action-img" id="<?php echo $value['file'] ?>" value="<?php echo $value['file_name'] ?>">
                                    <button type="button" class="btn btn-danger btn-delete-medios" style="width: 13.8em; background-color: rgba(255, 0, 0, 0.84); border-top-right-radius: 5px; border-top-left-radius: 5px;">
                                        <strong><i class="fa fa-trash"></i></strong>
                                    </button>
                                </div>
                                <div class="img-main" id="<?php echo $value['file'] ?>">
                                    <img class="img img-responsive center-block" src="<?php echo base_url('assets/dist/img/multimedia/images/').$value['file_name'] ?>" />
                                    <span class="item-desc"><?php echo $value['name'] ?></span>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
        </div>        
    </div>
</section>
<!-- /.content -->   
<div id="dialog-confirm" title="¿Desea eliminar este archivo?" style="display: none;">
    <p>
        <span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Estas seguro de seguir y ejecutar está acción, recuerda que no tienes ninguna opción para recuperar este archivo
    </p>
</div>