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
				<div style="margin: 0 auto; width: 100%; text-align: center;">&nbsp;<img src="https://pwex.org/platform/assets/dist/img/email/mailing-matriz-1-header-spanish.jpg" style="margin-bottom: -3px; width:100%" /></div>
				<br />
				<p style="font-family: century gothic; font-size: 38px; text-align: center;">Para esto, ingresa al <br /><a href="https://pwex.org/requirements/?lang=es&email='.$this->input->post("email").'&company_name='.$this->input->post("company_name").'" style="text-decoration: none; background-color: #2196f3; color: #fff; padding: 6px 0; border-radius: 30px; margin-top: 7px !important; display: inline-block; width: 100%;">Siguiente Link</a><br /> Aqu&iacute; podras contarnos todas las caracter&iacute;sticas diferenciales de tus productos.</p>
				<br >
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">&iquest;Tienes alguna pregunta?</p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Escribenos a: <a href="mailto:product.development@pwex.org">product.development@pwex.org</a></p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">O llamanos a:&nbsp;1-786-485-0585&nbsp;</p>
				<p style="font-family: candara; font-size: 24px; text-align: right;"><strong>El equipo de</strong>&nbsp;<img style="vertical-align: middle; height: 35px;" src="'.base_url("assets/dist/img/pwex-email.png").'" /></p>
	        	<p><img src="https://pwex.org/platform/assets/dist/img/email/barra-inf.png" style="float: right; width:100%" /></p>
			';

