<?php


class AuthController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('StaffModel');
    }

    public function login() {
        
        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $staff = $this->StaffModel->getStaffByUsername($username);

            if ($staff && password_verify($password, $staff->password)) {
             
                $this->session->set_userdata('staffId', $staff->staffId);
                $this->session->set_userdata('staffName', $staff->staffName);

                redirect('dashboard/staff');

            } else {
               
                $this->session->set_flashdata('error', 'Invalid Username or Password');
                redirect('login');
            }
            
        } else {
            
            $this->load->view('login');
        }
    }

    public function logout() {
       
        $this->session->sess_destroy();
        redirect('login');
    }
}


