<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HomePageProvider extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }

    public function send_confirmation_requirements($lang = NULL, $email = NULL)
    {
    	$this->load->library('email');
        $this->email->from('product.development@pwex.co', 'Pwex');
		$this->email->to($email);
    	if ($lang == 'es') {
	        $this->email->subject('Hemos recibido tu información');
	        $this->email->message('
	        	<p><img style="display: block; margin-left: auto; margin-right: auto; width: 100%;" src="'.base_url("assets/dist/img/email/confirmacion-envio-de-informacion-productos-encabezado.jpg").'" /></p>
				<p style="font-family: candara; font-size: 38px; text-align: center; margin-bottom: -20px;">Ya estas un paso m&aacute;s cerca del creciente <strong>mercado</strong> del continente <strong>Americano.&nbsp;</strong>En los pr&oacute;ximos d&iacute;as te estaremos contactando.</p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">&iquest;Tienes alguna pregunta?</p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Escribenos a: <a href="mailto:product.development@pwex.co">product.development@pwex.co</a></p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">O llamanos a:&nbsp;210-828-5555&nbsp;</p>
				<p style="font-family: candara; font-size: 24px; text-align: right;"><strong>El equipo de</strong>&nbsp;<img style="vertical-align: middle; height: 35px;" src="'.base_url("assets/dist/img/pwex-email.png").'" /></p>
	        	<p><img src="http://pwex.org/platform/assets/dist/img/email/barra-inf.png" style="float: right;" /></p>
	        ');
    	} else {
    		$this->email->subject('We have received your information');
	        $this->email->message('
	        	<p><img style="display: block; margin-left: auto; margin-right: auto; width: 100%;" src="'.base_url("assets/dist/img/email/confirmacion-envio-de-informacion-productos-encabezado.jpg").'" /></p>
				<p style="font-family: candara; font-size: 38px; text-align: center; margin-bottom: -20px;">You are already one step closer to the growing market of the <strong>American continent.</strong> In the coming days we will be contacting you.</p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Do you have any question?</p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Write to: <a href="mailto:product.development@pwex.co">product.development@pwex.co</a></p>
				<p style="font-family: candara; font-size: 24px; margin-bottom: -20px !important; text-align: right;">Or call us: 210-828-5555&nbsp;</p>
				<p style="font-family: candara; font-size: 24px; text-align: right;"><strong>The</strong> <img style="vertical-align: middle; height: 35px;" src="'.base_url("assets/dist/img/pwex-email.png").'" /> <strong>Team</strong></p>
	        	<p><img src="http://pwex.org/platform/assets/dist/img/email/barra-inf.png" style="float: right;" /></p>
	        ');
    	}
        $this->email->send();
        if ($lang == 'es') {
	        redirect('http://pwex.org/?lang=es');
        } else {
	        redirect('http://pwex.org/');
        }
    }

}
