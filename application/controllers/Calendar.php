<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Calendar extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

    # Menu Mi Mundo
	public function get()
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
			'box_title' => 'Calendario',
			'box_span' 	=> ''
		);
		$data['option_nav_item'] = array(
				'Calendario'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'calendar',
				'class' 	=> NULL
			), 
			'Agenda'=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		// Url donde estara el proyecto, debe terminar con un "/" al final
		$data['base_url'] = base_url('assets/plugins/calendar').'/';
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('calendar/index');
		$this->load->view('template/footer');
	}

}
