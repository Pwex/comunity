<?php 
class MultimediaModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Leer contenido, retorna todas las imagenes
    public function list_images()
    {
        return $this->db->like('formart', 'image')->order_by('name', 'ASC')->get('medios')->result_array();
    }

    # Almacenar informacion en la base de datos
    public function save($data)
    {
        foreach ($data as $key => $value) {
            $image = array(
                'name'      => $value['old_title'],
                'file_name' => $value['name'],
                'date'      => date('Y-m-d H:i:s'),
                'extension' => $value['extension'],
                'size'      => $value['size2'],
                'formart'   => $value['type']
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


}