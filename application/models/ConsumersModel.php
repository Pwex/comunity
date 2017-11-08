<?php 
class ConsumersModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    # Listado completo de usuarios
    public function full_listing()
    {
        $this->db->from('ec_client cl');
        $this->db->select('cl.id_client, cl.name, cl.last_name, cl.status, cl.date_register');
            if ($this->session->userdata['user']['type_of_access'] == 'Coach') {
                $this->db->where('id_coach', $this->session->userdata['user']['id_user']);
            }
        return $this->db->get()->result_array();
    }
    # Informacion del usuario
    public function information_consumer($id)
    {
        return $this->db->where('id_client', $id)->get('ec_client')->result_array();
    }
    # Almacenar la informacion
    public function save($data)
    {
        # Asociar el Coach que esta creando al consumidor
        if ($this->session->userdata['user']['type_of_access'] == 'Coach') {
            $data['id_coach'] = $this->session->userdata['user']['id_user'];
        }
        # Formatear la fecha de nacimiento enviada
        if (isset($data['birth_date'])) {
            $data['birth_date'] = date('Y-m-d', strtotime($data['birth_date']));
        }
        # Tomar la fecha y hora del sistema
        $data['date_register'] = date('Y-m-d H:i:s');
        # Cifrar la clave de seguridad
        $this->load->helper('string');
        $this->load->library('encrypt');
        $password = random_string('alnum', 16);
        $data['password'] = $this->encrypt->encode($password);
        # Inserta la información en la base de datos
        $this->db->insert('ec_client', $data);
        # Tomar el id insertado
        $id_new_client = $this->db->insert_id();
        $key     = random_string('alnum', 16);
        $subject = '
            <h1 style="color: #7aa93c; font-family: verdana;font-weight: 100;font-size: 17px;"><strong>Hola como estas,</strong> '.$data['name'].' Bienvenido, Tu Coach ha creado tu cuenta en&nbsp;<span style="color:#2b2301;font-weight: bold;">Pwex Market</span> antes de continuar debes de confirmar tu correo electr&oacute;nico!</h1>
            <h2 style="color: #c2cdd0;font-size: x-large;font-weight: 100;margin: 20px 0 -5px 0;">Sigue las siguientes intrucciones:</h2>
            <p style="margin: 15px 0 -15px 0; font-family: verdana;font-size: larger;">
                Tus datos de acceso al eCommerce son los siguientes <strong>correo electrónico:</strong> '.$data["email"].', <strong>clave de acceso:</strong> '.$password.' 
            </p>
            <p style="margin: 15px 0 -15px 0; font-family: verdana;font-size: larger;">Este email ha sido envido desde Pwex Market. Para activar tu cuenta y difrutar de nuestros servicios solo tienes que hacer click sobre el siguiente enlace.&nbsp;</p>
            <p><strong>&nbsp;</strong> 
            <a href="http://pwex.co/confirm-create-account/'.$id_new_client.'/'.$key.'" style="font-size: 16px; font-family: verdana; text-decoration: none; padding: 10px 30px; background-color: #2196F3; color: #fff; display: block; width: 60px; text-align: center; border: 2px solid #2791e6; border-radius: 6px;">Activar</a></p>
        ';
        
        $this->db->set('key_register', $key)->where('id_client', $id_new_client)->update('ec_client');

        # Carga de la libreria de envio de email
        $this->load->library('email');
        $this->email->from('info@pwex.co', 'Pwex Market');
        $this->email->to($this->input->post('email'));
        $this->email->subject('Confirmar cuenta de acceso pwex market');
        $this->email->message($subject);
        $this->email->send();
    }
    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_client', $id)->update('ec_client', $data);
    }
    # Eliminar usuario
    public function delete($id)
    {
        $this->db->where('id_client', $id)->delete('ec_client');
    }
    # Almacenar la informacion de la encuesta
    public function save_poll($data, $id)
    {
       $data['id_consumer'] = $id;
        $this->db->insert('polls', $data);
    }

    # Informacion del sexo del consumidor para las mediciones
    public function type_of_sex($id)
    {
        return $this->db->select('sex')->where('id_client', $id)->get('ec_client')->result_array();
    }
}