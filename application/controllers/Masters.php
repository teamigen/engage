<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Masters extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('churches/create');
		$this->load->view('templates/footer');
	}
    public function regions()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('masters/regions');
		$this->load->view('templates/footer');
	}
	public function stations()
	{
		$this->load->model('Station_model'); 
		$regions = $this->Station_model->getallactiveregions(); 
		
		$data['regions'] = $regions; 
	
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('masters/stations', $data); 
		$this->load->view('templates/footer');
	}
	public function locations()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('masters/locations');
		$this->load->view('templates/footer');
	}
   
	
}
