<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner_calendar extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
    }

	public function get_es()
	{
		$data['base_url'] = 'assets/plugins/partners-calendar/';
		$this->load->view('partners_calendar/index', $data);
	}

	public function convert_date()
	{
		echo date('d/m/Y', strtotime($this->input->post('date')));
	}

}