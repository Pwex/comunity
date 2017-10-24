<?php 
class PresentationModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de tipo de presentaciones de productos
    public function full_listing()
    {
        return $this->db
        ->from('presentation')
        ->select('id_presentation, name_presentation')
        ->get()
        ->result_array();
    }

    # Informacion del item a editar
    public function information_presentation($id)
    {
        return $this->db->where('id_presentation', $id)->get('presentation')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('presentation', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_presentation', $id)->update('presentation', $data);
    }

    # Eliminar registro
    public function delete($id)
    {
        $this->db->where('id_presentation', $id)->delete('presentation');
    }
    
    # Lista de tipo de presentaciones de productos
    public function presentation_listing()
    {
        $presentation = array();
        foreach ($this->db->select('id_presentation, name_presentation')->order_by('name_presentation', 'ASC')->get('presentation')->result_array() as $key => $value) {
            $presentation[$value['id_presentation']] = $value['name_presentation'];
        }
        return $presentation;
    }
}