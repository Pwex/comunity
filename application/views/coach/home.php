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
        <a href="<?php echo base_url('consumers/add') ?>">
            <div class="col-xs-6" style="padding-right: 3px;">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><i class="fa fa-plus-circle" aria-hidden="true"></i></h3>
                        <p>Consumidores</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-address-card-o" aria-hidden="true"></i>
                    </div>
                    <a href="<?php echo base_url('consumers/add') ?>" class="small-box-footer"><i class="fa fa-arrow-right" style="font-size: 24px"></i></a>
                </div>
            </div>
        </a>
        <!-- ./col -->
        <a href="<?php echo base_url('consumers') ?>">
            <div class="col-xs-6" style="padding-left: 3px;">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3>120</h3>
                        <p>Mis Clientes</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-users"></i>
                    </div>
                    <a href="<?php echo base_url('consumers') ?>" class="small-box-footer"><i class="fa fa-arrow-right" style="font-size: 24px"></i></a>
                </div>
            </div>
        </a>
        <!-- ./col -->
        <a href="<?php echo base_url('my-world') ?>">
            <div class="col-xs-6" style="padding-right: 3px; margin-top: -6px">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><i class="fa fa-user-md" aria-hidden="true"></i></h3>
                        <p>Mi Mundo</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-eercast" aria-hidden="true"></i>
                    </div>
                    <a href="<?php echo base_url('my-world') ?>" class="small-box-footer"><i class="fa fa-arrow-right" style="font-size: 24px"></i></a>
                </div>
            </div>
        </a>
        <!-- ./col -->
        <a href="http://twex.co/market/" target="_blank">
            <div class="col-xs-6" style="padding-left: 3px; margin-top: -6px">
                <!-- small box -->
                <div class="small-box bg-blue">
                    <div class="inner">
                        <h3><i class="fa fa-cubes" aria-hidden="true"></i></h3>
                        <p>eCommerce</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-eye" aria-hidden="true"></i>
                    </div>
                    <a href="http://twex.co/market/" target="_blank" class="small-box-footer"><i class="fa fa-arrow-right" style="font-size: 24px"></i></a>
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