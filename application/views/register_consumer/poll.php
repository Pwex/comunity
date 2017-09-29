<style>
    .btn-group, .btn-group-vertical {
        width: 100%;
    }
    .btn-check-main {
        font-size: 1.1em;
        padding: 10px 2px;
        width: 12.5%;
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
            <?php echo form_open('consumers/poll') ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Cuál de los siguientes aspectos es actualmente más importante para mejorar su bienestar?
                            </label>
                            <br>
                            <input type="checkbox" class="minimal" checked>Salud física
                            <input type="checkbox" class="minimal">Belleza
                            <input type="checkbox" class="minimal">Cuidado del cuerpo
                            <input type="checkbox" class="minimal">Cuidado facial
                            <input type="checkbox" class="minimal">Cuidado capilar
                            <input type="checkbox" class="minimal">Nutrición
                            <input type="checkbox" class="minimal">Salud sexual
                            <?php echo form_error('name_country') ?>
                        </div>
                    </div>
                </div>

            <label for="name_country">Con qué frecuencia consume estos alimentos a la semana?</label>
            <!-- /.box-header -->
            <div class="row">
                <div class="row setup-content" id="step-1">
                    <div class="col-md-12 no-padding">
                        <div class="btn-group add-check" data-toggle="buttons">
                            <label>Grasas </label><br />
                            <label class="btn btn-success btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="grasas" value="0" id="grasas1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">1
                                <input type="radio" name="grasas" value="0" id="grasas2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">2
                                <input type="radio" name="grasas" value="0" id="grasas3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">3
                                <input type="radio" name="grasas" value="0" id="grasas4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">4
                                <input type="radio" name="grasas" value="0" id="grasas5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">5
                                <input type="radio" name="grasas" value="0" id="grasas6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">6
                                <input type="radio" name="grasas" value="0" id="grasas7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">7
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
                            <label class="btn btn-success btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="dulces" value="0" id="dulces1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">1
                                <input type="radio" name="dulces" value="0" id="dulces2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">2
                                <input type="radio" name="dulces" value="0" id="dulces3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">3
                                <input type="radio" name="dulces" value="0" id="dulces4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">4
                                <input type="radio" name="dulces" value="0" id="dulces5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">5
                                <input type="radio" name="dulces" value="0" id="dulces6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">6
                                <input type="radio" name="dulces" value="0" id="dulces7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">7
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
                            <label class="btn btn-success btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="alcohol" value="0" id="alcohol1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">1
                                <input type="radio" name="alcohol" value="0" id="alcohol2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">2
                                <input type="radio" name="alcohol" value="0" id="alcohol3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">3
                                <input type="radio" name="alcohol" value="0" id="alcohol4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">4
                                <input type="radio" name="alcohol" value="0" id="alcohol5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">5
                                <input type="radio" name="alcohol" value="0" id="alcohol6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">6
                                <input type="radio" name="alcohol" value="0" id="alcohol7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">7
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
                            <label class="btn btn-danger btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="carnes" value="0" id="carnes1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">1
                                <input type="radio" name="carnes" value="0" id="carnes2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">2
                                <input type="radio" name="carnes" value="0" id="carnes3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">3
                                <input type="radio" name="carnes" value="0" id="carnes4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">4
                                <input type="radio" name="carnes" value="0" id="carnes5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">5
                                <input type="radio" name="carnes" value="0" id="carnes6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">6
                                <input type="radio" name="carnes" value="0" id="carnes7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">7
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
                            <label class="btn btn-danger btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="frutas" value="0" id="frutas1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">1
                                <input type="radio" name="frutas" value="0" id="frutas2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">2
                                <input type="radio" name="frutas" value="0" id="frutas3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">3
                                <input type="radio" name="frutas" value="0" id="frutas4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">4
                                <input type="radio" name="frutas" value="0" id="frutas5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">5
                                <input type="radio" name="frutas" value="0" id="frutas6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">6
                                <input type="radio" name="frutas" value="0" id="frutas7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">7
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
                            <label class="btn btn-danger btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="granos" value="0" id="granos1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">1
                                <input type="radio" name="granos" value="0" id="granos2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">2
                                <input type="radio" name="granos" value="0" id="granos3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">3
                                <input type="radio" name="granos" value="0" id="granos4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">4
                                <input type="radio" name="granos" value="0" id="granos5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">5
                                <input type="radio" name="granos" value="0" id="granos6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">6
                                <input type="radio" name="granos" value="0" id="granos7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">7
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
                            <label class="btn btn-danger btn-check-main active" style="border-top-left-radius: 2px; border-bottom-left-radius: 2px;">0
                                <input type="radio" name="verduras" value="0" id="verduras1" autocomplete="off" checked>
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">1
                                <input type="radio" name="verduras" value="0" id="verduras2" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-danger btn-check-main">2
                                <input type="radio" name="verduras" value="0" id="verduras3" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">3
                                <input type="radio" name="verduras" value="0" id="verduras4" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">4
                                <input type="radio" name="verduras" value="0" id="verduras5" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-warning btn-check-main">5
                                <input type="radio" name="verduras" value="0" id="verduras6" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">6
                                <input type="radio" name="verduras" value="0" id="verduras7" autocomplete="off">
                                <span class="glyphicon glyphicon-ok"></span>
                            </label>
                            <label class="btn btn-success btn-check-main">7
                                <input type="radio" name="verduras" value="0" id="verduras8" autocomplete="off">
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