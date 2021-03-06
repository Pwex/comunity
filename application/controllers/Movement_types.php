<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Movement_types extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

    # Listado completo 
	public function full_listing()
	{
		# Carga del modelo de base de datos
		$this->load->model('Movement_typesModel', 'movement_types', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Envio de registros
		$data['full_listing'] = $this->movement_types->full_listing();
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Tipos Movimiento',
			'box_span' 	=> 'Listado'
		);
		$data['option_nav_item'] = array(
				'tipos movimiento'	=> array(
				'icon' 		=> 'fa fa-gg',
				'url' 		=> 'movement_types',
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
		$this->load->view('movement_types/list');
		$this->load->view('template/footer');
	}

	# Formulario Principal para Agregar 
	public function add()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('Movement_typesModel', 'movement_types', TRUE);
		$this->load->model('ModulesModel', 'modules', TRUE);	
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Tipos Movimiento',
			'box_span' 	=> 'Crear'
		);
		$data['option_nav_item'] = array(
				'tipos movimiento'	=> array(
				'icon' 		=> 'fa fa-gg',
				'url' 		=> 'movement_types',
				'class' 	=> NULL
			), 
				'crear' 	=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Listado de modulos
		$data['modules'] = $this->modules->modules_listing();

		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('movement_types/add');
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
				$this->rules_insert_movement_types();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->add();
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('Movement_typesModel', 'movement_types', TRUE);
						# Insertar información en la base de datos
						$this->movement_types->save($this->input->post());
						redirect('movement_types/success'); 
					break;
				}
			break;
		}
	}

	# Formulario Principal para Editar 
	public function edit($id = NULL)
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('Movement_typesModel', 'movement_types', TRUE);
		$this->load->model('ModulesModel', 'modules', TRUE);	
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Tipos Movimiento',
			'box_span' 	=> 'Editar'
		);
		$data['option_nav_item'] = array(
				'tipos movimiento'	=> array(
				'icon' 			=> 'fa fa-gg',
				'url' 			=> 'movement_types',
				'class' 		=> NULL
			), 
			'editar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['information_movement_types'] = $this->movement_types->information_movement_types($id);
		# Listado de modulos
		$data['information_modules'] = $this->modules->information_modules($id);
		$data['modules'] = $this->modules->modules_listing();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('movement_types/edit');
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
				$this->rules_edit_movement_types();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->edit($id);
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('Movement_typesModel', 'movement_types', TRUE);
						# Insertar información en la base de datos
						$this->movement_types->edit($id, $this->input->post());
						redirect('movement_types/success-edit'); 
					break;
				}
			break;
		}
	}

	# Reglas de validación al insertar
	public function rules_insert_movement_types()
	{
		$config = array(
			array(

				'field' => 'id_movement_type',
				'label' => 'Código tipo movimiento',
				'rules' => 'required|max_length[10]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 10 caracteres'
						   )
			),
			array(

				'field' => 'movement_type',
				'label' => 'Tipo movimiento',
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
	public function rules_edit_movement_types()
	{
		$config = array(
			array(
				'field' => 'movement_type',
				'label' => 'Tipo movimiento',
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
		$this->load->model('Movement_typesModel', 'movement_types', TRUE);
		# Eliminar el usuario seleccionado
		$this->movement_types->delete($this->input->post('id'));
	}
}
