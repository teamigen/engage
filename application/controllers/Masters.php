<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masters extends CI_Controller
{

	public function index()
	{
		$this->load->model('ChurchModel');
		$data['locations'] = $this->ChurchModel->getallactivelocations();
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('churches/create');
		$this->load->view('templates/footer');
	}
	
	
	public function locations()
	{
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('masters/locations');
		$this->load->view('templates/footer');
	}


	public function savelocation()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$locationName = $this->security->xss_clean($this->input->post('locationName'));
		$locationSlug = $this->security->xss_clean($this->input->post('locationSlug'));

		// Prepare data for insertion
		$data = array(
			'locationName' => $locationName,
			'locationStatus' => 1,
			'locationSlug' => $locationSlug
		);

		// Load model
		$this->load->model('Station_model');

		// Save data using model
		$saved = $this->Station_model->save_location($data);

	
		$response = array(
			'success' => $saved,
			'message' => $saved ? 'Location saved successfully!' : 'Location slug already exists or an error occurred.'
		);

		
		echo json_encode($response);
	}
}
