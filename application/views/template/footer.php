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
        <?php if (($this->uri->segment(1) == 'users') || ($this->uri->segment(1) == 'categories') || ($this->uri->segment(1) == 'warehouses') || ($this->uri->segment(1) == 'countrys') || ($this->uri->segment(1) == 'benefits') || ($this->uri->segment(1) == 'typesinventory') || ($this->uri->segment(1) == 'components') || ($this->uri->segment(1) == 'unitsmeasure') || ($this->uri->segment(1) == 'products') || ($this->uri->segment(1) == 'partners') || ($this->uri->segment(1) == 'document_types') || ($this->uri->segment(1) == 'partner_types') || ($this->uri->segment(1) == 'cities') || ($this->uri->segment(1) == 'seals') || ($this->uri->segment(1) == 'list-price') || ($this->uri->segment(1) == 'banks') || ($this->uri->segment(1) == 'register_consumer') || ($this->uri->segment(1) == 'price-product' and ($this->uri->segment(2) !="add" or $this->uri->segment(2) !="edit")) ): ?>
            <!-- script para agregar clase no-padding para resoluciones moviles -->
            <script type="text/javascript">
                if (screen.width <= 425) {
                    $('#container-box-datatable').addClass('no-padding');
                }
            </script>
            <script src="<?php echo base_url('assets/bower_components/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
            <script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') ?>"></script>              
            <script src="<?php echo base_url('assets/bower_components/datatables.net-bs/js/dataTables.colReorder.min.js') ?>"></script>              
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#table-default tfoot th').each( function () {
                        var title = $('#table-default thead th').eq( $(this).index() ).text();
                        $(this).html( '<input type="text" class="form-control input-sm" placeholder="'+title+'" style="font-weight: 600; width: 100%" />' );
                    } );
                    var table = $('#table-default').DataTable({
                        <?php if ($this->uri->segment(1) == 'price-product'): ?>
                            "order": [[ 1, "asc" ], [4, 'asc']],
                        <?php endif; ?>
                        colReorder: true,
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
                     $("#table-default tfoot input").on( 'keyup change', function () {
                        table
                            .column( $(this).parent().index()+':visible' )
                            .search( this.value )
                            .draw();
                    } );
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
                elseif ($this->uri->segment(1) == 'warehouses')
                {
                    $url = "warehouses";
                }
                elseif ($this->uri->segment(1) == 'countrys')
                {
                    $url = "countrys";
                }
                elseif ($this->uri->segment(1) == 'benefits')
                {
                    $url = "benefits";
                }
                elseif ($this->uri->segment(1) == 'components')
                {
                    $url = "components";
                }
                elseif ($this->uri->segment(1) == 'unitsmeasure')
                {
                    $url = "unitsmeasure";
                }

                elseif ($this->uri->segment(1) == 'typesinventory')
                {
                    $url = "typesinventory";
                }
                elseif ($this->uri->segment(1) == 'products')
                {
                    $url = "products";
                }
                elseif ($this->uri->segment(1) == 'document_types')
                {
                    $url = "document_types";
                }
                elseif ($this->uri->segment(1) == 'partner_types')
                {
                    $url = "partner_types";
                }
                elseif ($this->uri->segment(1) == 'partners')
                {
                    $url = "partners";
                }
                elseif ($this->uri->segment(1) == 'seals')
                {
                    $url = "seals";
                }
                elseif ($this->uri->segment(1) == 'cities')
                {
                    $url = "cities";
                }
                elseif ($this->uri->segment(1) == 'banks')
                {
                    $url = "banks";
                }
                elseif ($this->uri->segment(1) == 'list-price')
                {
                    $url = "list-price";
                }
                elseif ($this->uri->segment(1) == 'price-product')
                {
                    $url = "price-product";
                }
                elseif ($this->uri->segment(1) == 'register_consumer')
                {
                    $url = "register_consumer";
                }
            ?>
                $(document).ready(function()
                {
                    $('button.btn.btn-danger.btn-delete').on('click', function()
                    {
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
                                            window.location = '<?php echo base_url($url);?>/success-delete';
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
        <?php endif; ?>
        <!-- DataTables End -->

        <!-- Manager Files Images -->
        <?php if ($this->uri->segment(1) == 'multimedia' and $this->uri->segment(2) != 'videos'): ?>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <!-- Manager File -->
            <script src="<?php echo base_url('assets/bower_components/fileuploader/src/jquery.fileuploader.min.js') ?>" type="text/javascript"></script>
            <script src="<?php echo base_url('assets/bower_components/fileuploader/examples/thumbnails/js/custom.js') ?>" type="text/javascript"></script>
            <script type="text/javascript">
            </script>
            <script type="text/javascript">
                $(document).ready(function(){
                    // Accion para seleccionar imagene
                    $('.img-main').on('click', function(){
                        var id = $(this).attr('id');
                        var main = $(this);
                        if ($('.btn-action-img[id="' + id + '"]').css('display') == 'none') { 
                            // main.css('border', '3px solid #e9e9f9', 'border-radius', '5px');
                            $('.btn-action-img[id="' + id + '"]').show();
                        } else{
                            // main.css('border', 'none', 'border-radius', '0');
                            $('.btn-action-img[id="' + id + '"]').hide();
                        }
                    });
                    // Eliminar imagen seleccionada
                    $('.btn-delete-medios').on('click', function(){
                        var id   = $(this).parent().attr('id');
                        var name = $(this).parent().attr('value');
                        $( "#dialog-confirm" ).dialog({
                                resizable: false,
                                height: "auto",
                                width: 400,
                                modal: true,
                                buttons: {
                                    "Eliminar": function() {
                                        $( this ).dialog( "close" );
                                        $.ajax({
                                            url : '<?php echo base_url("multimedia/delete-images") ?>',
                                            data: { id : id, name : name },
                                            type: 'POST',
                                            success : function(response){
                                                window.location = '<?php echo base_url('multimedia/success-delete-images') ?>';
                                            },
                                            error : function(){
                                                alert('Ha ocurrido un error...');
                                            }
                                        });
                                    },
                                    "Cancelar": function() {
                                        $( this ).dialog( "close" );
                                    }
                                }
                        });
                    });
                    // Administrador de archivos
                    $('#btn-file-manager').on('click', function(){
                        var manager = $('#file-manager');
                        var button  = $('#btn-file-manager');
                        manager.toggle(); 
                        $('#main-manager').toggle();
                        if (manager.css('display') == 'block') {
                            button.removeClass('btn-primary');
                            button.addClass('btn-danger');
                            $('#btn-icon').removeClass('fa-plus-circle');
                            $('#btn-icon').addClass('fa-minus');
                        } else {
                            button.removeClass('btn-danger');
                            button.addClass('btn-primary');
                            $('#btn-icon').removeClass('fa-minus');
                            $('#btn-icon').addClass('fa-plus-circle');
                        }
                    });
                });
            </script>
        <?php endif; ?>
        <!-- Manager Files Imagenes End -->
        <!-- Manager Files Videos -->
        <?php if ($this->uri->segment(1) == 'multimedia' and $this->uri->segment(2) == 'videos'): ?>
            <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
            <!-- Manager File -->
            <script src="<?php echo base_url('assets/bower_components/fileuploader/src/jquery.fileuploader.min.js') ?>" type="text/javascript"></script>
            <script src="<?php echo base_url('assets/bower_components/fileuploader/examples/add-more/js/custom.js') ?>" type="text/javascript"></script>
            <script type="text/javascript">
            </script>
            <script type="text/javascript">
                $(document).ready(function(){
                    // Accion para seleccionar imagene
                    $('.videos-main').on('click', function(){
                        var id = $(this).attr('id');
                        var main = $(this);
                        if ($('.btn-action-img[id="' + id + '"]').css('display') == 'none') { 
                            // main.css('border', '3px solid #e9e9f9', 'border-radius', '5px');
                            $('.btn-action-img[id="' + id + '"]').show();
                        } else{
                            // main.css('border', 'none', 'border-radius', '0');
                            $('.btn-action-img[id="' + id + '"]').hide();
                        }
                    });
                    // Eliminar imagen seleccionada
                    $('.btn-delete-medios').on('click', function(){
                        var id   = $(this).parent().attr('id');
                        var name = $(this).parent().attr('value');
                        $( "#dialog-confirm" ).dialog({
                                resizable: false,
                                height: "auto",
                                width: 400,
                                modal: true,
                                buttons: {
                                    "Eliminar": function() {
                                        $( this ).dialog( "close" );
                                        $.ajax({
                                            url : '<?php echo base_url("multimedia/videos/delete") ?>',
                                            data: { id : id, name : name },
                                            type: 'POST',
                                            success : function(response){
                                                window.location = '<?php echo base_url('multimedia/videos/success-delete') ?>';
                                            },
                                            error : function(){
                                                alert('Ha ocurrido un error...');
                                            }
                                        });
                                    },
                                    "Cancelar": function() {
                                        $( this ).dialog( "close" );
                                    }
                                }
                        });
                    });
                    // Administrador de archivos
                    $('#btn-file-manager').on('click', function(){
                        var manager = $('#file-manager-videos');
                        var button  = $('#btn-file-manager');
                        manager.toggle(); 
                        $('#main-manager').toggle();
                        if (manager.css('display') == 'block') {
                            button.removeClass('btn-primary');
                            button.addClass('btn-danger');
                            $('#btn-icon').removeClass('fa-plus-circle');
                            $('#btn-icon').addClass('fa-minus');
                        } else {
                            button.removeClass('btn-danger');
                            button.addClass('btn-primary');
                            $('#btn-icon').removeClass('fa-minus');
                            $('#btn-icon').addClass('fa-plus-circle');
                        }
                    });
                });
            </script>
        <?php endif; ?>
        <!-- Manager Files Videos End -->
        <?php if (($this->uri->segment(1) == 'categories' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) or ($this->uri->segment(1) == 'products' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) or ($this->uri->segment(1) == 'seals' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) or ($this->uri->segment(1) == 'multimedia') ): ?>
            <!-- Administrador de imagenes -->
            <script src="<?php echo base_url('assets/plugins/filterizr/filterizr/jquery.filterizr.min.js') ?>" type="text/javascript"></script>
            <script src="<?php echo base_url('assets/plugins/filterizr/js/controls.js') ?>" type="text/javascript"></script>
            <script type="text/javascript">
                $(function() {
                    //Initialize filterizr with default options
                    var filterizd = $('.filtr-container').filterizr({
                        layout: 'packed'
                    });
                });
            </script>
        <?php endif; ?>
        <!-- Filtro select -->
        <?php if ( ($this->uri->segment(1) == 'price-product' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) or ($this->uri->segment(1) == 'products' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) ): ?>
            <script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
            <script type="text/javascript">
            $(document).ready(function(){
                //Initialize Select2 Elements
                $('.select2').select2();
                $('span.select2-container').css('width','100%');
            });
            </script>
        <?php endif; ?>
        <!-- mascaras campos formularios -->
        <?php if ( ($this->uri->segment(1) == 'register_consumer' and $this->uri->segment(2) == 'add') ): ?>
            <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.js') ?>"></script>
            <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js') ?>"></script>
            <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js') ?>"></script>
            <script type="text/javascript">
            $(document).ready(function()
            {
                //Datemask dd/mm/yyyy
                $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
            });
            </script>
        <?php endif; ?>
    </body>
</html>