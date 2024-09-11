<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Weeklygroups extends CI_Controller
{

    public function index()
    {
        $this->load->model('GroupModel');
        $data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);


        // $data['weekly_groups'] = $this->GroupModel->getAllWeeklyGroups();
        $data['weekly_groups'] = $this->GroupModel->getAllWeeklyGroupsbystationId();

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('weeklygroups/create', $data);
        $this->load->view('templates/footer');
    }


    public function __construct()
    {


        parent::__construct();

        $this->load->model('GroupModel');
    }


    public function insertGroup()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('groupName', 'Name of Group', 'required');
        $this->form_validation->set_rules('groupSlug', 'Slug', 'required|callback_check_slug_unique');
        $this->form_validation->set_rules('groupLocation', 'Location', 'required');
        $this->form_validation->set_rules('meetingPlace', 'Meeting Place', 'required');
        // $this->form_validation->set_rules('groupType', 'Type of Group', 'required');

        if ($this->form_validation->run() === FALSE) {
            $response = array('success' => false, 'message' => validation_errors());
        } else {
            $groupData = array(
                'groupName' => $this->input->post('groupName'),
                'groupSlug' => $this->input->post('groupSlug'),
                'groupLocation' => $this->input->post('groupLocation'),
                'meetingPlace' => $this->input->post('meetingPlace'),
                'groupType' => $this->input->post('groupType'),
                'staffId' => $_COOKIE['staffId'],
                'stationId' => $_COOKIE['stationId'],
            );

            if ($this->GroupModel->insertGroup($groupData)) {
                $response = array('success' => true, 'message' => 'Group details saved successfully!');
            } else {
                $response = array('success' => false, 'message' => 'Failed to save group details. Please try again.');
            }
        }

        echo json_encode($response);
    }


    


    public function check_slug_unique($slug)
    {
        $this->load->model('GroupModel');
        if ($this->GroupModel->isSlugUnique($slug)) {
            return TRUE;
        } else {
            $this->form_validation->set_message('check_slug_unique', 'The {field} already exists.');
            return FALSE;
        }
    }


    public function delete($groupSlug)

    {

        log_message('debug', 'Request method: ' . $this->input->server('REQUEST_METHOD'));
        log_message('debug', '_method: ' . $this->input->post('_method'));
        log_message('debug', 'Received Oroup slug: ' . $groupSlug);

        if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->input->post('_method') === 'DELETE') {
            $this->load->model('GroupModel');

            if (!empty($groupSlug)) {
                $result = $this->GroupModel->delete_group($groupSlug);

                if ($result) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to delete record']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid CGPF slug']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method or _method not received']);
        }
    }

    public function edit($groupId)
    {
        $this->load->model('GroupModel');
        $this->load->model('Station_model');
        $this->load->helper('form');



        $data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);
        $data['weekly_groups'] = $this->GroupModel->getAllWeeklyGroupsbystationId();


        $data['group'] = $this->GroupModel->getGroupBySlug($groupId);


        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('weeklygroups/edit_group', $data);
        $this->load->view('templates/footer');
    }

    public function update($groupId)
    {
        $this->load->model('GroupModel');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('groupName', 'Group Name', 'required');
        $this->form_validation->set_rules('meetingPlace', 'Meeting Place', 'required');
        $this->form_validation->set_rules('groupLocation', 'Group Location', 'required');
        $this->form_validation->set_rules('groupType', 'Group Type', 'required');

        if ($this->form_validation->run() === FALSE) {

            $this->edit($groupId);
        } else {

            $data = array(
                'groupName' => $this->input->post('groupName'),
                'groupSlug' => $this->input->post('groupSlug'),
                'groupLocation' => $this->input->post('groupLocation'),
                'meetingPlace' => $this->input->post('meetingPlace'),
                'groupType' => $this->input->post('groupType'),
            );


            $this->GroupModel->updateGroup($groupId, $data);

            redirect('Weeklygroups/index');
        }
    }
}
