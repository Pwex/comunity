<?php 
class ComponentsModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de componentes
    public function full_listing()
    {
        return $this->db
        ->from('components')
        ->select('id_component, name_component')
        ->get()
        ->result_array();
    }

    # Informacion de la componente
    public function information_component($id)
    {
        return $this->db->where('id_component', $id)->get('components')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('components', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_component', $id)->update('components', $data);
    }

    # Eliminar componente
    public function delete($id)
    {
        $this->db->where('id_component', $id)->delete('components');
    }

}