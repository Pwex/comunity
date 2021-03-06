<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consumers extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

    # Listado completo de Consumidores
	public function full_listing()
	{
		# Carga del modelo de base de datos
		$this->load->model('ConsumersModel', 'ec_client', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Envio de registros 
		$data['full_listing'] = $this->ec_client->full_listing();
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Consumidores',
			'box_span' 	=> 'Listado'
		);
		$data['option_nav_item'] = array(
				'Consumidores'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'consumers',
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
		$this->load->view('consumers/list');
		$this->load->view('template/footer');
	}

	# Formulario Principal para Agregar Consumidores
	public function add()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('DocumentTypesModel', 'document_types', TRUE);
		$this->load->model('CountrysModel', 'countrys', TRUE);
		$this->load->model('CitiesModel', 'cities', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Consumidores',
			'box_span' 	=> 'Crear'
		);
		$data['option_nav_item'] = array(
			'Consumidores'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'consumers',
				'class' 	=> NULL
			), 
				'crear' 	=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Listado de tipos de documento
		$data['document_types'] = $this->document_types->document_types_listing();
		# Listado de paises
		$data['countrys'] = $this->countrys->countrys_listing();
		# Listado de ciudades
		$data['cities'] = $this->cities->cities_listing();
		# arreglo para el sexo
		$data['sex'] = array('Masculino' => 'masculino', 'Femenino' => 'femenino');
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('consumers/add');
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
				$this->load->database();
				$this->rules_insert_consumers();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->add();
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('ConsumersModel', 'ec_client', TRUE);
						# Insertar información en la base de datos
						$this->ec_client->save($this->input->post());
						redirect('consumers/success'); 
					break;
				}
			break;
		}
	}


	# Formulario Principal para Editar Consumidores
	public function edit($id = NULL)
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('CountrysModel', 'country', TRUE);
		$this->load->model('ConsumersModel', 'ec_client', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Consumidores',
			'box_span' 	=> 'Editar'
		);
		$data['option_nav_item'] = array(
			'Consumidores'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'registeer_consumer',
				'class' 	=> NULL
			), 
			'editar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Listado de paises
		$data['country'] = $this->country->countrys_listing();
		# Buscar informacion del usuario
		$data['consumers'] = $this->ec_client->information_consumers($id);
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('consumers/edit');
		$this->load->view('template/footer');
	}

	# Formulario Principal para Realizar encuesta
	public function add_poll($id = NULL)
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('ConsumersModel', 'poll', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Consumidores',
			'box_span' 	=> 'Encuesta'
		);
		$data['option_nav_item'] = array(
			'Consumidores'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'poll',
				'class' 	=> NULL
			), 
			'editar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Buscar informacion del usuario
//		$data['consumers'] = $this->ec_client->information_consumers($id);
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('consumers/poll');
		$this->load->view('template/footer');
	}

	# Recibir el Formulario y Validar las Reglas
	public function add_poll_validate($id)
	{
		switch ($this->input->post()) 
		{
			case FALSE:
				$this->add_poll($id);
			break;
			case TRUE:
				$this->load->database();
				$this->rules_insert_poll();
				switch ($this->form_validation->run()) 
				{
					case FALSE:
						$this->add_poll($id);
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('ConsumersModel', 'consumers', TRUE);
						# Insertar información en la base de datos
						$this->consumers->save_poll($this->input->post(), $id);
						redirect('view-consumer-profile/'.$id.'/success'); 
					break;
				}
			break;
		}
	}

	# Recibir el Formulario de Editar y Validar las Reglas
	public function edit_validate($id = NULL)
	{
		switch ($this->input->post()) {
			case FALSE:
				$this->edit($id);
			break;
			case TRUE:
				$this->rules_edit_consumers();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->edit($id);
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('ConsumersModel', 'ec_client', TRUE);
						# Insertar información en la base de datos
						$this->ec_client->edit($id, $this->input->post());
						redirect('consumers/success-edit'); 
					break;
				}
			break;
		}
	}

	# Reglas de validación al insertar
	public function rules_insert_consumers()
	{
		$config = array(
			array(
				'field' => 'name',
				'label' => 'nombre',
				'rules' => 'required|max_length[80]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 80 caracteres'
						   )
			),
			array(
				'field' => 'last_name',
				'label' => 'apellido',
				'rules' => 'required|max_length[80]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 80 caracteres'
						   )
			),
			array(
				'field' => 'email',
				'label' => 'correo electrónico',
				'rules' => 'required|max_length[120]|valid_email|is_unique[ec_client.email]|trim',
				'errors' => array(
								'required' 	 => 'Es necesario ingresar un %s',
								'max_length' => 'La longitud maxima a ingresar es de 120 caracteres',
								'valid_email'=> 'Ingrese un correo electrónico valido',
								'is_unique'  => 'El correo electrónico no esta disponible, intente ingresar uno nuevo',
						   )
			)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

	# Reglas de validación al insertar
	public function rules_insert_poll()
	{
		$config = array(
			array(
				'field' => 'foods',
				'label' => 'Comidas',
				'rules' => 'required',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s'
						   )
			),
			array(
				'field' => 'defecation',
				'label' => 'opción',
				'rules' => 'required',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s'
						   )
			),
			array(
				'field' => 'activity',
				'label' => 'opción',
				'rules' => 'required',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s'
						   )
			),
			array(
				'field' => 'stress',
				'label' => 'opción',
				'rules' => 'required',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s'
						   )
			),
			array(
				'field' => 'sleep',
				'label' => 'opción',
				'rules' => 'required',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s'
						   )
			),
			array(
				'field' => 'wake',
				'label' => 'opción',
				'rules' => 'required',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s'
						   )
			),
			array(
				'field' => 'libido',
				'label' => 'opción',
				'rules' => 'required',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s'
						   )
			),

			array(
				'field' => 'state_skin',
				'label' => 'opción',
				'rules' => 'required',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s'
						   )
			),
			array(
				'field' => 'immune',
				'label' => 'opción',
				'rules' => 'required',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s'
						   )
			),
			array(
				'field' 	=> 'alimentary',
				'label' 	=> 'opción',
				'rules' 	=> 'required',
				'errors' 	=> array(
								'required' 	=> 'Es necesario ingresar una %s'
						   )
			)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

	# Reglas de validación al editar
	public function rules_edit_consumers()
	{
		$config = array(
			array(
				'field' => 'name',
				'label' => 'nombre',
				'rules' => 'required|max_length[80]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 80 caracteres'
						   )
			),
			array(
				'field' => 'last_name',
				'label' => 'apellido',
				'rules' => 'required|max_length[80]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 80 caracteres'
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
		$this->load->model('ConsumersModel', 'ec_client', TRUE);
		# Eliminar el usuario seleccionado
		$this->ec_client->delete($this->input->post('id'));
	}

	public function add_measuring($id = NULL)
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('CountrysModel', 'country', TRUE);
		$this->load->model('ConsumersModel', 'ec_client', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Consumidores',
			'box_span' 	=> 'Medición'
		);
		$data['option_nav_item'] = array(
			'Consumidores'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'measuring',
				'class' 	=> NULL
			), 
			'editar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Listado de paises
		$data['country'] = $this->country->countrys_listing();
		# Buscar el tipo de sexo del consumidor
		$data['type_of_sex'] = $this->ec_client->type_of_sex($id); 
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('consumers/measuring');
		$this->load->view('template/footer');
	}

}
