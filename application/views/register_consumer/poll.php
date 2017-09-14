<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Registrar Encuesta</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('register_consumer/poll') ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="name_country">Aspecto mas importante para su bienestar</label>
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

                <div class="row">
                    <div class="col-sm-5">
                        <label for="name">Frecuencia de consumo de estos alimentos a la semana:</label> 
                        <div class="input-group">
                            <!-- <label for="document_type">Tipo Documento</label> -->
                            <span class="input-group-addon">Grasas</span>
                            <?php echo form_dropdown('frecuency', $frecuency_week, set_value('frecuency'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon">Dulces</span>
                            <?php echo form_dropdown('frecuency', $frecuency_week, set_value('frecuency'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon">Alcohol</span>
                            <?php echo form_dropdown('frecuency', $frecuency_week, set_value('frecuency'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon">Carnes</span>
                            <?php echo form_dropdown('frecuency', $frecuency_week, set_value('frecuency'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon">Frutas</span>
                            <?php echo form_dropdown('frecuency', $frecuency_week, set_value('frecuency'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon">Granos</span>
                            <?php echo form_dropdown('frecuency', $frecuency_week, set_value('frecuency'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <span class="input-group-addon">Verduras</span>
                            <?php echo form_dropdown('frecuency', $frecuency_week, set_value('frecuency'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <!-- <label for="name">Rutinariamente omite las comidas o reduce la ingesta calórica para perder peso?</label>  -->
                        <div class="input-group">
                            <label for="document_type">Rutinariamente omite las comidas o reduce la ingesta calórica para perder peso?</label>
                            <!-- <span class="input-group-addon">Grasas</span> -->
                            <?php echo form_dropdown('frecuency', $frecuency_weight, set_value('frecuency'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <label for="document_type">Sigue una dieta baja en carbohidratos?</label>
                            <select name="" class="form-control">
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                             <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <label for="document_type">Cuántas veces va al baño al día?</label>
                            <?php echo form_dropdown('frecuency', $frecuency_weight, set_value('frecuency'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <label for="document_type">Cada cuánto hace actividad física?</label>
                            <?php echo form_dropdown('frecuency', $frecuency_sport, set_value('frecuency'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <label for="document_type">De 1 a 10 cómo califica su nivel de estrés diario?</label>
                            <select name="" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                             </select>
                            <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <label for="document_type">A menudo siente dolor en algunas zonas del cuerpo como cuello, espalda o cintura?</label>
                            <?php echo form_dropdown('frecuency', $frecuency_pain, set_value('frecuency'), 'class="form-control" required=""'); ?>
                            <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <label for="document_type">En promedio cuántas horas duerme por dia?</label>
                            <select name="" class="form-control">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10 o más</option>
                             </select>
                            <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <label for="document_type">Durante la noche despierta a menudo, no puede conciliar el sueño o se leventa cansado?</label>
                            <select name="" class="form-control">
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                             <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <label for="document_type">Cómo define su deso sexual?</label>
                            <select name="" class="form-control">
                                <option value="Si">Muy alto</option>
                                <option value="No">Alto</option>
                                <option value="No">Medio</option>
                                <option value="No">Bajo</option>
                            </select>
                             <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <label for="document_type">Te has sentido a menudo ...?</label>
                            <select name="" class="form-control">
                                <option value="Si">Sin deseo de levantarse de la cama</option>
                                <option value="No">Sin deseo de arreglarse</option>
                                <option value="No">Con deseo de llorar</option>
                                <option value="No">Con sensación de que el mundo es horrible y nadie lo quiere</option>
                            </select>
                             <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <label for="document_type">Le gustaría conocer el estado actual de su piel?</label>
                            <select name="" class="form-control">
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                             <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <label for="document_type">Le gustaría mejorar su sistema inmune?</label>
                            <select name="" class="form-control">
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                             <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-5">
                        <div class="input-group">
                            <label for="document_type">Le gustaría cambiar sus hábitos alimenticios para mantener un peso adecuado?</label>
                            <select name="" class="form-control">
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select>
                             <?php echo form_error('frecuency') ?>
                        </div>
                    </div>
                </div>
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