<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShopLayout extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

	public function main()
	{
		# Cargando el modelo y librerias
		$this->load->helper('form');
		$this->load->model('ShopLayoutModel', 'shop', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'eCommerce',
			'box_span' 	=> 'Configuración'
		);
		$data['option_nav_item'] = array(
			'ecommerce'	=> array(
				'icon' 		=> 'fa fa-shopping-cart',
				'url' 		=> 'shop-layout',
				'class' 	=> NULL
			), 
			'configuración' => array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Información del registro en la base de datos
		$data['row'] = $this->shop->information();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('shop/layout');
		$this->load->view('template/footer');
	}

	# Almacenar y validar información de la tienda
	public function shop_layout_validate()
	{
		switch ($this->input->post()) {
			case FALSE:
				$this->main();
			break;
			case TRUE:
				$this->rules_shop_layout();
				switch ($this->form_validation->run()) {
					case FALSE:
						$this->main();
					break;
					case TRUE:
						# Cargar el modelo de base de datos
						$this->load->model('ShopLayoutModel', 'shop', TRUE);
						# Insertar información en la base de datos
						$this->shop->save($this->input->post());
						redirect('shop-layout/success'); 
					break;
				}
			break;
		}
	}

	# Reglas de validación
	public function rules_shop_layout()
	{
		$config = array(
			array(
				'field' => 'shop',
				'label' => 'nombre para la tienda',
				'rules' => 'required|max_length[255]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres'
						   )
			),
			array(
				'field' => 'email',
				'label' => 'correo electrónico',
				'rules' => 'required|max_length[120]|valid_email|trim',
				'errors' => array(
								'required' 	 => 'Es necesario ingresar un %s',
								'max_length' => 'La longitud maxima a ingresar es de 120 caracteres',
								'valid_email'=> 'Correo electrónico invalido'
						   )
			),
			array(
				'field' => 'phone',
				'label' => 'número de teléfono',
				'rules' => 'required|max_length[20]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 20 caracteres'
						   )
			),
			array(
				'field' => 'movil',
				'label' => 'número de movil',
				'rules' => 'required|max_length[20]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 20 caracteres'
						   )
			),
			array(
				'field' => 'address',
				'label' => 'dirección para la tienda',
				'rules' => 'required|max_length[255]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres'
						   )
			),
			array(
				'field' => 'facebook',
				'label' => 'dirección electrónica del fanpage de facebook',
				'rules' => 'max_length[255]|valid_url|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres',
								'valid_url' => 'La url ingresada no es valida'
						   )
			),
			array(
				'field' => 'twitter',
				'label' => 'dirección electrónica del fanpage de twitter',
				'rules' => 'max_length[255]|valid_url|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres',
								'valid_url' => 'La url ingresada no es valida'
						   )
			),
			array(
				'field' => 'linkedin',
				'label' => 'dirección electrónica del fanpage de linkedin',
				'rules' => 'max_length[255]|valid_url|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar una %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres',
								'valid_url' => 'La url ingresada no es valida'
						   )
			),
			array(
				'field' => 'copyright',
				'label' => 'copyright',
				'rules' => 'required|max_length[255]|trim',
				'errors' => array(
								'required' 	=> 'Es necesario ingresar un %s',
								'max_length'=> 'La longitud maxima a ingresar es de 255 caracteres'
						   )
			),
		);
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<p class="text-danger msg-error">', '</p>');
		$this->form_validation->set_rules($config);
	}

}
