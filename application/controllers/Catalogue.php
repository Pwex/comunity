<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogue extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

    # Listado completo de catalogo
	public function full_listing()
	{
		# Carga del modelo de base de datos
		$this->load->model('CatalogueModel', 'catalogue', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Envio de registros
		$data['full_listing'] = $this->catalogue->full_listing();
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Categoría Principal',
			'box_span' 	=> 'Listado'
		);
		$data['option_nav_item'] = array(
			'categoría principal'		=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'catalogue',
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
		$this->load->view('catalogue/list');
		$this->load->view('template/footer');
	}

	# Formulario Principal para agregar al catalogo
	public function add()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('CatalogueModel' , 'catalogue', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('MultimediaModel', 'medios', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Categoría Principal',
			'box_span' 	=> 'Agregar'
		);
		$data['option_nav_item'] = array(
			'categorías principal'		=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'catalogue',
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
		$this->load->view('catalogue/add');
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
				$this->rules_insert();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->add();
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('CatalogueModel', 'catalogue', TRUE);
						# Insertar información en la base de datos
						$this->catalogue->save($this->input->post());
						redirect('catalogue/success'); 
					break;
				}
			break;
		}
	}

	# Formulario Principal para editar el catalogo
	public function edit($id = NULL)
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('CatalogueModel' , 'catalogue', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('MultimediaModel', 'medios', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Categoría Principal',
			'box_span' 	=> 'Editar'
		);
		$data['option_nav_item'] = array(
				'categorías principal'		=> array(
				'icon' 			=> 'fa fa-ellipsis-v',
				'url' 			=> 'catalogue',
				'class' 		=> NULL
			), 
			'editar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$data['information_catalogue'] = $this->catalogue->information_catalogue($id);
		$data['status']   = explode(',', $data['information_catalogue'][0]['images']);
		# Listado completo de imagenes disponibles
		$data['list_images'] = $this->medios->list_images();
		# Listado de categorias asociado a las imagenes
		$data['categories_images'] = $this->medios->categories_images();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('catalogue/edit');
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
				$this->rules_edit();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->edit($id);
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('CatalogueModel', 'catalogue', TRUE);
						# Insertar información en la base de datos
						$this->catalogue->edit($id, $this->input->post());
						redirect('catalogue/success-edit'); 
					break;
				}
			break;
		}
	}

	# Reglas de validación al insertar
	public function rules_insert()
	{
		$config = array(
			array(
				'field' => 'name_catalogue',
				'label' => 'catálogo',
				'rules' => 'required|max_length[60]|is_unique[catalogue.name_catalogue]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 60 caracteres'
						   )
			)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

	# Reglas de validación al editar
	public function rules_edit()
	{
		$config = array(
			array(
				'field' => 'name_catalogue',
				'label' => 'catálogo',
				'rules' => 'required|max_length[60]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 60 caracteres'
						   )
			)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

	# Eliminar item del catalogo
	public function delete()
	{
		# Carga del modelo de base de datos
		$this->load->model('CatalogueModel', 'catalogue', TRUE);
		# Eliminar el item seleccionado
		$this->catalogue->delete($this->input->post('id'));
	}

}
