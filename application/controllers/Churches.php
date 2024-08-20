<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Churches extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('churches/create');
		$this->load->view('templates/footer');
	}
   
	
}
