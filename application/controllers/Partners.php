<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partners extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

    # Listado completo de usuarios
	public function full_listing()
	{
		# Carga del modelo de base de datos
		$this->load->model('PartnersModel', 'partners', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Envio de registros
		$data['full_listing'] = $this->partners->full_listing();
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Proveedores',
			'box_span' 	=> 'Listado'
		);
		$data['option_nav_item'] = array(
			'proveedor'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'partners',
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
		$this->load->view('partners/list');
		$this->load->view('template/footer');
	}

	# Formulario Principal 
	public function add()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# tablas relacionadas
		$this->load->model('DocumentTypesModel', 'document_types', TRUE);
		$this->load->model('PartnerTypesModel', 'partner_types', TRUE);
		$this->load->model('CountrysModel', 'countrys', TRUE);
		$this->load->model('CitiesModel', 'cities', TRUE);
		$this->load->model('BanksModel', 'bank', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Proveedores',
			'box_span' 	=> 'Agregar'
		);
		$data['option_nav_item'] = array(
			'proveedor'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'partners',
				'class' 	=> NULL
			), 
			'agregar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Listado de tipos de documento
		$data['document_types'] = $this->document_types->document_types_listing();
		# Listado de tipos de proveedor
		$data['partner_types'] = $this->partner_types->partner_type_listing();
		# Listado de paises
		$data['countrys'] 	= $this->countrys->countrys_listing();
		# Listado de ciudades
		$data['cities'] 	= $this->cities->cities_listing();
		# Listado de bancos
		$data['bank'] 		= $this->bank->banks_listing();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('partners/add');
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
				$this->rules_insert_partners();
				switch ($this->form_validation->run()) 
				{
					case FALSE:
						$this->add();
					break;
					case TRUE:
					/*
						echo "<pre>";
						print_r($this->input->post());
						echo "</pre>";
						exit;
					*/	
						# Cargar el modelo de base de datos
						$this->load->model('PartnersModel', 'partners', TRUE);
						# Insertar información en la base de datos
						$this->partners->save($this->input->post());
						redirect('partners/success'); 
					break;
				}
			break;
		}
	}

	# Formulario Principal para Editar usuarios
	public function edit($id = NULL)
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('PartnersModel', 'partners', TRUE);
		# tablas relacionadas
		$this->load->model('DocumentTypesModel', 'document_types', TRUE);
		$this->load->model('PartnerTypesModel', 'partner_types', TRUE);
		$this->load->model('CountrysModel', 'countrys', TRUE);
		$this->load->model('CitiesModel', 'cities', TRUE);
		$this->load->model('BanksModel', 'banks', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Proveedores',
			'box_span' 	=> 'Editar'
		);
		$data['option_nav_item'] = array(
			'proveedor'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'partners',
				'class' 	=> NULL
			), 
			'editar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['document_types'] = $this->document_types->document_types_listing();
		# Listado de tipos de proveedor
		$data['partner_types'] = $this->partner_types->partner_type_listing();
		# Listado de paises
		$data['countrys'] = $this->countrys->countrys_listing();
		# Listado de ciudades
		$data['information_cities'] = $this->cities->information_cities($id);
		$data['cities'] = $this->cities->cities_listing();
		$data['banks'] = $this->banks->banks_listing();

		$data['partner'] = $this->partners->information_partner($id);
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('partners/edit');
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
				$this->rules_edit_partners();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->edit($id);
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('PartnersModel', 'partners', TRUE);
						# Insertar información en la base de datos
						$this->partners->edit($id, $this->input->post());
						redirect('partners/success-edit'); 
					break;
				}
			break;
		}
	}

	# Reglas de validación al insertar
	public function rules_insert_partners()
	{
		$config = array(
			array(
				'field' => 'id_partner',
				'label' => 'código proveedor',
				'rules' => 'required|max_length[40]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 80 caracteres'
						   )
			),
			array(
				'field' => 'name_partner',
				'label' => 'nombre proveedor',
				'rules' => 'required|max_length[60]|trim',
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

	# Reglas de validación al editar
	public function rules_edit_partners()
	{
		$config = array(
			array(
				'field' => 'id_partner',
				'label' => 'código proveedor',
				'rules' => 'max_length[20]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 80 caracteres'
						   )
			),
			array(
				'field' => 'name_partner',
				'label' => 'nombre proveedor',
				'rules' => 'required|max_length[60]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 80 caracteres'
						   )
			)
/*
			array(
				'field' => 'password',
				'label' => 'clave de seguridad',
				'rules' => 'required|max_length[255]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres'
						   )
			),
			array(
				'field' => 'confirm_password',
				'label' => 'confirmar clave de seguridad',
				'rules' => 'required|max_length[255]|matches[password]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres',
								'matches'	=> 'Las clave de seguridad son distintas'
						   )
			)
*/
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

	# Eliminar usuario
	public function delete()
	{
		# Carga del modelo de base de datos
		$this->load->model('PartnersModel', 'partners', TRUE);
		# Eliminar el usuario seleccionado
		$this->partners->delete($this->input->post('id'));
	}

}