/*
			$subject = '<html><head><title>correo</title></head><body><img src="https://pwex.org/platform/assets/dist/img/email/mailing-matriz-1-header-spanish.jpg" />gracias por contactarnos</body></<html>';
*/

		}elseif ($this->input->post('language') == 'Ingles') {
			$subject = '
				<div style="margin: 0 auto; width: 100%; text-align: center;">&nbsp;<img style="margin-bottom: -3px; width:100%" src="https://pwex.org/platform/assets/dist/img/email/mailing-matriz-1-header-inlges.jpg" /></div>
				<br />
				<p style="font-family: century gothic; font-size: 38px; text-align: center;">Please, go to the <br /><a href="https://pwex.org/requirements/?email='.$this->input->post("email").'&company_name='.$this->input->post("company_name").'" style="text-decoration: none; background-color: #2196f3; color: #fff; padding: 6px 0; border-radius: 30px; margin-top: 7px !important; display: inline-block; width: 100%;">following Link</a> And complete all the information related to the products and their differential characteristics.</p>
				<br />
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Do you have any question?</p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Write to: <a href="mailto:product.development@pwex.org">product.development@pwex.org</a></p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Or call us: 1 786-485-0585&nbsp;</p>
				<p style="font-family: candara; font-size: 24px; text-align: right;"><strong>The</strong> <img style="vertical-align: middle; height: 35px;" src="'.base_url("assets/dist/img/pwex-email.png").'" /> <strong>Team</strong></p>
	        	<p><img src="https://pwex.org/platform/assets/dist/img/email/barra-inf.png" style="float: right; width:100%" /></p>
			';
		}
        # Carga de la libreria de envio de email
        $this->load->library('email');
		$this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		//$this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', $last_update).' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
        $this->email->from('product.development@pwex.org', 'Laura de Pwex');
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
		if ($this->input->post('category') !='Aparatologia') {
			if ($this->input->post('language') == 'Español') {
				$subject = '
					<p><img style="display: block; margin-left: auto; margin-right: auto; width: 100%;" src="'.base_url("assets/dist/img/email/mail-solicitud-muestras-encabezado.jpg").'" /></p>
					<br /><br />
					<p style="font-family: century gothic; font-size: 38px; text-align: center;">Nuestro equipo de expertos considera que el producto <strong>'.ucfirst($this->input->post("product_name")).'</strong> cuenta con todas las caracter&iacute;sticas requeridas para el exigente mercado del continente Americano.</p>
					<br />
					<p style="text-align: center"><img style="margin-top: -15px; display: block; margin-left: auto; margin-right: auto; width: 100%;" src="'.base_url("assets/dist/img/email/mailing1-solicitud-muestras-inferior.jpg").'" /></p>
					<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">&iquest;Tienes alguna pregunta?</p>
					<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Escribenos a: <a href="mailto:product.development@pwex.org">product.development@pwex.org</a></p>
					<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">O llamanos a:&nbsp;1 786-485-0585&nbsp;</p>
					<p style="font-family: candara; font-size: 24px; text-align: right;"><strong>El equipo de</strong>&nbsp;<img style="vertical-align: middle; height: 35px;" src="'.base_url("assets/dist/img/pwex-email.png").'" /></p>
		        	<p><img src="https://pwex.org/platform/assets/dist/img/email/barra-inf.png" style="float: right; width:100%" /></p>
				';
			}elseif ($this->input->post('language') == 'Ingles') {
				$subject = '
					<p><img style="display: block; margin-left: auto; margin-right: auto; width: 100%;" src="'.base_url("assets/dist/img/email/mail-solicitud-muestras-encabezado.jpg").'" /></p>
					<br /><br />
					<p style="font-family: century gothic; font-size: 38px; text-align: center;">Our team of experts believes that the product <strong>'.$this->input->post("product_name").'</strong> has all the characteristics required for the demanding market of the American continent.</p>
					<br />
					<p style="text-align: center"><img style="margin-top: -15px; display: block; margin-left: auto; margin-right: auto; width: 100%;" src="'.base_url("assets/dist/img/email/mailing1-solicitud-muestras-inferior-ingles.jpg").'" /></p>
					<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Do you have any question?</p>
					<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Write to: <a href="mailto:product.development@pwex.org">product.development@pwex.org</a></p>
					<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Or call us: 1 786-485-0585&nbsp;</p>
					<p style="font-family: candara; font-size: 24px; text-align: right;"><strong>The</strong> <img style="vertical-align: middle; height: 35px;" src="'.base_url("assets/dist/img/pwex-email.png").'" /> <strong>Team</strong></p>
		        	<p><img src="https://pwex.org/platform/assets/dist/img/email/barra-inf.png" style="float: right; width:100%" /></p>
				';
			}
		} else {
			if ($this->input->post('language') == 'Español') {
				$subject = '
					<p><img style="display: block; margin-left: auto; margin-right: auto; width: 100%;" src="'.base_url("assets/dist/img/email/mail-solicitud-muestras-encabezado.jpg").'" /></p>
					<br /><br />
					<p style="font-family: century gothic; font-size: 38px; text-align: center;"">Nuestro equipo de expertos considera que el producto <strong>'.ucfirst($this->input->post("product_name")).'</strong> cuenta con todas las caracter&iacute;sticas requeridas para el exigente mercado del continente Americano.</p>
					<br />
					<p style="text-align: center"><img style="margin-top: -15px; display: block; margin-left: auto; margin-right: auto; width: 100%;" src="'.base_url("assets/dist/img/email/mailing-matriz-1-header-spanish-aparatologia.jpg").'" /></p>
					<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">&iquest;Tienes alguna pregunta?</p>
					<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Escribenos a: <a href="mailto:product.development@pwex.org">product.development@pwex.org</a></p>
					<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">O llamanos a:&nbsp;1 786-485-0585&nbsp;</p>
					<p style="font-family: candara; font-size: 24px; text-align: right;"><strong>El equipo de</strong>&nbsp;<img style="vertical-align: middle; height: 35px;" src="'.base_url("assets/dist/img/pwex-email.png").'" /></p>
		        	<p><img src="https://pwex.org/platform/assets/dist/img/email/barra-inf.png" style="float: right; width:100%" /></p>
				';
			}elseif ($this->input->post('language') == 'Ingles') {
				$subject = '
					<p><img style="display: block; margin-left: auto; margin-right: auto; width: 100%;" src="'.base_url("assets/dist/img/email/mail-solicitud-muestras-encabezado.jpg").'" /></p>
					<br /><br />
					<p style="font-family: century gothic; font-size: 38px; text-align: center;">Our team of experts believes that the product <strong>'.$this->input->post("product_name").'</strong> has all the characteristics required for the demanding market of the American continent.</p>
					<br />
					<p style="text-align: center"><img style="margin-top: -15px; display: block; margin-left: auto; margin-right: auto; width: 100%;" src="'.base_url("assets/dist/img/email/mailing-matriz-1-header-ingles-aparatologia.jpg").'" /></p>
					<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Do you have any question?</p>
					<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Write to: <a href="mailto:product.development@pwex.org">product.development@pwex.org</a></p>
					<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Or call us: 1 786-485-0585&nbsp;</p>
					<p style="font-family: candara; font-size: 24px; text-align: right;"><strong>The</strong> <img style="vertical-align: middle; height: 35px;" src="'.base_url("assets/dist/img/pwex-email.png").'" /> <strong>Team</strong></p>
		        	<p><img src="https://pwex.org/platform/assets/dist/img/email/barra-inf.png" style="float: right; width:100%" /></p>
				';
			}
		}
        # Carga de la libreria de envio de email
        $this->load->library('email');
        $this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		//$this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', $last_update).' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
        $this->email->from('product.development@pwex.org', 'Laura de Pwex');
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

	public function sending_email_rejected_provider()
	{
		# Carga de la libreria de envio de email
        $this->load->library('email');
        $this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		//$this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', $last_update).' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
        $this->email->from('product.development@pwex.org', 'Laura de Pwex');
		if ($this->input->post('language') == 'Español') {
        	$this->email->subject('¡Gracias por tu interés en PWEX!');
			$subject = '
				<p><img style="display: block; margin-left: auto; margin-right: auto;" src="'.base_url("assets/dist/img/email/mail-no-matriz-spanish.jpg").'" alt="" width="100%" /></p>
				<p>&nbsp;</p>
				<p style="font-family: candara; font-size: 24px;">Hemos revisado la informaci&oacute;n que suministraste en el formulario. Consideramos que las categor&iacute;as con las que cuenta tu empresa, no se incluyen en nuestro mercado objetivo.</p>
				<p style="font-family: candara; font-size: 24px;">En caso de que pr&oacute;ximamente cuentes con nuevas categor&iacute;as estaremos atentos. No dudes en escribirnos.</p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">&iquest;Tienes alguna pregunta?</p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Escribenos a: <a href="mailto:product.development@pwex.org">product.development@pwex.org</a></p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">O llamanos a:&nbsp;1 786-485-0585&nbsp;</p>
				<p style="font-family: candara; font-size: 24px; text-align: right;"><strong>El equipo de</strong>&nbsp;<img style="vertical-align: middle; height: 35px;" src="'.base_url("assets/dist/img/pwex-email.png").'" /></p>
	        	<p><img src="https://pwex.org/platform/assets/dist/img/email/barra-inf.png" style="float: right; width:100%" /></p>
			';
		}elseif ($this->input->post('language') == 'Ingles') {
        	$this->email->subject('Thank you for your interest in PWEX!');
			$subject = '
				<p><img style="display: block; margin-left: auto; margin-right: auto; width:100%" src="'.base_url("assets/dist/img/email/mail-no-matriz-ingles.jpg").'" alt="" /></p>
				<p style="font-family: candara; font-size: 24px;">For the information provided in the form, we consider that the product categories of your company are not included in our target market.</p>
				<p style="font-family: candara; font-size: 24px;">In case you include new categories soon we will be attentive, do not hesitate to write us.</p>
				<p>&nbsp;</p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Do you have any question?</p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Write to: <a href="mailto:product.development@pwex.org">product.development@pwex.org</a></p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Or call us: 1 786-485-0585&nbsp;</p>
				<p style="font-family: candara; font-size: 24px; text-align: right;"><strong>The</strong> <img style="vertical-align: middle; height: 35px;" src="'.base_url("assets/dist/img/pwex-email.png").'" /> <strong>Team</strong></p>
	        	<p><img src="https://pwex.org/platform/assets/dist/img/email/barra-inf.png" style="float: right; width:100%" /></p>
			';
		}
        $this->email->to($this->input->post('email'));
        $this->email->message($subject);
        $this->email->send();
        $this->load->model('InnovationModel', 'innovation', TRUE);
        $this->innovation->sending_email_rejected_provider($this->input->post('id'));
	}

	public function shipping_email_supplier_rejection_matrix()
	{
		# Carga de la libreria de envio de email
        $this->load->library('email');
        $this->output->set_header('HTTP/1.0 200 OK');
		$this->output->set_header('HTTP/1.1 200 OK');
		//$this->output->set_header('Last-Modified: '.gmdate('D, d M Y H:i:s', $last_update).' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
		$this->output->set_header('Cache-Control: post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
        $this->email->from('product.development@pwex.org', 'Laura de Pwex');
		if ($this->input->post('language') == 'Español') {
        	$this->email->subject('¡Agradecemos tu interés en PWEX!');
			$subject = '
				<p><img style="display: block; margin-left: auto; margin-right: auto;" src="'.base_url("assets/dist/img/email/mail-no-ingreso1.jpg").'" alt="" width="100%" /></p>
				<p>&nbsp;</p>
				<p style="font-family: candara; font-size: 24px;">Hemos revisado la información que suministraste en la matriz de requerimientos. Consideramos que las características con las que cuenta tu producto no suplen los requerimientos de nuestra plataforma, por lo tanto te enviaremos un correo indicándote que puntos necesariamente se deben completar.</p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">&iquest;Tienes alguna pregunta?</p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Escribenos a: <a href="mailto:product.development@pwex.org">product.development@pwex.org</a></p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">O llamanos a:&nbsp;1 786-485-0585&nbsp;</p>
				<p style="font-family: candara; font-size: 24px; text-align: right;"><strong>El equipo de</strong>&nbsp;<img style="vertical-align: middle; height: 35px;" src="'.base_url("assets/dist/img/pwex-email.png").'" /></p>
				<p><img style="float: right; width: 100%;" src="https://pwex.org/platform/assets/dist/img/email/barra-inf.png" /></p>
			';
		}elseif ($this->input->post('language') == 'Ingles') {
        	$this->email->subject('We appreciate your interest in PWEX!');
			$subject = '
				<p><img style="display: block; margin-left: auto; margin-right: auto;" src="'.base_url("assets/dist/img/email/mail-no-ingreso-ingles.jpg").'" alt="" width="100%" /></p>
				<p>&nbsp;</p>
				<p style="font-family: candara; font-size: 24px;">We have reviewed the information that you provided about your products and their characteristics. From the given description they do not meet the requirements of our platform, therefore we will send you an email indicating which points must necessarily be completed.</p>
				<p>&nbsp;</p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Do you have any question?</p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Write to: <a href="mailto:product.development@pwex.org">product.development@pwex.org</a></p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Or call us: 1 786-485-0585&nbsp;</p>
				<p style="font-family: candara; font-size: 24px; text-align: right;"><strong>The</strong> <img style="vertical-align: middle; height: 35px;" src="'.base_url("assets/dist/img/pwex-email.png").'" /> <strong>Team</strong></p>
	        	<p><img src="https://pwex.org/platform/assets/dist/img/email/barra-inf.png" style="float: right; width:100%" /></p>
			';
		}
        $this->email->to($this->input->post('email'));
        $this->email->message($subject);
        $this->email->send();
        $this->load->model('InnovationModel', 'innovation', TRUE);
        $this->innovation->shipping_email_supplier_rejection_matrix($this->input->post('id'));
	}

	public function calendar_partners()
	{
		$this->load->model('ActivitiesModel', 'activity', TRUE);
		# Notificaciones
		$data['number_of_pending_notifications'] = $this->activity->number_of_pending_notifications($this->session->userdata['user']['id_user']);
		$data['notification_details']	 		 = $this->activity->notification_details($this->session->userdata['user']['id_user']);
		# Opciones items del menu principal del contenido
		$data['option_nav'] = array(
			'box_title' => 'Agenda de proveedores',
			'box_span' 	=> ''
		);
		$data['option_nav_item'] = array(
			'agenda de proveedores'	=> array(
				'icon' 		=> 'fa fa-ellipsis-v',
				'url' 		=> 'innovation-calendar-partners',
				'class' 	=> NULL
			), 
			'listado'=> array(
				'icon' 		=> '',
				'url' 		=> '',
				'class' 	=> 'active'
			)
		);
		$this->load->model('InnovationModel', 'innovation', TRUE);
		$data['calendar_listing'] = $this->innovation->calendar_partners();
		# Renderizando la vista | plantilla
		$this->load->view('template/header', $data);
		$this->load->view('innovation/calendar_partners');
		$this->load->view('template/footer');
	}

	public function download_calendar_partners()
	{
		$this->load->model('InnovationModel', 'innovation', TRUE);
		$this->load->library('calendar_partners');
        return $this->calendar_partners->to_excel($this->innovation->calendar_partners(), 'Agendamiento');
	}

	public function confirm_appointment_provider()
	{
		$this->load->model('InnovationModel', 'innovation', TRUE);
		return $this->innovation->confirm_appointment_provider($this->input->post('id'));
	}

}