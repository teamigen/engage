<?php


class AuthController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
        $this->load->model('StaffModel');
    }

    public function login()
    {

        if ($this->input->post()) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $staff = $this->StaffModel->getStaffByUsername($username);

            if ($staff && password_verify($password, $staff->password)) {

                $this->session->set_userdata('staffId', $staff->staffId);
                $this->session->set_userdata('staffName', $staff->staffName);
                setcookie('stafftype', $staff->staffType, time() + (86400 * 30), "/");
                setcookie('staffId', $staff->staffId, time() + (86400 * 30), "/");
                setcookie('staffName', $staff->staffName, time() + (86400 * 30), "/");

                //Find Station of the Staff
                $stationId = $this->StaffModel->getStaffById($staff->staffId)->stationId;
                $stationName = $this->StaffModel->getStaffById($staff->staffId)->stationName;
                setcookie('stationId', $stationId, time() + (86400 * 30), "/");
                setcookie('stationName', $stationName, time() + (86400 * 30), "/");
                if ($staff->staffType == "Station Staff") {
                    redirect('dashboard/staff');
                } else if ($staff->staffType == "Admin Staff") {
                    redirect('dashboard/admin');
                }
            } else {

                $this->session->set_flashdata('error', 'Invalid Username or Password');
                redirect('login');
            }
        } else {

            $this->load->view('login');
        }
    }
    

    public function logout()
    {
        setcookie('stafftype', '', time() + (86400 * 30), "/");
        $this->session->sess_destroy();
        redirect('AuthController/login');
    }
}
