<?php 
class CategoriesModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de categorias
    public function full_listing()
    {
        return $this->db
        ->from('categories c')
        ->select('c.id_category,c.name_category, c.id_father_category, c.images, (select name_category from categories p where p.id_category=c.id_father_category) AS name_father')
        ->get()
        ->result_array();
    }

    # Informacion de la categoria
    public function information_category($id)
    {
        return $this->db->where('id_category', $id)->get('categories')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        unset($data['filtr-search']);
        $data['images'] = implode(',', $data['images']);
        $this->db->insert('categories', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        unset($data['filtr-search']);
        $data['images'] = implode(',', $data['images']);
        $this->db->where('id_category', $id)->update('categories', $data);
    }

    # Eliminar categoria
    public function delete($id)
    {
        $this->db->where('id_category', $id)->delete('categories');
    }

    # Lista de categorias
    public function categories_listing()
    {
        $category = array();
        foreach ($this->db->select('id_category, name_category')->order_by('name_category', 'ASC')->get('categories')->result_array() as $key => $value) {
            $category[$value['id_category']] = $value['name_category'];
        }
        $category[0] = '';
        asort($category);
        return $category;
    }

}