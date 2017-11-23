<style>
    .btn-default {
        background-color: #ffffff;
        border-color: #f2f2f2;
        color: #5d5c5c;
    }
    .btn-group, .btn-group-vertical {
        width: 100%;
    }
    .btn-check-main {
        font-size: 1.1em;
        padding: 10px;
        width: 12.5%;
        text-align: left;
    }
    .btn-check-main2 {
        font-size: 1.1em;
        padding: 20px 0;
        width: 20%;
        text-align: center;
    }
    .btn-check-main3 {
        font-size: 1.1em;
        padding: 10px 2px;
        width: 18%;
    }
    .btn-check-main50 {
        font-size: 1em;
        padding: 20px;
        text-align: left;
        width: 100%;
        border-radius: 3px !important;
    }

    .btn-check-main25 {
        font-size: 1.1em;
        padding: 10px 2px;
        width: 25%;
    }
    .btn span.glyphicon {               
        opacity: 0;             
    }
    .btn.active span.glyphicon {                
        color: #FF9800;
        font-size: 24px;
        opacity: 1;
        position: absolute;
        right: 15px;
        top: 10px;
    }  
    .btn-default.active, .btn-default:active, .open>.dropdown-toggle.btn-default {
        color: #333;
        background-color: #f4f4f4;
        border-color: #cecece;
    }
    .btn-poll-checked {
        -webkit-box-shadow: 2px 6px 18px -12px rgba(176,176,176,1);
        -moz-box-shadow: 2px 6px 18px -12px rgba(176,176,176,1);
        box-shadow: 2px 6px 18px -12px rgba(176,176,176,1);
        margin-top: 5px;
        outline: none;
    }
    .icon-poll {
        color: #fff !important;
        font-size: 18px !important;
        position: absolute !important;
        right: 3px !important;
        top: 7px !important;
    }
