<?php
defined('BASEPATH') OR exit('No direct script access allowed');

include('assets/bower_components/fileuploader/src/class.fileuploader.php');

class Multimedia extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

	public function files_images()
	{
		# Cargando el modelo y Librerias
		$this->load->model('MultimediaModel', 'medios', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->helper('form');
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Multimedia',
			'box_span' 	=> 'Administrador de medios'
		);
		$data['option_nav_item'] = array(
			'multimedia'	=> array(
				'icon' 		=> 'fa fa-film',
				'url' 		=> 'multimedia',
				'class' 	=> NULL
			), 
			'archivos' 		=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Listado completo de imagenes disponibles
		$data['list_images'] 	 = $this->medios->list_images();
		# Listado de categorias
		$data['list_categories'] = $this->medios->list_categories();
		# Listado de categorias asociado a las imagenes
		$data['categories_images'] = $this->medios->categories_images();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('multimedia/files.php');
		$this->load->view('template/footer');
	}

	# Eliminar medios de la base de datos y directorio
	public function delete_images(){
		# Cargar modelo de base de datos
		$this->load->model('MultimediaModel', 'medios', TRUE);
		# Enviar peticion de eliminación
		$this->medios->delete($this->input->post('id'));
		# Buscar el archivo en el directorio y eliminarlos
		$this->delete_medio_imagen($this->input->post('name'));
	}

	# Eliminar medios de la base de datos y directorio
	public function delete_videos(){
		# Cargar modelo de base de datos
		$this->load->model('MultimediaModel', 'medios', TRUE);
		# Enviar peticion de eliminación
		$this->medios->delete($this->input->post('id'));
		# Buscar el archivo en el directorio y eliminarlos
		$this->delete_medio_videos($this->input->post('name'));
	}	

	# Subir las imagenes
	public function add_file_manager_images()
	{
		if (empty($this->input->post('fileuploader-list-files'))) {
			redirect('multimedia/error-select-images');
		}
		# Cargar modelo de base de datos y Libreria
		$this->load->model('MultimediaModel', 'medios', TRUE);
		// initialize FileUploader
	    $FileUploader = new FileUploader('files', array(
	        'limit' => null,
	        'maxSize' => null,
			'fileMaxSize' => null,
	        'extensions' => null,
	        'required' => false,
	        'uploadDir' => 'assets/dist/img/multimedia/images/',
	        'title' => 'name',
			'replace' => false,
	        'listInput' => true,
	        'files' => null
	    ));
		
		// call to upload the files
	    $data = $FileUploader->upload();

	    // if uploaded and success
	    if($data['isSuccess'] && count($data['files']) > 0) {
	        // get uploaded files
	        $uploadedFiles = $data['files'];
	    }
	    // if warnings
		if($data['hasWarnings']) {
	        $warnings = $data['warnings'];
	        
	   		echo '<pre>';
	        print_r($warnings);
			echo '</pre>';
	    }
		
		foreach($FileUploader->getRemovedFiles('file') as $key=>$value) {
			unlink('../uploads/' . $value['name']);
		}

		$fileList = $FileUploader->getFileList();
		$this->medios->save($fileList, $this->input->post('id_category'));
		redirect('multimedia/success-images');
	}

	# Funcion para eliminar medios
	public function delete_medio_imagen($file){
		$route_file = 'assets/dist/img/multimedia/images/'.$file;
	   	unlink($route_file);
	}

	# Funcion para eliminar medios
	public function delete_medio_videos($file){
		$route_file = 'assets/dist/img/multimedia/videos/'.$file;
	   	unlink($route_file);
	}


	# Subir las imagenes
	public function add_file_manager_videos()
	{
		if (empty($this->input->post('fileuploader-list-files'))) {
			redirect('multimedia/videos/error-select');
		}
		# Cargar modelo de base de datos y Libreria
		$this->load->model('MultimediaModel', 'medios', TRUE);
		// initialize FileUploader
	    $FileUploader = new FileUploader('files', array(
	        'limit' => null,
	        'maxSize' => null,
			'fileMaxSize' => null,
	        'extensions' => null,
	        'required' => false,
	        'uploadDir' => 'assets/dist/img/multimedia/videos/',
	        'title' => 'name',
			'replace' => false,
	        'listInput' => true,
	        'files' => null
	    ));
		
		// call to upload the files
	    $data = $FileUploader->upload();

	    // if uploaded and success
	    if($data['isSuccess'] && count($data['files']) > 0) {
	        // get uploaded files
	        $uploadedFiles = $data['files'];
	    }
	    // if warnings
		if($data['hasWarnings']) {
	        $warnings = $data['warnings'];
	        
	   		echo '<pre>';
	        print_r($warnings);
			echo '</pre>';
	    }
		
		foreach($FileUploader->getRemovedFiles('file') as $key=>$value) {
			unlink('../uploads/' . $value['name']);
		}

		$fileList = $FileUploader->getFileList();
		$this->medios->save($fileList, $this->input->post('id_category'));
		redirect('multimedia/videos/success');
	}

  	# Manager files videos
	public function files_videos()
	{
		# Cargando el modelo y Librerias
		$this->load->model('MultimediaModel', 'medios', TRUE);
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		$this->load->helper('form');
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Multimedia',
			'box_span' 	=> 'Administrador de medios'
		);
		$data['option_nav_item'] = array(
			'multimedia'	=> array(
				'icon' 		=> 'fa fa-film',
				'url' 		=> 'multimedia/videos',
				'class' 	=> NULL
			), 
			'archivos' 		=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		# Listado completo de imagenes disponibles
		$data['list_videos'] = $this->medios->list_videos();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('multimedia/videos.php');
		$this->load->view('template/footer');
	}

}