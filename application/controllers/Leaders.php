<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leaders extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('LeaderModel');
		$this->load->model('InstituteModel');
	}

	public function index()
	{
		$this->load->model('LeaderModel');

		$data['leaders'] = $this->LeaderModel->getAllLeaders();

		$data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);
		$data['institutes'] = $this->InstituteModel->getallactiveinstitutessbystation($_COOKIE['stationId']);

		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('leaders/create', $data);
		$this->load->view('templates/footer');
	}


	public function saveLeader()
	{

		$this->load->library('form_validation');


		$this->form_validation->set_rules('name_of_leader', 'Name of Leader', 'required|trim');
		$this->form_validation->set_rules('courseclass_of_leader', 'Course & Class', 'required|trim');
		$this->form_validation->set_rules('home_location', 'Home Location', 'required|trim');
		$this->form_validation->set_rules('phone_of_leader', 'Phone', 'required|trim');
		$this->form_validation->set_rules('email_of_leader', 'Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('joining_as_leader', 'Year of Joining', 'required|trim');
		$this->form_validation->set_rules('year_of_graduation', 'Year of Graduation', 'required|trim');


		if ($this->form_validation->run() === FALSE) {

			$errors = array(
				'name_of_leader' => form_error('name_of_leader'),
				'courseclass_of_leader' => form_error('courseclass_of_leader'),
				'home_location' => form_error('home_location'),
				'phone_of_leader' => form_error('phone_of_leader'),
				'email_of_leader' => form_error('email_of_leader'),
				'joining_as_leader' => form_error('joining_as_leader'),
				'year_of_graduation' => form_error('year_of_graduation')
			);


			echo json_encode(['success' => false, 'errors' => $errors]);
		} else {

			$data = array(
				'name_of_leader' => $this->input->post('name_of_leader'),
				'leaderSlug' => $this->input->post('leaderSlug'),
				'courseclass_of_leader' => $this->input->post('courseclass_of_leader'),
				'Institute' => $this->input->post('Institute'),
				'home_location' => $this->input->post('home_location'),
				'phone_of_leader' => $this->input->post('phone_of_leader'),
				'email_of_leader' => $this->input->post('email_of_leader'),
				'joining_as_leader' => $this->input->post('joining_as_leader'),
				'year_of_graduation' => $this->input->post('year_of_graduation'),
				'staffId' => $_COOKIE['staffId'],
				'stationId' => $_COOKIE['stationId']
			);


			$inserted = $this->LeaderModel->saveLeader($data);


			if ($inserted) {

				echo json_encode(['success' => true]);
			} else {

				echo json_encode(['success' => false, 'error' => 'An error occurred while saving the leader.']);
			}
		}
	}

	public function edit($slug)
	{
		$this->load->model('LeaderModel');
		$this->load->model('InstituteModel');
		$data['leaders'] = $this->LeaderModel->getAllLeaders();
		$data['institutes'] = $this->InstituteModel->getallactiveinstitutessbystation($_COOKIE['stationId']);


		$data['leader'] = $this->LeaderModel->getLeaderBySlug($slug);

		if (!$data['leader']) {
			show_404();
		}

		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('leaders/edit_leader', $data);
		$this->load->view('templates/footer');
	}

	public function update()
	{
		$this->load->model('LeaderModel');

		$leaderSlug = $this->input->post('leaderId');

		$data = array(
			'name_of_leader' => $this->input->post('name_of_leader'),
			'leaderSlug' => $this->input->post('leaderSlug'),
			'courseclass_of_leader' => $this->input->post('courseclass_of_leader'),
			'Institute' => $this->input->post('Institute'),
			'home_location' => $this->input->post('home_location'),
			'phone_of_leader' => $this->input->post('phone_of_leader'),
			'email_of_leader' => $this->input->post('email_of_leader'),
			'joining_as_leader' => $this->input->post('joining_as_leader'),
			'year_of_graduation' => $this->input->post('year_of_graduation')
		);

		$result = $this->LeaderModel->updateLeader($leaderSlug, $data);

		if ($result) {
			$this->session->set_flashdata('success', 'Leader information updated successfully.');
			redirect('leaders'); // Redirecting to the index method
		} else {
			$this->session->set_flashdata('error', 'Failed to update leader information.');
			redirect('leaders/edit_leader/' . $leaderSlug);
		}
	}









	public function delete($slug)
	{
		$this->load->model('LeaderModel');

		$deleted = $this->LeaderModel->deleteLeaderBySlug($slug);

		if ($deleted) {
			$this->session->set_flashdata('message', 'Leader deleted successfully!');
		} else {
			$this->session->set_flashdata('error', 'Failed to delete leader. Please try again.');
		}

		redirect('Leaders');
	}
}
