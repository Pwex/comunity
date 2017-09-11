<!-- Main content -->
<section class="content">
    <div class="box box-warning">
        <div class="box-header">
            <h3 class="box-title">Editar Proveedor</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?php echo form_open('partners/edit/'.$this->uri->segment(3)) ?>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_document_type">Tipo Documento</label>
                            <?php echo form_dropdown('id_document_type', $document_types, set_value('id_document_type',$partner[0]["id_document_type"]), 'class="form-control" required="" disabled=""'); ?>
                            <?php echo form_error('id_document_type') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_partner">Número Documento</label>
                            <input type="text" name="id_partner" id="id_document" class="form-control" value="<?php echo set_value('id_partner', $partner[0]["id_partner"]) ?>" required="" disabled=""/>
                            <?php echo form_error('id_partner') ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name_partner">Nombre Proveedor</label>
                            <input type="text" name="name_partner" id="name_partner" class="form-control" value="<?php echo set_value('name_partner', $partner[0]["name_partner"]) ?>" required="" />
                            <?php echo form_error('name_partner') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_partner_type">Tipo Proveedor</label>
                            <?php echo form_dropdown('id_partner_type', $partner_types, set_value('id_partner_type',$partner[0]["id_partner_type"]), 'class="form-control" required=""'); ?>
                            <?php echo form_error('id_partner_type') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_country">Pais</label>
                            <?php echo form_dropdown('id_country', $countrys, set_value('id_country',$partner[0]["id_country"]), 'class="form-control" required=""'); ?>
                            <?php echo form_error('id_country') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_country">Ciudad</label>
                            <?php echo form_dropdown('id_city', $cities, set_value('id_city',$partner[0]["id_city"]), 'class="form-control" required=""'); ?>
                            <?php echo form_error('id_city') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="zip_partner">Código Postal/ZIP</label>
                            <input type="text" name="zip_partner" id="zip_partner" class="form-control" value="<?php echo set_value('zip_partner', $partner[0]["zip_partner"]) ?>" required="" />
                            <?php echo form_error('zip_partner') ?>
                        </div>
                    </div>
                 </div>

                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="phone_partner">Dirección</label>
                            <input type="text" name="address_partner" id="address_partner" class="form-control" value="<?php echo set_value('address_partner', $partner[0]["address_partner"]) ?>" />
                            <?php echo form_error('address_partner') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="phone_partner">Teléfono</label>
                            <input type="text" name="phone_partner" id="phone_partner" class="form-control" value="<?php echo set_value('phone_partner', $partner[0]["phone_partner"]) ?>" />
                            <?php echo form_error('phone_partner') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="mobile_partner">Teléfono Móvil</label>
                            <input type="text" name="mobile_partner" id="mobile_partner" class="form-control" value="<?php echo set_value('mobile_partner', $partner[0]["mobile_partner"]) ?>" />
                            <?php echo form_error('mobile_partner') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="web_partner">Pagina Web</label>
                            <input type="text" name="web_partner" id="web_partner" class="form-control" value="<?php echo set_value('web_partner', $partner[0]["web_partner"]) ?>" />
                            <?php echo form_error('web_partner') ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email_partner">Email</label>
                            <input type="email" name="email_partner" id="email_partner" class="form-control" value="<?php echo set_value('email_partner', $partner[0]["email_partner"]) ?>" required="" />
                            <?php echo form_error('email_partner') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="loan_quota_partner">Cupo Crédito</label>
                            <input type="text" name="loan_quota_partner" id="loan_quota_partner" class="form-control" value="<?php echo set_value('loan_quota_partner', $partner[0]["loan_quota_partner"]) ?>" required="" />
                            <?php echo form_error('loan_quota_partner') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="term_days_partner">Días Plazo</label>
                            <input type="text" name="term_days_partner" id="term_days_partner" class="form-control" value="<?php echo set_value('term_days_partner', $partner[0]["term_days_partner"]) ?>" required="" />
                            <?php echo form_error('term_days_partner') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="id_bank">Banco</label>
                            <?php echo form_dropdown('id_city', $banks, set_value('id_bank',$partner[0]["id_bank"]), 'class="form-control" required=""'); ?>
                            <?php echo form_error('id_bank') ?>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <label for="account_partner">Número Cuenta</label>
                            <input type="text" name="account_partner" id="account_partner" class="form-control" value="<?php echo set_value('account_partner', $partner[0]["account_partner"]) ?>" required="" />
                            <?php echo form_error('account_partner') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name_contact_partner">Nombre Contacto</label>
                            <input type="text" name="name_contact_partner" id="name_contact_partner" class="form-control" value="<?php echo set_value('name_contact_partner', $partner[0]["name_contact_partner"]) ?>" />
                            <?php echo form_error('name_contact_partner') ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="position_contact">Cargo del Contacto</label>
                            <input type="text" name="position_contact" id="position_contact" class="form-control" value="<?php echo set_value('position_contact', $partner[0]["position_contact"]) ?>" />
                            <?php echo form_error('position_contact') ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Enviar</button>
                            <button type="reset"  class="btn btn-default">Cancelar</button>
                        </div>
                    </div>
                </div>
            <?php echo form_close() ?>
        </div>
    </div>
</section>
<!-- /.content -->   