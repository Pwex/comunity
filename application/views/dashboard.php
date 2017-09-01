<style type="text/css">
    .blockquote-success {
        border-left: 5px solid #00a65a;
    }
    .button-right {
        float: right;
    }
    .badge {
        font-size: 0.7em;
    }
</style>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3>150</h3>
                    <p>New Orders</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>53<sup style="font-size: 20px">%</sup></h3>
                    <p>Bounce Rate</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>44</h3>
                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
                <div class="inner">
                    <h3>65</h3>
                    <p>Unique Visitors</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h3>
                Usuarios conectados 
                <span class="badge">
                    <?php if (isset($users_online)) {
                        echo count($users_online);
                    } else { echo 0; } ?>
                </span>
            </h3>
        </div>
        <?php if (count($users_online) > 0): ?>
            <?php foreach ($users_online as $key => $value): ?>
                <div class="col-md-3">
                    <blockquote class="blockquote-success">
                        <i class="fa fa-user"></i> <?php echo $value['name'].' '.$value['last_name'] ?> 
                        <span class="button-right">
                            <a href="#" class="btn btn-xs btn-default"><i class="fa fa-wechat"></i></a> 
                            <a href="#" class="btn btn-xs btn-primary"><i class="fa fa-info-circle"></i></a> 
                        </span>
                    </blockquote> 
                </div>
            <?php endforeach ?>
        <?php else: ?>
            <p class="lead">No existen usuarios conectados en este momento</p>
        <?php endif ?>
    </div>
</section>
<!-- /.content -->