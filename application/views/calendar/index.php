<?php

// Definimos nuestra zona horaria
date_default_timezone_set("America/Bogota");

// incluimos el archivo de funciones
include 'funciones.php';

// incluimos el archivo de configuracion
include 'config.php';

// Verificamos si se ha enviado el campo con name from
if (isset($_POST['from'])) 
{

    // Si se ha enviado verificamos que no vengan vacios
    if ($_POST['from']!="" AND $_POST['to']!="") 
    {

        // Recibimos el fecha de inicio y la fecha final desde el form

        $inicio = _formatear($_POST['from']);
        // y la formateamos con la funcion _formatear

        $final  = _formatear($_POST['to']);

        // Recibimos el fecha de inicio y la fecha final desde el form

        $inicio_normal = $_POST['from'];

        // y la formateamos con la funcion _formatear
        $final_normal  = $_POST['to'];

        // Recibimos los demas datos desde el form
        $titulo = evaluar($_POST['title']);

        // y con la funcion evaluar
        $body   = evaluar($_POST['event']);

        // reemplazamos los caracteres no permitidos
        $clase  = evaluar($_POST['class']);

        // insertamos el evento
        $query="INSERT INTO eventos VALUES(null,'$titulo','$body','','$clase','$inicio','$final','$inicio_normal','$final_normal')";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query); 

        // Obtenemos el ultimo id insetado
        $im=$conexion->query("SELECT MAX(id) AS id FROM eventos");
        $row = $im->fetch_row();  
        $id = trim($row[0]);

        $base_url = base_url('assets/plugins/calendar').'/';

        // para generar el link del evento
        $link = "$base_url"."descripcion_evento.php?id=$id";

        // y actualizamos su link
        $query="UPDATE eventos SET url = '$link' WHERE id = $id";

        // Ejecutamos nuestra sentencia sql
        $conexion->query($query); 

        $base_url = 'calendar';
        // redireccionamos a nuestro calendario
        header("Location:$base_url"); 
    }
}
?>
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Calendario
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="container">
                <div class="row">
                    <div class="page-header" style="margin-bottom: 0">
                        <h2 style="font-size: 28px; margin: 0 0 8px 0; text-align: left; text-transform: uppercase;"></h2>
                    </div>
                </div>
                <div class="row">
                    <p><strong>Etiquetas</strong></p>
                    <div class="text-center">
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <button class="btn event-important" data-toggle='modal' data-target='#add_evento' style="color: #fff; font-size: 10px">
                                    Importante
                                </button>
                            </div>
                            <div class="btn-group" role="group">
                                <button class="btn event-info" data-toggle='modal' data-target='#add_evento' style="color: #fff; font-size: 10px">
                                    Información
                                </button>
                            </div>
                            <div class="btn-group" role="group">
                                <button class="btn event-warning" data-toggle='modal' data-target='#add_evento' style="color: #fff; font-size: 10px">
                                    Advertencia
                                </button>
                            </div>
                            <div class="btn-group" role="group">
                                <button class="btn event-success" data-toggle='modal' data-target='#add_evento' style="color: #fff; font-size: 10px">
                                    Exito
                                </button>
                            </div>
                            <div class="btn-group" role="group">
                                <button class="btn event-special" data-toggle='modal' data-target='#add_evento' style="color: #fff; font-size: 10px">
                                    Especial
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="text-center">
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <button class="btn btn-success" data-toggle='modal' data-target='#add_evento'><i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                            </div>
                            <div class="btn-group" role="group">
                                <button class="btn btn-default" data-calendar-nav="prev"><i class="fa fa-arrow-circle-left" aria-hidden="true"></i></button>
                            </div>
                            <div class="btn-group" role="group">
                                <button class="btn btn-default" data-calendar-nav="today">Hoy</button>
                            </div>
                            <div class="btn-group" role="group">
                                <button class="btn btn-default" data-calendar-nav="next"><i class="fa fa-arrow-circle-right" aria-hidden="true"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div class="text-center">
                        <div class="btn-group btn-group-justified" role="group" aria-label="...">
                            <div class="btn-group" role="group">
                                <button class="btn btn-default" data-calendar-view="year">Año</button>
                            </div>
                            <div class="btn-group" role="group">
                                <button class="btn btn-default active" data-calendar-view="month">Mes</button>
                            </div>
                            <div class="btn-group" role="group">
                                <button class="btn btn-default" data-calendar-view="week">Semana</button>
                            </div>
                            <div class="btn-group" role="group">
                                <button class="btn btn-default" data-calendar-view="day">Dia</button>  
                            </div>
                        </div>
                    </div>
                </div>
                <p></p>
                <div class="row">
                    <div id="calendar"></div>
                    <!-- Aqui se mostrara nuestro calendario -->
                    <br><br>
                </div>
                <!--ventana modal para el calendario-->
                <div class="modal fade" id="events-modal">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body" style="height: 400px">
                                <p>One fine body&hellip;</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
            </div>
            <div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Agregar nuevo evento</h4>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post">
                                <label for="from">Inicio</label>
                                <div class='input-group date' id='from'>
                                    <input type='text' id="from" name="from" class="form-control" readonly />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </div>
                                <br>
                                <label for="to">Final</label>
                                <div class='input-group date' id='to'>
                                    <input type='text' name="to" id="to" class="form-control" readonly />
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                                </div>
                                <br>
                                <label for="tipo">Tipo de evento</label>
                                <select class="form-control" name="class" id="tipo">
                                    <option value="event-info">Informacion</option>
                                    <option value="event-success">Exito</option>
                                    <option value="event-important">Importantante</option>
                                    <option value="event-warning">Advertencia</option>
                                    <option value="event-special">Especial</option>
                                </select>
                                <br>
                                <label for="title">Título</label>
                                <input type="text" required autocomplete="off" name="title" class="form-control" id="title" placeholder="Introduce un título">
                                <br>
                                <label for="body">Evento</label>
                                <textarea id="body" name="event" required class="form-control" rows="3"></textarea>
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Cancelar</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-check"></i> Agregar</button>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>