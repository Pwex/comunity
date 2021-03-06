<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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
		$this->load->model('ProductsModel', 'products', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Envio de registros
		$data['full_listing'] = $this->products->full_listing();
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Productos',
			'box_span' 	=> 'Listado'
		);
		$data['option_nav_item'] = array(
			'productos'	=> array(
				'icon' 		=> 'fa fa-cubes',
				'url' 		=> 'products',
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
		$this->load->view('products/list');
		$this->load->view('template/footer');
	}

	# Formulario Principal para Agregar usuarios
	public function add()
	{
		# Librerias
		$this->load->helper('form');
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->model('ProductsModel'  , 'products', TRUE);
		$this->load->model('MultimediaModel', 'medios', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Productos',
			'box_span' 	=> 'Crear'
		);
		$data['option_nav_item'] = array(
			'productos'	=> array(
				'icon' 		=> 'fa fa-cubes',
				'url' 		=> 'products',
				'class' 	=> NULL
			), 
				'crear' 	=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Listado de linea de productos
		$data['catalogue'] 		= $this->products->catalogue_listing();
		# Listado de categorias
		$data['category'] 		= $this->products->categories_listing();
		# Listado de tipos de inventario
		$data['typesinventory'] = $this->products->typesinv_listing();
		# Listado de tipo de presentaciones de productos
		$data['presentation'] 	= $this->products->presentation_listing();
		# Listado de beneficios
		$data['benefits'] 		= $this->products->benefits_listing();
		# Listado de componentes
		$data['components'] 	= $this->products->components_listing();
		# Listado de sellos
		$data['seals'] 			= $this->products->seals_listing();
		# Listado de unidades de medidas
		$data['unitsmeasure'] 	= $this->products->unitsmeasure_listing();
		# Listado de certificados
		$data['certifications'] = $this->products->certifications_listing();
		# Listado de estatus
		$data['status'] 		= array(1 => 'Activo', 0 => 'Inactivo');
		# Listado completo de imagenes disponibles
		$data['list_images'] = $this->medios->list_images();
		# Listado de categorias asociado a las imagenes
		$data['categories_images'] 	= $this->medios->categories_images();
		# Select de categorias
		$data['category']  			= $this->medios->categories_listing();
		$data['catalogue_group'] 	= $this->medios->catalogue_group();
		# Si aplica algun filtro de busqueda
		$data['status_filter_products'] = $this->products->status_filter_products();
		# Listado de proveedores
		$data['provider'] = $this->products->provider_listing();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('products/add');
		$this->load->view('template/footer');
	}

	# Cargar el contenido de select de parametros de busqueda
	public function filter_settings()
	{
		$this->load->model('ProductsModel'  , 'products', TRUE);
		$data['filter_settings'] = $this->products->filter_settings($this->input->post('id'));
		$this->load->view('products/filter_settings', $data);
	}

	# Recibir el Formulario y Validar las Reglas
	public function add_validate()
	{
		switch ($this->input->post()) {
			case FALSE:
				$this->add();
			break;
			case TRUE:
				$this->rules_insert_products();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->add();
					break;
					case TRUE:
						if (!empty($this->input->post('nutritional'))) {
							$config['upload_path']          = './assets/dist/img/multimedia/images/';
			                $config['allowed_types']        = 'gif|jpg|png';
			                $config['max_size']             = 100;
			                $config['max_width']            = 1024;
			                $config['max_height']           = 768;
			                $this->load->library('upload', $config);
			                if ( ! $this->upload->do_upload('nutritional'))
			                {
		                        echo "Ha ocurrido un error al subir la imagen de la tabla nutricional<br>";
		                        $error = array('error' => $this->upload->display_errors());
		                        echo "<pre>"; print_r($error)."</pre>";
		                        exit();
			                }
			                else
			                {
		                       	$data = array('upload_data' => $this->upload->data());
		                        # Cargar el modelo de base de datos
								$this->load->model('ProductsModel', 'products', TRUE);
								# Insertar información en la base de datos
								$this->products->save($this->input->post(), $data);
								redirect('products/success'); 
			                }
						} else {
							# Cargar el modelo de base de datos
							$this->load->model('ProductsModel', 'products', TRUE);
							# Insertar información en la base de datos
							$this->products->save($this->input->post(), null);
							redirect('products/success'); 
						}
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
		$this->load->model('ProductsModel'  , 'products', TRUE);
		$this->load->model('MultimediaModel', 'medios', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Productos',
			'box_span' 	=> 'Editar'
		);
		$data['option_nav_item'] = array(
			'productos'	=> array(
				'icon' 		=> 'fa fa-cubes',
				'url' 		=> 'products',
				'class' 	=> NULL
			), 
			'editar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		
		# Buscar informacion del usuario
		$data['information_product'] = $this->products->information_product($id);
		# Conversiones a array
		$data['array_benefits'] 	= explode(',', $data['information_product'][0]['id_benefits']);
		$data['array_component'] 	= explode(',', $data['information_product'][0]['id_component']);
		$data['array_seals'] 		= explode(',', $data['information_product'][0]['id_seals']);
		$data['array_images'] 		= explode(',', $data['information_product'][0]['images']);
		# Listado de categorias
		$data['category'] 		= $this->products->categories_listing();
		# Listado de tipos de inventario
		$data['typesinventory'] = $this->products->typesinv_listing();
		# Listado de beneficios
		$data['benefits'] 		= $this->products->benefits_listing();
		# Listado de componentes
		$data['components'] 	= $this->products->components_listing();
		# Listado de sellos
		$data['seals'] 			= $this->products->seals_listing();
		# Listado de estatus
		$data['status'] 		= array(1 => 'Activo', 0 => 'Inactivo');
		# Donde se visualizara
		$data['availability'] 	= array(1 => 'En todas partes', 2 => 'eCommerce', 3 => 'Centros de bienestar', 4 => 'Coach');
		# Listado completo de imagenes disponibles
		$data['list_images'] = $this->medios->list_images();
		# Listado de categorias asociado a las imagenes
		$data['categories_images'] = $this->medios->categories_images();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('products/edit');
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
				$this->rules_edit_products();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->edit($id);
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('ProductsModel', 'products', TRUE);
						# Insertar información en la base de datos
						$this->products->edit($id, $this->input->post());
						redirect('products/success-edit'); 
					break;
				}
			break;
		}
	}

	# Reglas de validación al insertar
	public function rules_insert_products()
	{
		$config = array(
			array(
				'field' => 'id_product',
				'label' => 'código producto',
				'rules' => 'required|max_length[60]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 80 caracteres'
						   )
			),
			array(
				'field' => 'name_product',
				'label' => 'nombre producto',
				'rules' => 'required|max_length[80]|trim',
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
	public function rules_edit_products()
	{
		$config = array(
			array(
				'field' => 'id_product',
				'label' => 'código producto',
				'rules' => 'required|max_length[60]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 80 caracteres'
						   )
			),
			array(
				'field' => 'name_product',
				'label' => 'nombre producto',
				'rules' => 'required|max_length[50]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 50 caracteres'
						   )
			)
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

	# Eliminar usuario
	public function delete()
	{
		# Carga del modelo de base de datos
		$this->load->model('ProductsModel', 'products', TRUE);
		# Eliminar el usuario seleccionado
		$this->products->delete($this->input->post('id'));
	}

	# Crear url amigable
	public function friendly_url()
	{
		echo url_title($this->input->post('url'));
	}

}
