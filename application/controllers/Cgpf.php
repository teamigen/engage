<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cgpf extends CI_Controller
{

	public function __construct() {
        parent::__construct();
        $this->load->model('CGPFModel');
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
			
		}

		echo json_encode($response);
	}


	public function delete($cgpf_slug)
	{
		log_message('debug', 'Request method: ' . $this->input->server('REQUEST_METHOD'));
		log_message('debug', '_method: ' . $this->input->post('_method'));
		log_message('debug', 'Received CGPF slug: ' . $cgpf_slug);

		if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->input->post('_method') === 'DELETE') {
			$this->load->model('CGPFModel');

			if (!empty($cgpf_slug)) {
				$result = $this->CGPFModel->delete_cgpf($cgpf_slug);

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
	public function createnew()
	{
		$data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('cgpf/create', $data);
		$this->load->view('templates/footer');
	}

	public function edit($cgpfSlug)
	{
		$data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);


		$data['cgpf'] = $this->CGPFModel->get_CGPF_by_slug($cgpfSlug);
		$data['members'] = $this->CGPFModel->get_members_by_cgpf_id($data['cgpf']->cgpf_id);

		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('cgpf/edit_cgpf', $data);
		$this->load->view('templates/footer');
	}
	public function update($cgpf_slug)
{
    $this->load->model('CGPFModel');

 
    $cgpf = $this->CGPFModel->getCgpfBySlug($cgpf_slug);
    if (!$cgpf) {
        show_404();
    }

    
    $cgpf_data = [
        'cgpf_name'     => $this->input->post('cgpf_name'),
        'cgpf_slug'     => $this->input->post('cgpf_slug'),
        'location_id'   => $this->input->post('location_id'),
        'period_name'   => $this->input->post('period_name'),
        'start_date'    => $this->input->post('start_date'),
        'end_date'      => $this->input->post('end_date')
    ];


    $this->CGPFModel->updateCgpf($cgpf->cgpf_id, $cgpf_data);

   
    $this->CGPFModel->deleteMembersByCgpfId($cgpf->cgpf_id);

   
    $members = $this->input->post('members');
    foreach ($members as $member) {
        $member_data = [
            'cgpf_id'     => $cgpf->cgpf_id,
            'name'        => $member['name'],
            'designation' => $member['designation'],
            'phone'       => $member['phone'],
            'email'       => $member['email']
        ];
        $this->CGPFModel->insertMember($member_data);
    }

    
    redirect('cgpf/manage');
}

}
