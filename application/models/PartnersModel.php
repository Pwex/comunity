<?php 
class PartnersModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de usuarios
    public function full_listing()
    {
        return $this->db
        ->from('partners p')
        ->select('p.id_partner, p.name_partner, p.address_partner, p.phone_partner, p.web_partner, p.web_partner, p.email_partner, p.name_contact_partner,p.enabled_partner,p.loan_quota_partner, p.term_days_partner, d.document_type, c.name_country')
        ->join('document_types d', 'd.id_document_type = p.id_document_type', 'left')
        ->join('countrys c', 'c.id_country = p.id_country', 'left')
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
        print_r($data);
        $this->db->insert('partners', $data);
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

}