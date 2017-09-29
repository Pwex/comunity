<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PriceProduct extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

    # Listado completo de precio de productos
	public function full_listing()
	{
		# Carga del modelo de base de datos
		$this->load->model('PriceProductModel', 'price', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Envio de registros
		$data['full_listing'] = $this->price->full_listing();
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Precios Productos',
			'box_span' 	=> 'Listado'
		);
		$data['option_nav_item'] = array(
			'precios'		=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'price-product',
				'class' 	=> NULL
			), 
			'listado'=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('price_product/list');
		$this->load->view('template/footer');
	}

	# Formulario Principal para Agregar precios de productos
	public function add()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('PriceProductModel', 'price', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Precios Productos',
			'box_span' 	=> 'Crear'
		);
		$data['option_nav_item'] = array(
			'precios'		=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'price-product',
				'class' 	=> NULL
			), 
				'crear' 	=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Lista de productos, paises y listado de precios
		$data['products'] 	= $this->price->list_products();
		$data['country']  	= $this->price->list_country();
		$data['list_price'] = $this->price->list_price();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('price_product/add');
		$this->load->view('template/footer');
	}

	# Recibir el Formulario y Validar las Reglas
	public function add_validate()
	{
		switch ($this->input->post()) {
			case FALSE:
				$this->add();
			break;
			case TRUE:
				$this->rules_insert_price_product();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->add();
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('PriceProductModel', 'price', TRUE);
						# Insertar información en la base de datos
						$this->price->save($this->input->post());
						redirect('price-product/success'); 
					break;
				}
			break;
		}
	}

	# Formulario Principal para Editar precios de productos
	public function edit($id = NULL)
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('PriceProductModel', 'price', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Precios Productos',
			'box_span' 	=> 'Editar'
		);
		$data['option_nav_item'] = array(
				'precios'		=> array(
				'icon' 			=> 'fa fa-ellipsis-v',
				'url' 			=> 'price-product',
				'class' 		=> NULL
			), 
			'editar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Lista de productos y paises
		$data['products'] = $this->price->list_products();
		$data['country']  = $this->price->list_country();
		$data['list_price'] = $this->price->list_price();
		# Informacion para editar el precio de los productos
		$data['information_price_product'] = $this->price->information_price_product($id);
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('price_product/edit');
		$this->load->view('template/footer');
	}

	# Recibir el Formulario de Editar y Validar las Reglas
	public function edit_validate($id = NULL)
	{
		switch ($this->input->post()) {
			case FALSE:
				$this->edit($id);
			break;
			case TRUE:
				$this->rules_insert_price_product();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->edit($id);
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('PriceProductModel', 'price', TRUE);
						# Insertar información en la base de datos
						$this->price->edit($id, $this->input->post());
						redirect('price-product/success-edit'); 
					break;
				}
			break;
		}
	}

	# Reglas de validación al insertar
	public function rules_insert_price_product()
	{
		$config = array(
			array(
				'field' => 'id_product_price',
				'label' => 'producto',
				'rules' => 'required|trim',
				'errors' => array(
								'required' 	=> 'Es necesario seleccionar un %s'
						   )
			),
			array(
				'field' => 'id_country_price',
				'label' => 'país',
				'rules' => 'required|trim',
				'errors' => array(
								'required' 	=> 'Es necesario seleccionar un %s'
						   )
			),
			array(
				'field' => 'price',
				'label' => 'precio',
				'rules' => 'required|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s'
						   )
			)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

	# Eliminar usuario
	public function delete()
	{
		# Carga del modelo de base de datos
		$this->load->model('PriceProductModel', 'price', TRUE);
		# Eliminar el usuario seleccionado
		$this->price->delete($this->input->post('id'));
	}

}
