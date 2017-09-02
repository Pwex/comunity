<?php 
class WarehousesModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de categorias
    public function full_listing()
    {
        return $this->db
        ->from('warehouses')
        ->select('id_warehouse, name_warehouse')
        ->get()
        ->result_array();
    }

    # Informacion de la categoria
    public function information_warehouse($id)
    {
        return $this->db->where('id_warehouse', $id)->get('warehouses')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('warehouses', $data);
    }
    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_warehouse', $id)->update('warehouses', $data);
    }

    # Eliminar categoria
    public function delete($id)
    {
        $this->db->where('id_warehouse', $id)->delete('warehouses');
    }
}