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
            // Email
            $email  = $_POST['email'];
            // y con la funcion evaluar
            $body   = evaluar($_POST['event']);
            // reemplazamos los caracteres no permitidos
            $clase  = evaluar($_POST['class']);
            // Email
            $url = 'https://pwex.org/platform/assets/plugins/partners-calendar/';
            // Herramientas de comunicacion
            $tools = $_POST['tools'];
            // Otros datos
            $status = 0;
            $operation = 0;
            $language = $_POST['language'];
            // insertamos el evento
            $query="INSERT INTO appointment VALUES(null,'$titulo','$body','$url','$clase','$inicio','$final','$inicio_normal','$final_normal','$email','$tools','$status','$operation','$language')";
            // Ejecutamos nuestra sentencia sql
            $conexion->query($query); 
            // Obtenemos el ultimo id insetado
            $im  = $conexion->query("SELECT MAX(id) AS id FROM appointment");
            $row = $im->fetch_row();  
            $id  = trim($row[0]);
            $base_url = base_url('assets/plugins/partners-calendar').'/';
            // para generar el link del evento
            $link  = "$base_url"."descripcion_evento.php?id=$id";
            // y actualizamos su link
            $query = "UPDATE eventos SET url = '$link' WHERE id = $id";
            // Ejecutamos nuestra sentencia sql
            $conexion->query($query); 
            $base_url = base_url();
            if ($_POST['language'] == 'Español') {
                $base_url .= 'es-partners-calendar/'.$_POST['email'].'/'.$_POST['title'].'/exito';
            } else if($_POST['language'] == 'Ingles'){
                $base_url .= 'en-partners-calendar/'.$_POST['email'].'/'.$_POST['title'].'/success';
            }
            # Enviar email de confirmacion de citas
                $para  = $email;
                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Cabeceras adicionales
                $cabeceras .= 'To: <'.$email.'>' . "\r\n";
                if ($_POST['language'] == 'Español') {
                    $título = 'Cita con Pwex '.$inicio_normal.' - '.trim(substr($final_normal, -5));
                    $cabeceras .= 'From: Recordatorio Pwex <product.development@pwex.org>' . "\r\n";
                    $mensaje = '
                        <html>
                        <head>
                          <title>Recordatorio de cumpleaños para Agosto</title>
                        </head>
                        <body>
                            <div><img src="https://pwex.org/platform/assets/dist/img/email/mail-cita-agendada-spanish.jpg" width="100%" /></div>
                            <p style="text-align: center; font-family: century gothic; font-size: 23px;">Hola <strong>'.$titulo.'</strong></p>
                            <p style="text-align: center; font-family: century gothic; font-size: 23px;">Este correo electr&oacute;nico confirma tu cita para el d&iacute;a</p>
                            <p style="text-align: center; font-family: century gothic; font-size: 23px;">'.$inicio_normal.' - '.trim(substr($final_normal, -5)).' Hora del Este (Hora de Miami),</p>
                            <p style="text-align: center; font-family: century gothic; font-size: 23px;">con PWEX a trav&eacute;s de <strong>'.$tools.'.</strong></p>
                            <p style="text-align: center; font-family: century gothic; font-size: 28px;"><strong>&iexcl;!Bienvenido a la Plataforma PWEX¡</strong></p>
                            <p>&nbsp;</p>
                            <p style="font-family: candara; font-size: 24px; margin-bottom: -15px;"><strong>El equipo de</strong>&nbsp;<img style="vertical-align: middle; height: 35px;" src="https://pwex.org/platform/assets/dist/img/pwex-email.png" /></p>
                            <p style="margin-bottom: -15px;"><img style="width: 100%;" src="https://pwex.org/platform/assets/dist/img/email/barra-inf.png" /></p>
                        </html>
                    ';
                } else if($_POST['language'] == 'Ingles') {
                    $título = 'Appointment with Pwex '.$inicio_normal.' - '.trim(substr($final_normal, -5));
                    $cabeceras .= 'From: Pwex Reminder <product.development@pwex.org>' . "\r\n";
                    $mensaje = '
                        <html>
                        <head>
                          <title>Recordatorio de cumpleaños para Agosto</title>
                        </head>
                        <body>
                            <div><img src="https://pwex.org/platform/assets/dist/img/email/mail-cita-agendada-ingles.jpg" width="100%" /></div>
                            <p style="text-align: center; font-family: century gothic; font-size: 23px;">Hi <strong>'.$titulo.'</strong></p>
                            <p style="text-align: center; font-family: century gothic; font-size: 23px;">This email confirms your appointment on</p>
                            <p style="text-align: center; font-family: century gothic; font-size: 23px;">'.$inicio_normal.' - '.trim(substr($final_normal, -5)).' Eastern Time( Time in Miami),</p>
                            <p style="text-align: center; font-family: century gothic; font-size: 23px;">with PWEX through <strong>'.$tools.'.</strong></p>
                            <p style="text-align: center; font-family: century gothic; font-size: 28px;"><strong>Welcome to the PWEX Platform!</strong></p>
                            <p>&nbsp;</p>
                            <p style="font-family: candara; font-size: 24px; margin-bottom: -15px;"><strong>The</strong>&nbsp;<img style="vertical-align: middle; height: 35px;" src="https://pwex.org/platform/assets/dist/img/pwex-email.png" />&nbsp;<strong>team</strong></p>
                            <p style="margin-bottom: -15px;"><img style="width: 100%;" src="https://pwex.org/platform/assets/dist/img/email/barra-inf.png" /></p>
                        </body>
                        </html>
                    ';
                }
                $cabeceras .= 'Cc: product.development@pwex.org' . "\r\n";
                // Enviarlo
                mail($para, $título, $mensaje, $cabeceras) or die('No se ha enviado el email');              
            # Enviar email de confirmacion de citas               
            // redireccionamos a nuestro calendario
            header("Location:$base_url"); 
        }
    }
    ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pwex</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/main.css') ?>">
        <style type="text/css">
            @import url('https://fonts.googleapis.com/css?family=Roboto');
            h1, h2, h3, h4, h5, h6, p, div, span{
                font-family: 'Roboto', sans-serif !important;
            }
            .main-header {
                max-height: 100px;
                padding: 10px 0 0 0 !important;
                -webkit-box-shadow: none;
                -moz-box-shadow: none;
                box-shadow: none;
            }
            .main-header .logo {
                display: initial !important;
                float: none !important;
                line-height: 0 !important;
                height: 0 !important;
                padding: 0 !important;
            }
            .page-header {
                margin: 0;
            }
            #cal-slide-content {
                background-color: #fafafa !important;
            }
                #cal-slide-content a.event-item {
                    color: #000000 !important;
                }
            .badge-important {
                background-color: #F44336 !important;
            }
            .modal {
                top: -140px !important;
            }
            .event-info {
                background-color: #ffb0312e !important;
            }
            .event {
                -webkit-box-shadow: none !important; 
                box-shadow: none !important; 
            }
            .cal-month-day {
                height: 85px !important;
            }
            .alert-success {
                background-color: #f6ecca !important;
                border: 2px solid #c4bca0 !important;
                color: #000 !important;
            }
            .cal-day-today span[data-cal-date] {
                color: #ec971f !important;
            }
            .cal-day-today {
                background-color: #ffb0312e !important;
            }
            [class*="cal-cell"]:hover {
                background-color: transparent !important; 
            }
        </style>
        <script src="<?php echo base_url('assets/plugins/partners-calendar/js/jquery.min.js') ?>"></script>
    </head>
    <body>
        <header class="main-header" style="background-color: #000;">
            <a href="http://pwex.org/?lang=es" class="logo">
            <span class="logo-mini"><b>PWX</b></span>
            <span class="logo-lg"><img src="<?php echo base_url('assets/dist/img/pwex-white.png') ?>" width="120"></span>
            </a>
        </header>
        <section style="background-color: #000;">
            <ul style="display: table; margin: 0 auto; overflow: hidden;">
                <li style="padding: 10px 20px; font-size: 16px; font-weight: bold; float: left; display: inline-block; text-decoration: none;">
                    <a href="<?php if ($this->uri->segment(1) == 'es-partners-calendar') { echo 'https://pwex.org/?lang=es'; } else { echo 'https://pwex.org/'; } ?>" style="color: #fff;">
                        <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                            Inicio
                        <?php else: ?>
                            Home
                        <?php endif ?>
                    </a>
                </li>
                <li style="padding: 10px 20px; font-size: 16px; font-weight: bold; float: left; display: inline-block; text-decoration: none;">
                    <a href="<?php if ($this->uri->segment(1) == 'es-partners-calendar') { echo 'https://pwex.org/productos/?lang=es'; } else { echo 'https://pwex.org/products/'; } ?>" style="color: #fff;">
                        <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                            Productos
                        <?php else: ?>
                            Products
                        <?php endif ?>
                    </a>
                </li>
                <li style="padding: 10px 20px; font-size: 16px; font-weight: bold; float: left; display: inline-block; text-decoration: none;">
                    <a href="<?php if ($this->uri->segment(1) == 'es-partners-calendar') { echo 'https://pwex.org/join/?lang=es'; } else { echo 'https://pwex.org/join/'; } ?>" style="color: #fff;">
                        <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                            Únete
                        <?php else: ?>
                            Join us
                        <?php endif ?>
                    </a>
                </li>
                <li style="padding: 10px 20px; font-size: 16px; font-weight: bold; float: left; display: inline-block; text-decoration: none;">
                    <a href="<?php if ($this->uri->segment(1) == 'es-partners-calendar') { echo 'https://pwex.org/contacto/?lang=es'; } else { echo 'https://pwex.org/contact'; } ?>" style="color: #fff;">
                        <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                            Contacto
                        <?php else: ?>
                            Contact
                        <?php endif ?>
                    </a>
                </li>
                <li style="padding: 10px 20px; font-size: 16px; font-weight: bold; float: left; display: inline-block; text-decoration: none;">
                    <a href="<?php echo base_url('en-partners-calendar/').$this->uri->segment(2).'/'.$this->uri->segment(3) ?>" style="color: #fff;"><img src="https://pwex.org/wp-content/plugins/sitepress-multilingual-cms/res/flags/en.png"></a>
                </li>
                <li style="padding: 10px 20px; font-size: 16px; font-weight: bold; float: left; display: inline-block; text-decoration: none;">
                    <a href="<?php echo base_url('es-partners-calendar/').$this->uri->segment(2).'/'.$this->uri->segment(3) ?>" style="color: #fff;"><img src="https://pwex.org/wp-content/plugins/sitepress-multilingual-cms/res/flags/es.png"></a>
                </li>
            </ul>
        </section>
        <div class="container" style="margin-top: 10px;">
            <div class="row">
                <div class="page-header">
                    <?php if ($this->uri->segment(4) == 'success'): ?>
                        <div class="alert alert-success alert-dismissable" style="font-size: 18px;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            Successful Registration. Your appointment has been scheduled.
                        </div>
                    <?php elseif($this->uri->segment(4) == 'exito'): ?>
                        <div class="alert alert-success alert-dismissable" style="font-size: 18px;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            Registro exitoso, su cita ha sido agendada.
                        </div>
                    <?php endif ?>
                    <h2 style="font-size: 28px; text-transform: uppercase; font-weight: bold; color: #ffa019;" id="current-date"></h2>
                    <p style="font-size: 18px; margin-bottom: 0px;">
                        <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                            AGENDA TU CITA CON NUESTRO EQUIPO <strong>PWEX</strong>
                            <span style="float: right;">(GMT-5) Hora en <strong>Miami, Florida, EE. UU.</strong></span>
                        <?php else: ?>
                            SCHEDULE YOUR APPOINTMENT WITH OUR <strong>PWEX</strong> TEAM
                            <span style="float: right;">(GMT-5) Time in <strong>Miami, Florida, USA</strong></span>
                        <?php endif; ?>
                    </p>
                </div>
                <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                    <p style="text-align: center; margin-top: -5px; font-weight: bold;">MENÚ DE NAVEGACIÓN</p>
                <?php else: ?>
                    <p style="text-align: center; margin-top: -5px; font-weight: bold;">NAVIGATION MENU</p>
                <?php endif ?>
                <div class="btn-group btn-group-justified" style="margin-top: -5px;">
                    <div class="btn-group">
                        <button class="btn btn-warning" data-calendar-nav="prev"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-warning" data-calendar-nav="today" style="font-weight: bold;">
                            <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                                Hoy
                            <?php else: ?>
                                Today
                            <?php endif ?>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-warning" data-calendar-nav="next" style="font-weight: bold;"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-warning" data-calendar-view="year" style="font-weight: bold;">
                            <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                                Año
                            <?php else: ?>
                                Year
                            <?php endif ?>
                        </button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-warning active" data-calendar-view="month" style="font-weight: bold;">
                            <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                                Mes
                            <?php else: ?>
                                Month
                            <?php endif ?>    
                        </button>
                    </div>
                    <div class="btn-group">
                        <button class="btn btn-warning" data-calendar-view="day" style="font-weight: bold;">
                            <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                                Día
                            <?php else: ?>
                                Day
                            <?php endif ?>
                        </button>
                    </div>
                </div>
            </div>
            <br />
            <div class="row">
                <div id="calendar" style="margin-top: -10px;"></div>
                <!-- Aqui se mostrara nuestro calendario -->
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
                </div>
            </div>
        </div>
        <div class="modal fade" id="add_evento" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
            <div class="modal-dialog">
                <div class="modal-content" style="border-radius: 0px; padding: 10px 25px; margin-top: -30px;">
                    <div class="modal-body" style="overflow: hidden; padding-bottom: 0;">
                        <h4 class="modal-title" id="myModalLabel" style="font-weight: bold;">
                            <i class="fa fa-calendar fa-2x" aria-hidden="true"></i> 
                            <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                                PROGRAMACIÓN DE CITAS
                            <?php else: ?>
                                SCHEDULING APPOINTMENTS
                            <?php endif ?>
                            <span style="float: right;">
                                <button data-dismiss="modal">X</button>
                            </span>
                        </h4>
                        <p></p>
                        <form action="" method="post">
                            <label for="title" style="font-size: 17px; padding-bottom: 5px;">
                                <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                                    Empresa
                                <?php else: ?>
                                    Business
                                <?php endif ?>
                            </label>
                            <input type="text" required autocomplete="off" name="title" class="form-control" id="title" readonly="" style="color: #222; border: 2px solid #eeeeee; background-color: #fff;">
                            <p></p>
                            <label for="from" style="font-size: 17px; padding-bottom: 5px;">
                                <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                                    Inicio
                                <?php else: ?>
                                    Start
                                <?php endif ?>
                            </label>
                            <div class='input-group date' id='from' style="width: 100%">
                                <input type='text' id="from" name="from" class="form-control" readonly style="color: #222; border: 2px solid #eeeeee; background-color: #fff;" />
                            </div>
                            <p></p>
                            <label for="to" style="font-size: 17px; padding-bottom: 5px;">
                                <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                                    Finalización
                                <?php else: ?>
                                    End
                                <?php endif ?>
                            </label>
                            <div class='input-group date' id='to' style="width: 100%">
                                <input type='text' name="to" id="to" class="form-control" readonly style="color: #222; border: 2px solid #eeeeee; background-color: #fff;" />
                            </div>
                            <select class="form-control" name="class" id="tipo" style="display: none;">
                                <option value="event-info">Informacion</option>
                                <option value="event-success">Exito</option>
                                <option value="event-important">Importantante</option>
                                <option value="event-warning">Advertencia</option>
                                <option value="event-special">Especial</option>
                            </select>
                            <p></p>
                            <label for="tools" style="font-size: 17px; padding-bottom: 5px;">
                                <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                                    Herramientas de conexión
                                <?php else: ?>
                                    Connection Tools
                                <?php endif ?>
                            </label>
                            <select class="form-control" name="tools" id="tools">
                                <option value="Skype">Skype</option>
                                <option value="Hangouts">Hangouts</option>
                                <option value="Teamviewer">Teamviewer</option>
                                <option value="Vsee">Vsee</option>
                            </select>
                            <p></p>
                            <label for="language" style="font-size: 17px; padding-bottom: 5px;">
                                <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                                    Idioma de la videoconferencia
                                <?php else: ?>
                                    Videoconference Language
                                <?php endif ?>
                            </label>
                            <select class="form-control" name="language" id="language">
                                <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                                    <option value="Español">Español</option>
                                    <option value="English">English</option>
                                <?php else: ?>
                                    <option value="English">English</option>
                                    <option value="Español">Español</option>
                                <?php endif ?>
                            </select>
                            <p></p>
                            <label for="body" style="font-size: 17px; padding-bottom: 5px;">
                                <?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>
                                    Ingrese los datos de usuario y/ o comentarios
                                <?php else: ?>
                                    Enter user data and / or comments
                                <?php endif ?>
                            </label>
                            <textarea id="body"  name="event" class="form-control" rows="3" placeholder="<?php if ($this->uri->segment(1) == 'es-partners-calendar'): ?>Por favor, ingrese los datos de usuario requeridos para realizar la videoconferencia<?php else: ?>Please, enter the required user data to make the videoconference<?php endif ?>" required=""></textarea>
                            <input type="hidden" name="email">
                            <input type="hidden" name="language">
                    </div>
                    <div class="modal-footer" style="border: none;">
                    <button type="submit" class="btn btn-warning" style="width: 100px;">
                        <i class="fa fa-check"></i>
                    </button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal" style="width: 100px;">
                        <i class="fa fa-times"></i>
                    </button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins/partners-calendar/css/calendar.css'); ?>">
        <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script> 
        <script type="text/javascript" src="<?php echo base_url('assets/plugins/partners-calendar/js/es-ES.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/partners-calendar/js/moment.js'); ?>"></script>
        <script src="<?php echo  base_url('assets/plugins/partners-calendar/js/bootstrap-datetimepicker.js'); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins/partners-calendar/css/bootstrap-datetimepicker.min.css'); ?>" />
        <script src="<?php echo base_url('assets/plugins/partners-calendar/js/bootstrap-datetimepicker.es.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/partners-calendar/js/underscore-min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/plugins/partners-calendar/js/calendar.js'); ?>"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                (function($){
                    //creamos la fecha actual
                    var date = new Date();
                    var yyyy = date.getFullYear().toString();
                    var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
                    var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
                        //establecemos los valores del calendario
                        var options = {
                            // definimos que los eventos se mostraran en ventana modal
                            modal: '#events-modal', 
                            // dentro de un iframe
                            modal_type:'iframe',    
                            //obtenemos los eventos de la base de datos
                            events_source: '<? echo base_url("assets/plugins/partners-calendar/"); ?>obtener_eventos.php', 
                            // mostramos el calendario en el mes
                            view: 'month',             
                            // y dia actual
                            day: yyyy+"-"+mm+"-"+dd,   
                            // definimos el idioma por defecto
                            <?php if($this->uri->segment(1) == 'es-partners-calendar'): ?>
                                language: 'es-ES', 
                            <?php endif; ?>
                            //Template de nuestro calendario
                            tmpl_path: '<? echo base_url("assets/plugins/partners-calendar/"); ?>tmpls/', 
                            tmpl_cache: false,
                            // Hora de inicio
                            time_start: '07:00', 
                            // y Hora final de cada dia
                            time_end: '17:30',   
                            // intervalo de tiempo entre las hora, en este caso son 30 minutos
                            time_split: '30',    
                            // Definimos un ancho del 100% a nuestro calendario
                            width: '100%', 
                            onAfterEventsLoad: function(events)
                            {
                                if(!events)
                                {
                                    return;
                                }
                                var list = $('#eventlist');
                                list.html('');
            
                                $.each(events, function(key, val)
                                {
                                    $(document.createElement('li'))
                                        .html('<a href="' + val.url + '">' + val.title + '</a>')
                                        .appendTo(list);
                                });
                            },
                            onAfterViewLoad: function(view)
                            {
                                $('.page-header h2').text(this.getTitle());
                                $('.btn-group button').removeClass('active');
                                $('button[data-calendar-view="' + view + '"]').addClass('active');
                            },
                            classes: {
                                months: {
                                    general: 'label'
                                }
                            }
                        };
                    // id del div donde se mostrara el calendario
                    var calendar = $('#calendar').calendar(options); 
                    $('.btn-group button[data-calendar-nav]').each(function()
                    {
                        var $this = $(this);
                        $this.click(function()
                        {
                            calendar.navigate($this.data('calendar-nav'));
                        });
                    });
            
                    $('.btn-group button[data-calendar-view]').each(function()
                    {
                        var $this = $(this);
                        $this.click(function()
                        {
                            calendar.view($this.data('calendar-view'));
                        });
                    });
            
                    $('#first_day').change(function()
                    {
                        var value = $(this).val();
                        value = value.length ? parseInt(value) : null;
                        calendar.setOptions({first_day: value});
                        calendar.view();
                    });
                }(jQuery));
            });
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(function () {
                    $('#from').datetimepicker({
                        language: 'es',
                        minDate: new Date()
                    });
                    $('#to').datetimepicker({
                        language: 'es',
                        minDate: new Date()
                    });
                });
            });
        </script>
    </body>
</html>