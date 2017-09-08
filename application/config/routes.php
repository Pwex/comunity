<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] 		= 'AuthUser/index';
$route['access/denied'] 			= 'AuthUser/index';
$route['exit'] 						= 'AuthUser/sess_destroy';
$route['exit_session_other_device'] = 'AuthUser/exit_session_other_device';
$route['reset-key'] 				= 'AuthUser/validate_reset_key';
$route['reset-key/invalid-email'] 	= 'AuthUser/reset_key';
$route['reset-key/confirm-email'] 	= 'AuthUser/reset_key';
$route['restore-key/(:any)/(:num)'] = 'AuthUser/restore_key_validate/$1/$2';
$route['restore-key'] 				= 'AuthUser/restore_key_validate';
$route['confirmation-restore'] 		= 'AuthUser/confirmation_restore';
$route['validation/access'] 		= 'AuthUser/validate_access';

$route['escritorio'] 					= 'Dashboard/index';
$route['notification_details/(:num)'] 	= 'Activities/notification_details/$1';
$route['all_notification_details'] 		= 'Activities/all_notification_details';
$route['accept_notifications/(:num)'] 	= 'Activities/accept_notifications/$1';
$route['delete_notifications/(:num)'] 	= 'Activities/delete_notifications/$1';

# Usuarios
$route['users'] 		= 'Users/full_listing';
$route['users/success'] = 'Users/full_listing';
$route['users/add'] 	= 'Users/add_validate';

$route['users/edit/(:num)'] 	= 'Users/edit_validate/$1';
$route['users/success-edit'] 	= 'Users/full_listing';

$route['users/delete'] 			= 'Users/delete';
$route['users/success-delete'] 	= 'Users/full_listing';

# Categorias
$route['categories'] 				= 'Categories/full_listing';
$route['categories/success'] 		= 'Categories/full_listing';
$route['categories/add'] 			= 'Categories/add_validate';
$route['categories/edit/(:num)'] 	= 'Categories/edit_validate/$1';
$route['categories/success-edit'] 	= 'Categories/full_listing';
$route['categories/delete'] 		= 'Categories/delete';
$route['categories/success-delete'] = 'Categories/full_listing';

# Sellos
$route['seals'] 				= 'seals/full_listing';
$route['seals/success'] 		= 'seals/full_listing';
$route['seals/add'] 			= 'seals/add_validate';
$route['seals/edit/(:num)'] 	= 'seals/edit_validate/$1';
$route['seals/success-edit'] 	= 'seals/full_listing';
$route['seals/delete'] 			= 'seals/delete';
$route['seals/success-delete'] 	= 'seals/full_listing';

