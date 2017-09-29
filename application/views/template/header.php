<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Pwex</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
        <!-- Theme style -->
        <!-- AdminLTE Skins. Choose a skin from the css/skins
            folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css') ?>">
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <!-- estilo para el data tables encabezado y para el jquery ui para el borrado -->
        <?php if ($this->uri->segment(1) == 'users' or $this->uri->segment(1) == 'categories' or $this->uri->segment(1) == 'warehouses' or $this->uri->segment(1) == 'countrys' or $this->uri->segment(1) == 'benefits' or $this->uri->segment(1) == 'typesinventory' or $this->uri->segment(1) == 'components' or $this->uri->segment(1) == 'unitsmeasure' or $this->uri->segment(1) == 'products' or $this->uri->segment(1) == 'partners' or $this->uri->segment(1) == 'document_types' or $this->uri->segment(1) == 'partner_types' or $this->uri->segment(1) == 'cities' or $this->uri->segment(1) == 'seals' or $this->uri->segment(1) == 'list-price' or $this->uri->segment(1) == 'price-product' or $this->uri->segment(1) == 'banks' or $this->uri->segment(1) == 'consumers' or $this->uri->segment(1) == 'catalogue' or $this->uri->segment(1) == 'certifications' or $this->uri->segment(1) == 'shop-layout-navbar' or $this->uri->segment(1) == 'shop-layout-filter' or $this->uri->segment(1) == 'shop-layout-filter-item' ): ?>
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <!-- DataTables -->
            <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') ?>">
        <?php endif; ?>

        <?php if ($this->uri->segment(1) == 'multimedia'): ?>
            <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
            <!-- Manager file -->
            <link href="<?php echo base_url('assets/bower_components/fileuploader/src/jquery.fileuploader.css') ?>" media="all" rel="stylesheet">
            <link href="<?php echo base_url('assets/bower_components/fileuploader/examples/thumbnails/css/jquery.fileuploader-theme-thumbnails.css') ?>" media="all" rel="stylesheet">
        <?php endif; ?>

        <?php if (($this->uri->segment(1) == 'products' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) or ($this->uri->segment(1) == 'seals' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) or ($this->uri->segment(1) == 'catalogue' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) or ($this->uri->segment(1) == 'countrys' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) or ($this->uri->segment(1) == 'multimedia') ): ?>
            <link href="<?php echo base_url('assets/plugins/filterizr/css/index.css') ?>" media="all" rel="stylesheet">
            <link href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>" media="all" rel="stylesheet">
            <link href="<?php echo base_url('assets/plugins/iCheck/all.css') ?>" media="all" rel="stylesheet">
        <?php endif; ?>

        <?php if ($this->uri->segment(1) == 'products' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit') or $this->uri->segment(1) == 'categories' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit') ): ?>
            <link href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css') ?>" media="all" rel="stylesheet">
            <link href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css') ?>" media="all" rel="stylesheet">
        <?php endif; ?>

        <?php if ( $this->uri->segment(1) == 'products' and $this->uri->segment(2) == 'add' ): ?>
            <link href="<?php echo base_url('assets/plugins/chosen/chosen.min.css') ?>" media="all" rel="stylesheet">
        <?php endif; ?>

        <?php if ( ($this->uri->segment(1) == 'price-product' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) or ($this->uri->segment(1) == 'products' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) ): ?>
            <link href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css') ?>" media="all" rel="stylesheet">
        <?php endif; ?>
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
        <!-- Main -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/main.css') ?>">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo base_url('escritorio') ?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>PWX</b></span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><img src="<?php echo base_url('assets/dist/img/logo-pwex-white.png') ?>" width="80"></span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            
                            <!-- Notifications: style can be found in dropdown.less -->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-bell-o"></i>
                                    <?php if (!empty($number_of_pending_notifications) and count($number_of_pending_notifications) > 0): ?>
                                        <span class="label label-danger"><?php echo $number_of_pending_notifications ?></span>    
                                    <?php endif ?>
                                </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">
                                            <?php if (empty($number_of_pending_notifications)): ?>
                                                No Tienes notificaciones disponibles
                                            <?php endif ?>
                                            <?php if (!empty($number_of_pending_notifications)): ?>
                                                Tienes <?php echo $number_of_pending_notifications ?> notificaciones disponibles
                                            <?php endif ?>
                                        </li>
                                        <?php foreach ($notification_details as $key => $value): ?>
                                            <li>
                                                <!-- inner menu: contains the actual data -->
                                                <ul class="menu">
                                                    <li>
                                                        <a href="<?php echo base_url('notification_details').'/'.$value['notifications'] ?>">
                                                            <?php if ($value['type_of_notification'] == 'error_access_other_user'): ?>
                                                                <i class="fa fa-warning text-danger"></i> 
                                                                 Intento de acceso <?php echo $value['ip_error_access'] ?>
                                                            <?php endif ?>
                                                            <?php if ($value['type_of_notification'] == 'change_password'): ?>
                                                                <i class="fa fa-check-circle text-success"></i> 
                                                                 Cambio de clave de seguridad
                                                            <?php endif ?> 
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        <?php endforeach ?>
                                        <li class="footer"><a href="<?php echo base_url('all_notification_details') ?>">Ver todo</a></li>
                                    </ul>
                            </li>
                           
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo base_url('assets/dist/img/avatar-user-blanco.png') ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $this->session->userdata['user']['name']; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url('assets/dist/img/avatar-user-blanco.png') ?>" class="img-circle" alt="User Image">
                                        <p>
                                            <?php echo $this->session->userdata['user']['name'].' '.$this->session->userdata['user']['last_name']; ?>
                                            <small><?php echo ucfirst($this->session->userdata['user']['type_of_access']) ?> | <?php echo date('d-m-Y') ?></small>
                                        </p>
                                    </li>
                                    <!-- Menu Body -->
                                    <li class="user-body">
                                        <div class="row">
                                            <div class="col-xs-12 text-center">
                                                <a href="<?php echo base_url('exit') ?>"><i class="fa fa-power-off"></i> Cerrar sesión</a>
                                            </div>
                                        </div>
                                        <!-- /.row -->
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- =============================================== -->
            <!-- Left side column. contains the sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo base_url('assets/dist/img/avatar-user-gris.png') ?>" class="img-circle" alt="User Image">
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $this->session->userdata['user']['name'] ?></p>
                            <a href=""><i class="fa fa-circle text-success"></i> Online</a>
                        </div>
                    </div>
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Buscador...">
                            <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                            </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">MENU PRINCIPAL</li>
                        <li>
                            <a href="<?php echo base_url('escritorio') ?>">
                                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                            </a>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-film"></i>
                                <span>Multimedia</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li>
                                    <a href="<?php echo base_url('multimedia') ?>"><i class="fa fa-image"></i> Imágenes</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('multimedia/videos') ?>"><i class="fa fa-video-camera"></i> Vídeos</a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-cogs"></i> <span>Configuración</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> Global
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a href="<?php echo base_url('document_types') ?>">
                                                <i class="fa fa-circle-o"></i> Tipos Documento
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('countrys') ?>">
                                                <i class="fa fa-circle-o"></i> Paises
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('cities') ?>">
                                                <i class="fa fa-circle-o"></i> Ciudades
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('warehouses') ?>">
                                                <i class="fa fa-circle-o"></i> Bodegas
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('list-price') ?>">
                                                <i class="fa fa-circle-o"></i> Listado precios
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('price-product') ?>">
                                                <i class="fa fa-circle-o"></i> Precios productos
                                            </a>
                                        </li>
                                    </ul>   <!-- cierra lista global -->
                                </li> 
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> Productos
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a href="<?php echo base_url('typesinventory') ?>">
                                                <i class="fa fa-circle-o"></i> Tipos Inventario
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('catalogue') ?>">
                                                <i class="fa fa-circle-o"></i> Categoría Principal
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('categories') ?>">
                                                <i class="fa fa-circle-o"></i> Categorias
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('certifications') ?>">
                                                <i class="fa fa-circle-o"></i> Certificaciones
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('seals') ?>">
                                                <i class="fa fa-circle-o"></i> Sellos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('components') ?>">
                                                <i class="fa fa-circle-o"></i> Activos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('unitsmeasure') ?>">
                                                <i class="fa fa-circle-o"></i> Unidades Medida
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('benefits') ?>">
                                                <i class="fa fa-circle-o"></i> Beneficios
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('products') ?>">
                                                <i class="fa fa-circle-o"></i> Productos
                                            </a>
                                        </li>
                                    </ul>   <!-- cierra lista menu de productos -->
                                </li> 
                                <li class="treeview">
                                    <a href="#"><i class="fa fa-circle-o"></i> Proveedores
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a href="<?php echo base_url('partner_types') ?>">
                                                <i class="fa fa-circle-o"></i> Tipos Proveedor
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('banks') ?>">
                                                <i class="fa fa-circle-o"></i> Bancos
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo base_url('partners') ?>">
                                                <i class="fa fa-circle-o"></i> Proveedores
                                            </a>
                                        </li>
                                    </ul>   <!-- cierra lista menu proveedores -->
                                </li> 
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-shopping-cart"></i> <span>eCommerce</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a href="<?php echo base_url('shop-layout') ?>">
                                        <i class="fa fa-angle-right"></i> Configuración
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('shop-layout-navbar') ?>">
                                        <i class="fa fa-angle-right"></i> Menús
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('shop-layout-filter') ?>">
                                        <i class="fa fa-angle-right"></i> Filtros
                                    </a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url('shop-layout-filter-item') ?>">
                                        <i class="fa fa-angle-right"></i> Parámetros de Búsqueda
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-street-view"></i>
                                <span>Consumidor</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li>
                                    <a href="<?php echo base_url('consumers') ?>">
                                        <i class="fa fa-edit"></i> Registro
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-heartbeat"></i>
                                <span>Coach</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" style="display: none;">
                                <li>
                                    <a href="">
                                        <i class="fa fa-edit"></i> Registro inicial
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="<?php echo base_url('users') ?>">
                                <i class="fa fa-users"></i> <span>Usuarios</span>
                            </a>
                        </li>

                        <li>
                            <a href="<?php echo base_url('exit') ?>">
                                <i class="fa fa-power-off"></i> <span>Cerrar sesión</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- =============================================== -->
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        <?php echo $option_nav['box_title'] ?>
                        <small><?php echo $option_nav['box_span'] ?></small>
                    </h1>
                    <ol class="breadcrumb">
                        <?php foreach ($option_nav_item as $key => $value): ?>
                            <li <?php if(!empty($value['class']) and $value['class'] == 'active'){ echo 'class="'.$value['class'].'"'; } ?> >
                                <a <?php if(!empty($value['url'])){ echo 'href="'.base_url('/').$value['url'].'"'; } ?> > 
                                    <?php if (!empty($value['icon'])): ?>
                                        <i class="<?php echo $value['icon'] ?>"></i>
                                    <?php endif ?>
                                    <?php echo ucfirst($key) ?>
                                </a>
                            </li>
                        <?php endforeach ?>
                    </ol>
                </section>