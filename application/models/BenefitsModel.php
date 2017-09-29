<?php 
class BenefitsModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de categorias
    public function full_listing()
    {
        return $this->db
        ->from('benefits')
        ->select('id_benefit, name_benefit')
        ->get()
        ->result_array();
    }

    # Informacion de la categoria
    public function information_benefit($id)
    {
        return $this->db->where('id_benefit', $id)->get('benefits')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('benefits', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_benefit', $id)->update('benefits', $data);
    }

    # Eliminar categoria
    public function delete($id)
    {
        $this->db->where('id_benefit', $id)->delete('benefits');
    }
    
    # Lista de beneficios
    public function benefits_listing()
    {
        $benefits = array();
        foreach ($this->db->select('id_benefit, name_benefit')->order_by('name_benefit', 'ASC')->get('benefits')->result_array() as $key => $value) {
            $benefits[$value['id_benefit']] = $value['name_benefit'];
        }
        return $benefits;
    }
}