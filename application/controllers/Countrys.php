<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Countrys extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

    # Listado completo de paises
	public function full_listing()
	{
		# Carga del modelo de base de datos
		$this->load->model('CountrysModel', 'countrys', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Envio de registros
		$data['full_listing'] = $this->countrys->full_listing();
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Paises',
			'box_span' 	=> 'Listado'
		);
		$data['option_nav_item'] = array(
				'paises'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'countrys',
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
		$this->load->view('countrys/list');
		$this->load->view('template/footer');
	}

	# Formulario Principal para Agregar pais
	public function add()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('CountrysModel', 'countrys', TRUE);
		$this->load->model('MultimediaModel', 'medios', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Paises',
			'box_span' 	=> 'Agregar'
		);
		$data['option_nav_item'] = array(
				'paises'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'countrys',
				'class' 	=> NULL
			), 
			'agregar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Listado completo de imagenes disponibles
		$data['list_images'] = $this->medios->list_images();
		# Listado de categorias asociado a las imagenes
		$data['categories_images'] = $this->medios->categories_images();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('countrys/add');
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
				$this->rules_insert_countrys();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->add();
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('CountrysModel', 'countrys', TRUE);
						# Insertar información en la base de datos
						$this->countrys->save($this->input->post());
						redirect('countrys/success'); 
					break;
				}
			break;
		}
	}

	# Formulario Principal para Editar pais
	public function edit($id = NULL)
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('CountrysModel', 'countrys', TRUE);
		$this->load->model('MultimediaModel', 'medios', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Paises',
			'box_span' 	=> 'Editar'
		);
		$data['option_nav_item'] = array(
				'pais'			=> array(
				'icon' 			=> 'fa fa-ellipsis-v',
				'url' 			=> 'countrys',
				'class' 		=> NULL
			), 
			'editar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['information_country'] = $this->countrys->information_country($id);
		$data['status']   = explode(',', $data['information_country'][0]['images']);
		# Listado completo de imagenes disponibles
		$data['list_images'] = $this->medios->list_images();
		# Listado de categorias asociado a las imagenes
		$data['categories_images'] = $this->medios->categories_images();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('countrys/edit');
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
				$this->rules_edit_countrys();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->edit($id);
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('CountrysModel', 'countrys', TRUE);
						# Insertar información en la base de datos
						$this->countrys->edit($id, $this->input->post());
						redirect('countrys/success-edit'); 
					break;
				}
			break;
		}
	}

	# Reglas de validación al insertar
	public function rules_insert_countrys()
	{
		$config = array(
			array(
				'field' => 'name_country',
				'label' => 'Pais',
				'rules' => 'required|max_length[50]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 50 caracteres'
						   )
			),
			array(
				'field' => 'coin',
				'label' => 'moneda',
				'rules' => 'required|max_length[10]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s',
								'max_length'=> 'La longitud maxima a ingresar es de 10 caracteres'
						   )
			),
			array(
				'field' => 'tax_iva',
				'label' => 'iva',
				'rules' => 'required|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s'
						   )
			),
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

	# Reglas de validación al editar
	public function rules_edit_countrys()
	{
		$config = array(
			array(
				'field' => 'name_country',
				'label' => 'nombre pais',
				'rules' => 'required|max_length[50]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 50 caracteres'
						   )
			),
			array(
				'field' => 'coin',
				'label' => 'moneda',
				'rules' => 'required|max_length[10]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s',
								'max_length'=> 'La longitud maxima a ingresar es de 10 caracteres'
						   )
			),
			array(
				'field' => 'tax_iva',
				'label' => 'iva',
				'rules' => 'required|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s'
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
		$this->load->model('CountrysModel', 'countrys', TRUE);
		# Eliminar el usuario seleccionado
		$this->countrys->delete($this->input->post('id'));
	}
}
