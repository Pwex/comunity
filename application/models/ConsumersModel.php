<?php 
class ConsumersModel extends CI_Model {
    public function __construct()
    {
        parent::__construct();
    }
    # Listado completo de usuarios
    public function full_listing()
    {
        return $this->db
        ->from('ec_client cl')
        ->select('cl.id_client, cl.name, cl.last_name, cl.email, co.name_country, ci.name_city')
        ->join('countrys co', 'co.id_country = cl.country', 'left')
        ->join('cities ci', 'ci.id_city = cl.cities', 'left')
        ->get()
        ->result_array();
    }
    # Informacion del usuario
    public function information_consumer($id)
    {
        return $this->db->where('id_client', $id)->get('ec_client')->result_array();
    }
    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('ec_client', $data);
    }
    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_client', $id)->update('ec_client', $data);
    }
    # Eliminar usuario
    public function delete($id)
    {
        $this->db->where('id_client', $id)->delete('ec_client');
    }
    # Almacenar la informacion de la encuesta
    public function save_poll($data, $id)
    {
       $data['id_consumer'] = $id;
        $this->db->insert('polls', $data);
    }
}