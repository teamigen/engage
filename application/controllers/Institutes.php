<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Institutes extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('InstituteModel');
        $this->load->model('Station_model');
        $this->load->library('form_validation');
        $this->load->model('InstituteModel');
    }

    public function index()
    {
        $data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);
        $data['institutes'] = $this->InstituteModel->getallactiveinstitutessbystation($_COOKIE['stationId']);
        // echo $this->db->last_query();


        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('institutes/create', $data);
        $this->load->view('templates/footer');
    }


    public function delete($instituteSlug)

    {
        log_message('debug', 'Request method: ' . $this->input->server('REQUEST_METHOD'));
        log_message('debug', '_method: ' . $this->input->post('_method'));
        log_message('debug', 'Received Group slug: ' . $instituteSlug);

        if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->input->post('_method') === 'DELETE') {
            $this->load->model('InstituteModel');

            if (!empty($instituteSlug)) {
                $result = $this->InstituteModel->delete_institute($instituteSlug);

                if ($result) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Failed to delete record']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid Institute slug']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method or _method not received']);
        }
    }



    public function edit($instituteSlug)
    {
        $data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);
        $data['institutes'] = $this->InstituteModel->getallactiveinstitutessbystation($_COOKIE['stationId']);




        $data['institute'] = $this->InstituteModel->get_institute_by_slug($instituteSlug);

        if (!$data['institute']) {

            $this->session->set_flashdata('message', 'The Institute you were editing has been deleted.');
            redirect('institutes/index');
        }

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('institutes/edit_institute', $data);
        $this->load->view('templates/footer');
    }


    public function update()
    {
        $this->form_validation->set_rules('instituteName', 'Institute Name', 'required');
        $this->form_validation->set_rules('instituteSlug', 'Slug', 'required');
        $this->form_validation->set_rules('instituteLocation', 'Location', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('error', validation_errors());
            redirect('Institutes/edit/' . $this->input->post('instituteSlug'));
        } else {
            $instituteId = $this->input->post('instituteId');
            $instituteSlug = $this->input->post('instituteSlug');


            if ($this->InstituteModel->slugExists($instituteSlug, $instituteId)) {
                $this->session->set_flashdata('error', 'Slug already exists.');
                redirect('Institutes/index/');
            }

            $data = [
                'instituteName' => $this->input->post('instituteName'),
                'instituteSlug' => $instituteSlug,
                'instituteLocation' => $this->input->post('instituteLocation'),
            ];

            $result = $this->InstituteModel->update_institute($instituteId, $data);

            if ($result) {
                $this->session->set_flashdata('success', 'Institute updated successfully.');
                redirect('Institutes');
            } else {
                $this->session->set_flashdata('error', 'Failed to update institute.');
                redirect('Institutes/edit/' . $instituteSlug);
            }
        }
    }
}
