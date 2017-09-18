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
        ->join('medios', 'medios.id_category = categories.id_category')
        ->group_by('medios.id_category')
        ->get()
        ->result_array();
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

}