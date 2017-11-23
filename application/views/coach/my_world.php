<style type="text/css">
    .btn {
        padding-left: 0; 
        padding-right: 0;
    }
    .bg-blue {
        background-color: #fff !important;
        border: none;
    }
        .small-box:hover, .bg-blue:hover {
            background-color: #ffc107 !important;
            cursor: pointer !important;
        }
    .small-box h3 {
        margin: 5px 0 15px 0;
        color: #000;
    }
    .small-box p {
        color: #000;
        font-size: 16px;
        font-weight: normal;
        margin-left: 0;
        margin-right: 0;
        padding-left: 0;
        padding-right: 0;
    }
    .small-box>.small-box-footer {
        color: #fff;
        background: #212020;
    }
</style>
<section class="content">
    <div class="row">
        <a href="<?php echo base_url('calendar') ?>">
            <div class="col-xs-6" style="padding-right: 3px;">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><i class="fa fa-calendar" aria-hidden="true"></i></h3>
                        <p>Mi Calendario</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-calendar-check-o" aria-hidden="true"></i>
                    </div>
                    <a href="<?php echo base_url('calendar') ?>" class="small-box-footer"><i class="fa fa-arrow-right" style="font-size: 24px"></i></a>
                </div>
            </div>
        </a>
        <!-- ./col -->
        <a href="<?php echo base_url('consumers') ?>">
            <div class="col-xs-6" style="padding-left: 3px;">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><span class="badge" style="color: #fff; background: #ffc107; font-size: 25px;">3</span></h3>
                        <p>Mis Mensajes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                    <a href="" class="small-box-footer"><i class="fa fa-arrow-right" style="font-size: 24px"></i></a>
                </div>
            </div>
        </a>
        <!-- ./col -->
        <a href="#">
            <div class="col-xs-6" style="padding-right: 3px; margin-top: -6px">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><i class="fa fa-files-o" aria-hidden="true"></i></h3>
                        <p>Mis Pedidos</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-file-text-o" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fa fa-arrow-right" style="font-size: 24px"></i></a>
                </div>
            </div>
        </a>
        <!-- ./col -->
        <a href="#">
            <div class="col-xs-6" style="padding-left: 3px; margin-top: -6px">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><i class="fa fa-bar-chart" aria-hidden="true"></i></h3>
                        <p>Estado de Cuenta</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-area-chart" aria-hidden="true"></i>
                    </div>
                    <a href="#" class="small-box-footer"><i class="fa fa-arrow-right" style="font-size: 24px"></i></a>
                </div>
            </div>
        </a>
        <!-- ./col -->
    </div>
</section>
<script type="text/javascript">
    $(document).ready(function(){
        $('.small-box, .bg-blue').on('click', function(){
            $('h3, p', this).css('color', '#fff');
        });
    });
</script>