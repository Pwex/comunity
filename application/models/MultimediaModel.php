<?php 
class MultimediaModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Leer contenido, retorna todas las imagenes
    public function list_images()
    {
        return $this->db
        ->select('file, name, file_name, id_category')
        ->like('formart', 'image')
        ->order_by('name', 'ASC')
        ->get('medios')
        ->result_array();
    }

    # Listado de categorias asociadas a cada imagen
    public function categories_images()
    {
        return $this->db
        ->from('categories')
        ->select('categories.id_category, categories.name_category')
        ->order_by('categories.name_category')
        ->join('medios', 'medios.id_category = categories.id_category')
        ->group_by('medios.id_category')
        ->get()
        ->result_array();
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

    # Listado de catalogo para los optgroup
    public function catalogue_group()
    {
        return $this->db->select('id, name_catalogue')->order_by('name_catalogue')->get('catalogue')->result_array();
    }

    # Almacenar informacion en la base de datos
    public function save($data, $id_category)
    {
        foreach ($data as $key => $value) {
            $image = array(
                'name'        => $value['old_title'],
                'file_name'   => $value['name'],
                'date'        => date('Y-m-d H:i:s'),
                'extension'   => $value['extension'],
                'size'        => $value['size2'],
                'formart'     => $value['type'],
                'id_category' => $id_category
            );
            $this->db->insert('medios', $image);
        }
    }

    # Eliminar medios
    public function delete($id)
    {
        $this->db->where('file', $id)->delete('medios');
    }

    # Manager Files Videos
    # Leer contenido, retorna todos los videos
    public function list_videos()
    {
        return $this->db->like('formart', 'video')->order_by('name', 'ASC')->get('medios')->result_array();
    }

    # Listado de categorías
    public function list_categories()
    {
        $category = array();
        foreach ($this->db->select('id_category, name_category')->order_by('name_category', 'ASC')->get('categories')->result_array() as $key => $value) {
            $category[$value['id_category']] = $value['name_category'];
        }
        asort($category);
        return $category;
    }

    # Listado de opciones del sistema
    public function option_system()
    {
        $category = array();
        foreach ($this->db->select('id_category, name_category, id_father_category, id_catalogue')->order_by('name_category', 'ASC')->get('categories')->result_array() as $key => $value) {
            if ($value['id_father_category'] == 0 and $value['id_catalogue'] == 0) {
                $category[$value['id_category']] = $value['name_category'];
            }
        }
        asort($category);
        return $category;
    }

}