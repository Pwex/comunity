<?php 
class ConsumerProfileModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    public function get($id)
    {
        return $this->db->select('name, last_name')->where('id_client', $id)->get('ec_client')->result_array();
    }

}