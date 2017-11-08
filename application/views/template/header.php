<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php  
    # Menu principal de gestion y gerencia
    $menu_management_management = array(
        'modules',
        'movement_types',
        'document_types',
        'countrys',
        'cities',
        'warehouses',
        'list-price',
        'partner_types',
        'banks',
        'partners',
        'catalogue',
        'categories',
        'components',
        'benefits',
        'certifications',
        'seals',
        'typesinventory',
        'unitsmeasure',
        'presentation',
        'price-product',
        'products',
    );
        # Sub menu de gestion y gerencia parametros globales
        $menu_global_parameters = array(
            'modules',
            'movement_types',
            'document_types',
            'countrys',
            'cities',
            'warehouses',
            'list-price',
        );
        # Sub menu de gestion y gerencia proveedores
        $menu_provider = array(
            'partner_types',
            'banks',
            'partners',
        );
        # Sub menu de gestion y gerencia productos
        $menu_products = array(
            'catalogue',
            'categories',
            'components',
            'benefits',
            'certifications',
            'seals',
            'typesinventory',
            'unitsmeasure',
            'presentation',
            'price-product',
            'products',
        );
    # Menu principal del eCommerce
    $menu_ecommerce = array(
        'shop-layout',
        'shop-layout-navbar',
        'shop-layout-filter',
        'shop-layout-filter-item',
        'shop-layout-google-analytics',
    );
        # Sub menu del ecommerce
        $menu_marketing_digital = array(
            'shop-layout-google-analytics',
        );
    # Menu principal Innovacion de mercados
    $menu_innovation_markets = array(
        'excel-providers',
        'requirements-matrix',
    );
    # Menu principal Multimedia
    $menu_multimedia = array(
        'multimedia'
    );
    # Menu principal Clientes
    $menu_client = array(
        'consumers'
    );
    # Menu principal Proveedores
    $menu_partners = array(
        'list-of-products-supplier'
    );
    # Menu principal Usuarios
    $menu_users = array(
        'users'
    );
