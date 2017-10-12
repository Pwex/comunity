<?php 
class Movement_typesModel extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }
    # Listado completo 
    public function full_listing()
    {
        return $this->db
        ->from('movement_type')
        ->select('id_movement_type, movement_type')
        ->get()
        ->result_array();
    }
    # Informacion de la categoria
    public function information_movement_types($id)
    {
        return $this->db->where('id_movement_type', $id)->get('movement_type')->result_array();
    }
    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('movement_type', $data);
    }
    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_movement_type', $id)->update('movement_type', $data);
    }
    # Eliminar categoria
    public function delete($id)
    {
        $this->db->where('id_movement_type', $id)->delete('movement_type');
    }
    # Lista de beneficios
    public function modules_movement_types()
    {
        $movement_types = array();
        foreach ($this->db->select('id_movement_type, movement_type')->order_by('movement_type', 'ASC')->get('movement_type')->result_array() as $key => $value) {
            $movement_types[$value['id_movement_type']] = $value['movement_type'];
        }
         $movement_types[0] = '';
        asort($movement_types);
        return $movement_types;
    }
}