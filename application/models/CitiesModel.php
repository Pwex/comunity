<?php 
class CitiesModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de categorias
    public function full_listing()
    {
        return $this->db
        ->from('cities c')
        ->select('c.id_city, c.name_city, co.name_country')
        ->join('countrys co', 'co.id_country = c.id_country', 'left')
        ->get()
        ->result_array();
    }

    # Informacion general de la tabla
    public function information_cities($id)
    {
        return $this->db->where('id_city', $id)->get('cities')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('cities', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_city', $id)->update('cities', $data);
    }

    # Eliminar categoria
    public function delete($id)
    {
        $this->db->where('id_city', $id)->delete('cities');
    }

    # Lista para selector
    public function cities_listing()
    {
        $city = array();
        foreach ($this->db->select('id_city, name_city')->order_by('name_city', 'ASC')->get('cities')->result_array() as $key => $value) {
            $city[$value['id_city']] = $value['name_city'];
        }
        $city[0] = '';
        asort($city);
        return $city;
    }
}