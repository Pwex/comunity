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
			'usuarios'	=> array(
				'icon' 		=> 'fa fa-products',
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
		$this->load->model('CategoriesModel', 'category', TRUE);
		$this->load->model('TypesInventoryModel', 'typesinventory', TRUE);
		$this->load->model('BenefitsModel', 'benefits', TRUE);
		$this->load->model('ComponentsModel', 'components', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Productos',
			'box_span' 	=> 'Agregar'
		);
		$data['option_nav_item'] = array(
			'usuarios'	=> array(
				'icon' 		=> 'fa fa-products',
				'url' 		=> 'products',
				'class' 	=> NULL
			), 
			'agregar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Listado de categorias
		$data['category'] = $this->category->categories_listing();
		# Listado de tipos de inventario
		$data['typesinventory'] = $this->typesinventory->typesinv_listing();
		# Listado de beneficios
		$data['benefits'] = $this->benefits->benefits_listing();
		# Listado de componentes
		$data['components'] = $this->components->components_listing();
		# Tipos de cuentas | Acceso
		//$data['type_of_access'] = array('Administrador' => 'Administrador', 'Coach' => 'Coach', 'Proveedor' => 'Proveedor');
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('products/add');
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
				$this->rules_insert_products();
				switch ($this->form_validation->run()) {
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
						$this->load->model('ProductsModel', 'products', TRUE);
						# Insertar información en la base de datos

						$this->products->save($this->input->post());
						redirect('products/success'); 
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
		//$this->load->model('CountryModel', 'country', TRUE);
		$this->load->model('ProductsModel', 'products', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Productos',
			'box_span' 	=> 'Editar'
		);
		$data['option_nav_item'] = array(
			'usuarios'	=> array(
				'icon' 		=> 'fa fa-products',
				'url' 		=> 'products',
				'class' 	=> NULL
			), 
			'editar' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Listado de paises
		//$data['country'] = $this->country->full_listing();
		# Tipos de cuentas | Acceso
		//$data['type_of_access'] = array('Administrador' => 'Administrador', 'Coach' => 'Coach', 'Proveedor' => 'Proveedor');
		# Buscar informacion del usuario
		$data['product'] = $this->products->information_product($id);
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
				'rules' => 'required|max_length[20]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 80 caracteres'
						   )
			)
/*
			array(
				'field' => 'email',
				'label' => 'correo electrónico',
				'rules' => 'required|max_length[120]|valid_email|is_unique[products.email]|trim',
				'errors' => array(
								'required' 	 => 'Es necesario ingresar un %s',
								'max_length' => 'La longitud maxima a ingresar es de 120 caracteres',
								'valid_email'=> 'Ingrese un correo electrónico valido',
								'is_unique'  => 'El correo electrónico no esta disponible, intente ingresar uno nuevo',
						   )
			),
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

	# Reglas de validación al editar
	public function rules_edit_products()
	{
		$config = array(
			array(
				'field' => 'name',
				'label' => 'nombre',
				'rules' => 'required|max_length[80]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 80 caracteres'
						   )
			),
			array(
				'field' => 'last_name',
				'label' => 'apellido',
				'rules' => 'required|max_length[80]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 80 caracteres'
						   )
			),
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

}