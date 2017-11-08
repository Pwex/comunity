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

	# Listado de productos del proveedor
	public function list_of_products_supplier()
	{
		# Carga del modelo de base de datos
		$this->load->model('PartnersModel', 'partners', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Nombre del proveedor
		$data['get_name_partner'] = $this->partners->get_name_partner();
		# Listado de productos del proveedor
		$data['list_of_products_supplier'] = $this->partners->list_of_products_supplier();
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Productos',
			'box_span' 	=> 'Listado'
		);
		$data['option_nav_item'] = array(
			'productos'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'partners/list-of-products-supplier',
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
		$this->load->view('partners/list_of_products_supplier');
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
			'box_span' 	=> 'Crear'
		);
		$data['option_nav_item'] = array(
			'proveedor'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'partners',
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

	# Formulario Principal para Realizar encuesta
	public function add_requirements()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->view('partners/requirements');
	}

	# Recibir el Formulario y Validar las Reglas
	public function add_requirements_validate()
	{
		switch ($this->input->post()) 
		{
			case FALSE:
				$this->add_requirements();
			break;
			case TRUE:
				$this->load->database();
				$this->rules_insert_requirements();
				switch ($this->form_validation->run()) 
				{
					case FALSE:
						$this->add_requirements();
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('SuppliersModel', 'suppliers', TRUE);
						# Insertar información en la base de datos
						$this->suppliers->save_requirements($this->input->post(), $id);
						redirect('requirements/success'); 
					break;
				}
			break;
		}
	}

	# Enviar email con usuario y clave al proveedor
	public function send_user_and_password_information()
	{
		# Carga del modelo de base de datos
		$this->load->model('PartnersModel', 'partners', TRUE);
		$this->load->library('encrypt');
		$this->load->helper('string');
		# Buscar la informacion del proveedor
		$data_user_provider = $this->partners->get_data_user_provider(random_string('alnum', 16));
        # Envio de informacion al correo electronico y a la base de datos
        $subject = '
			<div style="text-align: center;"><img src="'.base_url("assets/dist/img/email/mail-access-pwex-header.jpg").'" width="100%" /></div>
			<p style="font-family: century gothic; font-weight: 100; font-size: 18px; text-align: center;">Puedes ingresar a nuesta plataforma desde el siguiente <br /><a href="http://www.pwex.org/platform">http://www.pwex.org/platform</a></p>
			<p style="font-family: century gothic; font-weight: 100; font-size: 18px; text-align: center;">Usuario: '.$data_user_provider[0]['email'].'</p>
			<p style="font-family: century gothic; font-weight: 100; font-size: 18px; text-align: center;">Clave: '.$this->encrypt->decode($data_user_provider[0]['password']).'</p>
			<p style="font-family: century gothic; font-weight: 100; font-size: 18px; text-align: center;"><strong>Recuerda que:</strong></p>
			<p style="font-family: century gothic; font-weight: 100; font-size: 18px; text-align: center;">Tu cuenta es personal e intransferible</p>
			<p style="font-family: century gothic; font-weight: 100; font-size: 18px; text-align: center;">Debes de cambiar tu clave una vez que ingreses a tu cuenta</p>
			<div style="text-align: center;"><img src="'.base_url("assets/dist/img/email/mail-access-pwex-footer.jpg").'" width="100%" /></div>
			<p style="font-family: century gothic; font-weight: 100; font-size: 18px; text-align: center;"><strong>Cordial Saludo,</strong></p>
			<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">&iquest;Tienes alguna pregunta?</p>
			<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Escribenos a: <a href="mailto:product.development@pwex.co">product.development@pwex.co</a></p>
			<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">O llamanos a:&nbsp;210-828-5555&nbsp;</p>
			<p style="font-family: candara; font-size: 24px; text-align: right;"><strong>El equipo de</strong>&nbsp;<img style="vertical-align: middle; height: 35px;" src="'.base_url("assets/dist/img/pwex-email.png").'" /></p>
        	<p><img style="width:100%" src="http://pwex.org/platform/assets/dist/img/email/barra-inf.png" /></p>
        ';
        # Carga de la libreria de envio de email
        $this->load->library('email');
        $this->email->from('info@pwex.co', 'Pwex Platform');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Has sido activado como proveedor PWEX');
        $this->email->message($subject);
        $this->email->send();
        #Actualizar el estado de el email enviado al proveedor con el usuario y clave
        $this->partners->change_email_sending_status($this->input->post('email'));
	}

}
