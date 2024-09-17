<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Churches extends CI_Controller
{

	public function index()

	{
		$this->load->model('ChurchModel');
		// $data['regions'] = $this->Station_model->getallactiveregions();
		// $data['stations'] = $this->Station_model->getallactivestations();
		$data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);
		$data['churches'] = $this->ChurchModel->getallactivechurchesbystation($_COOKIE['stationId']);
		// $data['churches'] = $this->ChurchModel->getAllChurches();


		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('churches/create', $data);
		$this->load->view('templates/footer');
	}


	public function delete($churchSlug)

	{
		log_message('debug', 'Request method: ' . $this->input->server('REQUEST_METHOD'));
		log_message('debug', '_method: ' . $this->input->post('_method'));
		log_message('debug', 'Received Oroup slug: ' . $churchSlug);

		if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->input->post('_method') === 'DELETE') {
			$this->load->model('ChurchModel');

			if (!empty($churchSlug)) {
				$result = $this->ChurchModel->delete_church($churchSlug);

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

	public function edit($churchSlug)
	{
		$this->load->model('ChurchModel');


		$data['churches'] = $this->ChurchModel->getallactivechurchesbystation($_COOKIE['stationId']);

		$data['church'] = $this->ChurchModel->getChurchBySlug($churchSlug);

		if (!$data['church']) {

			$this->session->set_flashdata('message', 'The church you were editing has been deleted.');
			redirect('churches/index');
		}

		$data['contactPersons'] = $this->ChurchModel->getContactPersonsByChurchSlug($churchSlug);

		$data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);

		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('churches/edit_church', $data);
		$this->load->view('templates/footer');
	}


	public function update()
	{
		$this->load->model('ChurchModel');

		$churchId = $this->input->post('churchId');

		$church = $this->ChurchModel->getChurchById($churchId);

		if ($church === null) {
			show_error('Church not found', 404);
			return;
		}

		$data = array(
			'churchName' => $this->input->post('churchName'),
			'churchLocation' => $this->input->post('churchLocation'),
			'pastorName' => $this->input->post('pastorName'),
			'mobileNumber' => $this->input->post('mobileNumber'),
			'churchSlug' => $this->input->post('churchSlug'),

		);

		$this->ChurchModel->updateChurch($churchId, $data);

		$this->ChurchModel->deleteContactPersonsByChurchId($churchId);

		$contactNames = $this->input->post('contactName');
		$contactPhones = $this->input->post('contactPhone');
		$contactTypes = $this->input->post('contactType');
		if (!empty($contactNames) && !empty($contactPhones)) {
			foreach ($contactNames as $index => $contactName) {
				$contactData = array(
					'churchId' => $churchId,
					'contactName' => $contactName,
					'contactType' => $contactTypes[$index],
					'contactPhone' => $contactPhones[$index]
				);

				$this->ChurchModel->insertContactPerson($contactData);
			}
		}

		redirect('churches/index');
	}
}
