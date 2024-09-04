<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Institutes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('InstituteModel');
        $this->load->model('Station_model');  
    }

    public function index()
    {
        $data['locations'] = $this->Station_model->getallactivelocations();
        // $data['institutes'] = $this->InstituteModel->getAllInstitutes();

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('institutes/create', $data);
        $this->load->view('templates/footer');
    }
}

