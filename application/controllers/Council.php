<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Council extends CI_Controller
{

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



    public function __construct()
    {
        parent::__construct();
        $this->load->model('CouncilModel');
    }

    public function insertCouncil()
    {
        $councilName = $this->input->post('councilName');
        $councilSlug = $this->input->post('councilSlug');
        $councilLocation = $this->input->post('councilLocation');
        $councilInstitute = $this->input->post('councilInstitute');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');

        $councilData = array(
            'councilName' => $councilName,
            'councilSlug' => $councilSlug,
            'councilLocation' => $councilLocation,
            'councilInstitute' => $councilInstitute,
            'startDate' => $startDate,
            'endDate' => $endDate
        );

        $councilId = $this->CouncilModel->insertCouncil($councilData);

        if ($councilId) {
            $memberNames = $this->input->post('memberName');
            $designations = $this->input->post('designation');
            $cgpfNumbers = $this->input->post('cgpfNumber');
            $memberEmails = $this->input->post('memberEmail');

            foreach ($memberNames as $index => $memberName) {
                $memberData = array(
                    'councilId' => $councilId,
                    'memberName' => $memberName,
                    'designation' => $designations[$index],
                    'cgpfNumber' => $cgpfNumbers[$index],
                    'memberEmail' => $memberEmails[$index]
                );
                $this->CouncilModel->insertMember($memberData);
            }

            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to insert council.'));
        }
    }
}
