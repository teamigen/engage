<?php
defined('BASEPATH') or exit('No direct script access allowed');

class InstitutesController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('InstituteModel');
        $this->load->library('form_validation');
    }

    public function insertInstitute()
    {
        $this->form_validation->set_rules('instituteName', 'Institute Name', 'required|trim');
        $this->form_validation->set_rules('instituteSlug', 'Institute Slug', 'required|trim|is_unique[eg_institutes.instituteSlug]');
        $this->form_validation->set_rules('instituteLocation', 'Institute Location', 'required|trim');
    
        if ($this->form_validation->run() === FALSE) {
            $errors = array(
                'instituteName' => form_error('instituteName'),
                'instituteSlug' => form_error('instituteSlug'),
                'instituteLocation' => form_error('instituteLocation')
            );
            echo json_encode(['success' => false, 'error' => $errors]);
        } else {
            $data = array(
                'instituteName' => $this->input->post('instituteName'),
                'instituteSlug' => $this->input->post('instituteSlug'),
                'instituteLocation' => $this->input->post('instituteLocation'),
                'staffId' => $_COOKIE['staffId'],
                'stationId' => $_COOKIE['stationId'],
            );
    
            $inserted = $this->InstituteModel->insertInstitute($data);
    
            if ($inserted) {
                echo json_encode(['success' => true, 'instituteId' => $inserted]); 
            } else {
                echo json_encode(['success' => false, 'error' => 'An error occurred while saving the institute.']);
            }
        }
    }
    
}
