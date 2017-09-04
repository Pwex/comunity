<?php 
class DashboardModel extends CI_Model {

    public function __construct()
    {
        parent::__construct();
    }

    # Retorna todos los usuarios conectados
    public function users_online()
    {
        return $this->db->where(array('status' => 1, 'id_user !=' => $this->session->userdata['user']['id_user']))->order_by('name', 'ASC')->get('users')->result_array();
    }

}