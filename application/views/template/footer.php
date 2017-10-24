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
        <?php if ($this->uri->segment(1) != 'calendar'): ?>
            <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
        <?php else: ?>
            <script src="<?=$base_url?>js/jquery.min.js"></script>
        <?php endif ?>
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
        <?php if (($this->uri->segment(1) == 'users') || ($this->uri->segment(1) == 'modules') || ($this->uri->segment(1) == 'movement_types') || ($this->uri->segment(1) == 'categories') || ($this->uri->segment(1) == 'warehouses') || ($this->uri->segment(1) == 'countrys') || ($this->uri->segment(1) == 'benefits') || ($this->uri->segment(1) == 'typesinventory') || ($this->uri->segment(1) == 'components') || ($this->uri->segment(1) == 'unitsmeasure') || ($this->uri->segment(1) == 'products') || ($this->uri->segment(1) == 'partners') || ($this->uri->segment(1) == 'document_types') || ($this->uri->segment(1) == 'partner_types') || ($this->uri->segment(1) == 'cities') || ($this->uri->segment(1) == 'seals') || ($this->uri->segment(1) == 'list-price') || ($this->uri->segment(1) == 'banks') || ($this->uri->segment(1) == 'consumers') || ($this->uri->segment(1) == 'price-product' and ($this->uri->segment(2) !="add" or $this->uri->segment(2) !="edit")) || ($this->uri->segment(1) == 'catalogue' and ($this->uri->segment(2) !="add" or $this->uri->segment(2) !="edit")) || ($this->uri->segment(1) == 'certifications' and ($this->uri->segment(2) !="add" or $this->uri->segment(2) !="edit")) || ($this->uri->segment(1) == 'shop-layout-navbar' and ($this->uri->segment(2) !="add" or $this->uri->segment(2) !="edit")) || ($this->uri->segment(1) == 'shop-layout-filter' and ($this->uri->segment(2) !="add" or $this->uri->segment(2) !="edit")) || ($this->uri->segment(1) == 'shop-layout-filter-item' and ($this->uri->segment(2) !="add" or $this->uri->segment(2) !="edit")) || ($this->uri->segment(1) == 'excel-providers' and ($this->uri->segment(2) !="add" or $this->uri->segment(2) !="edit")) || ($this->uri->segment(1) == 'requirements-matrix' and ($this->uri->segment(2) !="add" or $this->uri->segment(2) !="edit")) || ($this->uri->segment(1) == 'presentation' and ($this->uri->segment(2) !="add" or $this->uri->segment(2) !="edit")) ): ?>
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
                        <?php if ($this->uri->segment(1) == 'excel-providers'): ?>
                            "order": [[ 0, "desc" ]],
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
                elseif ($this->uri->segment(1) == 'modules')
                {
                    $url = "modules";
                }
                elseif ($this->uri->segment(1) == 'movement_types')
                {
                    $url = "movement_types";
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
                elseif ($this->uri->segment(1) == 'consumers')
                {
                    $url = "consumers";
                }
                elseif ($this->uri->segment(1) == 'catalogue')
                {
                    $url = "catalogue";
                }
                elseif ($this->uri->segment(1) == 'certifications')
                {
                    $url = "certifications";
                }
                elseif ($this->uri->segment(1) == 'shop-layout-navbar')
                {
                    $url = "shop-layout-navbar";
                }
                elseif ($this->uri->segment(1) == 'shop-layout-filter')
                {
                    $url = "shop-layout-filter";
                }
                elseif ($this->uri->segment(1) == 'shop-layout-filter-item')
                {
                    $url = "shop-layout-filter-item";
                }
                elseif ($this->uri->segment(1) == 'excel-providers')
                {
                    $url = "excel-providers";
                }
                elseif ($this->uri->segment(1) == 'requirements-matrix')
                {
                    $url = "requirements-matrix";
                }
                elseif ($this->uri->segment(1) == 'presentation')
                {
                    $url = "presentation";
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
        <?php if (($this->uri->segment(1) == 'products' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) or ($this->uri->segment(1) == 'seals' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) or ($this->uri->segment(1) == 'catalogue' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) or ($this->uri->segment(1) == 'countrys' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) or ($this->uri->segment(1) == 'multimedia') ): ?>
            <!-- Administrador de imagenes -->
            <script src="<?php echo base_url('assets/plugins/filterizr/filterizr/jquery.filterizr.min.js') ?>" type="text/javascript"></script>
            <script src="<?php echo base_url('assets/plugins/filterizr/js/controls.js') ?>" type="text/javascript"></script>
            <script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>" type="text/javascript"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#date_expiration_sanitary_registration').datepicker({
                      autoclose: true
                    });
                    $('li.shuffle-btn').on('click', function(){
                        $(this).text('MOSTRAR ALEATORIAMENTE');
                        $('.filtr-container').show();
                    });
                });
                $(function() {
                    //Initialize filterizr with default options
                    var filterizd = $('.filtr-container').filterizr({
                        layout: 'sameSize'
                    });
                });
            </script>
        <?php endif; ?>
        <!-- Filtro select -->
        <?php if ( ($this->uri->segment(1) == 'price-product' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) or ($this->uri->segment(1) == 'products' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) or ($this->uri->segment(1) == 'categories' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) ): ?>
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
        <?php if ( ($this->uri->segment(1) == 'consumers' and $this->uri->segment(2) == 'add') ): ?>
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

        <?php if ($this->uri->segment(1) == 'movement_types' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')): ?>
            <script src="<?php echo base_url('assets/plugins/icheck/icheck.min.js') ?>"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                        checkboxClass: 'icheckbox_minimal-red',
                        radioClass   : 'iradio_minimal-red'
                    });
                });
            </script>
        <?php endif ?>

        <?php if ($this->uri->segment(1) == 'products' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')): ?>
            <script type="text/javascript" src="<?php echo base_url('assets/bower_components/ckeditor/ckeditor.js') ?>"></script>
            <script type="text/javascript" src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
            <script type="text/javascript">
                $(document).ready(function(){
                    var normalize = (function() {
                    var from = " ", 
                        to   = "-",
                        mapping = {};
                  for(var i = 0, j = from.length; i < j; i++ )
                      mapping[ from.charAt( i ) ] = to.charAt( i );
                  return function( str ) {
                      var ret = [];
                      for( var i = 0, j = str.length; i < j; i++ ) {
                          var c = str.charAt( i );
                          if( mapping.hasOwnProperty( str.charAt( i ) ) )
                              ret.push( mapping[ c ] );
                          else
                              ret.push( c );
                      }      
                      return ret.join( '' );
                  }
                 
                })();
                    $('#id_catalogue').change('click', function(){
                        var id = $('#id_catalogue option:selected').html();
                        id = normalize(id.trim());
                        if (id == 'APARATOLOGIA-ESTETICA') {
                            $('div.section-aparatologia').show();
                            $('#tab3_nav').hide();
                            $('#container_sellos').hide();
                        } else if(id == 'BELLEZA' || id == 'NUTRICION' || id == 'SALUD' || id == 'SUPLEMENTOS-DIETARIOS') {
                            $('div.section-aparatologia').hide();
                            $('#tab3_nav').show();
                            $('#container_sellos').show();
                        }
                        if (id == 'APARATOLOGIA-ESTETICA' || id == 'BELLEZA') {
                            $('#container_nutritional').hide();
                        } else {
                            $('#container_nutritional').show();
                        }
                    });
                    $('#status_filter_products').change('click', function(){
                        var id = $('#status_filter_products option:selected').val();
                        if (id != 0) {
                            $('#container_status_filter_products').show(1000);
                            $('#status_filter_products_label').empty();
                            $('#status_filter_products_label').append('Seleccione los parámetros del filtro');
                            $.ajax({
                                url  : '<?php echo base_url('products/filter-settings') ?>',
                                data : { id : id },
                                type : 'POST',
                                success : function(response){
                                    $('#filter_product option').remove();
                                    $('#filter_product').append(response);
                                }, 
                                complete: function(){
                                    $('#filter_product').attr('disabled', false);
                                },
                                error: function(){
                                    alert('Ha ocurrido un error al conectar con el servidor');
                                }
                            });
                        } else {
                            $('#container_status_filter_products').hide(1000);
                        }
                    });
                });
            </script>
            <script type="text/javascript">
                $(function () {
                    CKEDITOR.replace('labeled');
                    CKEDITOR.config.pasteFromWord_heuristicsEdgeList = false;
                  })
                $(document).ready(function(){
                    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
                        checkboxClass: 'icheckbox_minimal-red',
                        radioClass   : 'iradio_minimal-red'
                    });
                });
            </script>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#name_product').keyup(function(){
                        $.ajax({
                            url  : '<?php echo base_url('products/friendly-url') ?>',
                            data : { url : $('#name_product').val() },
                            type : 'POST',
                            success: function(response){
                                $('#url').val(response);
                            },
                            error: function(){
                                alert('Ha ocurrido un error al conectar con el servidor');
                            }
                        });
                    });
                });
            </script>
        <?php endif ?>

        <?php if ($this->uri->segment(1) == 'categories' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')): ?>
            <!-- Filtro de select de categorias -->
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#id_catalogue').change('click', function(){
                        $("#id_father_category").prop('disabled', false);
                        $("#filter").prop('disabled', false);
                        var id = $(this).val();
                        $.ajax({
                            url  : '<?php echo base_url('categories/filter') ?>',
                            data : { id: id },
                            type : 'POST',
                            success : function(response){
                                $('#id_father_category optgroup').remove();
                                $('#id_father_category').append(response);
                                $("#id_father_category").removeAttr('disabled');

                                $('#filter optgroup').remove();
                                $('#filter').append(response);
                                $("#filter").removeAttr('disabled');

                            },
                            error : function(){
                                alert('Ha ocurrido un error...');
                            }
                        });
                    });
                });
            </script>
        <?php endif ?>
        <?php if ($this->uri->segment(1) == 'shop-layout-google-analytics'): ?>
            <!-- script para el editor de codigo de google analytics -->
            <link rel="stylesheet" href="<?php echo base_url('assets/plugins/codemirror/lib/codemirror.css') ?>">
            <script src="<?php echo base_url('assets/plugins/codemirror/lib/codemirror.js') ?>"></script>
            <script src="<?php echo base_url('assets/plugins/codemirror/mode/javascript/javascript.js') ?>"></script>
            <script>
              var editor = CodeMirror.fromTextArea(footer, {
                lineNumbers: true,
                value: "function myScript(){return 100;}\n",
                mode:  "javascript"
              });
            </script>
        <?php endif ?>
        <?php if ($this->uri->segment(1) == 'excel-providers'): ?>
            <!-- script seccion de excel de proveedores -->
            <script type="text/javascript">
                $(document).ready(function(){
                    $('button.btn-primary').on('click', function(){
                        $('#container-box-datatable').css('color', '#e2e2e2');
                        $('button.btn-primary').css('opacity', '0.1');
                        $('button.btn-primary').prop("disabled",true);
                        $('.bar-disable').show(500);
                        var email        = $(this).attr('value');
                        var id           = $(this).attr('id');
                        var language     = $(this).attr('language');
                        var company_name = $(this).attr('company_name');
                        $.ajax({
                            url  : '<?php echo base_url('sending-information-to-suppliers') ?>',
                            data : { id: id, email: email, company_name: company_name, language: language },
                            type : 'POST',
                            success : function(response){

                            },
                            complete: function(){
                                setTimeout(function(){
                                    $('#container-box-datatable').css('color', '#333333');
                                    $('button.btn-primary').css('opacity', '1');
                                    $('button.btn-primary').prop("disabled",false);
                                    $('.bar-disable').hide(500);
                                    $('button.btn-primary[id=' + id + ']').css('background-color', '#4caf50');
                                    $('button.btn-primary[id=' + id + ']').css('border-color', '#4caf50');
                                    $('button.btn-primary[id=' + id + ']').empty().html('<i class="fa fa-share" aria-hidden="true"></i>');
                                }, 2500);
                            },
                            error : function(){
                                alert('Ha ocurrido un error...');
                            }
                        });
                    });
                });
            </script>
        <?php endif ?>
        <?php if ($this->uri->segment(1) == 'requirements-matrix'): ?>
            <!-- script seccion de matriz de requerimientos -->
            <script type="text/javascript">
                $(document).ready(function(){
                    $('button.btn-primary').on('click', function(){
                        $('#container-box-datatable').css('color', '#e2e2e2');
                        $('button.btn-primary').css('opacity', '0.1');
                        $('button.btn-primary').prop("disabled",true);
                        $('.bar-disable').show(500);
                        var email        = $(this).attr('value');
                        var id           = $(this).attr('id');
                        var language     = $(this).attr('language');
                        var company_name = $(this).attr('company_name');
                        var product_name = $(this).attr('product_name');
                        $.ajax({
                            url  : '<?php echo base_url('product-order-approval') ?>',
                            data : { id: id, email: email, company_name: company_name, product_name: product_name, language: language },
                            type : 'POST',
                            success : function(response){

                            },
                            complete: function(){
                                setTimeout(function(){
                                    $('#container-box-datatable').css('color', '#333333');
                                    $('button.btn-primary').css('opacity', '1');
                                    $('button.btn-primary').prop("disabled",false);
                                    $('.bar-disable').hide(500);
                                    $('button.btn-primary[id=' + id + ']').css('background-color', '#4caf50');
                                    $('button.btn-primary[id=' + id + ']').css('border-color', '#4caf50');
                                    $('button.btn-primary[id=' + id + ']').empty().html('<i class="fa fa-share" aria-hidden="true"></i>');
                                }, 2500);
                            },
                            error : function(){
                                alert('Ha ocurrido un error...');
                            }
                        });
                    });
                    $('button.btn-view-requirements').on('click', function(){
                        $('.th-option').css('width', '15%');
                        var id = $(this).attr('id');
                        $.ajax({
                            url  : '<?php echo base_url('view-requirements') ?>',
                            data : { id: id },
                            type : 'POST',
                            success : function(response){
                                $('.modal-body').empty().html(response);
                            },
                            complete: function(){
                                
                            },
                            error : function(){
                                alert('Ha ocurrido un error...');
                            }
                        });
                    });
                });
            </script>
        <?php endif ?>
        <?php if ( ($this->uri->segment(2) != 'add' or $this->uri->segment(2) != 'edit') and ($this->uri->segment(1) == 'consumers') ): ?>
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#table-default').css('min-width', '450px');
                });
            </script>
        <?php endif ?>
        <?php if ( ($this->uri->segment(2) != 'add' or $this->uri->segment(2) != 'edit') and ($this->uri->segment(1) == 'calendar') ): ?> 
            <!-- <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css"> -->
            <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet"> -->
            <!-- <script src="<?=$base_url?>js/bootstrap.min.js"></script> -->
            <link rel="stylesheet" href="<?=$base_url?>css/calendar.css">
            <script type="text/javascript" src="<?=$base_url?>js/es-ES.js"></script>
            <script src="<?=$base_url?>js/moment.js"></script>
            <script src="<?=$base_url?>js/bootstrap-datetimepicker.js"></script>
            <link rel="stylesheet" href="<?=$base_url?>css/bootstrap-datetimepicker.min.css" />
            <script src="<?=$base_url?>js/bootstrap-datetimepicker.es.js"></script>
            <script src="<?=$base_url?>js/underscore-min.js"></script>
            <script src="<?=$base_url?>js/calendar.js"></script>
            <script type="text/javascript">
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
                                events_source: '<? echo base_url("assets/plugins/calendar/"); ?>obtener_eventos.php', 

                                // mostramos el calendario en el mes
                                view: 'month',             

                                // y dia actual
                                day: yyyy+"-"+mm+"-"+dd,   


                                // definimos el idioma por defecto
                                language: 'es-ES', 

                                //Template de nuestro calendario
                                tmpl_path: '<?=$base_url?>tmpls/', 
                                tmpl_cache: false,


                                // Hora de inicio
                                time_start: '08:00', 

                                // y Hora final de cada dia
                                time_end: '22:00',   

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
            </script>
            <script type="text/javascript">
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
            </script>
        <?php endif ?>
        <?php if ($this->uri->segment(1) == 'consumers' and $this->uri->segment(2) == 'poll'): ?>
            <!-- script para la sección de la encuenta -->
            <script type="text/javascript">
                $(document).ready(function(){
                    $('#all_aspect').change(function(){
                        var status = $('label[for=all_aspect]').text().trim();
                        if (status == 'Todos') {
                            $('label[for=all_aspect]').text('Deseleccionar');
                        } else {
                            $('label[for=all_aspect]').text('Todos');
                        }
                    });
                });
            </script>
        <?php endif ?>
        <?php if ($this->uri->segment(1) == 'partners' and $this->uri->segment(2) != 'add' and $this->uri->segment(2) != 'edit'): ?>
            <!-- script seccion de proveedores -->
            <script type="text/javascript">
                $(document).ready(function(){
                    $('button.btn-primary').on('click', function(){
                        $('#container-box-datatable').css('color', '#e2e2e2');
                        $('button.btn-primary').css('opacity', '0.1');
                        $('button.btn-primary').prop("disabled",true);
                        $('a.btn-warning').css('opacity', '0.1');
                        $('a.btn-warning').prop("disabled",true);
                        $('button.btn-delete').css('opacity', '0.1');
                        $('button.btn-delete').prop("disabled",true);
                        $('.bar-disable').show(500);
                        var id           = $(this).attr('id');
                        var email        = $(this).attr('value');
                        var company      = $(this).attr('company');
                        $.ajax({
                            url  : '<?php echo base_url('send-user-and-password-information') ?>',
                            data : { id: id, email: email, company: company },
                            type : 'POST',
                            success : function(response){
                                
                            },
                            complete: function(){
                                setTimeout(function(){
                                    $('#container-box-datatable').css('color', '#333333');
                                    $('button.btn-primary').css('opacity', '1');
                                    $('button.btn-primary').prop("disabled",false);
                                    $('a.btn-warning').css('opacity', '1');
                                    $('a.btn-warning').prop("disabled",false);
                                    $('button.btn-delete').css('opacity', '1');
                                    $('button.btn-delete').prop("disabled",false);
                                    $('.bar-disable').hide(500);
                                    $('button.btn-primary[id=' + id + ']').css('background-color', '#4caf50');
                                    $('button.btn-primary[id=' + id + ']').css('border-color', '#4caf50');
                                    $('button.btn-primary[id=' + id + ']').empty().html('<i class="fa fa-share" aria-hidden="true"></i>');
                                }, 2500);
                            },
                            error : function(){
                                alert('Ha ocurrido un error...');
                            }
                        });
                    });
                });
            </script>
        <?php endif ?>
    </body>
</html>