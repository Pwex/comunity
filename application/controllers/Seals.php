<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seals extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

    # Listado completo de categorias
	public function full_listing()
	{
		# Carga del modelo de base de datos
		$this->load->model('SealsModel', 'seals', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Sellos',
			'box_span' 	=> 'Listado'
		);
		$data['option_nav_item'] = array(
			'sellos'	=> array(
				'icon' 		=> 'fa fa-barcode',
				'url' 		=> 'sellos',
				'class' 	=> NULL
			), 
			'listado'=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Envio de registros
		$data['full_listing'] = $this->seals->full_listing();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('seals/list');
		$this->load->view('template/footer');
	}

	# Formulario Principal para Agregar sellos
	public function add()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('SealsModel', 'seals', TRUE);
		$this->load->model('MultimediaModel', 'medios', TRUE);
	
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Sellos',
			'box_span' 	=> 'Agregar'
		);
		$data['option_nav_item'] = array(
			'sellos'	=> array(
				'icon' 		=> 'fa fa-barcode',
				'url' 		=> 'seals',
				'class' 	=> NULL
			), 
			'agregar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Listado completo de imagenes disponibles
		$data['list_images'] = $this->medios->list_images();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('seals/add');
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
				$this->rules_insert_seals();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->add();
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('SealsModel', 'seals', TRUE);
						# Insertar información en la base de datos
						$this->seals->save($this->input->post());
						redirect('seals/success'); 
					break;
				}
			break;
		}
	}

	# Formulario Principal para Editar sellos
	public function edit($id = NULL)
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
//		$this->load->model('CategoryModel', 'category', TRUE);
		$this->load->model('SealsModel', 'seals', TRUE);
		$this->load->model('MultimediaModel', 'medios', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Sellos',
			'box_span' 	=> 'Editar'
		);
		$data['option_nav_item'] = array(
			'sellos'	=> array(
				'icon' 		=> 'fa fa-barcode',
				'url' 		=> 'seals',
				'class' 	=> NULL
			), 
			'editar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['information_seals'] = $this->seals->information_seals($id);
		$data['status']   = explode(',', $data['information_seals'][0]['images']);
		# Listado completo de imagenes disponibles
		$data['list_images'] = $this->medios->list_images();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('seals/edit');
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
				$this->rules_edit_seals();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->edit($id);
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('SealsModel', 'seals', TRUE);
						# Insertar información en la base de datos
						$this->seals->edit($id, $this->input->post());
						redirect('seals/success-edit'); 
					break;
				}
			break;
		}
	}

	# Reglas de validación al insertar
	public function rules_insert_seals()
	{
		$config = array(
			array(
				'field' => 'name_seals',
				'label' => 'nombre de sello',
				'rules' => 'required|max_length[50]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 50 caracteres'
						   )
			),
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

	# Reglas de validación al editar
	public function rules_edit_seals()
	{
		$config = array(
			array(
				'field' => 'name_seals',
				'label' => 'nombre de sello',
				'rules' => 'required|max_length[50]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 50 caracteres'
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
		$this->load->model('SealsModel', 'seals', TRUE);
		# Eliminar el usuario seleccionado
		$this->seals->delete($this->input->post('id'));
	}

}
