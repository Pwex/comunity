<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ListPrice extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

    # Listado completo de precios
	public function full_listing()
	{
		# Carga del modelo de base de datos
		$this->load->model('ListPriceModel', 'categories', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Envio de registros
		$data['full_listing'] = $this->categories->full_listing();
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Precios',
			'box_span' 	=> 'Listado'
		);
		$data['option_nav_item'] = array(
			'precios'	=> array(
				'icon' 		=> 'fa fa-th-large',
				'url' 		=> 'list-price',
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
		$this->load->view('list_price/list');
		$this->load->view('template/footer');
	}

	# Formulario Principal para Agregar listo de precios
	public function add()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('ListPriceModel' , 'list_price', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Precios',
			'box_span' 	=> 'Agregar'
		);
		$data['option_nav_item'] = array(
			'precios'		=> array(
				'icon' 		=> 'fa fa-th-large',
				'url' 		=> 'list-price',
				'class' 	=> NULL
			), 
			'agregar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('list_price/add');
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
				$this->rules_list_price();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->add();
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('ListPriceModel', 'list_price', TRUE);
						# Insertar información en la base de datos
						$this->list_price->save($this->input->post());
						redirect('list-price/success'); 
					break;
				}
			break;
		}
	}

	# Formulario Principal para Editar listado de precios
	public function edit($id = NULL)
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('ListPriceModel' , 'list_price', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Precios',
			'box_span' 	=> 'Editar'
		);
		$data['option_nav_item'] = array(
				'precios'		=> array(
				'icon' 			=> 'fa fa-th-large',
				'url' 			=> 'list-price',
				'class' 		=> NULL
			), 
			'editar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['information_list_price'] = $this->list_price->information_list_price($id);
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('list_price/edit');
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
				$this->rules_list_price();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->edit($id);
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('ListPriceModel', 'list_price', TRUE);
						# Insertar información en la base de datos
						$this->list_price->edit($id, $this->input->post());
						redirect('list-price/success-edit'); 
					break;
				}
			break;
		}
	}

	# Reglas de validación al insertar
	public function rules_list_price()
	{
		$config = array(
			array(
				'field' => 'name_list_price',
				'label' => 'nombre del listo de precio',
				'rules' => 'required|max_length[60]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 60 caracteres'
						   )
			),
			array(
				'field' => 'description_list_price',
				'label' => 'descripción',
				'rules' => 'required|max_length[255]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres'
						   )
			),
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

	# Eliminar usuario
	public function delete()
	{
		# Carga del modelo de base de datos
		$this->load->model('ListPriceModel', 'list_price', TRUE);
		# Eliminar el usuario seleccionado
		$this->list_price->delete($this->input->post('id'));
	}

}
