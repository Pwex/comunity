<?php 
class ListPriceModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de precios
    public function full_listing()
    {
        return $this->db->order_by('name_list_price', 'ASC')->get('list_price')->result_array();
    }

    # Informacion de la lista de precios
    public function information_list_price($id)
    {
        return $this->db->where('id', $id)->get('list_price')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('list_price', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id', $id)->update('list_price', $data);
    }

    # Eliminar categoria
    public function delete($id)
    {
        $this->db->where('id', $id)->delete('list_price');
    }

}