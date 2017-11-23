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

    public function listing_purchases($id)
    {
    	return $this->db
    	->from('orders as o')
    	->select('o.date, o.total_price, c.name, c.second_name, p.coin')
    	->order_by('o.date', 'DESC')
    	->join('countrys as p', 'p.id_country = o.id_country')
    	->join('ec_client as c', 'c.id_client = o.document')->get()->result_array();
    }

}