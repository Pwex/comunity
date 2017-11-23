<style type="text/css">
    .bar-disable {
        display: none; 
        background: rgb(248, 250, 252);
        border: 1px solid #eee;
        color: #4a4a4a;
        font-size: 21px;
        padding: 56px;
        position: absolute;
        text-align: center;
        top: 45%;
        width: 93.6%;
        z-index: 10;
    }
</style>
<section class="content">
    <div class="box  box-danger">
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Agenda de proveedores
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive" id="container-box-datatable">
            <div>
                <a href="<?php echo base_url('download-calendar-partners') ?>" class="btn btn-success">DESCARGAR AGENDAMIENTO</a>
            </div>
            <p></p>
            <table class="table table-responsive table-bordered table-hover" id="table-default">
                <thead>
                    <th>Fecha</th>  
                    <th>Empresa</th>  
                    <th>Correo electronico</th>
                    <th>Idioma</th>  
                    <th>Herramienta</th>  
                    <th>Estatus</th>  
                    <th>Opciones</th>
                </thead>
                <tfoot>
                    <th>Fecha</th>  
                    <th>Empresa</th>  
                    <th>Correo electronico</th>  
                    <th>Idioma</th>
                    <th>Herramienta</th>  
                    <th>Estatus</th>    
                    <th>Opciones</th>
                </tfoot>
                <tbody>
                    <?php foreach ($calendar_listing as $key => $value): ?>
                        <tr>
                            <td><?php echo $value['inicio_normal'].' - '.trim(substr($value['final_normal'], -5)) ?></td>
                            <td><?php echo $value['title'] ?></td>
                            <td><?php echo $value['email'] ?></td>
                            <td align="center">
                                <?php if ($value['language'] == 'Español'): ?>
                                    <img src="<?php echo base_url('assets/dist/img/flag/es.png') ?>" width="40" height="30" align="center">
                                <?php elseif($value['language'] == 'Ingles'): ?>
                                    <img src="<?php echo base_url('assets/dist/img/flag/gb.png') ?>" width="40" height="25" align="center">
                                <?php endif; ?>
                            </td>
                            <td align="center">
                                <?php if ($value['tools'] == 'Skype'): ?>
                                    <img src="<?php echo base_url('assets/dist/img/icon/skype.ico') ?>" width="32" align="center">
                                <?php elseif($value['tools'] == 'Hangouts'): ?>
                                    <img src="<?php echo base_url('assets/dist/img/icon/hangouts.png') ?>" width="38" align="center">
                                <?php elseif($value['tools'] == 'Vsee'): ?>
                                    <img src="<?php echo base_url('assets/dist/img/icon/vsee.png') ?>" width="60" align="center">
                                <?php elseif($value['tools'] == 'Teamviewer'): ?>
                                    <img src="<?php echo base_url('assets/dist/img/icon/teamviewer.ico') ?>" width="38" align="center">
                                <?php endif; ?>
                            </td>
                            <td align="center">
                                <?php if ($value['status'] == 0): ?>
                                    <i class="fa fa-clock-o fa-2x text-primary" aria-hidden="true" title="CITA SIN EJECUTAR "></i>
                                <?php elseif($value['status'] == 1): ?>
                                    <i class="fa fa-calendar-check-o fa-2x text-success" aria-hidden="true" title="CITA EJECUTADA"></i>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button type="button" value="<?php echo $value['id'] ?>" class="btn btn-success btn-block btn-sm btn-appointment-made" <?php if($value['status'] == 1){ echo "disabled=''"; } ?> >
                                    <i class="fa fa-chain-broken" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/alertify/css/alertify.min.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/plugins/alertify/css/themes/bootstrap.min.css') ?>">
<script type="text/javascript" src="<?php echo base_url('assets/plugins/alertify/alertify.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#table-default').on('click', '.btn-appointment-made', function(){
            var id = $(this).attr('value');
            alertify.confirm("¿Deseas confirmar que ya esta cita se realizó?", function(){
                $.ajax({
                    url  : '<?php echo base_url("confirm-appointment-provider") ?>',
                    data : { id : id },
                    type : 'POST',
                    success : function()
                    {

                    },
                    complete : function(response)
                    {
                        alertify.success('Ok');   
                        setTimeout(function(){
                            window.location.href = "";
                        },500);
                    },
                    error : function()
                    {
                        alertify.error('Ha ocurrido un error al conectar con el servidor...');
                    }
                });
            }).setHeader('AGENDA').set('labels', {ok:'Confirmar', cancel:'Cancelar'}); ;
        });
    }); 
</script>