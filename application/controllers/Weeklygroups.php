<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weeklygroups extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('weeklygroups/create');
		$this->load->view('templates/footer');
	}
   
	
}
