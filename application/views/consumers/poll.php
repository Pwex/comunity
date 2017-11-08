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
        padding: 10px 2px;
        width: 12.5%;
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
</style>
<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <h3 class="box-title">Registrar Encuesta</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('consumers/poll/'.$this->uri->segment(3), 'id="form-poll"') ?>
             <div class="row">
                <div class="col-xs-12">
                    <label>¿Cuál de los siguientes aspectos es actualmente más importante para mejorar su bienestar?</label>
                </div>
            </div>
            <p></p>
            <!-- /.box-header -->
            <div class="row no-padding">
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50 btn-poll-checked" style="margin-top: 0">Salud Física
                            <input type="checkbox" name="health" id="health" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('health') ?>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Belleza
                            <input type="checkbox" name="beauty" id="beauty" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('beauty') ?>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Cuidado Cuerpo
                            <input type="checkbox" name="body" id="body" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('body') ?>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Cuidado Facial
                            <input type="checkbox" name="facial" id="facial" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                         </label>
                        <?php echo form_error('facial') ?>
                    </div>
                </div>
            </div>
            <div class="row no-padding">
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Cuidado Capilar
                            <input type="checkbox" name="capillary" id="capillary" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('capillary') ?>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Nutrición
                            <input type="checkbox" name="nutrition" id="nutrition" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('nutrition') ?>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Salud Sexual
                            <input type="checkbox" name="sexuality" id="sexuality" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('sexuality') ?>
                        <label for="all_aspect" class="btn btn-default btn-check-main50 btn-poll-checked">Todos
                            <input type="checkbox" name="all_aspect" id="all_aspect" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('all_aspect') ?>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="col-xs-12">
                    <label for="disease">¿Sufre de alguna de estas enfermedades?</label>
                </div>
            </div> 
            <p></p>
            <div class="row no-padding">
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Diabetes
                            <input type="checkbox" name="diabetes" id="diabetes" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('diabetes') ?>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Hipoglicemia
                            <input type="checkbox" name="hypoglycemia" id="hypoglycemia" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('hypoglycemia') ?>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Hipertensión
                            <input type="checkbox" name="hypertension" id="hypertension" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('hypertension') ?>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Colesterol
                            <input type="checkbox" name="cholesterol" id="cholesterol" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('cholesterol') ?>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="col-xs-12">
                    <label for="disease">¿Cuántas veces come al día?</label>
                </div>
            </div> 
            <p></p>
            <div class="row no-padding">
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50 btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Depende de los días
                            <input type="radio" name="foods" value="depende" <?php echo set_radio('foods','depende'); ?> id="noteat1" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">3 => Desayuno, almuerzo y cena
                            <input type="radio" name="foods" value="3" <?php echo set_radio('foods','3'); ?> id="noteat2" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">5 => 3 Principales y 2 meriendas
                            <input type="radio" name="foods" value="5" <?php echo set_radio('foods','5'); ?> id="noteat3" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">6 o más comidas
                            <input type="radio" name="foods" value="6" <?php echo set_radio('foods','6'); ?> id="noteat4" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('foods') ?>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="col-xs-12">
                    <label for="disease">Con respecto a su salud digestiva, ¿Cuántas veces va al baño al día?</label>
                </div>
            </div> 
            <p></p>
            <div class="row no-padding">
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50 btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">1 vez al día
                            <input type="radio" name="defecation" value="1 al dia" <?php echo set_radio('defecation','1 al dia'); ?> id="defecation1" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">3 veces al día o más
                            <input type="radio" name="defecation" value="mas 3 al dia" <?php echo set_radio('defecation','mas 3 al dia'); ?> id="defecation3" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">No todos los días
                            <input type="radio" name="defecation" value="no todos dias" <?php echo set_radio('defecation','no todos dias'); ?> id="defecation4" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Cada 5 días
                            <input type="radio" name="defecation" value="cada 5 dia" <?php echo set_radio('defecation','cada 5 dia'); ?> id="defecation4" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('defecation') ?>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="col-xs-12">
                    <label for="disease">¿Cada cuánto hace actividad física a la semana?</label>
                </div>
            </div> 
            <p></p>
            <div class="row no-padding">
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50 btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">No hace 
                            <input type="radio" name="activity" value="no hace" <?php echo set_radio('activity','No hace'); ?> id="activity1" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">1 vez 
                            <input type="radio" name="activity" value="1" <?php echo set_radio('activity','1'); ?> id="activity2" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Entre 2 - 3 veces
                            <input type="radio" name="activity" value="2-3" <?php echo set_radio('activity','2-3'); ?> id="activity3" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Más de 4 veces
                            <input type="radio" name="activity" value="mas 4" <?php echo set_radio('activity','mas 4'); ?> id="activity4" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('activity') ?>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="col-xs-12">
                    <label for="disease">¿De 1 a 10 cómo califica su nivel de estrés diario?</label>
                </div>
            </div> 
            <div class="row no-padding">
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main2 btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">1
                            <input type="radio" name="stress" value="1" <?php echo set_radio('stress','1'); ?> id="stress2" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">2
                            <input type="radio" name="stress" value="2" <?php echo set_radio('stress','2'); ?> id="stress3" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">3
                            <input type="radio" name="stress" value="3" <?php echo set_radio('stress','3'); ?> id="stress4" autocomplete="off" required=""> 
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">4
                            <input type="radio" name="stress" value="4" <?php echo set_radio('stress','4'); ?> id="stress5" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">5
                            <input type="radio" name="stress" value="5" <?php echo set_radio('stress','5'); ?> id="stress6" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked" style="margin-left: 0px;">6
                            <input type="radio" name="stress" value="6" <?php echo set_radio('stress','6'); ?> id="stress7" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">7
                            <input type="radio" name="stress" value="7" <?php echo set_radio('stress','7'); ?> id="stress8" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">8
                            <input type="radio" name="stress" value="8" <?php echo set_radio('stress','8'); ?> id="stress8" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">9
                            <input type="radio" name="stress" value="9" <?php echo set_radio('stress','9'); ?> id="stress8" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">10
                            <input type="radio" name="stress" value="10" <?php echo set_radio('stress','10'); ?> id="stress8" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('stress') ?>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="col-xs-12">
                    <label for="disease">¿En promedio cuantas horas duerme por día?</label>
                </div>
            </div> 
            <div class="row no-padding">
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main2 btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">1
                            <input type="radio" name="sleep" value="1" <?php echo set_radio('sleep','1'); ?> id="sleep2" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">2
                            <input type="radio" name="sleep" value="2" <?php echo set_radio('sleep','2'); ?> id="sleep3" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">3
                            <input type="radio" name="sleep" value="3" <?php echo set_radio('sleep','3'); ?> id="sleep4" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">4
                            <input type="radio" name="sleep" value="4" <?php echo set_radio('sleep','4'); ?> id="sleep5" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">5
                            <input type="radio" name="sleep" value="5" <?php echo set_radio('sleep','5'); ?> id="sleep6" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">6
                            <input type="radio" name="sleep" value="6" <?php echo set_radio('sleep','6'); ?> id="sleep7" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">7
                            <input type="radio" name="sleep" value="7" <?php echo set_radio('sleep','7'); ?> id="sleep8" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">8
                            <input type="radio" name="sleep" value="8" <?php echo set_radio('sleep','8'); ?> id="sleep9" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">9
                            <input type="radio" name="sleep" value="9" <?php echo set_radio('sleep','9'); ?> id="sleep10" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main2 btn-poll-checked">10+
                            <input type="radio" name="sleep" value="10" <?php echo set_radio('sleep','10'); ?> id="sleep11" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('sleep') ?>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="col-xs-12">
                    <label for="disease">¿Durante la noche se despierta a menudo, no puede conciliar el sueño, o se levanta cansado?</label>
                </div>
            </div> 
            <div class="row no-padding">
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 50%">Si
                            <input type="radio" name="wake" value="si" <?php echo set_radio('wake','si'); ?> id="wake1" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main btn-poll-checked" style="width: 50%">No
                            <input type="radio" name="wake" value="no" <?php echo set_radio('wake','no'); ?> id="wake2" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('wake') ?>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="col-xs-12">
                    <label for="disease">¿Cómo define su deseo sexual?</label>
                </div>
            </div> 
            <div class="row no-padding">
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50 btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Muy alto
                            <input type="radio" name="libido" value="muy alto" <?php echo set_radio('libido','muy alto'); ?> id="libido1" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Alto
                            <input type="radio" name="libido" value="alto" <?php echo set_radio('libido','alto'); ?> id="libido2" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Medio
                            <input type="radio" name="libido" value="medio" <?php echo set_radio('libido','medio'); ?> id="libido3" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main50 btn-poll-checked">Bajo
                            <input type="radio" name="libido" value="bajo" <?php echo set_radio('libido','bajo'); ?> id="libido4" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('libido') ?>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="col-xs-12">
                    <label for="disease">¿Le gustaría conocer el estado actual de su piel?</label>
                </div>
            </div> 
            <div class="row no-padding">
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 50%">Si
                            <input type="radio" name="state_skin" value="si" <?php echo set_radio('state_skin', 'si'); ?> id="state_skin1" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main btn-poll-checked" style="width: 50%">No
                            <input type="radio" name="state_skin" value="no" <?php echo set_radio('state_skin', 'no'); ?> id="state_skin2" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('state_skin') ?>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="col-xs-12">
                    <label for="disease">¿Le gustaría mejorar su sistema inmune?</label>
                </div>
            </div> 
            <div class="row no-padding">
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 50%">Si
                            <input type="radio" name="immune" value="si" <?php echo set_radio('immune', 'si'); ?> id="immune1" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main btn-poll-checked" style="width: 50%">No
                            <input type="radio" name="immune" value="no" <?php echo set_radio('immune', 'no'); ?> id="immune2" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('immune') ?>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="col-xs-12">
                    <label for="disease">¿Le gustaría cambiar sus hábitos alimenticios para mantener un peso adecuado?</label>
                </div>
            </div> 
            <div class="row no-padding">
                <div class="col-xs-12">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main btn-poll-checked" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px; width: 50%">Si
                            <input type="radio" name="alimentary" value="si" <?php echo set_radio('alimentary', 'si'); ?> id="alimentary1" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <label class="btn btn-default btn-check-main btn-poll-checked" style="width: 50%">No
                            <input type="radio" name="alimentary" value="no" <?php echo set_radio('alimentary', 'no'); ?> id="alimentary2" autocomplete="off" required="">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('alimentary') ?>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="col-sm-12">
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
        <?php echo form_close() ?>
    </div>
</section>
<!-- /.content -->   