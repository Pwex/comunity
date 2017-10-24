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
    .btn-check-main50 {
        font-size: 1.1em;
        padding: 10px 5px;
        text-align: left;
        width: 50%;
        border-radius: 0px !important;
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
        color: #3d77b1;             
        float: right;
        font-weight: 100;
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
                <div class="col-md-12">
                    <label>Cuál de los siguientes aspectos es actualmente más importante para mejorar su bienestar?</label>
                </div>
            </div>
            <p></p>
            <!-- /.box-header -->
            <div class="row no-padding">
                <div class="col-md-6">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50">Salud física
                            <input type="checkbox" name="health" id="health" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('health') ?>
                        <label class="btn btn-default btn-check-main50">Belleza
                            <input type="checkbox" name="beauty" id="beauty" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('beauty') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50">Cuidado cuerpo
                            <input type="checkbox" name="body" id="body" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('body') ?>
                        <label class="btn btn-default btn-check-main50">Cuidado facial
                            <input type="checkbox" name="facial" id="facial" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                         </label>
                        <?php echo form_error('facial') ?>
                    </div>
                </div>
            </div>
            <div class="row no-padding">
                <div class="col-md-6">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50">Cuidado capilar
                            <input type="checkbox" name="capillary" id="capillary" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('capillary') ?>
                        <label class="btn btn-default btn-check-main50">Nutrición
                            <input type="checkbox" name="nutrition" id="nutrition" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('nutrition') ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50">Salud sexual
                            <input type="checkbox" name="sexuality" id="sexuality" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('sexuality') ?>
                        <label for="all_aspect" class="btn btn-default btn-check-main50">Todos
                            <input type="checkbox" name="all_aspect" id="all_aspect" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('all_aspect') ?>
                    </div>
                </div>
            </div>
            <p></p>
            <div class="row">
                <div class="col-md-12">
                    <label for="disease">Sufre de alguna de estas enfermedades?</label>
                </div>
            </div> 
            <p></p>
            <div class="row no-padding">
                <div class="col-md-6">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50">Diabetes
                            <input type="checkbox" name="diabetes" id="diabetes" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('diabetes') ?>
                        <label class="btn btn-default btn-check-main50">Hipoglicemia
                            <input type="checkbox" name="hypoglycemia" id="hypoglycemia" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('hypoglycemia') ?>
                    </div>
                </div>
            </div>
            <div class="row no-padding">
                <div class="col-md-6">
                    <div class="btn-group add-check" data-toggle="buttons">
                        <label class="btn btn-default btn-check-main50">Hipertensión
                            <input type="checkbox" name="hypertension" id="hypertension" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('hypertension') ?>
                        <label class="btn btn-default btn-check-main50">Colesterol
                            <input type="checkbox" name="cholesterol" id="cholesterol" autocomplete="off">
                            <span class="glyphicon glyphicon-ok"></span>
                        </label>
                        <?php echo form_error('cholesterol') ?>
                    </div>
                </div>
            </div>
            


            
            
            

            <p></p>
            <div class="row">
                <div class="col-sm-12">
                    <div class="btn-group btn-group-justified">
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="submit" class="btn btn-primary" style="padding-left: 0; padding-right: 0; text-align: center;">Env & Medición</button>
                        </div>
                        <div class="btn-group" role="group">
                            <button type="reset"  class="btn btn-primary">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</section>
<!-- /.content -->   