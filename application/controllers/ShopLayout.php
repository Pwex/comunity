<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShopLayout extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

	public function main()
	{
		# Cargando el modelo y librerias
		$this->load->helper('form');
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'eCommerce',
			'box_span' 	=> 'Configuración'
		);
		$data['option_nav_item'] = array(
			'ecommerce'	=> array(
				'icon' 		=> 'fa fa-shopping-cart',
				'url' 		=> 'shop-layout',
				'class' 	=> NULL
			), 
			'configuración' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Información del registro en la base de datos
		$data['row'] = $this->shop->information();
		# Listado tipo de movientos contables
		$data['movement_type'] = $this->shop->list_movement_type();
		# Listado de bodegas
		$data['list_warehouses'] = $this->shop->list_warehouses();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('shop/layout');
		$this->load->view('template/footer');
	}

	public function navbar_full_listing() 
	{
		# Cargando el modelo y librerias
		$this->load->helper('form');
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'eCommerce',
			'box_span' 	=> 'Creador de menús'
		);
		$data['option_nav_item'] = array(
			'ecommerce'	=> array(
				'icon' 		=> 'fa fa-shopping-cart',
				'url' 		=> 'shop-layout-navbar',
				'class' 	=> NULL
			), 
			'configuración' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['full_listing'] = $this->shop->navbar_full_listing();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('shop/navbar/list');
		$this->load->view('template/footer');
	}

	# Formulario principal para agregar item al menus
	public function navbar_add()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'eCommerce',
			'box_span' 	=> 'Crear'
		);
		$data['option_nav_item'] = array(
			'eCommerce'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'shop-layout-navbar',
				'class' 	=> NULL
			), 
			'agregar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['nav_position'] = $this->shop->nav_position();
		$data['nav_status']   = array(1 => 'Activo', 0 => 'Inactivo');
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('shop/navbar/add');
		$this->load->view('template/footer');
	}

	# Recibir el Formulario y Validar las Reglas
	public function navbar_add_validate()
	{
		switch ($this->input->post()) {
			case FALSE:
				$this->navbar_add();
			break;
			case TRUE:
				$this->rules_navbar();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->navbar_add();
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('ShopLayoutModel', 'shop', TRUE);
						# Insertar información en la base de datos
						$this->shop->save_navbar($this->input->post());
						redirect('shop-layout-navbar/success'); 
					break;
				}
			break;
		}
	}

	# Formulario Principal para Agregar beneficios
	public function navbar_edit($id = null)
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'eCommerce',
			'box_span' 	=> 'Editar'
		);
		$data['option_nav_item'] = array(
			'eCommerce'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'shop-layout-navbar',
				'class' 	=> NULL
			), 
			'agregar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['information_edit_navbar'] = $this->shop->information_edit_navbar($id);
		$data['nav_position'] = $this->shop->nav_position();
		$data['nav_status']   = array(1 => 'Activo', 0 => 'Inactivo');
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('shop/navbar/edit');
		$this->load->view('template/footer');
	}

	# Recibir el Formulario de Editar y Validar las Reglas
	public function navbar_edit_validate($id = NULL)
	{
		switch ($this->input->post()) {
			case FALSE:
				$this->navbar_edit($id);
			break;
			case TRUE:
				$this->rules_navbar();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->navbar_edit($id);
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('ShopLayoutModel', 'shop', TRUE);
						# Insertar información en la base de datos
						$this->shop->edit_navbar($id, $this->input->post());
						redirect('shop-layout-navbar/success-edit'); 
					break;
				}
			break;
		}
	}

	# Eliminar menús
	public function navbar_delete()
	{
		# Carga del modelo de base de datos
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		# Eliminar el usuario seleccionado
		$this->shop->navbar_delete($this->input->post('id'));
	}

	# Reglas de validación al insertar menus
	public function rules_navbar()
	{
		$config = array(
			array(
				'field' => 'navbar',
				'label' => 'nombre de menú',
				'rules' => 'required|max_length[60]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 60 caracteres'
						   )
			),
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

	# Almacenar y validar información de la tienda
	public function shop_layout_validate()
	{
		switch ($this->input->post()) {
			case FALSE:
				$this->main();
			break;
			case TRUE:
				$this->rules_shop_layout();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->main();
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('ShopLayoutModel', 'shop', TRUE);
						# Insertar información en la base de datos
						$this->shop->save($this->input->post());
						redirect('shop-layout/success'); 
					break;
				}
			break;
		}
	}

	# Modificar la posicion de los item del menu
	public function organize()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'eCommerce',
			'box_span' 	=> 'Organizar Menús'
		);
		$data['option_nav_item'] = array(
			'Organizar'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'shop-layout-navbar/organize',
				'class' 	=> NULL
			), 
			'organizar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['navbar_position']   	= $this->shop->navbar_position();
		array_unshift($data['navbar_position'], 'Seleccionar...');
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('shop/navbar/organize');
		$this->load->view('template/footer');
	}

	# Contenido de los item del menu
	public function organize_container_item_navbar()
	{
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		$data['container_item_navbar'] = $this->shop->container_item_navbar($this->input->post('navbar_position'));
		$this->load->view('shop/navbar/organize_container_item_navbar', $data);
	}

	# Almacenar item del menú ya organizado
	public function organize_save_item_navbar()
	{
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		$data['organize_save_item_navbar'] = $this->shop->organize_save_item_navbar(json_decode($this->input->post('positions'), TRUE));
	}

	# Reglas de validación
	public function rules_shop_layout()
	{
		$config = array(
			array(
				'field' => 'shop',
				'label' => 'nombre para la tienda',
				'rules' => 'required|max_length[255]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres'
						   )
			),
			array(
				'field' => 'email',
				'label' => 'correo electrónico',
				'rules' => 'required|max_length[120]|valid_email|trim',
				'errors' => array(
								'required' 	 => 'Es necesario ingresar un %s',
								'max_length' => 'La longitud maxima a ingresar es de 120 caracteres',
								'valid_email'=> 'Correo electrónico invalido'
						   )
			),
			array(
				'field' => 'phone',
				'label' => 'número de teléfono',
				'rules' => 'required|max_length[20]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 20 caracteres'
						   )
			),
			array(
				'field' => 'movil',
				'label' => 'número de movil',
				'rules' => 'required|max_length[20]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 20 caracteres'
						   )
			),
			array(
				'field' => 'address',
				'label' => 'dirección para la tienda',
				'rules' => 'required|max_length[255]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres'
						   )
			),
			array(
				'field' => 'facebook',
				'label' => 'dirección electrónica del fanpage de facebook',
				'rules' => 'max_length[255]|valid_url|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres',
								'valid_url' => 'La url ingresada no es valida'
						   )
			),
			array(
				'field' => 'twitter',
				'label' => 'dirección electrónica del fanpage de twitter',
				'rules' => 'max_length[255]|valid_url|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres',
								'valid_url' => 'La url ingresada no es valida'
						   )
			),
			array(
				'field' => 'linkedin',
				'label' => 'dirección electrónica del fanpage de linkedin',
				'rules' => 'max_length[255]|valid_url|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres',
								'valid_url' => 'La url ingresada no es valida'
						   )
			),
			array(
				'field' => 'copyright',
				'label' => 'copyright',
				'rules' => 'required|max_length[255]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres'
						   )
			),
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

	# Listado de filtros de busqueda
	public function filter_full_listing() 
	{
		# Cargando el modelo y librerias
		$this->load->helper('form');
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'eCommerce',
			'box_span' 	=> 'Filtros'
		);
		$data['option_nav_item'] = array(
			'ecommerce'	=> array(
				'icon' 		=> 'fa fa-shopping-cart',
				'url' 		=> 'shop-layout-filter',
				'class' 	=> NULL
			), 
			'configuración' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['full_listing'] = $this->shop->filter_full_listing();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('shop/filter/list');
		$this->load->view('template/footer');
	}

	# Formulario principal para agregar item al menus
	public function filter_add()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Filtros',
			'box_span' 	=> 'Crear'
		);
		$data['option_nav_item'] = array(
			'eCommerce'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'shop-layout-filter',
				'class' 	=> NULL
			), 
			'agregar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['list_catalogue'] = $this->shop->list_catalogue();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('shop/filter/add');
		$this->load->view('template/footer');
	}

	# Recibir el formulario y validar las reglas
	public function filter_add_validate()
	{
		switch ($this->input->post()) {
			case FALSE:
				$this->filter_add();
			break;
			case TRUE:
				$this->rules_filter();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->filter_add();
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('ShopLayoutModel', 'shop', TRUE);
						# Insertar información en la base de datos
						$this->shop->save_filter($this->input->post());
						redirect('shop-layout-filter/success'); 
					break;
				}
			break;
		}
	}

	# Formulario principal para agregar filtros y busqueda
	public function filter_edit($id = null)
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Filtros',
			'box_span' 	=> 'Editar'
		);
		$data['option_nav_item'] = array(
			'eCommerce'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'shop-layout-filter',
				'class' 	=> NULL
			), 
			'agregar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['information_edit_filter'] = $this->shop->information_edit_filter($id);
		$data['list_catalogue'] = $this->shop->list_catalogue();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('shop/filter/edit');
		$this->load->view('template/footer');
	}

	# Recibir el formulario de editar y validar las reglas
	public function filter_edit_validate($id = NULL)
	{
		switch ($this->input->post()) {
			case FALSE:
				$this->filter_edit($id);
			break;
			case TRUE:
				$this->rules_filter();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->filter_edit($id);
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('ShopLayoutModel', 'shop', TRUE);
						# Insertar información en la base de datos
						$this->shop->edit_filter($id, $this->input->post());
						redirect('shop-layout-filter/success-edit'); 
					break;
				}
			break;
		}
	}

	# Eliminar menús
	public function filter_delete()
	{
		# Carga del modelo de base de datos
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		# Eliminar el usuario seleccionado
		$this->shop->filter_delete($this->input->post('id'));
	}

	# Reglas de validación al insertar menus
	public function rules_filter()
	{
		$config = array(
			array(
				'field' => 'name_filter',
				'label' => 'nombre del filtro de búsqueda',
				'rules' => 'required|max_length[80]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 80 caracteres'
						   )
			),
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

	# Listado de parametros de busqueda
	public function filter_item_full_listing() 
	{
		# Cargando el modelo y librerias
		$this->load->helper('form');
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'eCommerce',
			'box_span' 	=> 'Parámetros de Filtro'
		);
		$data['option_nav_item'] = array(
			'ecommerce'	=> array(
				'icon' 		=> 'fa fa-shopping-cart',
				'url' 		=> 'shop-layout-filter-item',
				'class' 	=> NULL
			), 
			'configuración' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['full_listing'] = $this->shop->filter_item_full_listing();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('shop/filter_item/list');
		$this->load->view('template/footer');
	}

	# Formulario principal para agregar item al menus
	public function filter_item_add()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Parámetros de Filtro',
			'box_span' 	=> 'Crear'
		);
		$data['option_nav_item'] = array(
			'eCommerce'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'shop-layout-filter-item',
				'class' 	=> NULL
			), 
			'agregar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['list_filter'] = $this->shop->list_filter();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('shop/filter_item/add');
		$this->load->view('template/footer');
	}

	# Recibir el formulario y validar las reglas
	public function filter_item_add_validate()
	{
		switch ($this->input->post()) {
			case FALSE:
				$this->filter_item_add();
			break;
			case TRUE:
				$this->rules_filter_item();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->filter_item_add();
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('ShopLayoutModel', 'shop', TRUE);
						# Insertar información en la base de datos
						$this->shop->save_filter_item($this->input->post());
						redirect('shop-layout-filter-item/success'); 
					break;
				}
			break;
		}
	}

	# Formulario principal para agregar filtros y busqueda
	public function filter_item_edit($id = null)
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Parámetros de Filtro',
			'box_span' 	=> 'Editar'
		);
		$data['option_nav_item'] = array(
			'eCommerce'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'shop-layout-filter-item',
				'class' 	=> NULL
			), 
			'agregar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['information_edit_filter_item'] = $this->shop->information_edit_filter_item($id);
		$data['list_filter'] = $this->shop->list_filter();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('shop/filter_item/edit');
		$this->load->view('template/footer');
	}

	# Recibir el formulario de editar y validar las reglas
	public function filter_item_edit_validate($id = NULL)
	{
		switch ($this->input->post()) {
			case FALSE:
				$this->filter_item_edit($id);
			break;
			case TRUE:
				$this->rules_filter_item();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->filter_item_edit($id);
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('ShopLayoutModel', 'shop', TRUE);
						# Insertar información en la base de datos
						$this->shop->edit_filter_item($id, $this->input->post());
						redirect('shop-layout-filter-item/success-edit'); 
					break;
				}
			break;
		}
	}

	# Eliminar menús
	public function filter_item_delete()
	{
		# Carga del modelo de base de datos
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		# Eliminar el usuario seleccionado
		$this->shop->filter_item_delete($this->input->post('id'));
	}

	# Reglas de validación al insertar menus
	public function rules_filter_item()
	{
		$config = array(
			array(
				'field' => 'settings',
				'label' => 'parámetro de búsqueda',
				'rules' => 'required|max_length[255]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres'
						   )
			),
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

	public function google_analytics()
	{
		# Cargando el modelo y librerias
		$this->load->helper('form');
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'eCommerce',
			'box_span' 	=> 'Configuración'
		);
		$data['option_nav_item'] = array(
			'ecommerce'	=> array(
				'icon' 		=> 'fa fa-shopping-cart',
				'url' 		=> 'shop-layout',
				'class' 	=> NULL
			), 
			'configuración' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Información del registro en la base de datos
		$data['row'] = $this->shop->information_google_analytics();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('shop/google_analytics');
		$this->load->view('template/footer');
	}

	# Almacenar y validar información de la tienda
	public function shop_layout_validate_google_analytics()
	{
		switch ($this->input->post()) {
			case FALSE:
				$this->google_analytics();
			break;
			case TRUE:
				# Cargar el modelo de base de datos
				$this->load->model('ShopLayoutModel', 'shop', TRUE);
				# Insertar información en la base de datos
				$this->shop->save_google_analytics($this->input->post());
				redirect('shop-layout-google-analytics/success');
			break;
		}
	}

}
