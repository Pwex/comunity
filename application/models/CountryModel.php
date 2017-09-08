<?php 
class CountryModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Listado completo de usuarios
    public function full_listing()
    {
    	$country = array();
    	foreach ($this->db->select('country, name_country')->order_by('name_country', 'ASC')->get('country')->result_array() as $key => $value) {
        	$country[$value['country']] = $value['name_country'];
        }
       	return $country;
    }

}