<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Certifications extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

    # Listado completo de certificados
	public function full_listing()
	{
		# Carga del modelo de base de datos
		$this->load->model('CertificationsModel', 'certifications', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Envio de registros
		$data['full_listing'] = $this->certifications->full_listing();
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Certificados',
			'box_span' 	=> 'Listado'
		);
		$data['option_nav_item'] = array(
				'certificados' => array(
				'icon' 		   => 'fa fa-ellipsis-v',
				'url' 		   => 'certifications',
				'class' 	   => NULL
			), 
			'listado'=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('certifications/list');
		$this->load->view('template/footer');
	}

	# Formulario principal para agregar certificados
	public function add()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('CertificationsModel', 'certifications', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Certificados',
			'box_span' 	=> 'Crear'
		);
		$data['option_nav_item'] = array(
			'certificados'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'certifications',
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
		$this->load->view('certifications/add');
		$this->load->view('template/footer');
	}

	# Recibir el formulario y validar las reglas
	public function add_validate()
	{
		switch ($this->input->post()) {
			case FALSE:
				$this->add();
			break;
			case TRUE:
				$this->load->database();
				$this->rules_insert_certifications();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->add();
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('CertificationsModel', 'certifications', TRUE);
						# Insertar información en la base de datos
						$this->certifications->save($this->input->post());
						redirect('certifications/success'); 
					break;
				}
			break;
		}
	}

	# Formulario principal para editar los certificados
	public function edit($id = NULL)
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('CertificationsModel', 'certifications', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Certificados',
			'box_span' 	=> 'Editar'
		);
		$data['option_nav_item'] = array(
				'certificados'	=> array(
				'icon' 			=> 'fa fa-ellipsis-v',
				'url' 			=> 'certifications',
				'class' 		=> NULL
			), 
			'editar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['information_certifications'] = $this->certifications->information_certifications($id);
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('certifications/edit');
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
				$this->load->database();
				$this->rules_edit_certifications();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->edit($id);
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('CertificationsModel', 'certifications', TRUE);
						# Insertar información en la base de datos
						$this->certifications->edit($id, $this->input->post());
						redirect('certifications/success-edit'); 
					break;
				}
			break;
		}
	}

	# Reglas de validación al insertar
	public function rules_insert_certifications()
	{
		$config = array(
			array(
				'field' => 'name_certifications',
				'label' => 'certificados',
				'rules' => 'required|max_length[60]|is_unique[certifications.name_certifications]|trim',
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

	# Reglas de validación al editar
	public function rules_edit_certifications()
	{
		$config = array(
			array(
				'field' => 'name_certifications',
				'label' => 'certificados',
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

	# Eliminar certificaciones
	public function delete()
	{
		# Carga del modelo de base de datos
		$this->load->model('CertificationsModel', 'certifications', TRUE);
		# Eliminar el usuario seleccionado
		$this->certifications->delete($this->input->post('id'));
	}

}
