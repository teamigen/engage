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
                    'stationId' => $stationId,
                    'staffId' =>  $staffId,
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
        // $data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);
        $data['institutes'] = $this->InstituteModel->getallactiveinstitutessbystation($_COOKIE['stationId']);

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

        $stationId = $_COOKIE['stationId'];
        $staffId = $_COOKIE['staffId'];


        $councilId = $this->input->post('councilId');
        $councilData = array(
            'councilName' => $this->input->post('councilName'),
            'councilSlug' => $this->input->post('councilSlug'),
            'councilLocation' => $this->input->post('councilLocation'),
            'councilInstitute' => $this->input->post('councilInstitute'),
            'startDate' => $this->input->post('startDate'),
            'endDate' => $this->input->post('endDate'),
            'stationId' => $stationId,
            'staffId' => $staffId
        );


        $this->CouncilModel->updateCouncil($councilId, $councilData);


        $this->CouncilModel->deleteMembersByCouncilId($councilId);


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
                'memberEmail' => $memberEmails[$key],
                'stationId' => $stationId,
                'staffId' => $staffId
            );


            $this->CouncilModel->insertMember($memberData);
        }


        redirect('council/manage');
    }



    public function createareacouncil()
    {

        $this->load->model('CouncilModel');
        $stationId = $_COOKIE['stationId'];
        $data['members'] = $this->CouncilModel->getMembersByStationId($stationId);
        $data['locations'] = $this->Station_model->getallactivelocationsbystaff($_COOKIE['staffId']);

        // echo $this->db->last_query();
        // var_dump($data['locations']);
        // die();

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('council/area_council', $data);
        $this->load->view('templates/footer');
    }

    public function getMemberDesignation()
    {
        $memberId = $this->input->post('memberId');
        $member = $this->CouncilModel->getMemberById($memberId);
        echo json_encode(['designation' => $member['designation']]);
    }


    public function insertAreaCouncil()
    {
        $councilName = $this->input->post('councilName');
        $councilSlug = $this->input->post('councilSlug');
        $councilLocation = $this->input->post('councilLocation');
        $councilInstitute = $this->input->post('councilArea');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $staffId = $_COOKIE['staffId'];
        $stationId = $_COOKIE['stationId'];

        $councilData = array(
            'councilName' => $councilName,
            'councilSlug' => $councilSlug,
            'councilLocation' => $councilLocation,
            'councilArea' => $councilInstitute,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'staffId' =>  $staffId,
            'stationId' =>  $stationId



        );

        $councilId = $this->CouncilModel->insertAreaCouncil($councilData);

        if ($councilId) {
            $memberId = $this->input->post('memberId');
            $designations = $this->input->post('designation');
            $cgpfNumbers = $this->input->post('cgpfNumber');
            $memberEmails = $this->input->post('memberEmail');

            foreach ($memberId as $index => $memberId) {
                $memberData = array(
                    'councilId' => $councilId,
                    'memberId' => $memberId,
                    'designation' => $designations[$index],
                    'cgpfNumber' => $cgpfNumbers[$index],
                    'memberEmail' => $memberEmails[$index],
                    'stationId' => $stationId,
                    'staffId' =>  $staffId,
                );
                $this->CouncilModel->insertAreaMember($memberData);
            }

            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to insert council.'));
        }
    }

    public function manageareacouncil()

    {
        $data['councils'] = $this->CouncilModel->getareacouncilsbystation($_COOKIE['stationId']);

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('council/manage_area', $data);
        $this->load->view('templates/footer');
    }

    public function deleteArea($councilId)

    {

        $this->load->model('CouncilModel');


        if (is_numeric($councilId)) {

            $result = $this->CouncilModel->delete_areacouncil($councilId);


            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
        } else {
            echo json_encode(['success' => false]);
        }
    }


    public function editArea($councilSlug)

    {

        $this->load->model('CouncilModel');
        $this->load->model('Family_model');


        $stationId = $_COOKIE['stationId'];
        $data['council'] = $this->CouncilModel->get_Areacouncil_by_slug($councilSlug);
        $data['members'] = $this->CouncilModel->getMembersByStationId($stationId);



        if (!empty($data['council'])) {


            $councilId = $data['council']['councilId'];

            $data['eg_council_member'] = $this->CouncilModel->getAreaMembersByCouncilId($councilId) ?? [];




            $data['locations'] = $this->Station_model->getallactivelocations();

            $this->load->view('templates/header');
            $this->load->view('templates/nav');
            $this->load->view('council/edit_areacouncil', $data);
            $this->load->view('templates/footer');
        } else {
            show_404();
        }
    }

    public function updateAreaCouncil()
    {

        $stationId = $_COOKIE['stationId'];
        $staffId = $_COOKIE['staffId'];

        $councilId = $this->input->post('councilId');
        $councilData = array(
            'councilName' => $this->input->post('councilName'),
            'councilSlug' => $this->input->post('councilSlug'),
            'councilLocation' => $this->input->post('councilLocation'),
            'councilArea' => $this->input->post('councilArea'),
            'startDate' => $this->input->post('startDate'),
            'endDate' => $this->input->post('endDate'),
            'stationId' => $stationId,
            'staffId' => $staffId
        );


        $this->CouncilModel->updateAreaCouncil($councilId, $councilData);

        $this->CouncilModel->deleteAreaMembersByCouncilId($councilId);

        $memberNames = $this->input->post('memberId');
        $designations = $this->input->post('designation');
        $cgpfNumbers = $this->input->post('cgpfNumber');
        $memberEmails = $this->input->post('memberEmail');

        foreach ($memberNames as $key => $name) {
            if (!empty($name) && !empty($designations[$key]) && $designations[$key] !== 'Select Designation') {


                $existingMember = $this->CouncilModel->checkMemberExists($councilId, $name);
                if (!$existingMember) {
                    $memberData = array(
                        'councilId' => $councilId,
                        'memberId' => $name,
                        'designation' => $designations[$key],
                        'cgpfNumber' => $cgpfNumbers[$key],
                        'memberEmail' => $memberEmails[$key],
                        'stationId' => $stationId,
                        'staffId' => $staffId
                    );


                    $this->CouncilModel->insertAreaMember($memberData);
                }
            }
        }


        redirect('council/manageareacouncil');
    }



    public function createdistrictcouncil()

    {

        $this->load->model('CouncilModel');
        $stationId = $_COOKIE['stationId'];
        $data['members'] = $this->CouncilModel->getdisMembersByStationId($stationId);
        $data['locations'] = $this->Station_model->getallactivelocationsbystaff($_COOKIE['staffId']);

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('council/district_council', $data);
        $this->load->view('templates/footer');
    }

    public function insertDistrictCouncil()
    {
        $councilName = $this->input->post('councilName');
        $councilSlug = $this->input->post('councilSlug');
        $councilLocation = $this->input->post('councilLocation');
        $councilInstitute = $this->input->post('councilArea');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $staffId = $_COOKIE['staffId'];
        $stationId = $_COOKIE['stationId'];

        $councilData = array(
            'councilName' => $councilName,
            'councilSlug' => $councilSlug,
            'councilLocation' => $councilLocation,
            'councilArea' => $councilInstitute,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'staffId' =>  $staffId,
            'stationId' =>  $stationId



        );

        $councilId = $this->CouncilModel->insertDistrictCouncil($councilData);

        if ($councilId) {
            $memberId = $this->input->post('memberId');
            $designations = $this->input->post('designation');
            $cgpfNumbers = $this->input->post('cgpfNumber');
            $memberEmails = $this->input->post('memberEmail');

            foreach ($memberId as $index => $memberId) {
                $memberData = array(
                    'councilId' => $councilId,
                    'memberId' => $memberId,
                    'designation' => $designations[$index],
                    'cgpfNumber' => $cgpfNumbers[$index],
                    'memberEmail' => $memberEmails[$index],
                    'stationId' => $stationId,
                    'staffId' =>  $staffId,
                );
                $this->CouncilModel->insertDistrictMember($memberData);
            }

            echo json_encode(array('success' => true));
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to insert council.'));
        }
    }

    public function managedistrictcouncil()

    {
        $data['councils'] = $this->CouncilModel->getdistrictcouncilsbystation($_COOKIE['stationId']);

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('council/manage_district', $data);
        $this->load->view('templates/footer');
    }
    public function deleteDistrict($councilId)

    {

        $this->load->model('CouncilModel');


        if (is_numeric($councilId)) {

            $result = $this->CouncilModel->delete_districtcouncil($councilId);


            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
        } else {
            echo json_encode(['success' => false]);
        }
    }

    public function editDistrict($councilSlug)

    {

        $this->load->model('CouncilModel');
        $this->load->model('Family_model');


        $stationId = $_COOKIE['stationId'];
        $data['council'] = $this->CouncilModel->get_Districtcouncil_by_slug($councilSlug);
        $data['members'] = $this->CouncilModel->getdisMembersByStationId($stationId);



        if (!empty($data['council'])) {


            $councilId = $data['council']['councilId'];

            $data['eg_council_member'] = $this->CouncilModel->getDistrictMembersByCouncilId($councilId) ?? [];




            $data['locations'] = $this->Station_model->getallactivelocations();

            $this->load->view('templates/header');
            $this->load->view('templates/nav');
            $this->load->view('council/edit_district', $data);
            $this->load->view('templates/footer');
        } else {
            show_404();
        }
    }

    public function updateDistrictCouncil()
    {
        $councilId = $this->input->post('councilId');

        if (empty($councilId)) {
            echo json_encode(array('success' => false, 'message' => 'Invalid council ID.'));
            return;
        }

        $councilName = $this->input->post('councilName');
        $councilSlug = $this->input->post('councilSlug');
        $councilLocation = $this->input->post('councilLocation');
        $councilInstitute = $this->input->post('councilArea');
        $startDate = $this->input->post('startDate');
        $endDate = $this->input->post('endDate');
        $staffId = $_COOKIE['staffId'];
        $stationId = $_COOKIE['stationId'];

        $councilData = array(
            'councilName' => $councilName,
            'councilSlug' => $councilSlug,
            'councilLocation' => $councilLocation,
            'councilArea' => $councilInstitute,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'staffId' => $staffId,
            'stationId' => $stationId
        );

        $updated = $this->CouncilModel->updateDistrictCouncil($councilId, $councilData);

        if ($updated) {
            $memberIds = $this->input->post('memberId');
            $designations = $this->input->post('designation');
            $cgpfNumbers = $this->input->post('cgpfNumber');
            $memberEmails = $this->input->post('memberEmail');

            $this->CouncilModel->deleteDistrictMembersByCouncilId($councilId);

            foreach ($memberIds as $index => $memberId) {
                $memberData = array(
                    'councilId' => $councilId,
                    'memberId' => $memberId,
                    'designation' => $designations[$index],
                    'cgpfNumber' => $cgpfNumbers[$index],
                    'memberEmail' => $memberEmails[$index],
                    'stationId' => $stationId,
                    'staffId' => $staffId
                );
                $this->CouncilModel->insertDistrictMember($memberData);
            }

        
            redirect('Council/managedistrictcouncil');
        } else {
            echo json_encode(array('success' => false, 'message' => 'Failed to update council.'));
        }
    }
}
