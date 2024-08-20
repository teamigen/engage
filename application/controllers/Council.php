<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Council extends CI_Controller {

	public function createnew()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('council/create');
		$this->load->view('templates/footer');
	}
    public function manage()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('council/manage');
		$this->load->view('templates/footer');
	}
   
	
}
