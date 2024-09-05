<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Leaders extends CI_Controller {

	public function index()
	{
		$data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);
        $data['institutes'] = $this->InstituteModel->getallactiveinstitutessbystation($_COOKIE['stationId']);
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('leaders/create', $data);
		$this->load->view('templates/footer');
	}
   
	
}