</style>
<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Registrar Medición</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php //echo form_open('consumers/measuring') ?>
            <?php echo form_open('consumers/measuring/'.$this->uri->segment(3)) ?>
            <div class="row">
                <div class="col-sm-12">
                    <label>MONITOR CORPORAL</label>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h4>Grasa Corporal</h4>
                </div>
                <?php if ($type_of_sex[0]['sex'] == 'Masculino'): ?>
                    <div class="col-xs-12">
                        <p style="margin-bottom: 0">Hombre</p>
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 100%; padding: 20px;">10% Delgado
                                <input type="radio" name="body_fat_man" value="10" <?php echo set_radio('body_fat_man', '10'); ?> id="body_fat_man1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 100%; padding: 20px;">20% Estándar
                                <input type="radio" name="body_fat_man" value="20" <?php echo set_radio('body_fat_man', '20'); ?> id="body_fat_man1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 100%; padding: 20px;">25% Semi-Corpulento
                                <input type="radio" name="body_fat_man" value="25" <?php echo set_radio('body_fat_man', '25'); ?> id="body_fat_man1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 100%; padding: 20px;">>25% Corpulento
                                <input type="radio" name="body_fat_man" value="30" <?php echo set_radio('body_fat_man', '30'); ?> id="body_fat_man1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('body_fat_man') ?>
                        </div>
                    </div>
                <?php endif ?>
                <?php if ($type_of_sex[0]['sex'] == 'Femenino'): ?>
                    <div class="col-xs-12">
                        <p style="margin-bottom: 0">Mujer</p>
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 100%">20% Delgada
                                <input type="radio" name="body_fat_woman" value="20" <?php echo set_radio('body_fat_woman', '20'); ?> id="body_fat_woman1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 100%">30% Estándar
                                <input type="radio" name="body_fat_woman" value="30" <?php echo set_radio('body_fat_woman', '30'); ?> id="body_fat_woman1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 100%">35% Semi-Corpulenta
                                <input type="radio" name="body_fat_woman" value="35" <?php echo set_radio('body_fat_woman', '35'); ?> id="body_fat_woman1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 100%">>35% Corpulenta
                                <input type="radio" name="body_fat_woman" value="40" <?php echo set_radio('body_fat_woman', '40'); ?> id="body_fat_woman1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('body_fat_woman') ?>
                        </div>
                    </div>
                <?php endif ?>
            </div>
            <hr />
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label>MONITOR DE PIEL</label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default active" id="palm">Palma</button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" id="arm">Brazo</button>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary" id="face">Rostro</button>
                        </div>
                    </div>
                </div>
            </div>
            <div id="task_palm">
                <div class="row">
                    <p></p>
                    <div class="col-xs-12">
                        <h4>Hidratación</h4>
                    </div>
                    <div class="col-xs-12">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-danger btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Deficiente
                                <input type="radio" name="hydration_palm" value="45" <?php echo set_radio('hydration_palm', '45'); ?> id="hydration_palm1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Estándar
                                <input type="radio" name="hydration_palm" value="60" <?php echo set_radio('hydration_palm', '60'); ?> id="hydration_palm1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-success btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Excelente
                                <input type="radio" name="hydration_palm" value="100" <?php echo set_radio('hydration_palm', '100'); ?> id="hydration_palm1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <?php echo form_error('hydration_palm') ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <span style="font-weight: bold; position: absolute;">0</span>
                        <span style="font-weight: bold; position: absolute; left: 32.5%;">45</span>
                        <span style="font-weight: bold; position: absolute; right: 33%;">60</span>
                        <span style="font-weight: bold; position: absolute; right: 3.8%;">100</span>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-xs-12">
                        <h4>Oleosidad</h4>
                    </div>
                    <div class="col-xs-12">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-danger btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Bajo
                                <input type="radio" name="oil_palm" value="20" <?php echo set_radio('oil_palm', '20'); ?> id="oil_palm1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-success btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Óptimo
                                <input type="radio" name="oil_palm" value="25" <?php echo set_radio('oil_palm', '25'); ?> id="oil_palm1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Alto
                                <input type="radio" name="oil_palm" value="55" <?php echo set_radio('oil_palm', '55'); ?> id="oil_palm1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <?php echo form_error('oil_palm') ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <span style="font-weight: bold; position: absolute;">5</span>
                        <span style="font-weight: bold; position: absolute; left: 32.5%;">20</span>
                        <span style="font-weight: bold; position: absolute; right: 33%;">25</span>
                        <span style="font-weight: bold; position: absolute; right: 3.8%;">55</span>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-xs-12">
                        <h4>Elasticidad</h4>
                    </div>
                    <div class="col-xs-12">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-danger btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Flacidez
                                <input type="radio" name="palm_elasticity" value="4.5" <?php echo set_radio('palm_elasticity', '4.5'); ?> id="palm_elasticity1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-success btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Óptimo
                                <input type="radio" name="palm_elasticity" value="5.5" <?php echo set_radio('palm_elasticity', '5.5'); ?> id="palm_elasticity1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Aspéreza
                                <input type="radio" name="palm_elasticity" value="10" <?php echo set_radio('palm_elasticity', '10'); ?> id="palm_elasticity1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <?php echo form_error('palm_elasticity') ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <span style="font-weight: bold; position: absolute;">0</span>
                        <span style="font-weight: bold; position: absolute; left: 32.5%;">4,5</span>
                        <span style="font-weight: bold; position: absolute; right: 33%;">5,5</span>
                        <span style="font-weight: bold; position: absolute; right: 3.8%;">10</span>
                    </div>
                </div>
            </div>
            <div id="task_arm" style="display: none;">
                <div class="row">
                    <p></p>
                    <div class="col-xs-12">
                        <h4>Hidratación</h4>
                    </div>
                    <div class="col-xs-12">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-danger btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Deficiente
                                <input type="radio" name="hydration_arm" value="40" <?php echo set_radio('hydration_arm', '40'); ?> id="hydration_arm1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Estándar
                                <input type="radio" name="hydration_arm" value="55" <?php echo set_radio('hydration_arm', '55'); ?> id="hydration_arm1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-success btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Excelente
                                <input type="radio" name="hydration_arm" value="100" <?php echo set_radio('hydration_arm', '100'); ?> id="hydration_arm1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <?php echo form_error('hydration_arm') ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <span style="font-weight: bold; position: absolute;">0</span>
                        <span style="font-weight: bold; position: absolute; left: 32.5%;">40</span>
                        <span style="font-weight: bold; position: absolute; right: 33%;">55</span>
                        <span style="font-weight: bold; position: absolute; right: 3.8%;">100</span>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-xs-12">
                        <h4>Oleosidad</h4>
                    </div>
                    <div class="col-xs-12">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-danger btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Bajo
                                <input type="radio" name="oil_arm" value="20" <?php echo set_radio('oil_arm', '20'); ?> id="oil_arm1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-success btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Óptimo
                                <input type="radio" name="oil_arm" value="25" <?php echo set_radio('oil_arm', '25'); ?> id="oil_arm1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Alto
                                <input type="radio" name="oil_arm" value="55" <?php echo set_radio('oil_arm', '55'); ?> id="oil_arm1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <?php echo form_error('oil_arm') ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <span style="font-weight: bold; position: absolute;">5</span>
                        <span style="font-weight: bold; position: absolute; left: 32.5%;">20</span>
                        <span style="font-weight: bold; position: absolute; right: 33%;">25</span>
                        <span style="font-weight: bold; position: absolute; right: 3.8%;">55</span>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-xs-12">
                        <h4>Elasticidad</h4>
                    </div>
                    <div class="col-xs-12">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-danger btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Flacidez
                                <input type="radio" name="arm_elasticity" value="4.5" <?php echo set_radio('arm_elasticity', '4.5'); ?> id="arm_elasticity1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-success btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Óptimo
                                <input type="radio" name="arm_elasticity" value="5.5" <?php echo set_radio('arm_elasticity', '5.5'); ?> id="arm_elasticity1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Aspéreza
                                <input type="radio" name="arm_elasticity" value="10" <?php echo set_radio('arm_elasticity', '10'); ?> id="arm_elasticity1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <?php echo form_error('arm_elasticity') ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <span style="font-weight: bold; position: absolute;">0</span>
                        <span style="font-weight: bold; position: absolute; left: 32.5%;">4,5</span>
                        <span style="font-weight: bold; position: absolute; right: 33%;">5,5</span>
                        <span style="font-weight: bold; position: absolute; right: 3.8%;">10</span>
                    </div>
                </div>
            </div>
            <div id="task_face" style="display: none;">
                <div class="row">
                    <p></p>
                    <div class="col-xs-12">
                        <h4>Hidratación</h4>
                    </div>
                    <div class="col-xs-12">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-danger btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Deficiente
                                <input type="radio" name="hydration_face" value="35" <?php echo set_radio('hydration_face', '35'); ?> id="hydration_face1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Estándar
                                <input type="radio" name="hydration_face" value="55" <?php echo set_radio('hydration_face', '55'); ?> id="hydration_face1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-success btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Excelente
                                <input type="radio" name="hydration_face" value="100" <?php echo set_radio('hydration_face', '100'); ?> id="hydration_face1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <?php echo form_error('hydration_face') ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <span style="font-weight: bold; position: absolute;">0</span>
                        <span style="font-weight: bold; position: absolute; left: 32.5%;">35</span>
                        <span style="font-weight: bold; position: absolute; right: 33%;">55</span>
                        <span style="font-weight: bold; position: absolute; right: 3.8%;">100</span>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-xs-12">
                        <h4>Oleosidad</h4>
                    </div>
                    <div class="col-xs-12">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-danger btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Bajo
                                <input type="radio" name="oil_face" value="20" <?php echo set_radio('oil_face', '20'); ?> id="oil_face1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-success btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Óptimo
                                <input type="radio" name="oil_face" value="25" <?php echo set_radio('oil_face', '25'); ?> id="oil_face1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Alto
                                <input type="radio" name="oil_face" value="55" <?php echo set_radio('oil_face', '55'); ?> id="oil_face1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <?php echo form_error('oil_face') ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <span style="font-weight: bold; position: absolute;">5</span>
                        <span style="font-weight: bold; position: absolute; left: 32.5%;">20</span>
                        <span style="font-weight: bold; position: absolute; right: 33%;">25</span>
                        <span style="font-weight: bold; position: absolute; right: 3.8%;">55</span>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-xs-12">
                        <h4>Elasticidad</h4>
                    </div>
                    <div class="col-xs-12">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-danger btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Flacidez
                                <input type="radio" name="face_elasticity" value="4.5" <?php echo set_radio('face_elasticity', '4.5'); ?> id="face_elasticity1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-success btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Óptimo
                                <input type="radio" name="face_elasticity" value="5.5" <?php echo set_radio('face_elasticity', '5.5'); ?> id="face_elasticity1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 33.399%; font-size: 0.85em;">Aspéreza
                                <input type="radio" name="face_elasticity" value="10" <?php echo set_radio('face_elasticity', '10'); ?> id="face_elasticity1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok icon-poll"></span>
                            </label>
                            <?php echo form_error('face_elasticity') ?>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <span style="font-weight: bold; position: absolute;">0</span>
                        <span style="font-weight: bold; position: absolute; left: 32.5%;">4,5</span>
                        <span style="font-weight: bold; position: absolute; right: 33%;">5,5</span>
                        <span style="font-weight: bold; position: absolute; right: 3.8%;">10</span>
                    </div>
                </div>
            </div>
            <br /><br />
            <input type="hidden" name="id_consumer" value="<?php echo $this->uri->segment(3) ?>">
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <div class="btn-group btn-group-justified">
                            <div class="btn-group">
                                <button type="reset"  class="btn btn-default">Cancelar</button>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-primary">Enviar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->   
