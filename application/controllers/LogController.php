<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logs extends CI_Controller
{

	public function index()
	{
	    $table = 'loginLogs';
	    $orderby = 'logId';
	    $ascdes = 'desc';
	    $data['logs'] = $this->Common_model->getall($table, $orderby, $ascdes);
	   
		$this->load->model('StaffModel');
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('logs/manage', $data);
		$this->load->view('templates/footer');
	}
	
}