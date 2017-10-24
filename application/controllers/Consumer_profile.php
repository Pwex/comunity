<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consumer_profile extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

    # Ver información del perfil del consumidor
	public function view_consumer_profile($id = NULL)
	{
		# Carga del modelo de base de datos
		$this->load->model('ConsumerProfileModel', 'consumer_profile', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Perfil Consumidor',
			'box_span' 	=> 'Información'
		);
		$data['option_nav_item'] = array(
				'Perfil Consumidor'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'view-consumer-profile/'.$id,
				'class' 	=> NULL
			), 
			'perfil' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['name_consumer'] = $this->consumer_profile->get($id);
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('consumer_profile/view_profile');
		$this->load->view('template/footer');
	}

}
