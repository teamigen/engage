<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Masters extends CI_Controller
{

	public function index()
	{
		$this->load->model('ChurchModel');
		// $data['locations'] = $this->ChurchModel->getallactivelocationsbystation($_COOKIE['stationId']);
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('churches/create');
		$this->load->view('templates/footer');
	}


	public function locations()
	{
		$data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('masters/locations', $data);
		$this->load->view('templates/footer');
	}
	public function editLocation($locationSlug)
	{

		$this->load->model('Station_model');

		$data['location'] = $this->Station_model->get_location_by_slug($locationSlug);


		if (!$data['location']) {

			$this->session->set_flashdata('message', 'The location you were editing has been deleted.');
			redirect('Masters/index');
		}

		
		$data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);

		if (empty($data['location'])) {
			show_404();
		}


		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('masters/edit_location', $data);
		$this->load->view('templates/footer');
	}



	public function savelocation()
	{
		if (!$this->input->is_ajax_request()) {
			exit('No direct script access allowed');
		}

		$locationName = $this->security->xss_clean($this->input->post('locationName'));
		$locationSlug = $this->security->xss_clean($this->input->post('locationSlug'));
		$stationId = $_COOKIE['stationId'];
		$staffId = $_COOKIE['staffId'];

		$data = array(
			'locationName' => $locationName,
			'locationStatus' => 1,
			'locationSlug' => $locationSlug,
			'stationId' => $stationId,
			'staffId' => $staffId
		);

		$this->load->model('Station_model');

		$saved = $this->Station_model->save_location($data);

		$response = array(
			'success' => $saved ? 'Location saved successfully!' : false,
			'error' => !$saved ? array('locationSlug' => 'Location slug already exists or an error occurred.') : array()
		);


		echo json_encode($response);
	}
	public function deletelocation($locationSlug)
	{
		log_message('debug', 'Request method: ' . $this->input->server('REQUEST_METHOD'));
		log_message('debug', '_method: ' . $this->input->post('_method'));
		log_message('debug', 'Received Oroup slug: ' . $locationSlug);

		if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->input->post('_method') === 'DELETE') {
			$this->load->model('Common_model');

			if (!empty($locationSlug)) {
				$result = $this->Common_model->delete_location($locationSlug);

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
	
	public function updateLocation()
	{

		$this->load->model('Station_model');


		$locationId = $this->input->post('locationId');
		$locationName = $this->input->post('locationName');
		$locationSlug = $this->input->post('locationSlug');


		$data = array(
			'locationName' => $locationName,
			'locationSlug' => $locationSlug,
			'locationStatus' => 1
		);

		$update = $this->Station_model->update_location($locationId, $data);

		if ($update) {
			$this->session->set_flashdata('success', 'Location updated successfully.');
		} else {
			$this->session->set_flashdata('error', 'Failed to update location.');
		}

		
		redirect('masters/locations'); 
	}
}
