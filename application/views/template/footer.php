</div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="pull-right hidden-xs">
                    <b>Version</b> 1.0
                </div>
                © 2017-<?php echo date('Y'); ?> Pwex Todos los derechos reservados.
            </footer>
           
            <!-- Add the sidebar's background. This div must be placed
                immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- ./wrapper -->
        <!-- jQuery 3 -->
        <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
        <!-- SlimScroll -->
        <script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
        <!-- FastClick -->
        <script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>
        <script>
            $(document).ready(function () {
              $('.sidebar-menu').tree()
            });
        </script>
        <!-- DataTables -->
        <!-- <?php //if ($this->uri->segment(1) == 'users'): ?> -->
        <?php if (($this->uri->segment(1) == 'users') || ($this->uri->segment(1) == 'categories')): ?>
            <script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
            <script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>       
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#table-default').DataTable({
                        'language' : {
                            "sProcessing":     "Procesando...",
                            "sLengthMenu":     "Mostrar _MENU_ registros",
                            "sZeroRecords":    "No se encontraron resultados",
                            "sEmptyTable":     "Ningún dato disponible en esta tabla",
                            "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                            "sInfoPostFix":    "",
                            "sSearch":         "Buscar:",
                            "sUrl":            "",
                            "sInfoThousands":  ",",
                            "sLoadingRecords": "Cargando...",
                            "oPaginate": {
                                "sFirst":    "Primero",
                                "sLast":     "Último",
                                "sNext":     "Siguiente",
                                "sPrevious": "Anterior"
                            },
                            "oAria": {
                                "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                            }
                        }
                    });
                });
            </script>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <script>
            <?php 
                if ($this->uri->segment(1) == 'users')
                {
                    $url = "users";
                }
                elseif ($this->uri->segment(1) == 'categories')
                {
                    $url = "categories";
                }
            ?>
                $(document).ready(function()
                {
                    $('button.btn.btn-danger.btn-delete').on('click', function(){
                        var id = $(this).attr('id');
                        $( "#dialog-confirm" ).dialog({
                            resizable: false,
                            height: "auto",
                            width: 400,
                            modal: true,
                            buttons: {
                                "Eliminar": function() 
                                {
                                    $( this ).dialog( "close" );
                                    $.ajax({
                                        url : '<?php echo base_url("$url/delete") ?>',
                                        data: { id : id },
                                        type: 'POST',
                                        success : function(response){
                                            window.location = '<?php echo $url;?>/success-delete';
                                        },
                                        error : function(){
                                            alert('Ha ocurrido un error...');
                                        }
                                    });
                                },
                                "Cancelar": function() 
                                {
                                    $( this ).dialog( "close" );
                                }
                            }
                        });
                    });
                });
              </script>
        <?php endif ?>
    </body>
</html>