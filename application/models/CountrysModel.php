<?php 
class CountrysModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de categorias
    public function full_listing()
    {
        return $this->db
        ->from('countrys')
        ->select('id_country, name_country, coin, tax_iva')
        ->get()
        ->result_array();
    }

    # Informacion de la categoria
    public function information_country($id)
    {
        return $this->db->where('id_country', $id)->get('countrys')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('countrys', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_country', $id)->update('countrys', $data);
    }

    # Eliminar categoria
    public function delete($id)
    {
        $this->db->where('id_country', $id)->delete('countrys');
    }
    # Listado
    public function countrys_listing()
    {
        $countrys = array();
        foreach ($this->db->select('id_country, name_country')->order_by('name_country', 'ASC')->get('countrys')->result_array() as $key => $value) {
            $countrys[$value['id_country']] = $value['name_country'];
        }
        asort($countrys);
        return $countrys;
    }

}