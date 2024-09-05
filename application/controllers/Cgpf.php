<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cgpf extends CI_Controller
{



	public function createnew()
	{
		$data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('cgpf/create', $data);
		$this->load->view('templates/footer');
	}




    public function manage()
    {
        $this->load->model('CGPFModel');
        $data['cgpfList'] = $this->CGPFModel->getAllCGPF(); 

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('cgpf/manage', $data); 
        $this->load->view('templates/footer');
    }

	public function save()
	{
		$this->load->model('CGPFModel');

		$cgpfName = $this->input->post('cgpf_name');
		$cgpfSlug = $this->input->post('cgpf_slug');
		$locationId = $this->input->post('location_id');
		$periodName = $this->input->post('period_name');
		$startDate = $this->input->post('start_date');
		$endDate = $this->input->post('end_date');
		$members = $this->input->post('members');

		$staffId = $this->input->cookie('staffId', true);
		$stationId = $this->input->cookie('stationId', true);

		// Debugging: Print the post data
		// print_r($this->input->post());

		$cgpfId = $this->CGPFModel->saveCGPF($cgpfName, $cgpfSlug, $locationId, $periodName, $startDate, $endDate, $staffId, $stationId);

		if ($cgpfId) {
			foreach ($members as $member) {
				$this->CGPFModel->saveMember($cgpfId, $member['name'], $member['designation'], $member['phone'], $member['email'], $staffId, $stationId);
			}
			$response = ['success' => true];
		} else {
			$response = ['success' => false, 'message' => 'Failed to save CGPF details.'];
			// Debugging: Print database error
			// print_r($this->db->error());
		}

		echo json_encode($response);
	}
}
