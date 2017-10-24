<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <div class="box-header">
            <div class="alert alert-success alert-dismissible" id="alert_success" style="display: none;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4>
                    Listo, Los cambios han sido guardado correctamente.
                </h4>
            </div>
            <blockquote style="margin-bottom: 0">
                Organizar Categoriías Principales
                <span style="float: right; margin-top: -4px;">
                    <span id="message_save_item_navbar" style="display: none; font-weight: 600;font-size: 14px;color: rgb(96, 125, 139);background: antiquewhite;padding: 8px;vertical-align: middle;">
                        Has hechos algunos cambios en el menú debes de guardar 
                    </span>
                    <span style="color: #f8fafc"> | </span>
                    <button type="button" class="btn btn-primary" title="Guardar Menú" disabled="" id="btn_save_item_navbar">
                        <i class="fa fa-save"></i>
                    </button>
                </span>
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <h4>Ordena las categorías principales en el orden en que deseas que se vizualicen en el eCommerce.</h4><br />
                </div>
            </div>
            <div class="row" style="display: none;" id="spinner_loading">
                <div class="col-md-12">
                    <div class="text-right">
                        <i class="fa fa-spinner fa-spin fa-2x fa-fw"></i>
                        <span class="sr-only">Cargando...</span>
                    </div>
                </div>
            </div>
            <div class="row" id="container_item_categories_principal">
                <div class="col-md-12">
                    <ul id="sortable">
                        <?php foreach ($item_categories_principal as $key => $value): ?>
                            <li class="ui-state-default" id="<?php echo $value['id'] ?>">
                                <span class="ui-icon ui-icon-arrowthick-2-n-s"></span> <?php echo $value['name_catalogue'] ?>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /.content -->   
<style>
    #sortable { list-style-type: none; margin: 0; padding: 0; }
    #sortable li { 
        font-size: 15px;
        font-weight: 500;
        margin-bottom: 0.8em !important;
        margin: 3px 3px 3px 0;
        padding: 10px 25px;
        text-align: left;
        width: 30%;
    }
</style>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $(document).ready(function(){
        $("#sortable").sortable({
            change: function( event, ui ) {
                $('#btn_save_item_navbar').removeAttr('disabled');
                $('#message_save_item_navbar').show();
            }
        });
        $("#sortable").disableSelection();
        $('#btn_save_item_navbar').on('click', function(){
            $(this).html("<i class='fa fa-refresh fa-spin fa-fw'></i><span class='sr-only'></span>");
            var positions = new Array($('#sortable li').length);
            $('#sortable li').each(function(index){
                positions[index + 1] = $(this).attr('id');
            });
            $.ajax({
                url  : '<?php echo base_url('catalogue/organize-save-item-categories-principal') ?>',
                data : { positions : JSON.stringify(positions) },
                type : 'POST',
                success: function(respose){
                    console.log(respose);
                },
                complete: function(){
                    $('#message_save_item_navbar').hide();
                    $('#btn_save_item_navbar').attr("disabled", true);
                    $('#btn_save_item_navbar').html("<i class='fa fa-save'></i>");
                    $('#alert_success').toggle();
                },
                error : function(){
                    alert('Ha ocurrido un error de conexion al servidor');
                }
            });
        });
    });
</script>