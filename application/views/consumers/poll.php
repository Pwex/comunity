<style>
    .btn-group, .btn-group-vertical {
        width: 100%;
    }
    .btn-check-main {
        font-size: 1.1em;
        padding: 10px 2px;
        width: 12.5%;
    }
    .btn-check-main2 {
        font-size: 1.1em;
        padding: 10px 2px;
        width: 10%;
    }
    .btn-check-main3 {
        font-size: 1.1em;
        padding: 10px 2px;
        width: 18%;
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
    opacity: 1;             
    }  
</style>
<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Registrar Encuesta</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('consumers/poll/'.$this->uri->segment(3)) ?>
             <div class="row">
                <label>Cuál de los siguientes aspectos es actualmente más importante para mejorar su bienestar?</label>
            </div>
            <p></p>
            <!-- /.box-header -->
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main">Salud física
                                <input type="checkbox" name="health" id="health" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('health') ?>
                            <label class="btn btn-default btn-check-main">Belleza
                                <input type="checkbox" name="beauty" id="beauty" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Cuidado cuerpo
                                <input type="checkbox" name="body" id="body" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Cuidado facial
                                <input type="checkbox" name="facial" id="facial" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Cuidado capilar
                                <input type="checkbox" name="capillary" id="capillary" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Nutrición
                                <input type="checkbox" name="nutrition" id="nutrition" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Salud sexual
                                <input type="checkbox" name="sexuality" id="sexuality" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Todos
                                <input type="checkbox" name="all" id="all" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('all') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <label>Con qué frecuencia consume estos alimentos a la semana?</label>
            <!-- /.box-header -->
            <div class="row">
                <div class="row setup-content" id="step-2">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label for="fats">Grasas </label><br />
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="fats" value="0" <?php echo set_radio('fats','0'); ?> id="fats1" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">1
                                <input type="radio" name="fats" value="1" <?php echo set_radio('fats','1'); ?> id="fats2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">2
                                <input type="radio" name="fats" value="2" <?php echo set_radio('fats','2'); ?> id="fats3" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">3
                                <input type="radio" name="fats" value="3" <?php echo set_radio('fats','3'); ?> id="fats4" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">4
                                <input type="radio" name="fats" value="4" <?php echo set_radio('fats','4'); ?> id="fats5" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">5
                                <input type="radio" name="fats" value="5" <?php echo set_radio('fats','5'); ?> id="fats6" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">6
                                <input type="radio" name="fats" value="6" <?php echo set_radio('fats','6'); ?> id="fats7" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">7
                                <input type="radio" name="fats" value="7" <?php echo set_radio('sweet','7'); ?> id="fats8" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('fats') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="row setup-content" id="step-3">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label for="sweet">Dulces </label><br />
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="sweet" value="0" <?php echo set_radio('sweet','0'); ?> id="sweet1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">1
                                <input type="radio" name="sweet" value="1" <?php echo set_radio('sweet','1'); ?> id="sweet2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">2
                                <input type="radio" name="sweet" value="2" <?php echo set_radio('sweet','2'); ?> id="sweet3" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">3
                                <input type="radio" name="sweet" value="3" <?php echo set_radio('sweet','3'); ?> id="sweet4" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">4
                                <input type="radio" name="sweet" value="4" <?php echo set_radio('sweet','4'); ?> id="sweet5" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">5
                                <input type="radio" name="sweet" value="5" <?php echo set_radio('sweet','5'); ?> id="sweet6" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">6
                                <input type="radio" name="sweet" value="6" <?php echo set_radio('sweet','6'); ?> id="sweet7" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">7
                                <input type="radio" name="sweet" value="7" <?php echo set_radio('sweet','7'); ?> id="sweet8" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('sweet') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="row setup-content" id="step-4">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label for="alcohol">Alcohol </label><br />
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="alcohol" value="0" <?php echo set_radio('alcohol','0'); ?> id="alcohol1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">1
                                <input type="radio" name="alcohol" value="1" <?php echo set_radio('alcohol','1'); ?> id="alcohol2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">2
                                <input type="radio" name="alcohol" value="2" <?php echo set_radio('alcohol','2'); ?> id="alcohol3" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">3
                                <input type="radio" name="alcohol" value="3" <?php echo set_radio('alcohol','3'); ?> id="alcohol4" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">4
                                <input type="radio" name="alcohol" value="4" <?php echo set_radio('alcohol','4'); ?> id="alcohol5" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">5
                                <input type="radio" name="alcohol" value="5" <?php echo set_radio('alcohol','5'); ?> id="alcohol6" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">6
                                <input type="radio" name="alcohol" value="6" <?php echo set_radio('alcohol','6'); ?> id="alcohol7" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">7
                                <input type="radio" name="alcohol" value="7" <?php echo set_radio('alcohol','7'); ?> id="alcohol8" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('alcohol') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="row setup-content" id="step-5">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label for="meats">Carnes </label><br />
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="meats" value="0" <?php echo set_radio('meats','0'); ?> id="meats1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">1
                                <input type="radio" name="meats" value="1" <?php echo set_radio('meats','1'); ?> id="meats2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">2
                                <input type="radio" name="meats" value="2" <?php echo set_radio('meats','2'); ?> id="meats3" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">3
                                <input type="radio" name="meats" value="3" <?php echo set_radio('meats','3'); ?> id="meats4" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">4
                                <input type="radio" name="meats" value="4" <?php echo set_radio('meats','4'); ?> id="meats5" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">5
                                <input type="radio" name="meats" value="5" <?php echo set_radio('meats','5'); ?> id="meats6" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">6
                                <input type="radio" name="meats" value="6" <?php echo set_radio('meats','6'); ?> id="meats7" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">7
                                <input type="radio" name="meats" value="7" <?php echo set_radio('meats','7'); ?> id="meats8" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('meats') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="row setup-content" id="step-6">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label for="fruits">Frutas </label><br />
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="fruits" value="0" <?php echo set_radio('fruits','0'); ?>  id="fruits1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">1
                                <input type="radio" name="fruits" value="1" <?php echo set_radio('fruits','1'); ?>  id="fruits2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">2
                                <input type="radio" name="fruits" value="2" <?php echo set_radio('fruits','2'); ?>  id="fruits3" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">3
                                <input type="radio" name="fruits" value="3" <?php echo set_radio('fruits','3'); ?>  id="fruits4" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">4
                                <input type="radio" name="fruits" value="4" <?php echo set_radio('fruits','4'); ?>  id="fruits5" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">5
                                <input type="radio" name="fruits" value="5" <?php echo set_radio('fruits','5'); ?>  id="fruits6" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">6
                                <input type="radio" name="fruits" value="6" <?php echo set_radio('fruits','6'); ?>  id="fruits7" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">7
                                <input type="radio" name="fruits" value="7" <?php echo set_radio('fruits','7'); ?>  id="fruits8" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('fruits') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row setup-content" id="step-7">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label for="grain">Granos </label><br />
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="grain" value="0" <?php echo set_radio('grain','0'); ?> id="grain1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">1
                                <input type="radio" name="grain" value="1" <?php echo set_radio('grain','1'); ?> id="grain2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">2
                                <input type="radio" name="grain" value="2" <?php echo set_radio('grain','2'); ?> id="grain3" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">3
                                <input type="radio" name="grain" value="3" <?php echo set_radio('grain','3'); ?> id="grain4" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">4
                                <input type="radio" name="grain" value="4" <?php echo set_radio('grain','4'); ?> id="grain5" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">5
                                <input type="radio" name="grain" value="5" <?php echo set_radio('grain','5'); ?> id="grain6" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">6
                                <input type="radio" name="grain" value="6" <?php echo set_radio('grain','6'); ?> id="grain7" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">7
                                <input type="radio" name="grain" value="7" <?php echo set_radio('grain','7'); ?> id="grain8" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('grain') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row setup-content" id="step-8">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label for="vegetables">Verduras </label><br />
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="vegetables" value="0" <?php echo set_radio('vegetables','0'); ?> id="vegetables1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">1
                                <input type="radio" name="vegetables" value="1" <?php echo set_radio('vegetables','1'); ?> id="vegetables2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">2
                                <input type="radio" name="vegetables" value="2" <?php echo set_radio('vegetables','2'); ?> id="vegetables3" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">3
                                <input type="radio" name="vegetables" value="3" <?php echo set_radio('vegetables','3'); ?> id="vegetables4" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">4
                                <input type="radio" name="vegetables" value="4" <?php echo set_radio('vegetables','4'); ?> id="vegetables5" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">5
                                <input type="radio" name="vegetables" value="5" <?php echo set_radio('vegetables','5'); ?> id="vegetables6" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">6
                                <input type="radio" name="vegetables" value="6" <?php echo set_radio('vegetables','6'); ?> id="vegetables7" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">7
                                <input type="radio" name="vegetables" value="7" <?php echo set_radio('vegetables','7'); ?> id="vegetables8" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('vegetables') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="not_eat">Rutinariamente omite las comidas o reduce la ingesta calórica para perder peso?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-9">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Frecuentemente
                                <input type="radio" name="not_eat" value="frecuentemente" <?php echo set_radio('not_eat','frecuentemente'); ?> id="noteat1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">A veces
                                <input type="radio" name="not_eat" value="a veces" <?php echo set_radio('not_eat','a veces'); ?> id="noteat2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Casi nunca
                                <input type="radio" name="not_eat" value="casi nunca" <?php echo set_radio('not_eat','casi nunca'); ?> id="noteat3" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Nunca
                                <input type="radio" name="not_eat" value="nunca" <?php echo set_radio('not_eat','nunca'); ?> id="noteat4" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('not_eat') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="low_carbohy">Sigue una dieta baja en carbohidratos?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-10">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Si
                                <input type="radio" name="low_carbohy" value="si" <?php echo set_radio('low_carbohy','si'); ?> id="lowcarbohy1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">No
                                <input type="radio" name="low_carbohy" value="no" <?php echo set_radio('low_carbohy','no'); ?> id="lowcarbohy2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('low_carbohy') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="defecation">Cuántas veces va al baño al día?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-11">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">1 vez al día
                                <input type="radio" name="defecation" value="1 al dia" <?php echo set_radio('defecation','1 al dia'); ?> id="defecation1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">2-3 veces al día
                                <input type="radio" name="defecation" value="2-3 al dia" <?php echo set_radio('defecation','2-3 al dia'); ?> id="defecation2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Más de 3 veces día
                                <input type="radio" name="defecation" value="mas 3 al dia" <?php echo set_radio('defecation','mas 3 al dia'); ?> id="defecation3" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">No todos los días
                                <input type="radio" name="defecation" value="no todos dias" <?php echo set_radio('defecation','no todos dias'); ?> id="defecation4" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Cada 5 días
                                <input type="radio" name="defecation" value="cada 5 dia" <?php echo set_radio('defecation','cada 5 dia'); ?> id="defecation4" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('defecation') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="activity">Cada cuánto hace actividad física a la semana?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-12">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">No hace 
                                <input type="radio" name="activity" value="no hace" <?php echo set_radio('activity','No hace'); ?> id="activity1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">1 vez 
                                <input type="radio" name="activity" value="1" <?php echo set_radio('activity','1'); ?> id="activity2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Entre 2-3 veces
                                <input type="radio" name="activity" value="2-3" <?php echo set_radio('activity','2-3'); ?> id="activity3" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Más de 4 veces
                                <input type="radio" name="activity" value="mas 4" <?php echo set_radio('activity','mas 4'); ?> id="activity4" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('activity') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="stress">De 1 a 10 cómo califica su nivel de estrés diario?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-13">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main2" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">1
                                <input type="radio" name="stress" value="1" <?php echo set_radio('stress','1'); ?> id="stress2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">2
                                <input type="radio" name="stress" value="2" <?php echo set_radio('stress','2'); ?> id="stress3" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">3
                                <input type="radio" name="stress" value="3" <?php echo set_radio('stress','3'); ?> id="stress4" autocomplete="off" required=""> 
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">4
                                <input type="radio" name="stress" value="4" <?php echo set_radio('stress','4'); ?> id="stress5" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">5
                                <input type="radio" name="stress" value="5" <?php echo set_radio('stress','5'); ?> id="stress6" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">6
                                <input type="radio" name="stress" value="6" <?php echo set_radio('stress','6'); ?> id="stress7" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">7
                                <input type="radio" name="stress" value="7" <?php echo set_radio('stress','7'); ?> id="stress8" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">8
                                <input type="radio" name="stress" value="8" <?php echo set_radio('stress','8'); ?> id="stress8" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">9
                                <input type="radio" name="stress" value="9" <?php echo set_radio('stress','9'); ?> id="stress8" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">10
                                <input type="radio" name="stress" value="10" <?php echo set_radio('stress','10'); ?> id="stress8" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('stress') ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="pain">A menudo siente dolor en algunas zonas del cuerpo como cuello, espalda o cintura?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-14">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main3" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Más de 1 vez por semana 
                                <input type="radio" name="pain" value="mas 1 semana" <?php echo set_radio('pain','mas 1 semana'); ?> id="pain2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main3">1 vez a la semana
                                <input type="radio" name="pain" value="1 semana" <?php echo set_radio('pain','1 semana'); ?> id="pain3" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main3">1-2 veces al mes
                                <input type="radio" name="pain" value="1-2 mes" <?php echo set_radio('pain','1-2 mes'); ?> id="pain4" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main3">Nunca
                                <input type="radio" name="pain" value="nunca" <?php echo set_radio('pain','nunca'); ?> id="pain5" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('pain') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="sleep">En promedio cuantas horas duerme por día?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-15">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main2" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">1
                                <input type="radio" name="sleep" value="1" <?php echo set_radio('sleep','1'); ?> id="sleep2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">2
                                <input type="radio" name="sleep" value="2" <?php echo set_radio('sleep','2'); ?> id="sleep3" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">3
                                <input type="radio" name="sleep" value="3" <?php echo set_radio('sleep','3'); ?> id="sleep4" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">4
                                <input type="radio" name="sleep" value="4" <?php echo set_radio('sleep','4'); ?> id="sleep5" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">5
                                <input type="radio" name="sleep" value="5" <?php echo set_radio('sleep','5'); ?> id="sleep6" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">6
                                <input type="radio" name="sleep" value="6" <?php echo set_radio('sleep','6'); ?> id="sleep7" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">7
                                <input type="radio" name="sleep" value="7" <?php echo set_radio('sleep','7'); ?> id="sleep8" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">8
                                <input type="radio" name="sleep" value="8" <?php echo set_radio('sleep','8'); ?> id="sleep9" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">9
                                <input type="radio" name="sleep" value="9" <?php echo set_radio('sleep','9'); ?> id="sleep10" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">10 o más
                                <input type="radio" name="sleep" value="10" <?php echo set_radio('sleep','10'); ?> id="sleep11" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('sleep') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="wake">Durante la noche se despierta a menudo, no puede conciliar el sueño, o se levanta cansado?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-16">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Si
                                <input type="radio" name="wake" value="si" <?php echo set_radio('wake','si'); ?> id="wake1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">No
                                <input type="radio" name="wake" value="no" <?php echo set_radio('wake','no'); ?> id="wake2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('wake') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="libido">Cómo define su deseo sexual?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-17">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Muy alto
                                <input type="radio" name="libido" value="muy alto" <?php echo set_radio('libido','muy alto'); ?> id="libido1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Alto
                                <input type="radio" name="libido" value="alto" <?php echo set_radio('libido','alto'); ?> id="libido2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Medio
                                <input type="radio" name="libido" value="medio" <?php echo set_radio('libido','medio'); ?> id="libido3" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Bajo
                                <input type="radio" name="libido" value="bajo" <?php echo set_radio('libido','bajo'); ?> id="libido4" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('libido') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="has_felt">Se ha sentido a menudo ...?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-18">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main25" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Sin deseo de levantarse
                                <input type="radio" name="has_felt" value="no levantarse" id="has_felt1" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main25">Sin deseo de arreglarse
                                <input type="radio" name="has_felt" value="no arreglarse" id="has_felt2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main25">Con deseo de llorar
                                <input type="radio" name="has_felt" value="llorar" id="has_felt3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main25">Con sensación que el mundo es horrible
                                <input type="radio" name="has_felt" value="horrible" id="has_felt4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('has_felt') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="state_skin">Le gustaría conocer el estado actual de su piel?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-19">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Si
                                <input type="radio" name="state_skin" value="si" <?php echo set_radio('state_skin', 'si'); ?> id="state_skin1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">No
                                <input type="radio" name="state_skin" value="no" <?php echo set_radio('state_skin', 'no'); ?> id="state_skin2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('state_skin') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="immune">Le gustaría mejorar su sistema inmune?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-20">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Si
                                <input type="radio" name="immune" value="si" <?php echo set_radio('immune', 'si'); ?> id="immune1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">No
                                <input type="radio" name="immune" value="no" <?php echo set_radio('immune', 'no'); ?> id="immune2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('immune') ?>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="alimentary">Le gustaría cambiar sus hábitos alimenticios para mantener un peso adecuado?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-21">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Si
                                <input type="radio" name="alimentary" value="si" <?php echo set_radio('alimentary', 'si'); ?> id="alimentary1" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">No
                                <input type="radio" name="alimentary" value="no" <?php echo set_radio('alimentary', 'no'); ?> id="alimentary2" autocomplete="off" required="">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <?php echo form_error('alimentary') ?>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-sm-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Enviar</button>
                        <button type="submit" class="btn btn-info">Enviar y Medir</button>
                        <button type="reset"  class="btn btn-default">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</section>
<!-- /.content -->   