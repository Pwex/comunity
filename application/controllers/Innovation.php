<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Innovation extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->library(array('managerauth'));
        $this->managerauth->validate_session();
    }

    # Listado completo proveedores
	public function excel_providers()
	{
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Registro de Proveedores',
			'box_span' 	=> 'Listado'
		);
		$data['option_nav_item'] = array(
			'registro de proveedores'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'excel-providers',
				'class' 	=> NULL
			), 
			'listado'=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$this->load->model('InnovationModel', 'innovation', TRUE);
		$data['registered_suppliers'] = $this->innovation->registered_suppliers();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('innovation/excel_providers');
		$this->load->view('template/footer');
	}

	public function donwload()
	{
		$this->load->model('InnovationModel', 'innovation', TRUE);
		$this->load->library('export_excel');
        $this->export_excel->to_excel($this->innovation->list_page_provider(), 'proveedores');
	}

	# Envio de informacion al correo del proveedor
	public function sending_information_to_suppliers()
	{
		if ($this->input->post('language') == 'Español') {
			$subject = '
				<div style="margin: 0 auto; background: #1d1d1b; width: 100%; text-align: center;">&nbsp;<img src="http://pwex.org/platform/assets/dist/img/email/mailing-matriz-1-header-spanish.jpg" style="margin-bottom: -3px;" /></div>
				<p style="font-family: century gothic; font-size: 23px; text-align: center;">Para esto, ingresa al siguiente link <a href="http://pwex.org/requirements/?lang=es&email='.$this->input->post("email").'&company_name='.$this->input->post("company_name").'">www.pwex.org</a>.<br /> Aqu&iacute; podras contarnos todas las caracter&iacute;sticas diferenciales que cuentan tus productos.</p>
				<p style="font-family: century gothic; font-size: 20px;"><strong>Tienes alguna duda</strong></p>
				<p style="font-family: century gothic; font-size: 20px;">Escr&iacute;benos a <a href="mailto:product.development@pwex.co">product.development@pwex.co</a></p>
				<p style="font-family: century gothic; font-size: 20px;">O ll&aacute;manos a + xx xx xx xx xx</p>
				<h4 style="font-family: century gothic; font-size: 20px;">ATT. EL EQUIPO<img src="http://pwex.org/platform/assets/dist/img/email/logo.png" width="60" height="23" align="center" /></h4>
			';
		}elseif ($this->input->post('language') == 'Ingles') {
			$subject = '
				<div style="margin: 0 auto; background: #1d1d1b; width: 100%; text-align: center;">&nbsp;<img style="margin-bottom: -3px;" src="http://pwex.org/platform/assets/dist/img/email/mailing-matriz-1-header-inlges.jpg" /></div>
				<p style="font-family: century gothic; font-size: 23px; text-align: center;">Please, go to the following link <a href="http://pwex.org/requirements/?email='.$this->input->post("email").'&company_name='.$this->input->post("company_name").'">www.pwex.org</a>. and complete all the information related to the products and their differential characteristics.</p>
				<p style="font-family: century gothic; font-size: 20px;"><strong>Do you have any doubt</strong></p>
				<p style="font-family: century gothic; font-size: 20px;">Write us to&nbsp;<a href="mailto:product.development@pwex.co">product.development@pwex.co</a></p>
				<p style="font-family: century gothic; font-size: 20px;">Or call us to + xx xx xx xx xx</p>
				<p><strong>The <img src="http://pwex.org/platform/assets/dist/img/email/logo.png" width="60" height="23" align="center" /> Team</strong></p>
				<h4 style="font-family: century gothic; font-size: 20px;"></h4>
			';
		}
        # Carga de la libreria de envio de email
        $this->load->library('email');
        $this->email->from('product.development@pwex.co', 'Pwex');
        $this->email->to($this->input->post('email'));
        if ($this->input->post('language') == 'Español') {
        	$this->email->subject('El Mejor Producto Integrado con los Mejores');
        } elseif ($this->input->post('language') == 'Ingles') {
        	$this->email->subject('The Best Integrated Product with the Best');
        }
        $this->email->message($subject);
        $this->email->send();
        $this->load->model('InnovationModel', 'innovation', TRUE);
        $this->innovation->email_sending_status($this->input->post('id'));
	}

	# Envio de informacion al proveedor de la aprobacion de la solicitud de productos
	public function product_order_approval()
	{
		if ($this->input->post('language') == 'Español') {
			$subject = '
			<img style="margin: 0; margin-bottom: -20px;" src="'.base_url("assets/dist/img/email/mail-solicitud-muestras-encabezado.jpg").'" />
			<div style="background-color: #1d1d1b; color: #fff; padding: 10px; width: 830px; margin-top: -3px; margin-bottom: -13px;">
			<p style="text-align: center; font-family: century gothic; font-size: 20px;">Nuestro equipo de expertos considera que el producto '.$this->input->post("product_name").' cuenta con todas las caracter&iacute;sticas requeridas para el exigente mercado del continente Americano.</p>
			</div>
			<p><img style="margin-top: -15px;" src="'.base_url("assets/dist/img/email/mailing1-solicitud-muestras-inferior.jpg").'" /></p>
			';
		}elseif ($this->input->post('language') == 'Ingles') {
			$subject = '
				<p style="font-family: century gothic; font-size: 18px;">Our team of experts believes that the product '.$this->input->post("product_name").' has all the characteristics required for the demanding market of the American continent.</p>
				<p style="font-family: century gothic; font-size: 18px;">To get to know the product we require you to send us 15 samples in commercial presentation. These samples will be evaluated by our laboratory staff, ensuring that your product is the best, to be integrated with the best.</p>
				<p style="font-family: century gothic; font-size: 18px;"><strong>Shipping Address:</strong> 1001 Brickell Bay Drive, Suite 130 Miami, FL 33131</p>
				<p style="font-family: century gothic; font-size: 18px;">The <strong>PWEX</strong> Team</p>
			';
		}
        # Carga de la libreria de envio de email
        $this->load->library('email');
        $this->email->from('product.development@pwex.co', 'Pwex');
        $this->email->to($this->input->post('email'));
        if ($this->input->post('language') == 'Español') {
        	$this->email->subject('Conociendo el Producto');
        } elseif ($this->input->post('language') == 'Ingles') {
        	$this->email->subject('Getting to know the product');
        }
        $this->email->message($subject);
        $this->email->send();
        $this->load->model('InnovationModel', 'innovation', TRUE);
        $this->innovation->email_sending_status($this->input->post('id'));
	}

	# Listado matriz de requerimientos de los proveedores
	public function requirements_matrix()
	{
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Matriz de Requerimientos',
			'box_span' 	=> 'Listado'
		);
		$data['option_nav_item'] = array(
			'matirz del requerimientos'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'requirements-matrix',
				'class' 	=> NULL
			), 
			'listado'=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$this->load->model('InnovationModel', 'innovation', TRUE);
		$data['requirements_matrix'] = $this->innovation->requirements_matrix();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('innovation/requirements_matrix');
		$this->load->view('template/footer');
	}

	public function donwload_requirements()
	{
		$this->load->model('InnovationModel', 'innovation', TRUE);
		$this->load->library('export_excel_requirements_matrix');
        $this->export_excel_requirements_matrix->to_excel($this->innovation->list_requirements_matrix(), 'Matriz-Requerimientos');
	}

	public function view_requirements()
	{
		$this->load->model('InnovationModel', 'innovation', TRUE);
		$this->load->library('table_requirements_matrix');
        return $this->table_requirements_matrix->to_excel($this->innovation->view_requirements($this->input->post('id')), 'Matriz-Requerimientos');
	}

}