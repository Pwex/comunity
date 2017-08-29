<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activities extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

	public function notification_details($notification = null)
	{
		# Cargando el modelo
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		
		# Notificaciones
		$data['discounting_notification']	 	 = $this->activity->discounting_notification($notification);
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		$data['notification_details_single']	 = $this->activity->notification_details_single($notification);

		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Notificaciones',
			'box_span' 	=> 'Detalles'
		);
		$data['option_nav_item'] = array(
			'escritorio'	=> array(
				'icon' 		=> 'fa fa-dashboard',
				'url' 		=> 'escritorio',
				'class' 	=> NULL
			), 
			'notificaciones'=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);

		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('activities/notifications');
		$this->load->view('template/footer');
	}

	public function all_notification_details($notification = null)
	{
		# Cargando el modelo
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['all_notification_details']	 	 = $this->activity->all_notification_details($this->session->userdata['user']['id_user']);
		$data['notification_details']	 	 	 = $this->activity->notification_details($this->session->userdata['user']['id_user']);

		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Notificaciones',
			'box_span' 	=> 'Listado'
		);
		$data['option_nav_item'] = array(
			'escritorio'	=> array(
				'icon' 		=> 'fa fa-dashboard',
				'url' 		=> 'escritorio',
				'class' 	=> NULL
			), 
			'notificaciones'=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);

		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('activities/all_notifications');
		$this->load->view('template/footer');
	}

	# Cambiar estatus de notificaciones
	public function accept_notifications($id = null)
	{
		# Cargando el modelo
		$this->load->model('ActivitiesModel', 'activity', TRUE);

		# Cambio de estatus
		$data['discounting_notification'] = $this->activity->discounting_notification($id);
		redirect('all_notification_details');
	}

	# Cambiar estatus de notificaciones
	public function delete_notifications($id = null)
	{
		# Cargando el modelo
		$this->load->model('ActivitiesModel', 'activity', TRUE);

		# Cambio de estatus
		$data['delete_notifications'] = $this->activity->delete_notifications($id);
		redirect('all_notification_details');
	}

}
