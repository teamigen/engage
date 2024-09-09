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

    public function getDatabyYearandMonth()
    {
        $monthYear = $this->input->post('monthYear');


        $reportData = $this->ReportModel->getReportByMonthYear($monthYear);


        if (!$reportData) {
            echo json_encode([
                'error' => 'No report data found for the given month and year',
                'events' => []
            ]);
            return;
        }


        $eventsData = $this->EventModel->getEventsByReportId($reportData->reportId);


        echo json_encode([
            'CGPF_Number' => $reportData->CGPF_Number,
            'House_Visit_Number' => $reportData->House_Visit_Number,
            'Hostel_Visit_Number' => $reportData->Hostel_Visit_Number,
            'Evangelisms_Number' => $reportData->Evangelisms_Number,
            'Accepted_Christ' => $reportData->Accepted_Christ,
            'Baptism_Decision' => $reportData->Baptism_Decision,
            'Baptism_Number' => $reportData->Baptism_Number,
            'Holyspirit_Received' => $reportData->Holyspirit_Received,
            'Ministry_Commitments' => $reportData->Ministry_Commitments,
            'Existing_Student_Councils' => $reportData->Existing_Student_Councils,
            'New_Student_Councils' => $reportData->New_Student_Councils,
            'Existing_CGPF' => $reportData->Existing_CGPF,
            'New_CGPF' => $reportData->New_CGPF,
            'first_sunday_church' => $reportData->first_sunday_church,
            'second_sunday_church' => $reportData->second_sunday_church,
            'third_sunday_church' => $reportData->third_sunday_church,
            'fourth_sunday_church' => $reportData->fourth_sunday_church,
            'fifth_sunday_church' => $reportData->fifth_sunday_church,
            'events' => $eventsData
        ]);
    }







    // public function saveReport()
    // {
    //     $reportMonth = $this->input->post('reportMonth');


    //     if ($this->ReportModel->reportExists($reportMonth)) {
    //         echo json_encode(array('status' => 'error', 'message' => 'Report for this month already exists'));
    //         return;
    //     }
    //     $this->load->model('ReportModel');
    //     $this->load->model('EventModel');
    //     $this->load->library('upload');

    //     $events = $this->input->post('events');
    //     $hasFiles = false;

    //     log_message('debug', json_encode($_FILES));

    //     foreach ($_FILES['events']['name'] as $index => $eventPhotos) {
    //         if (!empty($eventPhotos['eventPhotos'])) {
    //             foreach ($eventPhotos['eventPhotos'] as $fileName) {
    //                 if (!empty($fileName)) {
    //                     $hasFiles = true;
    //                     break;
    //                 }
    //             }
    //         }
    //     }

    //     if (!$hasFiles) {
    //         echo json_encode(array('status' => 'error', 'message' => 'No files uploaded'));
    //         return;
    //     }



    //     $reportData = array(
    //         'staffName' => $_COOKIE['staffName'],
    //         'stationName' => $_COOKIE['stationName'],
    //         'reportMonth' => $reportMonth,
    //         'CGPF_Number' => $this->input->post('CGPF_Number'),
    //         'House_Visit_Number' => $this->input->post('House_Visit_Number'),
    //         'Hostel_Visit_Number' => $this->input->post('Hostel_Visit_Number'),
    //         'Evangelisms_Number' => $this->input->post('Evangelisms_Number'),
    //         'Accepted_Christ' => $this->input->post('Accepted_Christ'),
    //         'Baptism_Decision' => $this->input->post('Baptism_Decision'),
    //         'Baptism_Number' => $this->input->post('Baptism_Number'),
    //         'Holyspirit_Received' => $this->input->post('Holyspirit_Received'),
    //         'Ministry_Commitments' => $this->input->post('Ministry_Commitments'),
    //         'Existing_Student_Councils' => $this->input->post('Existing_Student_Councils'),
    //         'New_Student_Councils' => $this->input->post('New_Student_Councils'),
    //         'Existing_CGPF' => $this->input->post('Existing_CGPF'),
    //         'New_CGPF' => $this->input->post('New_CGPF'),
    //         'first_sunday_church' => $this->input->post('first_sunday_church'),
    //         'second_sunday_church' => $this->input->post('second_sunday_church'),
    //         'third_sunday_church' => $this->input->post('third_sunday_church'),
    //         'fourth_sunday_church' => $this->input->post('fourth_sunday_church'),
    //         'fifth_sunday_church' => $this->input->post('fifth_sunday_church')
    //     );

    //     $reportId = $this->ReportModel->insertReport($reportData);

    //     foreach ($events as $index => $event) {
    //         $eventData = array(
    //             'reportId' => $reportId,
    //             'program_date' => $event['program_date'],
    //             'event_name' => $event['event_name'],
    //             'event_location' => $event['event_location'],
    //             'resource_person' => $event['resource_person'],
    //             'attendance' => $event['attendance']
    //         );

    //         $uploadPath = './uploads/images/reports/';
    //         if (!is_dir($uploadPath)) {
    //             mkdir($uploadPath, 0755, true);
    //         }

    //         $uploadedFiles = array();

    //         if (!empty($_FILES['events']['name'][$index]['eventPhotos'])) {
    //             foreach ($_FILES['events']['name'][$index]['eventPhotos'] as $key => $fileName) {
    //                 if (!empty($fileName)) {
    //                     $_FILES['file']['name'] = $_FILES['events']['name'][$index]['eventPhotos'][$key];
    //                     $_FILES['file']['type'] = $_FILES['events']['type'][$index]['eventPhotos'][$key];
    //                     $_FILES['file']['tmp_name'] = $_FILES['events']['tmp_name'][$index]['eventPhotos'][$key];
    //                     $_FILES['file']['error'] = $_FILES['events']['error'][$index]['eventPhotos'][$key];
    //                     $_FILES['file']['size'] = $_FILES['events']['size'][$index]['eventPhotos'][$key];

    //                     $this->upload->initialize(array(
    //                         'upload_path' => $uploadPath,
    //                         'allowed_types' => 'jpg|jpeg|png|gif',
    //                         'file_name' => uniqid() . '_' . $_FILES['file']['name']
    //                     ));

    //                     if ($this->upload->do_upload('file')) {
    //                         $uploadData = $this->upload->data();
    //                         $uploadedFiles[] = $uploadData['file_name'];
    //                     } else {
    //                         log_message('error', $this->upload->display_errors());
    //                     }
    //                 }
    //             }
    //         }

    //         $eventData['eventPhotos'] = !empty($uploadedFiles) ? json_encode($uploadedFiles) : null;
    //         $this->EventModel->insertEvent($eventData);
    //     }

    //     echo json_encode(array('status' => 'success', 'message' => 'Month Report Successfully Created'));
    // }

    public function saveReport()
    {
        $reportMonth = $this->input->post('reportMonth');

        $this->load->model('ReportModel');
        $this->load->model('EventModel');
        $this->load->library('upload');

        $existingReport = $this->ReportModel->getReportByMonth($reportMonth);

        $reportData = array(
            'staffName' => $_COOKIE['staffName'],
            'stationName' => $_COOKIE['stationName'],
            'reportMonth' => $reportMonth,
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
            'fifth_sunday_church' => $this->input->post('fifth_sunday_church')
        );

        if ($existingReport) {
            $reportId = $existingReport['reportId'];
            $this->ReportModel->updateReport($reportId, $reportData);
            $this->EventModel->deleteEventsByReportId($reportId);
        } else {
            $reportId = $this->ReportModel->insertReport($reportData);
        }

        $events = $this->input->post('events');
        $uploadPath = './uploads/images/reports/';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        foreach ($events as $index => $event) {
            $eventData = array(
                'reportId' => $reportId,
                'program_date' => $event['program_date'],
                'event_name' => $event['event_name'],
                'event_location' => $event['event_location'],
                'resource_person' => $event['resource_person'],
                'attendance' => $event['attendance']
            );

            $uploadedFiles = array();

            if (!empty($_FILES['events']['name'][$index]['eventPhotos'])) {
                foreach ($_FILES['events']['name'][$index]['eventPhotos'] as $key => $fileName) {
                    if (!empty($fileName)) {
                        $_FILES['file']['name'] = $fileName;
                        $_FILES['file']['type'] = $_FILES['events']['type'][$index]['eventPhotos'][$key];
                        $_FILES['file']['tmp_name'] = $_FILES['events']['tmp_name'][$index]['eventPhotos'][$key];
                        $_FILES['file']['error'] = $_FILES['events']['error'][$index]['eventPhotos'][$key];
                        $_FILES['file']['size'] = $_FILES['events']['size'][$index]['eventPhotos'][$key];

                        $this->upload->initialize(array(
                            'upload_path' => $uploadPath,
                            'allowed_types' => 'jpg|jpeg|png|gif',
                            'file_name' => uniqid() . '_' . $fileName
                        ));

                        if ($this->upload->do_upload('file')) {
                            $uploadData = $this->upload->data();
                            $uploadedFiles[] = $uploadData['file_name'];
                        } else {
                            log_message('error', $this->upload->display_errors());
                        }
                    }
                }
            }

            $eventData['eventPhotos'] = !empty($uploadedFiles) ? json_encode($uploadedFiles) : null;
            $this->EventModel->insertEvent($eventData);
        }

        echo json_encode(array('status' => 'success', 'message' => 'Report successfully processed'));
    }
}