?>
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
        <!-- estilo para el data tables encabezado y para el jquery ui para el borrado -->
        <?php if ($this->uri->segment(1) == 'users' or $this->uri->segment(1) == 'modules' or $this->uri->segment(1) == 'movement_types' or $this->uri->segment(1) == 'categories' or $this->uri->segment(1) == 'warehouses' or $this->uri->segment(1) == 'countrys' or $this->uri->segment(1) == 'benefits' or $this->uri->segment(1) == 'typesinventory' or $this->uri->segment(1) == 'components' or $this->uri->segment(1) == 'unitsmeasure' or $this->uri->segment(1) == 'products' or $this->uri->segment(1) == 'partners' or $this->uri->segment(1) == 'document_types' or $this->uri->segment(1) == 'partner_types' or $this->uri->segment(1) == 'cities' or $this->uri->segment(1) == 'seals' or $this->uri->segment(1) == 'list-price' or $this->uri->segment(1) == 'price-product' or $this->uri->segment(1) == 'banks' or $this->uri->segment(1) == 'consumers' or $this->uri->segment(1) == 'catalogue' or $this->uri->segment(1) == 'certifications' or $this->uri->segment(1) == 'shop-layout-navbar' or $this->uri->segment(1) == 'shop-layout-filter' or $this->uri->segment(1) == 'shop-layout-filter-item' or $this->uri->segment(1) == 'excel-providers' or $this->uri->segment(1) == 'requirements-matrix' or $this->uri->segment(1) == 'presentation' ): ?>
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

        <?php if ($this->uri->segment(1) == 'movement_types' and ($this->uri->segment(2) == 'add' or $this->uri->segment(2) == 'edit')) : ?>
            <link href="<?php echo base_url('assets/plugins/iCheck/all.css') ?>" media="all" rel="stylesheet">
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
        <style type="text/css">
            /*@import url('https://fonts.googleapis.com/css?family=Open+Sans');
            *{
                font-family: 'Open Sans', sans-serif;
            }*/
            @import url('https://fonts.googleapis.com/css?family=Roboto+Condensed');
            *{
                font-family: 'Roboto Condensed', sans-serif;
            }
        </style>
        <?php if ($this->uri->segment(1) != 'calendar'): ?>
            <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
        <?php else: ?>
            <script src="<?=$base_url?>js/jquery.min.js"></script>
        <?php endif ?>
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
                    <span class="logo-lg"><img src="<?php echo base_url('assets/dist/img/pwex-white.png') ?>" width="80"></span>
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
                                    <span class="hidden-xs"><?php echo $this->session->userdata['user']['name']; ?></span>
                                    <img src="<?php echo base_url('assets/dist/img/avatar-user-blanco.png') ?>" class="user-image" alt="<?php echo $this->session->userdata['user']['name']; ?>">
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- User image -->
                                    <li class="user-header">
                                        <img src="<?php echo base_url('assets/dist/img/avatar-user-gris.png') ?>" class="img-circle" alt="User Image">
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
                            <?php if ( isset($this->session->userdata['user']['type_of_access']) and $this->session->userdata['user']['type_of_access'] == 'Coach' ): ?>
                                <li>
                                   <a href="#"><i class="fa fa-cogs" aria-hidden="true"></i></a>
                                </li>
                            <?php endif ?>
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
                            <a href=""><i class="fa fa-circle text-success"></i> Conectado</a>
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
                        <li <?php if($this->uri->segment(1) == 'escritorio'){ echo "class='active'"; } ?>>
                            <a href="<?php echo base_url('escritorio') ?>">
                                <i class="fa fa-dashboard"></i> <span>Escritorio</span>
                            </a>
                        </li>
                        <li class="treeview <?php if(in_array($this->uri->segment(1), $menu_management_management)  == TRUE and $this->uri->segment(2) <> 'list-of-products-supplier'){ echo 'menu-open active'; } ?>">
                            <a href="#">
                                <i class="fa fa-th-large"></i> <span>Gerencia y Gestión</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" <?php if(in_array($this->uri->segment(1), $menu_management_management)  == TRUE and $this->uri->segment(2) <> 'list-of-products-supplier'){ echo 'style="display:block;"'; } ?>>
                                <li class="treeview <?php if(in_array($this->uri->segment(1), $menu_global_parameters)){ echo 'menu-open'; } ?>">
                                    <a href="#"><i class="fa fa-angle-right"></i> Parámetros Globales
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu" <?php if(in_array($this->uri->segment(1), $menu_global_parameters)){ echo 'style="display:block;"'; } ?>>
                                        <li <?php if($this->uri->segment(1) == 'modules'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('modules') ?>">
                                                <i class="fa fa-angle-right"></i> Módulos
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'movement_types'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('movement_types') ?>">
                                                <i class="fa fa-angle-right"></i> Tipos movimiento
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'document_types'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('document_types') ?>">
                                                <i class="fa fa-angle-right"></i> Tipos Documento
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'countrys'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('countrys') ?>">
                                                <i class="fa fa-angle-right"></i> Paises
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'cities'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('cities') ?>">
                                                <i class="fa fa-angle-right"></i> Ciudades
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'warehouses'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('warehouses') ?>">
                                                <i class="fa fa-angle-right"></i> Bodegas
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'list-price'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('list-price') ?>">
                                                <i class="fa fa-angle-right"></i> Lista de Precios
                                            </a>
                                        </li>
                                    </ul>   <!-- cierra lista global -->
                                </li> 
                                <li class="treeview <?php if(in_array($this->uri->segment(1), $menu_provider) == TRUE and $this->uri->segment(2) <> 'list-of-products-supplier'){ echo 'menu-open'; } ?>">
                                    <a href="#"><i class="fa fa-angle-right"></i> Proveedores
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu" <?php if(in_array($this->uri->segment(1), $menu_provider)  == TRUE and $this->uri->segment(2) <> 'list-of-products-supplier'){ echo 'style="display:block;"'; } ?>>
                                        <li <?php if($this->uri->segment(1) == 'partner_types'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('partner_types') ?>">
                                                <i class="fa fa-angle-right"></i> Tipos Proveedor
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'banks'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('banks') ?>">
                                                <i class="fa fa-angle-right"></i> Bancos
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'partners' and empty($this->uri->segment(2))){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('partners') ?>">
                                                <i class="fa fa-angle-right"></i> Gestión Proveedores
                                            </a>
                                        </li>
                                    </ul>   <!-- cierra lista menu proveedores -->
                                </li>
                                <li class="treeview <?php if(in_array($this->uri->segment(1), $menu_products)){ echo 'menu-open'; } ?>">
                                    <a href="#"><i class="fa fa-angle-right"></i> Productos
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu" <?php if(in_array($this->uri->segment(1), $menu_products)){ echo 'style="display:block;"'; } ?>>
                                        <li <?php if($this->uri->segment(1) == 'catalogue'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('catalogue') ?>">
                                                <i class="fa fa-angle-right"></i> Categoría Principal
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'categories'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('categories') ?>">
                                                <i class="fa fa-angle-right"></i> Categorias
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'components'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('components') ?>">
                                                <i class="fa fa-angle-right"></i> Activos
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'benefits'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('benefits') ?>">
                                                <i class="fa fa-angle-right"></i> Beneficios
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'certifications'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('certifications') ?>">
                                                <i class="fa fa-angle-right"></i> Certificaciones
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'seals'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('seals') ?>">
                                                <i class="fa fa-angle-right"></i> Sellos
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'typesinventory'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('typesinventory') ?>">
                                                <i class="fa fa-angle-right"></i> Tipos Inventario
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'unitsmeasure'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('unitsmeasure') ?>">
                                                <i class="fa fa-angle-right"></i> Unidades Medida
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'presentation'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('presentation') ?>">
                                                <i class="fa fa-angle-right"></i> Presentaciones
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'products'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('products') ?>">
                                                <i class="fa fa-angle-right"></i> Gestión Productos
                                            </a>
                                        </li>
                                        <li <?php if($this->uri->segment(1) == 'price-product'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('price-product') ?>">
                                                <i class="fa fa-angle-right"></i> Precio de Productos
                                            </a>
                                        </li>
                                    </ul>   <!-- cierra lista menu de productos -->
                                </li>  
                            </ul>
                        </li>
                        <li class="treeview <?php if(in_array($this->uri->segment(1), $menu_ecommerce)){ echo 'menu-open active'; } ?>">
                            <a href="#">
                                <i class="fa fa-shopping-basket"></i> <span>eCommerce</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" <?php if(in_array($this->uri->segment(1), $menu_ecommerce)){ echo 'style="display:block;"'; } ?>>
                                <li <?php if($this->uri->segment(1) == 'shop-layout'){ echo "class='active'"; } ?>>
                                    <a href="<?php echo base_url('shop-layout') ?>">
                                        <i class="fa fa-angle-right"></i> Configuración
                                    </a>
                                </li>
                                <li <?php if($this->uri->segment(1) == 'shop-layout-navbar'){ echo "class='active'"; } ?>>
                                    <a href="<?php echo base_url('shop-layout-navbar') ?>">
                                        <i class="fa fa-angle-right"></i> Menús
                                    </a>
                                </li>
                                <li <?php if($this->uri->segment(1) == 'shop-layout-filter'){ echo "class='active'"; } ?>>
                                    <a href="<?php echo base_url('shop-layout-filter') ?>">
                                        <i class="fa fa-angle-right"></i> Administrador de Filtros
                                    </a>
                                </li>
                                <li <?php if($this->uri->segment(1) == 'shop-layout-filter-item'){ echo "class='active'"; } ?>>
                                    <a href="<?php echo base_url('shop-layout-filter-item') ?>">
                                        <i class="fa fa-angle-right"></i> Parámetros de Filtro
                                    </a>
                                </li>
                                <li class="treeview <?php if(in_array($this->uri->segment(1), $menu_marketing_digital)){ echo 'menu-open'; } ?>">
                                    <a href="#">
                                        <i class="fa fa-angle-right"></i> <span>Marketing Digital</span>
                                        <span class="pull-right-container">
                                            <i class="fa fa-angle-left pull-right"></i>
                                        </span>
                                    </a>
                                    <ul class="treeview-menu" <?php if(in_array($this->uri->segment(1), $menu_marketing_digital)){ echo 'style="display:block;"'; } ?>>
                                        <li <?php if($this->uri->segment(1) == 'shop-layout-google-analytics'){ echo "class='active'"; } ?>>
                                            <a href="<?php echo base_url('shop-layout-google-analytics') ?>">
                                                <i class="fa fa-angle-right"></i> Google Analytics
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview <?php if(in_array($this->uri->segment(1), $menu_innovation_markets)){ echo 'menu-open active'; } ?>">
                            <a href="#">
                                <i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Innovación Mercados</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" <?php if(in_array($this->uri->segment(1), $menu_innovation_markets)){ echo 'style="display:block;"'; } ?>>
                                <li <?php if($this->uri->segment(1) == 'excel-providers'){ echo "class='active'"; } ?>>
                                    <a href="<?php echo base_url('excel-providers') ?>">
                                        <i class="fa fa-angle-right"></i> Registro Proveedores
                                    </a>
                                </li>
                                <li <?php if($this->uri->segment(1) == 'requirements-matrix'){ echo "class='active'"; } ?>>
                                    <a href="<?php echo base_url('requirements-matrix') ?>">
                                        <i class="fa fa-angle-right"></i> Matriz Requerimientos
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview <?php if(in_array($this->uri->segment(1), $menu_multimedia)){ echo 'menu-open active'; } ?>">
                            <a href="#">
                                <i class="fa fa-film"></i>
                                <span>Multimedia</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" <?php if(in_array($this->uri->segment(1), $menu_multimedia)){ echo 'style="display:block;"'; } ?>>
                                <li <?php if($this->uri->segment(1) == 'multimedia' and $this->uri->segment(2) != 'videos'){ echo "class='active'"; } ?>>
                                    <a href="<?php echo base_url('multimedia') ?>"><i class="fa fa-image"></i> Imágenes</a>
                                </li>
                                <li <?php if($this->uri->segment(1) == 'multimedia' and $this->uri->segment(2) == 'videos'){ echo "class='active'"; } ?>>
                                    <a href="<?php echo base_url('multimedia/videos') ?>"><i class="fa fa-video-camera"></i> Vídeos</a>
                                </li>
                            </ul>
                        </li>
                        <li class="treeview <?php if(in_array($this->uri->segment(1), $menu_client)){ echo 'menu-open active'; } ?>">
                            <a href="#">
                                <i class="fa fa-user-circle"></i>
                                <span>Clientes</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu" <?php if(in_array($this->uri->segment(1), $menu_client)){ echo 'style="display:block;"'; } ?>>
                                <li <?php if($this->uri->segment(1) == 'consumers'){ echo "class='active'"; } ?>>
                                    <a href="<?php echo base_url('consumers') ?>">
                                        <i class="fa fa-edit"></i> Registro
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <?php if ($this->session->userdata['user']['type_of_access'] == 'Proveedor'): ?>
                            <li class="treeview <?php if(in_array($this->uri->segment(2), $menu_partners)){ echo 'menu-open active'; } ?>">
                                <a href="#">
                                    <i class="fa fa-user-o" aria-hidden="true"></i>
                                    <span>Partners</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu" <?php if(in_array($this->uri->segment(2), $menu_partners)){ echo 'style="display:block;"'; } ?>>
                                    <li <?php if($this->uri->segment(2) == 'list-of-products-supplier'){ echo "class='active'"; } ?>>
                                        <a href="<?php echo base_url('partners/list-of-products-supplier') ?>">
                                            <i class="fa fa-angle-right"></i> Listado Productos
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif ?>
                        <li <?php if($this->uri->segment(1) == 'users'){ echo "class='active'"; } ?>>
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
                    <?php if ($this->session->userdata['user']['type_of_access'] != 'Coach'): ?>
                        <h1>
                            <?php echo $option_nav['box_title'] ?>
                            <small><?php echo $option_nav['box_span'] ?></small>
                        </h1>
                    <?php endif ?>
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