<?php 
class TypesInventoryModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de categorias
    public function full_listing()
    {
        return $this->db
        ->from('typesinventory')
        ->select('id_typeinventory, type_inventory')
        ->get()
        ->result_array();
    }

    # Informacion de la categoria
    public function information_typesinv($id)
    {
        return $this->db->where('id_typeinventory', $id)->get('typesinventory')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('typesinventory', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_typeinventory', $id)->update('typesinventory', $data);
    }

    # Eliminar categoria
    public function delete($id)
    {
        $this->db->where('id_typeinventory', $id)->delete('typesinventory');
    }

}