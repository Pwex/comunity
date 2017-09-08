<?php 
class SealsModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de sellos
    public function full_listing()
    {
        return $this->db->order_by('name_seals', 'ASC')->get('seals')->result_array();
    }

    # Informacion de los sellos
    public function information_seals($id)
    {
        return $this->db->where('id_seals', $id)->get('seals')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        unset($data['filtr-search']);
        $data['images'] = implode(',', $data['images']);
        $this->db->insert('seals', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        unset($data['filtr-search']);
        $data['images'] = implode(',', $data['images']);
        $this->db->where('id_seals', $id)->update('seals', $data);
    }

    # Eliminar sellos
    public function delete($id)
    {
        $this->db->where('id_seals', $id)->delete('seals');
    }

    # Lista de sellos
    public function seals_listing()
    {
        $seals = array();
        foreach ($this->db->select('id_seals, name_seals')->order_by('name_seals', 'ASC')->get('seals')->result_array() as $key => $value) {
            $seals[$value['id_seals']] = $value['name_seals'];
        }
        $seals[0] = '';
        asort($seals);
        return $seals;
    }

}