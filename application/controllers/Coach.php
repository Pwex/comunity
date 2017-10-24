<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coach extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

    # Menu Mi Mundo
	public function menu()
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
			'box_title' => 'Mi Mundo',
			'box_span' 	=> ''
		);
		$data['option_nav_item'] = array(
				'Mi Mundo'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'my-world',
				'class' 	=> NULL
			), 
			'Menú'=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('coach/my_world');
		$this->load->view('template/footer');
	}

}
