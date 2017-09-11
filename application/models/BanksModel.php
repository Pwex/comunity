<?php 
class BanksModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de categorias
    public function full_listing()
    {
        return $this->db
        ->from('banks b')
        ->select('b.id_bank, b.name_bank, co.name_country')
        ->join('countrys co', 'co.id_country = b.id_country', 'left')
        ->get()
        ->result_array();
    }

    # Informacion general de la tabla
    public function information_banks($id)
    {
        return $this->db->where('id_bank', $id)->get('banks')->result_array();
    }

    # Almacenar la informacion
    public function save($data)
    {
        $this->db->insert('banks', $data);
    }

    # Editar la informacion
    public function edit($id, $data)
    {
        $this->db->where('id_bank', $id)->update('banks', $data);
    }

    # Eliminar categoria
    public function delete($id)
    {
        $this->db->where('id_bank', $id)->delete('banks');
    }

    # Lista para selector
    public function banks_listing()
    {
        $bank = array();
        foreach ($this->db->select('id_bank, name_bank')->order_by('name_bank', 'ASC')->get('banks')->result_array() as $key => $value) {
            $bank[$value['id_bank']] = $value['name_bank'];
        }
        $bank[0] = '';
        asort($bank);
        return $bank;
    }
}