<?php 
class ShopLayoutModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Información almacenada en la base de datos
    public function information()
    {
        return $this->db->where('id', 1)->get('ec_shop_layout')->result_array();
    }

    # Almacenar información en la base de datos
    public function save($data)
    {
        $this->db->where('id', 1)->update('ec_shop_layout', $data);
    }

}