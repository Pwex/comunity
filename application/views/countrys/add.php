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
</style>
<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Crear Pais</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('countrys/add') ?>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name_country">Pais</label>
                            <input type="text" name="name_country" id="name_country" class="form-control" value="<?php echo set_value('name_country') ?>" required="" />
                            <?php echo form_error('name_country') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-1">
                        <div class="form-group">
                            <label for="coin">Moneda</label>
                            <input type="text" name="coin" id="coin" class="form-control" value="<?php echo set_value('coin') ?>" required="" />
                            <?php echo form_error('coin') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-2">
                        <div class="input-group">
                            <input type="number" name="tax_iva" id="tax_iva" class="form-control" value="<?php echo set_value('tax_iva') ?>" required="" />
                            <span class="input-group-addon"><i class="fa fa-percent"></i> Iva</span>
                            <?php echo form_error('tax_iva') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="input-group" style="width: 100%">
                            <label for="status_country">Estatus</label>
                            <?php echo form_dropdown('status_country', $status_country, set_value('status_country'), 'class="form-control" id="status_country"') ?>
                            <?php echo form_error('tax_iva') ?>
                        </div>
                    </div>
                </div>
                <p></p>
                <!-- Shuffle & Sort Controls -->
                <div class="row">
                    <label style="padding-left: 1em;">Búsqueda y filtros</label>
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
                <div class="row main-manager">
                    <!-- This is the set up of a basic gallery, your items must have the categories they belong to in a data-category
                        attribute, which starts from the value 1 and goes up from there -->
                    <div class="filtr-container" style="margin-left: 8px">
                        <?php foreach ($list_images as $key => $value): ?>
                            <div class="col-xs-6 col-sm-3 col-md-2 filtr-item" data-category="<?php echo $value['id_category'] ?>" data-sort="<?php echo $value['name'] ?>">
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
                <p></p>
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