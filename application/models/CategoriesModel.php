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
        ->select('c.id_category,c.name_category, c.id_father_category, (select name_category from categories p where p.id_category=c.id_father_category) AS name_father')
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
        $data['filter'] = implode(',', $data['filter']);
        $this->db->insert('categories', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $data['filter'] = implode(',', $data['filter']);
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
        return $this->db
        ->from('categories')
        ->select('categories.id_category, categories.name_category, categories.id_father_category, catalogue.id, catalogue.name_catalogue')
        ->order_by('categories.id_father_category', 'ASC')
        ->order_by('categories.id_catalogue', 'ASC')
        ->order_by('categories.name_category', 'ASC')
        ->join('catalogue', 'catalogue.id = categories.id_catalogue')
        ->get()
        ->result_array();
    }

    # Lista del catalogo
    public function category_filter()
    {
        $category = array();
        foreach ($this->db->select('id_category, name_category')->order_by('name_category', 'ASC')->get('categories')->result_array() as $key => $value) {
            $category[$value['id_category']] = $value['name_category'];
        }
        return $category;
    }

    # Lista del catalogo
    public function catalogue_listing()
    {
        $catalogue = array();
        foreach ($this->db->select('id, name_catalogue')->order_by('name_catalogue', 'ASC')->get('catalogue')->result_array() as $key => $value) {
            $catalogue[$value['id']] = $value['name_catalogue'];
        }
        return $catalogue;
    }

    # Listado de catalogo para los optgroup
    public function catalogue_group()
    {
        return $this->db->select('id, name_catalogue')->order_by('name_catalogue')->get('catalogue')->result_array();
    }

    # Listado de catalogo para los optgroup filter
    public function catalogue_group_filter($id)
    {
        return $this->db->where('id',$id)->select('id, name_catalogue')->order_by('name_catalogue')->get('catalogue')->result_array();
    }

}