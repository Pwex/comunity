<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Managerauth {

	protected $CI;

        // We'll use a constructor, as you can't directly call a function
        // from a property definition.
        public function __construct()
        {
            // Assign the CodeIgniter super-object
            $this->CI =& get_instance();
        }

    # Validar si la sesion de usuario esta abierta
    public function  validate_session()
    {
    	# Cargar la libreria de sesion y model de base de datos
    	$this->CI->load->library('session');
    	$this->CI->load->model('AuthUserModel', 'auth', TRUE);
    	
    	# Validar que existe una sesion abierta
    	if (empty($this->CI->session->userdata('agent')) or is_null($this->CI->session->userdata('agent'))) {
    		show_404();
    	}
    }

    # Validacion de acceso de usuarios
    public function validation($data)
    {
    	# Carga del modelo y librerias
    	$this->CI->load->model('AuthUserModel', 'auth', TRUE);
    	# Verificacion a la base de datos | Comprobar los datos enviados
			switch ($this->CI->auth->validation($data)) {
				case 0: 
					redirect('access/denied');
				break;
				case 1:
					# Verificar si no existe una sesion abierta previamente Y si existe cancelamos el paso y se envia una notificacion al usuario
			    	if ($this->CI->auth->validate_session_other_device($data['email']) == FALSE) {
			    		# Cargar Libreria Manager Auth | User Agent
						$this->CI->load->library('session');
						# Eliminar sesion
						$this->CI->session->sess_destroy();
						# Enviar notificacion de error al usuario
						$this->CI->auth->send_error_access_other_user($data['email'], 'error_access_other_user', $this->CI->input->ip_address());
						# Redireccionar al login
						redirect('exit_session_other_device');
			    	}
					# Librerias
					$this->CI->load->library(array('user_agent'));
					# Envio de datos a la libreria de verificacion de autentificacion
						$app['agent'] 	= array(
							'browser' 			=> $this->CI->agent->browser(),
							'is_browser' 		=> $this->CI->agent->is_browser(),
							'platform' 			=> $this->CI->agent->platform(),
							'browser_version' 	=> $this->CI->agent->version(),
							'mobile' 			=> $this->CI->agent->mobile(),
							'is_mobile' 		=> $this->CI->agent->is_mobile(),
							'robot' 			=> $this->CI->agent->robot(),
							'is_robot' 			=> $this->CI->agent->is_robot(),
							'referrer' 			=> $this->CI->agent->referrer(),
							'is_referral' 		=> $this->CI->agent->is_referral(),
							'agent_string' 		=> $this->CI->agent->agent_string(),
							'accept_lang' 		=> $this->CI->agent->accept_lang(),
							'languages' 		=> $this->CI->agent->languages(),
							'accept_charset' 	=> $this->CI->agent->accept_charset(),
							'charsets' 			=> $this->CI->agent->charsets()
						);
						# Busqueda de los datos del usuario que inicia sesion
						$data_user = $this->CI->auth->search_id_user($data['email']);
						$app['user'] = array(
							'ip'			=> $this->CI->input->ip_address(),
							'id_user'		=> $data_user[0]['id_user'],
							'name'			=> $data_user[0]['name'],
							'last_name'		=> $data_user[0]['last_name'],
							'email'			=> $data_user[0]['email'],
							'country'		=> $data_user[0]['country'],
							'type_of_access'=> $data_user[0]['type_of_access']
						);
						# Geolocalización del usuario
						$app['geolocation'] = $this->geolocation();
						# Cambiar el estutus del usuario
						$this->CI->auth->change_status_session_user($app['user']['id_user'], $app['user']['ip'], TRUE);
						# Seguimiento de inicio de sesion de usuarios
						$log = array(
							'user_log' 			=> $app['user']['id_user'],
							'ip_device' 		=> $app['user']['ip'],
							'browser' 			=> $app['agent']['browser'],
							'platform' 			=> $app['agent']['platform'],
							'mobile' 			=> $app['agent']['mobile'],
							'city' 				=> $app['geolocation']['geoplugin_city'],
							'country_name' 		=> $app['geolocation']['geoplugin_countryName'],
							'date_of_admission' => date('Y-m-d H:i:s')
						);
						$app['user']['log'] = $this->CI->auth->log_entry($log);
						return $app;
				break;
			}
    }

    # Información Geografica
    private function geolocation()
    {
    	# Ip del visitante
		if ($_SERVER['REMOTE_ADDR']=='::1') $ipuser= ''; else $ipuser= $_SERVER['REMOTE_ADDR'];
		$geoPlugin_array = unserialize( file_get_contents('http://www.geoplugin.net/php.gp?ip='.$ipuser) );
		unset($geoPlugin_array['geoplugin_credit']);
		return $geoPlugin_array;
    }

}