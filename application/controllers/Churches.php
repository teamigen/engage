<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Churches extends CI_Controller
{

	public function index()
	{
		$this->load->model('ChurchModel');
		// $data['regions'] = $this->Station_model->getallactiveregions();
		// $data['stations'] = $this->Station_model->getallactivestations();
		$data['locations'] = $this->ChurchModel->getallactivelocations();
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('churches/create',$data);
		$this->load->view('templates/footer');
	}
}
