<style type="text/css">
    .img {
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
                    <button title="Agregar Archivos" class="btn btn-primary btn-md" id="btn-file-manager"><i class="fa fa-plus-circle" id="btn-icon"></i></button>
                </span>
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row" style="display: none;" id="file-manager">
                <div class="col-xs-12">
                    <?php echo form_open_multipart('multimedia/add-file-manager-images') ?>
                        <div class="form-group">
                            <label>Seleccione los recursos</label>
                            <input type="file" name="files">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="main-manager">
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
                <div class="row">
                    <!-- This is the set up of a basic gallery, your items must have the categories they belong to in a data-category
                        attribute, which starts from the value 1 and goes up from there -->
                    <div class="filtr-container">
                        <?php foreach ($list_images as $key => $value): ?>
                            <div class="col-xs-6 col-sm-3 col-md-2 filtr-item" data-category="1, 5" data-sort="<?php echo $value['name'] ?>">
                                <div class="btn-action-img" id="<?php echo $value['file'] ?>" value="<?php echo $value['file_name'] ?>">
                                    <button type="button" class="btn btn-danger btn-delete-medios"><i class="fa fa-trash"></i></button>
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