<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Weeklygroups extends CI_Controller {

	public function index()
	{
		$this->load->model('ChurchModel');
		// $data['regions'] = $this->Station_model->getallactiveregions();
		// $data['stations'] = $this->Station_model->getallactivestations();
		$data['locations'] = $this->ChurchModel->getallactivelocations();
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('weeklygroups/create',$data);
		$this->load->view('templates/footer');
	}

	public function __construct() {
		
        parent::__construct();

        $this->load->model('GroupModel'); 
    }

    public function insertGroup() {
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('groupName', 'Name of Group', 'required');
        $this->form_validation->set_rules('groupSlug', 'Slug', 'required');
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
                'groupType' => $this->input->post('groupType')
            );
          
            if ($this->GroupModel->insertGroup($groupData)) {
                $response = array('success' => true, 'message' => 'Group details saved successfully!');
            } else {
                $response = array('success' => false, 'message' => 'Failed to save group details. Please try again.');
            }
        }      

        echo json_encode($response);
    }
}
