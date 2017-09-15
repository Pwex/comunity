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
                            <label for="name_country">Cuál de los siguientes aspectos es actualmente más importante para mejorar su bienestar?
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
            <div class="box-body">
              <table class="table table-bordered" style="width: 50%">
                <tr>
                  <th style="width: 20px">Alimento</th>
                  <th style="width: 5px">0</th>
                  <th style="width: 5px">1</th>
                  <th style="width: 5px">2</th>
                  <th style="width: 5px">3</th>
                  <th style="width: 5px">4</th>
                  <th style="width: 5px">5</th>
                  <th style="width: 5px">6</th>
                  <th style="width: 5px">7</th>
                </tr>
                <tr>
                  <td>Grasas</td>
                  <td>
                    <label>
                        <input type="radio" name="r1" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r1" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r1" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r1" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r1" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r1" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r1" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r1" class="minimal">
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>Dulces</td>
                  <td>
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>Alcohol</td>
                  <td>
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>Carnes</td>
                  <td>
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>Frutos</td>
                  <td>
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>Granos</td>
                  <td>
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                </tr>
                <tr>
                  <td>Verduras</td>
                  <td>
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                  <td> 
                    <label>
                        <input type="radio" name="r2" class="minimal">
                    </label>
                  </td>
                </tr>








              </table>
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