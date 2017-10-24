<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Presentation extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

    # Listado completo de tipo de presentaciones de los productos
	public function full_listing()
	{
		# Carga del modelo de base de datos
		$this->load->model('PresentationModel', 'presentation', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Envio de registros
		$data['full_listing'] = $this->presentation->full_listing();
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Presentación',
			'box_span' 	=> 'Listado'
		);
		$data['option_nav_item'] = array(
				'presentaciones'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'presentation',
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
		$this->load->view('presentation/list');
		$this->load->view('template/footer');
	}

	# Formulario principal para agregar otros tipos de presentaciones de productos
	public function add()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('PresentationModel', 'presentation', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Presentación',
			'box_span' 	=> 'Crear'
		);
		$data['option_nav_item'] = array(
			'presentaciones'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'presentation',
				'class' 	=> NULL
			), 
				'crear' 	=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('presentation/add');
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
				$this->rules_insert_presentation();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->add();
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('PresentationModel', 'presentation', TRUE);
						# Insertar información en la base de datos
						$this->presentation->save($this->input->post());
						redirect('presentation/success'); 
					break;
				}
			break;
		}
	}

	# Formulario principal para editar los tipos de presentaciones de productos
	public function edit($id = NULL)
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('PresentationModel', 'presentation', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Presentación',
			'box_span' 	=> 'Editar'
		);
		$data['option_nav_item'] = array(
				'presentaciones'	=> array(
				'icon' 			=> 'fa fa-ellipsis-v',
				'url' 			=> 'presentation',
				'class' 		=> NULL
			), 
			'editar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['information_presentation'] = $this->presentation->information_presentation($id);
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('presentation/edit');
		$this->load->view('template/footer');
	}

	# Recibir el formulario de editar y validar las reglas
	public function edit_validate($id = NULL)
	{
		switch ($this->input->post()) {
			case FALSE:
				$this->edit($id);
			break;
			case TRUE:
				$this->rules_insert_presentation();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->edit($id);
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('PresentationModel', 'presentation', TRUE);
						# Insertar información en la base de datos
						$this->presentation->edit($id, $this->input->post());
						redirect('presentation/success-edit'); 
					break;
				}
			break;
		}
	}

	# Reglas de validación
	public function rules_insert_presentation()
	{
		$config = array(
			array(
				'field' => 'name_presentation',
				'label' => 'presentación',
				'rules' => 'required|max_length[60]|is_unique[presentation.name_presentation]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un nombre de %s',
								'max_length'=> 'La longitud maxima a ingresar es de 60 caracteres'
						   )
			),
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

	# Eliminar presentacion
	public function delete()
	{
		# Carga del modelo de base de datos
		$this->load->model('PresentationModel', 'presentation', TRUE);
		# Eliminar el registro seleccionado
		$this->presentation->delete($this->input->post('id'));
	}

}
