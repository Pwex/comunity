<?php 
class CatalogueModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo del catalogo
    public function full_listing()
    {
        return $this->db->select('id, name_catalogue')->order_by('name_catalogue')->get('catalogue')->result_array();
    }

    # Informacion del item a editar
    public function information_catalogue($id)
    {
        return $this->db->where('id', $id)->get('catalogue')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        unset($data['filtr-search']);
        $data['images'] = implode(',', $data['images']);
        $this->db->insert('catalogue', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        unset($data['filtr-search']);
        $data['images'] = implode(',', $data['images']);
        $this->db->where('id', $id)->update('catalogue', $data);
    }

    # Eliminar item del catalogo
    public function delete($id)
    {
        $this->db->where('id', $id)->delete('catalogue');
    }

}