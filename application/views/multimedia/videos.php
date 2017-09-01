<style type="text/css">
    .img {
        cursor: pointer;
    }
    .img-responsive {
        height: 15.35em;
    }
    .btn-action {
        position: absolute;
        display: none;
    }
        .container-video{
            border: 3px solid #f1f1f1;
            border-radius: 3px;
            height: 15.8em;
        }
        .container-details {
            border: 3px solid #f1f1f1;
            background-color: rgba(96, 125, 139, 0.09);
            padding: 10px 8px;
            margin-bottom: 0.7em;
        }
            .container-details:hover{
                background-color: #f9f9f9;
            }
    .btn-action button {
        border-radius: 0;
        border: 0;
    }
    @media (max-width: 991px) {
        .icontainer-video {
            height: 15.8em;
        }
        .img-responsive {
            height: 15.35em;
        }
    }
</style>
<!-- Main content -->
<section class="content">
    <?php if ($this->uri->segment(2) == 'videos' and $this->uri->segment(3) == 'success'): ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>
                            <i class="icon fa fa-check"></i> Exitoso
                        </h4>
                    El archivo ingresado se ha almacenado correctamente.
              </div>
            </div>
        </div>
    <?php endif ?>
    <?php if ($this->uri->segment(2) == 'videos' and $this->uri->segment(3) == 'success-delete'): ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>
                            <i class="icon fa fa-trash"></i> Exitoso
                        </h4>
                    El archivo seleccionado ha sido eliminado correctamente.
              </div>
            </div>
        </div>
    <?php endif ?>
    <?php if ($this->uri->segment(2) == 'videos' and $this->uri->segment(3) == 'error-select'): ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="alert alert-info alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4>
                            <i class="icon fa fa-trash"></i> Alerta
                        </h4>
                    Error no has seleccionado ningun medio para subir...
              </div>
            </div>
        </div>
    <?php endif ?>
    <div class="box box-warning">
        <div class="box-header">
            <blockquote>
                Vista previa de archivos <span style="float: right;"><button title="Agregar Archivos" class="btn btn-primary btn-md" id="btn-file-manager"><i class="fa fa-plus-circle" id="btn-icon"></i></button></span>
            </blockquote>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="row" style="display: none; margin-top: -1em;" id="container-form">
                <div class="col-xs-12">
                    <?php echo form_open_multipart('multimedia/videos/add-file-manager') ?>
                        <div class="form-group">
                            <label>Seleccione los recursos</label>
                            <input type="file" name="files">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div id="container-main-manager">
                <?php foreach ($list_videos as $key => $value): ?>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="container-video text-center" id="<?php echo $value['file'] ?>">
                            <div class="btn-action" id="<?php echo $value['file'] ?>" value="<?php echo $value['file_name'] ?>">
                                <button type="button" class="btn btn-danger btn-delete-medios"><i class="fa fa-trash"></i></button>
                            </div>
                            <video width="320" height="240" controls class="img img-responsive center-block">
                                <source src="<?php echo base_url('assets/dist/img/multimedia/videos/').$value['file_name'] ?>" type="<?php echo $value['formart'] ?>">
                            </video>
                        </div>
                        <p class="container-details">
                            <strong style="font-size: 1em;"><?php echo date('d-m-Y H:i:s', strtotime($value['date']))  ?></strong> <span style="float: right;" class="badge"><span><?php echo $value['size'] ?></span> | <?php echo $value['extension'] ?></span><br />
                            <span style="font-size: 1.2em;"><?php echo ucwords($value['name'])  ?></span>
                        </p>
                    </div> 
                <?php endforeach ?>
            </div>
        </div>        
    </div>
</section>
<!-- /.content -->   
<div id="dialog-confirm" title="¿Desea eliminar este archivo?" style="display: none;">
    <p>
        <span class="ui-icon ui-icon-alert" style="float:left; margin:12px 12px 20px 0;"></span>Estas seguro de seguir y ejecutar está acción, recuerda que no tienes ninguna opción para recuperar este archivo
    </p>
</div>