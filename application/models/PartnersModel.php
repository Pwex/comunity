<?php 
class PartnersModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo 
    public function full_listing()
    {
        return $this->db
        ->from('partners p')
        ->select('p.id_partner, p.name_partner, p.address_partner, p.phone_partner, p.web_partner, p.web_partner, p.email_partner, p.name_contact_partner,p.enabled_partner,p.loan_quota_partner, p.term_days_partner, p.email_sending_status, d.document_type, c.name_country, c.language, ci.name_city')
        ->join('document_types d', 'd.id_document_type = p.id_document_type', 'left')
        ->join('countrys c', 'c.id_country = p.id_country', 'left')
        ->join('cities ci', 'ci.id_city = p.id_city', 'left')
        ->get()
        ->result_array();
    }

    # Informacion del usuario
    public function information_partner($id)
    {
        return $this->db->where('id_partner', $id)->get('partners')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $this->load->library('encrypt');
        $this->db->insert('partners', $data);
        $user['name']              = $data['name_contact_partner'];
        $user['last_name']         = '';
        $user['email']             = $data['email_partner'];
        $user['country']           = $data['id_country'];
        $user['password']          = $this->encrypt->encode($data['email_partner']);
        $user['type_of_access']    = 'Proveedor';
        $user['ip']                = '';
        $user['status']            = 1;
        $user['restore_key']       = '';
        $this->db->insert('users', $user);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_partner', $id)->update('partners', $data);
    }

    # Eliminar usuario
    public function delete($id)
    {
        $this->db->where('id_partner', $id)->delete('partners');
    }

    # Informacion de acceso del proveedor usuario y clave
    public function get_data_user_provider($email)
    {
        return $this->db->select('name, email, password')->where(array('email' => $email, 'type_of_access' => 'Proveedor'))->get('users')->result_array();
    }

    # Cambiar el estatus del email enviado al proveedor con el usuario y clave
    public function change_email_sending_status($email)
    {
        return $this->db->set('email_sending_status', 1)->where('email_partner', $email)->update('partners');
    }

    # Nombre del proveedor
    public function get_name_partner()
    {
        return $this->db->select('name_partner')->where('email_partner', $this->session->userdata['user']['email'])->get('partners')->result_array();
    }

    # Listado de productos por proveedor
    public function list_of_products_supplier()
    {
        $id = $this->db->select('id_partner')->where('email_partner', $this->session->userdata['user']['email'])->get('partners')->result_array();
        return $this->db->select('name_product')->where('id_provider', $id[0]['id_partner'])->get('products')->result_array();
    }

}