<?php 
class ConsumersModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de usuarios
    public function full_listing()
    {
        return $this->db
        ->from('users')
        ->select('id_user, name, last_name, type_of_access, email, name_country')
        ->join('countrys', 'countrys.id_country = users.country', 'left')
        ->get()
        ->result_array();
    }

    # Informacion del usuario
    public function information_user($id)
    {
        return $this->db->where('id_user', $id)->get('users')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        # Eliminar el password de confirmacion
        unset($data['confirm_password']);
        $data['status'] = 0;
        $data['ip']     = '';
        # Cifrar la clave de seguridad
        $password = $data['password'];
        $this->load->library('encrypt');
        $data['password'] = $this->encrypt->encode($data['password']);
        $this->db->insert('users', $data);
        # Enviar al correo del nuevo usuario los datos de acceso al sistemas
        $this->load->library('email');
        $this->email->from('soportetic@pewx.co', 'Pwex');
        $this->email->to($this->input->post('email'));
        $message = 'Datos de Acceso Pwex | Correo electrónico '. $data['email'] .' | Clave de acceso '.$password;
        $this->email->subject('Datos de acceso a Pwex');
        $this->email->message($message);
        $this->email->send();
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        # Eliminar el password de confirmacion
        unset($data['confirm_password']);
        # Cifrar la clave de seguridad
        $password = $data['password'];
        $this->load->library('encrypt');
        $data['password'] = $this->encrypt->encode($data['password']);
        $this->db->where('id_user', $id)->update('users', $data);
        # Enviar al correo del nuevo usuario los datos de acceso al sistemas
        $this->load->library('email');
        $this->email->from('soportetic@pewx.co', 'Pwex');
        $this->email->to($data['email']);
        $message = 'Su información a sido actualizada, datos de Acceso Pwex | Correo electrónico '. $data['email'] .' | Clave de acceso '.$password;
        $this->email->subject('Datos actualizado, acceso a Pwex');
        $this->email->message($message);
        $this->email->send();
    }

    # Eliminar usuario
    public function delete($id)
    {
        $this->db->where('id_user', $id)->delete('users');
    }

}