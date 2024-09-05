<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Council extends CI_Controller
{

    public function createnew()
    {
        $data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);
        $data['institutes'] = $this->InstituteModel->getallactiveinstitutessbystation($_COOKIE['stationId']);
        // echo $this->db->last_query();
        // var_dump($data['locations']);
        // die();
        
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('council/create', $data);
        $this->load->view('templates/footer');
    }

    public function manage()

    {
        $data['councils'] = $this->CouncilModel->getcouncilsbystation($_COOKIE['stationId']);

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('council/manage', $data);
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
        $staffId = $_COOKIE['staffId'];
        $stationId = $_COOKIE['stationId'];

        $councilData = array(
            'councilName' => $councilName,
            'councilSlug' => $councilSlug,
            'councilLocation' => $councilLocation,
            'councilInstitute' => $councilInstitute,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'staffId' =>  $staffId,
            'stationId' =>  $stationId



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
                    'memberEmail' => $memberEmails[$index],
                    'stationId' => $stationId
                );
                $this->CouncilModel->insertMember($memberData);
            }

            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to insert council.'));
        }
    }

    public function delete($councilId)
    {

        $this->load->model('CouncilModel');


        if (is_numeric($councilId)) {

            $result = $this->CouncilModel->delete_council($councilId);


            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
        } else {
            echo json_encode(['success' => false]);
        }
    }

    public function edit($councilSlug)

    {
        $this->load->model('CouncilModel');
        $this->load->model('Family_model');



        $data['council'] = $this->CouncilModel->get_council_by_slug($councilSlug);

        if (!empty($data['council'])) {
            $councilId = $data['council']['councilId'];

            $data['eg_council_member'] = $this->CouncilModel->getMembersByCouncilId($councilId) ?? [];


            $data['locations'] = $this->Station_model->getallactivelocations();

            $this->load->view('templates/header');
            $this->load->view('templates/nav');
            $this->load->view('council/edit_council', $data);
            $this->load->view('templates/footer');
        } else {
            show_404();
        }
    }

    public function updateCouncil()
    {
        $councilId = $this->input->post('councilId');
        $councilData = array(
            'councilName' => $this->input->post('councilName'),
            'councilSlug' => $this->input->post('councilSlug'),
            'councilLocation' => $this->input->post('councilLocation'),
            'councilInstitute' => $this->input->post('councilInstitute'),
            'startDate' => $this->input->post('startDate'),
            'endDate' => $this->input->post('endDate')
        );

        // Update council data
        $this->CouncilModel->updateCouncil($councilId, $councilData);

        // Delete existing members
        $this->CouncilModel->deleteMembersByCouncilId($councilId);

        // Insert new members
        $memberNames = $this->input->post('memberName');
        $designations = $this->input->post('designation');
        $cgpfNumbers = $this->input->post('cgpfNumber');
        $memberEmails = $this->input->post('memberEmail');

        foreach ($memberNames as $key => $name) {
            $memberData = array(
                'councilId' => $councilId,
                'memberName' => $name,
                'designation' => $designations[$key],
                'cgpfNumber' => $cgpfNumbers[$key],
                'memberEmail' => $memberEmails[$key]
            );

            $this->CouncilModel->insertMember($memberData);
        }

        redirect('council/manage');
    }
}
