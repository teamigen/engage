<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function create()
	{
		$data['stations'] = $this->Station_model->getallactivestations();
		$data['users'] = $this->User_model->getallactiveusers();
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('users/create', $data);
		$this->load->view('templates/footer');
	}

	
    public function manage()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('users/create');
		$this->load->view('templates/footer');
	}
}
