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

    public function delete($instituteId)
    {

        log_message('debug', 'Request method: ' . $this->input->server('REQUEST_METHOD'));
        log_message('debug', '_method: ' . $this->input->post('_method'));

        if ($this->input->server('REQUEST_METHOD') === 'POST' && $this->input->post('_method') === 'DELETE') {

            $this->load->model('InstituteModel');

            if (is_numeric($instituteId)) {
                $result = $this->InstituteModel->delete_institute($instituteId);

                if ($result) {
                    echo json_encode(['success' => true]);
                } else {
                    echo json_encode(['success' => false]);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Invalid institute ID']);
            }
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid request method or _method not received']);
        }
    }



    public function edit($instituteSlug)
    {
        $data['locations'] = $this->Station_model->getallactivelocationsbystation($_COOKIE['stationId']);
        $data['institutes'] = $this->InstituteModel->getallactiveinstitutessbystation($_COOKIE['stationId']);




        $data['institute'] = $this->InstituteModel->get_Institute_by_slug($instituteSlug);

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

            $data = [
                'instituteName' => $this->input->post('instituteName'),
                'instituteSlug' => $this->input->post('instituteSlug'),
                'instituteLocation' => $this->input->post('instituteLocation'),
            ];


            $instituteId = $this->input->post('instituteId');
            $result = $this->InstituteModel->update_institute($instituteId, $data);

            if ($result) {

                $this->session->set_flashdata('success', 'Institute updated successfully.');
                redirect('Institutes');
            } else {

                $this->session->set_flashdata('error', 'Failed to update institute.');
                redirect('Institutes/edit/' . $this->input->post('instituteid'));
            }
        }
    }
}
