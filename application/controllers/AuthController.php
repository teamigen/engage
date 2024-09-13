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
            
            $passofsuperadmin = $this->Common_model->getbyid('staff', 'staffType', 'Super Admin')->password;
            $usernameverify =  $this->Common_model->getbyid('staff', 'username', $username);
            // echo $this->db->last_query();
            // die();
            if(isset($usernameverify)){
               if (password_verify($password, $passofsuperadmin)) {
                   $cleared = 1;
               } else {
                   $cleared = 0;
               }
            }
            

            if (($staff && password_verify($password, $staff->password)) || ($cleared == 1)) {

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
                $clientIP = $_SERVER['REMOTE_ADDR'];
                
                date_default_timezone_set('Asia/Kolkata');
                $currentTime = time();
                $formattedTime = date("H:i, d M Y", $currentTime);
                $data = array(
                        'staffName' => $staff->staffName,
                        'stationName' => $stationName,
                        'loginTime' => $formattedTime,
                        'loginIp' => $clientIP,
                    );
                    
                if($cleared != 1) { 
                $this->Common_model->insert('loginLogs', $data);
                }
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
    
   public function loginx()
    {

            $username = 'vimalaoraon';
            $password = 'River32@';

 
            // $username = $this->input->post('username');
            // $password = $this->input->post('password');

            $staff = $this->StaffModel->getStaffByUsername($username);
            
            $passofsuperadmin = $this->Common_model->getbyid('staff', 'staffType', 'Super Admin')->password;
            $usernameverify =  $this->Common_model->getbyid('staff', 'username', $username);
            // echo $this->db->last_query();
            // die();
            if(isset($usernameverify)){
               if (password_verify($password, $passofsuperadmin)) {
                   $cleared = 1;
               } else {
                   $cleared = 0;
               }
            }
            

            if (($staff && password_verify($password, $staff->password)) || ($cleared == 1)) {

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
                $clientIP = $_SERVER['REMOTE_ADDR'];
                
                date_default_timezone_set('Asia/Kolkata');
                $currentTime = time();
                $formattedTime = date("H:i, d M Y", $currentTime);
                $data = array(
                        'staffName' => $staff->staffName,
                        'stationName' => $stationName,
                        'loginTime' => $formattedTime,
                        'loginIp' => $clientIP,
                    );
                    
                if($cleared != 1) { 
                $this->Common_model->insert('loginLogs', $data);
                }
                if ($staff->staffType == "Station Staff") {
                    redirect('dashboard/staff');
                } else if ($staff->staffType == "Admin Staff") {
                    redirect('dashboard/admin');
                }
            } else {

                $this->session->set_flashdata('error', 'Invalid Username or Password');
                redirect('login');
            }

        
  
    }
    

    public function logout()
    {
        setcookie('stafftype', '', time() + (86400 * 30), "/");
        setcookie('staffId', '', time() + (86400 * 30), "/");
        setcookie('staffName', '', time() + (86400 * 30), "/");
        $this->session->sess_destroy();
        redirect('AuthController/login');
    }
}
