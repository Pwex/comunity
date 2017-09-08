<?php 
class PartnerTypesModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de categorias
    public function full_listing()
    {
        return $this->db
        ->from('partner_types')
        ->select('id_partner_type, partner_type')
        ->get()
        ->result_array();
    }

    # Informacion 
    public function information_partner_type($id)
    {
        return $this->db->where('id_partner_type', $id)->get('partner_types')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('partner_types', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_partner_type', $id)->update('partner_types', $data);
    }

    # Eliminar categoria
    public function delete($id)
    {
        $this->db->where('id_partner_type', $id)->delete('partner_types');
    }
    # Lista de beneficios
    public function partner_type_listing()
    {
        $partner_type = array();
        foreach ($this->db->select('id_partner_type, partner_type')->order_by('partner_type', 'ASC')->get('partner_types')->result_array() as $key => $value) {
            $partner_type[$value['id_partner_type']] = $value['partner_type'];
        }
        $partner_type[0] = '';
        asort($partner_type);
        return $partner_type;
    }
}