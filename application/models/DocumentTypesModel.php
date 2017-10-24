<?php 
class DocumentTypesModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de categorias
    public function full_listing()
    {
        return $this->db
        ->from('document_types')
        ->select('id_document_type, document_type')
        ->get()
        ->result_array();
    }

    # Informacion de la categoria
    public function information_document_type($id)
    {
        return $this->db->where('id_document_type', $id)->get('document_types')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('document_types', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_document_type', $id)->update('document_types', $data);
    }

    # Eliminar categoria
    public function delete($id)
    {
        $this->db->where('id_document_type', $id)->delete('document_types');
    }
    # Lista de beneficios
    public function document_types_listing()
    {
        $document_type = array();
        foreach ($this->db->select('id_document_type, document_type')->order_by('document_type', 'ASC')->get('document_types')->result_array() as $key => $value) {
            $document_type[$value['id_document_type']] = $value['document_type'];
        }
        asort($document_type);
        return $document_type;
    }
}