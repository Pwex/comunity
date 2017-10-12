<!-- Main content -->
<section class="content">
    <div class="box box-danger">
        <?php echo form_open('shop-layout-google-analytics') ?>
        <div class="box-header">
            <blockquote style="margin-bottom: 0">
                Google Analytics
                <span style="float: right;">
                    <button type="submit" class="btn btn-success" title="Almacenar cambios">
                        <i class="fa fa-save"></i>
                    </button>
                </span>
            </blockquote>
            <?php if ($this->uri->segment(2) == 'success'): ?>
                <div class="row" style="margin-top: 0.8em">
                    <div class="col-sm-12" style="margin-bottom: -1.5em">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4>
                                <i class="icon fa fa-check"></i> Exitoso
                            </h4>
                            El registro ha sido actualizado correctamente.
                        </div>
                    </div>
                </div>
            <?php endif ?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
                <div class="row">
                    <div class="col-sm-12">
                        <h4 style="margin-top: 0.5em; font-size: 24px; margin-bottom: 0.8em;">Pie de Página (Footer)</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="footer">Javascript</label>
                            <textarea name="footer" id="footer"><?php echo set_value('footer', $row[0]['footer']) ?></textarea>
                            <?php echo form_error('footer') ?>
                        </div>
                    </div>
                </div><br />
            <?php echo form_close() ?>
        </div>
    </div>
</section>
<!-- /.content -->   