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
    .btn-success {
        background-color: #2ecc71;
    }
    .btn-warning {
        background-color: #f1c40f;
    }
    .btn-danger {
        background-color: #e74c3c;
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
            <?php echo form_open('register_consumer/poll') ?>
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
                                <input type="checkbox" name="grasas" value="0" id="grasas1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Belleza
                                <input type="checkbox" name="grasas" value="0" id="grasas2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Cuidado cuerpo
                                <input type="checkbox" name="grasas" value="0" id="grasas2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Cuidado facial
                                <input type="checkbox" name="grasas" value="0" id="grasas2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Cuidado capilar
                                <input type="checkbox" name="grasas" value="0" id="grasas2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Nutrición
                                <input type="checkbox" name="grasas" value="0" id="grasas2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Salud sexual
                                <input type="checkbox" name="grasas" value="0" id="grasas2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Todos
                                <input type="checkbox" name="grasas" value="0" id="grasas2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <label>Con qué frecuencia consume estos alimentos a la semana?</label>
            <!-- /.box-header -->
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label>Grasas </label><br />
                            <label class="btn btn-default btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="grasas" value="0" id="grasas1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">1
                                <input type="radio" name="grasas" value="0" id="grasas2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">2
                                <input type="radio" name="grasas" value="0" id="grasas3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">3
                                <input type="radio" name="grasas" value="0" id="grasas4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">4
                                <input type="radio" name="grasas" value="0" id="grasas5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">5
                                <input type="radio" name="grasas" value="0" id="grasas6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">6
                                <input type="radio" name="grasas" value="0" id="grasas7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">7
                                <input type="radio" name="grasas" value="0" id="grasas8" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label>Dulces </label><br />
                            <label class="btn btn-default btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="dulces" value="0" id="dulces1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">1
                                <input type="radio" name="dulces" value="0" id="dulces2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">2
                                <input type="radio" name="dulces" value="0" id="dulces3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">3
                                <input type="radio" name="dulces" value="0" id="dulces4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">4
                                <input type="radio" name="dulces" value="0" id="dulces5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">5
                                <input type="radio" name="dulces" value="0" id="dulces6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">6
                                <input type="radio" name="dulces" value="0" id="dulces7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">7
                                <input type="radio" name="dulces" value="0" id="dulces8" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label>Alcohol </label><br />
                            <label class="btn btn-default btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="alcohol" value="0" id="alcohol1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">1
                                <input type="radio" name="alcohol" value="0" id="alcohol2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">2
                                <input type="radio" name="alcohol" value="0" id="alcohol3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">3
                                <input type="radio" name="alcohol" value="0" id="alcohol4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">4
                                <input type="radio" name="alcohol" value="0" id="alcohol5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">5
                                <input type="radio" name="alcohol" value="0" id="alcohol6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">6
                                <input type="radio" name="alcohol" value="0" id="alcohol7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">7
                                <input type="radio" name="alcohol" value="0" id="alcohol8" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label>Carnes </label><br />
                            <label class="btn btn-default btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="carnes" value="0" id="carnes1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">1
                                <input type="radio" name="carnes" value="0" id="carnes2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">2
                                <input type="radio" name="carnes" value="0" id="carnes3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">3
                                <input type="radio" name="carnes" value="0" id="carnes4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">4
                                <input type="radio" name="carnes" value="0" id="carnes5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">5
                                <input type="radio" name="carnes" value="0" id="carnes6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">6
                                <input type="radio" name="carnes" value="0" id="carnes7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">7
                                <input type="radio" name="carnes" value="0" id="carnes8" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label>Frutas </label><br />
                            <label class="btn btn-default btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="frutas" value="0" id="frutas1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">1
                                <input type="radio" name="frutas" value="0" id="frutas2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">2
                                <input type="radio" name="frutas" value="0" id="frutas3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">3
                                <input type="radio" name="frutas" value="0" id="frutas4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">4
                                <input type="radio" name="frutas" value="0" id="frutas5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">5
                                <input type="radio" name="frutas" value="0" id="frutas6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">6
                                <input type="radio" name="frutas" value="0" id="frutas7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">7
                                <input type="radio" name="frutas" value="0" id="frutas8" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label>Granos </label><br />
                            <label class="btn btn-default btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="granos" value="0" id="granos1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">1
                                <input type="radio" name="granos" value="0" id="granos2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">2
                                <input type="radio" name="granos" value="0" id="granos3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">3
                                <input type="radio" name="granos" value="0" id="granos4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">4
                                <input type="radio" name="granos" value="0" id="granos5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">5
                                <input type="radio" name="granos" value="0" id="granos6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">6
                                <input type="radio" name="granos" value="0" id="granos7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">7
                                <input type="radio" name="granos" value="0" id="granos8" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label>Verduras </label><br />
                            <label class="btn btn-default btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="verduras" value="0" id="verduras1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">1
                                <input type="radio" name="verduras" value="0" id="verduras2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">2
                                <input type="radio" name="verduras" value="0" id="verduras3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">3
                                <input type="radio" name="verduras" value="0" id="verduras4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">4
                                <input type="radio" name="verduras" value="0" id="verduras5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">5
                                <input type="radio" name="verduras" value="0" id="verduras6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">6
                                <input type="radio" name="verduras" value="0" id="verduras7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">7
                                <input type="radio" name="verduras" value="0" id="verduras8" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="name_country">Rutinariamente omite las comidas o reduce la ingesta calórica para perder peso?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-danger btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Frecuentemente
                                <input type="radio" name="omitecomer" value="0" id="omitecomer1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">A veces
                                <input type="radio" name="omitecomer" value="0" id="omitecomer2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">Casi nunca
                                <input type="radio" name="omitecomer" value="0" id="omitecomer3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">Nunca
                                <input type="radio" name="omitecomer" value="0" id="omitecomer4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="name_country">Sigue una dieta baja en carbohidratos?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-warning btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Si
                                <input type="radio" name="omitecomer" value="0" id="omitecomer1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">No
                                <input type="radio" name="omitecomer" value="0" id="omitecomer2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="name_country">Cuántas veces va al baño al día?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-success btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">1 vez al día
                                <input type="radio" name="omitecomer" value="0" id="omitecomer1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">2-3 veces al día
                                <input type="radio" name="omitecomer" value="0" id="omitecomer2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">Más de 3 veces día
                                <input type="radio" name="omitecomer" value="0" id="omitecomer3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">No todos los días
                                <input type="radio" name="omitecomer" value="0" id="omitecomer4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">Cada 5 días
                                <input type="radio" name="omitecomer" value="0" id="omitecomer4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>

                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="name_country">Cada Cuánto hace actividad física a la semana?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-danger btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">No hace 
                                <input type="radio" name="omitecomer" value="0" id="omitecomer1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">1 vez 
                                <input type="radio" name="omitecomer" value="0" id="omitecomer2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">Entre 2-3 veces
                                <input type="radio" name="omitecomer" value="0" id="omitecomer3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">Más de 4 veces
                                <input type="radio" name="omitecomer" value="0" id="omitecomer4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>

                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="name_country">De 1 a 10 cómo califica su nivel de estrés diario?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main2 active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">1
                                <input type="radio" name="granos" value="0" id="granos2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">2
                                <input type="radio" name="granos" value="0" id="granos3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">3
                                <input type="radio" name="granos" value="0" id="granos4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">4
                                <input type="radio" name="granos" value="0" id="granos5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">5
                                <input type="radio" name="granos" value="0" id="granos6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">6
                                <input type="radio" name="granos" value="0" id="granos7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">7
                                <input type="radio" name="granos" value="0" id="granos8" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">8
                                <input type="radio" name="granos" value="0" id="granos8" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">9
                                <input type="radio" name="granos" value="0" id="granos8" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">10
                                <input type="radio" name="granos" value="0" id="granos8" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <label for="name_country">A menudo siente dolor en algunas zonas del cuerpo como cuello, espalda o cintura?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main3 active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Más de 1 vez por semana 
                                <input type="radio" name="granos" value="0" id="granos2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main3">1 vez a la semana
                                <input type="radio" name="granos" value="0" id="granos3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main3">1-2 veces al mes
                                <input type="radio" name="granos" value="0" id="granos4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main3">Nunca
                                <input type="radio" name="granos" value="0" id="granos5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="name_country">En promedio cuantas horas duerme por día?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main2 active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">1
                                <input type="radio" name="granos" value="0" id="granos2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">2
                                <input type="radio" name="granos" value="0" id="granos3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">3
                                <input type="radio" name="granos" value="0" id="granos4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">4
                                <input type="radio" name="granos" value="0" id="granos5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">5
                                <input type="radio" name="granos" value="0" id="granos6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">6
                                <input type="radio" name="granos" value="0" id="granos7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">7
                                <input type="radio" name="granos" value="0" id="granos8" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">8
                                <input type="radio" name="granos" value="0" id="granos8" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">9
                                <input type="radio" name="granos" value="0" id="granos8" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main2">10 o más
                                <input type="radio" name="granos" value="0" id="granos8" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="name_country">Durante la noche se despierta a menudo, no puede conciliar el sueño, o se levanta cansado?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Si
                                <input type="radio" name="omitecomer" value="0" id="omitecomer1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">No
                                <input type="radio" name="omitecomer" value="0" id="omitecomer2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="name_country">Cómo define su deseo sexual?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Muy alto
                                <input type="radio" name="omitecomer" value="0" id="omitecomer1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Alto
                                <input type="radio" name="omitecomer" value="0" id="omitecomer2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Medio
                                <input type="radio" name="omitecomer" value="0" id="omitecomer1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">Bajo
                                <input type="radio" name="omitecomer" value="0" id="omitecomer2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="name_country">Se ha sentido a menudo ...?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main25 active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Sin deseo de levantarse
                                <input type="radio" name="omitecomer" value="0" id="omitecomer1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main25">Sin deseo de arreglarse
                                <input type="radio" name="omitecomer" value="0" id="omitecomer2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main25">Con deseo de llorar
                                <input type="radio" name="omitecomer" value="0" id="omitecomer1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main25">Con sensación que el mundo es horrible
                                <input type="radio" name="omitecomer" value="0" id="omitecomer2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="name_country">Le gustaría conocer el estado actual de su piel?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Si
                                <input type="radio" name="omitecomer" value="0" id="omitecomer1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">No
                                <input type="radio" name="omitecomer" value="0" id="omitecomer2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="name_country">Le gustaría mejorar su sistema inmune?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Si
                                <input type="radio" name="omitecomer" value="0" id="omitecomer1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">No
                                <input type="radio" name="omitecomer" value="0" id="omitecomer2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <label for="name_country">Le gustaría cambiar sus hábitos alimenticios para mantener un peso adecuado?</label>
            </div>    
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label class="btn btn-default btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">Si
                                <input type="radio" name="omitecomer" value="0" id="omitecomer1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-default btn-check-main">No
                                <input type="radio" name="omitecomer" value="0" id="omitecomer2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
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
    </div>
</section>
<!-- /.content -->   