<script type="text/javascript">
    $(document).ready(function(){
       $('.btn-poll-checked, .btn').on('click', function(){
            ion.sound({
            sounds: [
                {name: "water_droplet_3"}
            ],
            path: "<?php echo base_url('assets/plugins/ion-sound/sounds/') ?>",
            preload: true,
            multiplay: true,
            volume: 0.9
        });

        // play sound
        ion.sound.play("water_droplet_3");
        });
        // Boton de palma
        $('#palm').on('click', function(){
            $('#arm').removeClass('btn-default active');
            $('#arm').addClass('btn-primary');
            $('#face').removeClass('btn-default active');
            $('#face').addClass('btn-primary');
            $(this).removeClass('btn-primary');
            $(this).addClass('btn-default active');
            $('#task_arm').hide();
            $('#task_face').hide();
            $('#task_palm').show(500);
        });
        // Boton de brazo
        $('#arm').on('click', function(){
            $('#palm').removeClass('btn-default active');
            $('#palm').addClass('btn-primary');
            $('#face').removeClass('btn-default active');
            $('#face').addClass('btn-primary');
            $(this).removeClass('btn-primary');
            $(this).addClass('btn-default active');
            $('#task_palm').hide();
            $('#task_face').hide();
            $('#task_arm').show(500);
        });
        // Boton de rostro
        $('#face').on('click', function(){
            $('#arm').removeClass('btn-default active');
            $('#arm').addClass('btn-primary');
            $('#palm').removeClass('btn-default active');
            $('#palm').addClass('btn-primary');
            $(this).removeClass('btn-primary');
            $(this).addClass('btn-default active');
            $('#task_arm').hide();
            $('#task_palm').hide();
            $('#task_face').show(500);
        });
    });
</script>