<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ReportController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ReportModel');
        $this->load->model('EventModel');
    }

    public function saveReport()
    {

        $reportData = array(
            'CGPF_Number' => $this->input->post('CGPF_Number'),
            'House_Visit_Number' => $this->input->post('House_Visit_Number'),
            'Hostel_Visit_Number' => $this->input->post('Hostel_Visit_Number'),
            'Evangelisms_Number' => $this->input->post('Evangelisms_Number'),
            'Accepted_Christ' => $this->input->post('Accepted_Christ'),
            'Baptism_Decision' => $this->input->post('Baptism_Decision'),
            'Baptism_Number' => $this->input->post('Baptism_Number'),
            'Holyspirit_Received' => $this->input->post('Holyspirit_Received'),
            'Ministry_Commitments' => $this->input->post('Ministry_Commitments'),
            'Existing_Student_Councils' => $this->input->post('Existing_Student_Councils'),
            'New_Student_Councils' => $this->input->post('New_Student_Councils'),
            'Existing_CGPF' => $this->input->post('Existing_CGPF'),
            'New_CGPF' => $this->input->post('New_CGPF'),
            'first_sunday_church' => $this->input->post('first_sunday_church'),
            'second_sunday_church' => $this->input->post('second_sunday_church'),
            'third_sunday_church' => $this->input->post('third_sunday_church'),
            'fourth_sunday_church' => $this->input->post('fourth_sunday_church'),
            'fifth_sunday_church' => $this->input->post('fifth_sunday_church'),
            'staffId' => $_COOKIE['staffId'],
            'stationId' => $_COOKIE['stationId'],
            'reportMonth' => $this->input->post('reportMonth'),
        );


        $reportId = $this->ReportModel->insert($reportData);


        $events = $this->input->post('events');
        if (!empty($events)) {
            foreach ($events as $key => $event) {
                $eventData = array(
                    'report_id' => $reportId,
                    'program_date' => $event['program_date'],
                    'event_name' => $event['event_name'],
                    'event_location' => $event['event_location'],
                    'resource_person' => $event['resource_person'],
                    'attendance' => $event['attendance']
                );


                $uploadPath = './uploads/images/reports/';
                if (!is_dir($uploadPath)) {
                    mkdir($uploadPath, 0755, true);
                }

                if (!empty($_FILES['events']['name'][$key]['eventPhotos'])) {
                    $this->load->library('upload');
                    $files = $_FILES;
                    $eventPhotos = array();

                    foreach ($_FILES['events']['name'][$key]['eventPhotos'] as $index => $name) {
                        $_FILES['eventPhoto']['name'] = $files['events']['name'][$key]['eventPhotos'][$index];
                        $_FILES['eventPhoto']['type'] = $files['events']['type'][$key]['eventPhotos'][$index];
                        $_FILES['eventPhoto']['tmp_name'] = $files['events']['tmp_name'][$key]['eventPhotos'][$index];
                        $_FILES['eventPhoto']['error'] = $files['events']['error'][$key]['eventPhotos'][$index];
                        $_FILES['eventPhoto']['size'] = $files['events']['size'][$key]['eventPhotos'][$index];

                        $config['upload_path'] = $uploadPath;
                        
                        $config['allowed_types'] = 'jpg|jpeg|png|gif';
                        // $config['max_size'] = 2048;
                        $config['encrypt_name'] = TRUE;

                        $this->upload->initialize($config);

                        if ($this->upload->do_upload('eventPhoto')) 
                        {
                            $uploadData = $this->upload->data();

                            $eventPhotos[] = $uploadData['file_name'];
                        } else {

                            $error = $this->upload->display_errors();
                            log_message('error', 'File upload error: ' . $error);
                        }
                    }

                    $eventData['eventPhotos'] = implode(',', $eventPhotos);
                }

                $this->EventModel->insert($eventData);
            }
        }

        $this->session->set_flashdata('success', 'Report and Events saved successfully!');
        redirect('Staff/monthreport');
    }
    
}