# beneficios
$route['benefits'] 					= 'Benefits/full_listing';
$route['benefits/success'] 			= 'Benefits/full_listing';
$route['benefits/add'] 				= 'Benefits/add_validate';
$route['benefits/edit/(:num)'] 		= 'Benefits/edit_validate/$1';
$route['benefits/success-edit'] 	= 'Benefits/full_listing';
$route['benefits/delete'] 			= 'Benefits/delete';
$route['benefits/success-delete'] 	= 'Benefits/full_listing';
# componentes
$route['components'] 					= 'Components/full_listing';
$route['components/success'] 			= 'Components/full_listing';
$route['components/add'] 				= 'Components/add_validate';
$route['components/edit/(:num)'] 		= 'Components/edit_validate/$1';
$route['components/success-edit'] 		= 'Components/full_listing';
$route['components/delete'] 			= 'Components/delete';
$route['components/success-delete'] 	= 'Components/full_listing';
# tipos inventario
$route['typesinventory'] 				= 'TypesInventory/full_listing';
$route['typesinventory/success'] 		= 'TypesInventory/full_listing';
$route['typesinventory/add'] 			= 'TypesInventory/add_validate';
$route['typesinventory/edit/(:num)'] 	= 'TypesInventory/edit_validate/$1';
$route['typesinventory/success-edit'] 	= 'TypesInventory/full_listing';
$route['typesinventory/delete'] 		= 'TypesInventory/delete';
$route['typesinventory/success-delete'] = 'TypesInventory/full_listing';
# unidades medida
$route['unitsmeasure'] 					= 'UnitsMeasure/full_listing';
$route['unitsmeasure/success'] 			= 'UnitsMeasure/full_listing';
$route['unitsmeasure/add'] 				= 'UnitsMeasure/add_validate';
$route['unitsmeasure/edit/(:num)'] 		= 'UnitsMeasure/edit_validate/$1';
$route['unitsmeasure/success-edit'] 	= 'UnitsMeasure/full_listing';
$route['unitsmeasure/delete'] 			= 'UnitsMeasure/delete';
$route['unitsmeasure/success-delete'] 	= 'UnitsMeasure/full_listing';
# Bodegas
$route['warehouses'] 				= 'Warehouses/full_listing';
$route['warehouses/success'] 		= 'Warehouses/full_listing';
$route['warehouses/add'] 			= 'Warehouses/add_validate';
$route['warehouses/edit/(:num)'] 	= 'Warehouses/edit_validate/$1';
$route['warehouses/success-edit'] 	= 'Warehouses/full_listing';
$route['warehouses/delete'] 		= 'Warehouses/delete';
$route['warehouses/success-delete'] = 'Warehouses/full_listing';
# productos
$route['products'] 					= 'Products/full_listing';
$route['products/success'] 			= 'Products/full_listing';
$route['products/add'] 				= 'Products/add_validate';
$route['products/edit/(:num)'] 		= 'Products/edit_validate/$1';
$route['products/success-edit'] 	= 'Products/full_listing';
$route['products/delete'] 			= 'Products/delete';
$route['products/success-delete'] 	= 'Products/full_listing';
# tipos de documento
$route['document_types'] 				= 'Document_types/full_listing';
$route['document_types/success'] 		= 'Document_types/full_listing';
$route['document_types/add'] 			= 'Document_types/add_validate';
$route['document_types/edit/(:num)'] 	= 'Document_types/edit_validate/$1';
$route['document_types/success-edit'] 	= 'Document_types/full_listing';
$route['document_types/delete'] 		= 'Document_types/delete';
$route['document_types/success-delete'] = 'Document_types/full_listing';
# tipos de proveedor
$route['partner_types'] 				= 'Partner_types/full_listing';
$route['partner_types/success'] 		= 'Partner_types/full_listing';
$route['partner_types/add'] 			= 'Partner_types/add_validate';
$route['partner_types/edit/(:num)'] 	= 'Partner_types/edit_validate/$1';
$route['partner_types/success-edit'] 	= 'Partner_types/full_listing';
$route['partner_types/delete'] 			= 'Partner_types/delete';
$route['partner_types/success-delete'] 	= 'Partner_types/full_listing';
# proveedores
$route['partners'] 					= 'Partners/full_listing';
$route['partners/success'] 			= 'Partners/full_listing';
$route['partners/add'] 				= 'Partners/add_validate';
$route['partners/edit/(:num)'] 		= 'Partners/edit_validate/$1';
$route['partners/success-edit'] 	= 'Partners/full_listing';
$route['partners/delete'] 			= 'Partners/delete';
$route['partners/success-delete'] 	= 'Partners/full_listing';
# paises
$route['countrys'] 					= 'Countrys/full_listing';
$route['countrys/success'] 			= 'Countrys/full_listing';
$route['countrys/add'] 				= 'Countrys/add_validate';
$route['countrys/edit/(:num)'] 		= 'Countrys/edit_validate/$1';
$route['countrys/success-edit'] 	= 'Countrys/full_listing';
$route['countrys/delete'] 			= 'Countrys/delete';
$route['countrys/success-delete'] 	= 'Countrys/full_listing';
# ciudades
$route['cities'] 					= 'Cities/full_listing';
$route['cities/success'] 			= 'Cities/full_listing';
$route['cities/add'] 				= 'Cities/add_validate';
$route['cities/edit/(:num)'] 		= 'Cities/edit_validate/$1';
$route['cities/success-edit'] 		= 'Cities/full_listing';
$route['cities/delete'] 			= 'Cities/delete';
$route['cities/success-delete'] 	= 'Cities/full_listing';


# Auth Users
$route['404_override'] 			= '';
$route['translate_uri_dashes'] 	= FALSE;

# Administrador de medios
$route['multimedia'] 				  		 = 'Multimedia/files_images';
$route['multimedia/success-images']   		 = 'Multimedia/files_images';
$route['multimedia/success-delete-images']	 = 'Multimedia/files_images';
$route['multimedia/error-select-images'] 	 = 'Multimedia/files_images';
$route['multimedia/delete-images']	 		 = 'Multimedia/delete_images';
$route['multimedia/add-file-manager-images'] = 'Multimedia/add_file_manager_images';

$route['multimedia/videos'] 				 = 'Multimedia/files_videos';
$route['multimedia/videos/success']   		 = 'Multimedia/files_videos';
$route['multimedia/videos/success-delete']	 = 'Multimedia/files_videos';
$route['multimedia/videos/error-select'] 	 = 'Multimedia/files_videos';
$route['multimedia/videos/delete']	 		 = 'Multimedia/delete_videos';
$route['multimedia/videos/add-file-manager'] = 'Multimedia/add_file_manager_videos';

# eCommerce
$route['shop-layout'] 			= 'ShopLayout/shop_layout_validate';
$route['shop-layout/success'] 	= 'ShopLayout/shop_layout_validate';