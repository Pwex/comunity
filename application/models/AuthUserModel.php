<?php 
class AuthUserModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Validar el acceso de los usuarios
    public function validation($data)
    {
    	$this->load->library('encrypt');
		$user = $this->db->select('email, password')->where('email', $data['email'])->get('users')->result_array();
			if (count($user) > 0) {
				$password_decode = $this->encrypt->decode($user[0]['password']);
					if ($password_decode == $data['password']) {
						return 1;
					} else {
						return 0; # Usuario o clave de acceso incorrectos
					}
			} else {
				return 0; # Usuario o clave de acceso incorrectos
			}
    }

    # Buscar el id de usuario que inicia sesion
    public function search_id_user($email)
    {
    	return $this->db->select('id_user, name, last_name, email, country, type_of_access')->where('email', $email)->get('users')->result_array();
    }

    # Cambiar el estatus de sesion del usuario
    public function change_status_session_user($user, $ip, $status)
    {
    	if ($status) {
    		$this->db->set(array('ip' => $ip, 'status' => $status))->where('id_user', $user)->update('users');
    	} else {
    		$this->db->set(array('ip' => '', 'status' => $status))->where('id_user', $user)->update('users');
    	}
    }

    # Seguimiento de inicio de sesion de usuarios
    public function log_entry($insert)
    {
    	$this->db->insert('log', $insert);
    	return $this->db->insert_id();
    }

    # Cerrar el seguimiento del usuario
    public function log_exit($user)
    {
    	$this->db->set('date_exit', date('Y-m-d H:i:s'))->where('log', $user)->update('log');
    	return TRUE;
    }

    # Verificar si el usuario no ha iniciado sesion en otro dispositivo de forma simultanea
    public function validate_session_other_device($user)
    {
    	if ($this->db->from('users')->where(array('email' => $user, 'status' => 0, 'ip' => ''))->count_all_results() > 0) {
    		return TRUE;
    	} else {
    		return FALSE;
    	}
    }

    # Enviar notificacion al usuario, porque otro usuario intento ingresar con su datos mientras este está en una sesion abierta previa
    public function send_error_access_other_user($user, $type_of_notification, $ip)
    {
    	# Buscar al usuario por el correo electronico para asocial la notificacion
    	$search = $this->db->select('id_user')->where('email', $user)->get('users')->result_array();

    	# Enviar notificacion al usuario
    	$data['user_notification'] 		= $search[0]['id_user'];
    	$data['type_of_notification'] 	= $type_of_notification;
    	$data['ip_error_access'] 		= $ip;
    	$data['date'] 					= date('Y-m-d H:i:s');
    	$data['status'] 				= 1;
    	return $this->db->insert('notifications', $data);
    }

    # Validar si existe el email para recuperar la clave de acceso
    public function validate_email_user_reset($email)
    {
        return $this->db->from('users')->where('email', $email)->count_all_results();
    }

    # Envio de la clave de seguridad get
    public function send_restore_key($user, $key)
    {
        $this->db->set('restore_key', $key)->where('email', $user)->update('users');
    }

    # Buscar el id del usuario y pasar a la url
    public function search_id_restore($user)
    {
        $result = $this->db->select('id_user')->where('email', $user)->get('users')->result_array();
        return $result[0]['id_user'];
    }

    # Validar la clave que se pasa por url
    public function validate_key_user($id, $key)
    {
        return $this->db->from('users')->where(array('id_user' => $id, 'restore_key' => $key))->count_all_results();
    }

    # Cambiar la clave del usuario
    public function change_password_restore($id, $key)
    {
        $this->db->set('password', $key)->where('id_user', $id)->update('users');
    }

    # Enviar notificacion de cambio de clave
    public function send_change_password_notifications($id, $type_of_notification, $ip)
    {
        # Enviar notificacion
        $data['user_notification']      = $id;
        $data['type_of_notification']   = $type_of_notification;
        $data['ip_error_access']        = $ip;
        $data['date']                   = date('Y-m-d H:i:s');
        $data['status']                 = 1;
        return $this->db->insert('notifications', $data);
    }
}