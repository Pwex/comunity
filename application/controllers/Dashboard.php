<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

	public function index()
	{
		# Cargando el modelo
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Escritorio',
			'box_span' 	=> 'Pwex Administrador'
		);
		$data['option_nav_item'] = array(
			'escritorio'	=> array(
				'icon' 		=> 'fa fa-dashboard',
				'url' 		=> 'escritorio',
				'class' 	=> NULL
			), 
			'inicio' 		=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		switch ($this->session->userdata['user']['type_of_access']) {
			case 'Administrador':
				$this->load->view('dashboard');
			break;
			case 'Proveedor':
				$this->load->view('partners/home');
			break;
			case 'Coach':
				$this->load->view('coach/home');
			break;
		}
		$this->load->view('template/footer');
	}

}
