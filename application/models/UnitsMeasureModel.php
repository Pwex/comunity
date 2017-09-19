<?php 
class UnitsMeasureModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de categorias
    public function full_listing()
    {
        return $this->db
        ->from('units_measure')
        ->select('id_unit_measure, unit_measure, abbreviation')
        ->get()
        ->result_array();
    }

    # Informacion de la categoria
    public function information_units_measure($id)
    {
        return $this->db->where('id_unit_measure', $id)->get('units_measure')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('units_measure', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_unit_measure', $id)->update('units_measure', $data);
    }

    # Eliminar categoria
    public function delete($id)
    {
        $this->db->where('id_unit_measure', $id)->delete('units_measure');
    }
    # Lista de categorias
    public function umeasures_listing()
    {
        $umeasures = array();
        foreach ($this->db->select('id_unit_measure, unit_measure')->order_by('unit_measure', 'ASC')->get('units_measure')->result_array() as $key => $value) {
            $umeasures[$value['id_unit_measure']] = $value['unit_measure'];
        }
        $umeasures[0] = '';
        asort($umeasures);
        return $umeasures;
    }

}