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
        $product = array(
            'id_product' => $data['id_product'],
            'name_product' => $data['name_product'],
            'description_product' => $data['description_product'],
            'id_typeinventory' => $data['id_typeinventory'],
            'id_category' => $data['id_category']
        );
        $this->db->insert('products', $product);
 /*
        $benefit = array(
            'id_product' => $data['id_product'],
            'id_benefit' => $data['id_benefit']
        );
        $this->db->insert('products_benefits', $benefit);
        $component = array(
            'id_product' => $data['id_product'],
            'id_component' => $data['id_component']
        );
        $this->db->insert('products_benefits', $component);
*/
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_product', $id)->update('products', $data);
    }

    # Eliminar usuario
    public function delete($id)
    {
        $this->db->where('id_product', $id)->delete('products');
    }

}