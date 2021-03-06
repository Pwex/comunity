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

    # Contenido de los item de categorias principales
    public function item_categories_principal()
    {
        return $this->db->select('id, name_catalogue')->order_by('location', 'ASC')->get('catalogue')->result_array();
    }

    # Almacenar item del menu modificado
    public function organize_save_item_categories_principal($positions)
    {
        foreach ($positions as $key => $value) {
            $data = array(
                'location' => $key
            );
            $this->db->set('location')->where('id', $value)->update('catalogue', $data);
        }
    }

}