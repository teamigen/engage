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

        $currentUserId = $this->session->userdata('staffId');


        if (!$currentUserId) {
            echo json_encode([
                'error' => 'User is not authenticated',
                'events' => []
            ]);
            return;
        }

        $monthYear = $this->input->post('monthYear');


        $reportData = $this->ReportModel->getReportByMonthYearAndUser($monthYear, $currentUserId);

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
            'events' => $eventsData,
            'submitReviewt' => $reportData->submitReviewt
        ]);
    }

    public function getStationByStaff()

    {
        $staffId = $this->input->post('staffId');
        $this->load->model('StaffModel');


        $staff = $this->StaffModel->getStaffById_Report($staffId);
        $stationId = $staff['station'];

        $this->load->model('Station_model');
        $station = $this->Station_model->getStationById($stationId);

        echo '<option value="' . $station['stationId'] . '">' . $station['stationName'] . '</option>';
    }







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
            'stationId' => $_COOKIE['stationId'],
            'staffId' => $_COOKIE['staffId'],
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
            // $this->EventModel->deleteEventsByReportId($reportId);
        } else {
            $reportId = $this->ReportModel->insertReport($reportData);
        }

        $events = $this->input->post('events');
        $uploadPath = './uploads/images/reports/';

        if (!is_dir($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // echo $this->input->post('events');
        if ($this->input->post('events') != '') {
            foreach ($events as $index => $event) {
                $eventData = array(
                    'reportId' => $reportId,
                    'program_date' => $event['program_date'],
                    'event_name' => $event['event_name'],
                    'event_location' => $event['event_location'],
                    'resource_person' => $event['resource_person'],
                    'attendance' => $event['attendance']
                );
                if ($event['event_name'] != '') {
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

                                echo "d";
                                if ($this->upload->do_upload('file')) {
                                    $uploadData = $this->upload->data();
                                    $uploadedFiles[] = $uploadData['file_name'];
                                } else {
                                    log_message('error', $this->upload->display_errors());
                                }
                                $eventData['eventPhotos'] = json_encode($uploadedFiles);
                            }
                        }
                    }

                    // echo"<pre>";print_r($eventData);
                    if ($event['eventId'] == '' || $event['eventId'] == 0) {
                        $this->EventModel->insertEvent($eventData);
                    } else {
                        $this->db->where('eventId', $event['eventId']);
                        $this->db->update('eg_events', $eventData);
                    }
                }
            }
        }

        echo json_encode(array('status' => 'success', 'message' => 'Report successfully processed'));
    }


    public function reviewSubmit()
    {
        $this->db->where('reportMonth', $this->input->post("reportMonth"));
        $query = $this->db->get('eg_weekreport');
        if ($query->num_rows() > 0) {
            $data['submitReviewt'] = 1;
            $this->db->where('reportMonth', $this->input->post("reportMonth"));
            $this->db->update('eg_weekreport', $data);

            echo json_encode(array('status' => 'success', 'message' => 'Successfully  !'));
        } else {
            echo json_encode(array('status' => 'danger', 'message' => 'There is no data related this month!'));
        }
    }

    public function dailyreviewSubmit()
    {
        $this->db->where('reportMonth', $this->input->post("reportMonth"));
        $query = $this->db->get('eg_dailyreport');
        if ($query->num_rows() > 0) {
            $data['submitReviewt'] = 1;
            $this->db->where('reportMonth', $this->input->post("reportMonth"));
            $this->db->update('eg_dailyreport', $data);

            echo json_encode(array('status' => 'success', 'message' => 'Successfully  !'));
        } else {
            echo json_encode(array('status' => 'danger', 'message' => 'There is no data related this month!'));
        }
    }


    public function monthlyreviewSubmit()
    {
        $this->db->where('reportMonth', $this->input->post("monthSelect"));
        $query = $this->db->get('eg_report');
        if ($query->num_rows() > 0) {
            $data['submitReviewt'] = 1;
            $this->db->where('reportMonth', $this->input->post("monthSelect"));
            $this->db->update('eg_report', $data);

            echo json_encode(array('status' => 'success', 'message' => 'Successfully  !'));
        } else {
            echo json_encode(array('status' => 'danger', 'message' => 'There is no data related this month!'));
        }
    }



    public function saveWeekReport()
    {

        $stationId = isset($_COOKIE['stationId']) ? $_COOKIE['stationId'] : null;
        $staffId = isset($_COOKIE['staffId']) ? $_COOKIE['staffId'] : null;

        for ($i = 0; $i < count($this->input->post("dateOfEvent")); $i++) {
            if ($this->input->post("groupName")[$i] != '' || $this->input->post("groupName")[$i] != 0) {
                $data['dateOfEvent'] = $this->input->post("dateOfEvent")[$i];
                $data['groupName'] = $this->input->post("groupName")[$i];
                $data['groupLeader'] = $this->input->post("groupLeader")[$i];
                $data['groupAttendance'] = $this->input->post("groupAttendance")[$i];
                $data['stationId']        = $stationId;
                $data['staffId']          = $staffId;
                $data['reportMonth'] = $this->input->post('reportMonth');
                if ($this->input->post("rowId")[$i] == 0) {
                    // echo"<pre>";print_r($data['groupName']);
                    if ($data['groupName'] != '') {
                        $this->db->insert("eg_weekreport", $data);
                    }
                } else {
                    $this->db->where('id', $this->input->post("rowId")[$i]);
                    $this->db->update('eg_weekreport', $data);
                }



                // echo"<pre>";print_r($data);
            }
        }

        $response = array(
            'status'  => 'success',
            'message' => 'Weekly report successfully processed'
        );

        echo json_encode($response);
        exit;
    }


    public function saveDailyReport()
    {


        $stationId = isset($_COOKIE['stationId']) ? $_COOKIE['stationId'] : null;
        $staffId = isset($_COOKIE['staffId']) ? $_COOKIE['staffId'] : null;





        for ($i = 0; $i < count($this->input->post("dateOfEvent")); $i++) {
            if ($this->input->post("event")[$i] != '' || $this->input->post("event")[$i] != 0) {
                $data['dateOfEvent'] = $this->input->post("dateOfEvent")[$i];
                $data['event'] = $this->input->post("event")[$i];
                $data['groupLocation'] = $this->input->post("groupLocation")[$i];
                $data['resource'] = $this->input->post("resource")[$i];
                $data['stationId']        = $stationId;
                $data['staffId']          = $staffId;
                $data['reportMonth'] = $this->input->post('reportMonth');
                if ($this->input->post("rowId")[$i] == 0) {
                    // echo"<pre>";print_r($data['groupName']);
                    if ($data['event'] != '') {
                        $this->db->insert("eg_dailyreport", $data);
                    }
                } else {
                    $this->db->where('id', $this->input->post("rowId")[$i]);
                    $this->db->update('eg_dailyreport', $data);
                }



                // echo"<pre>";print_r($data);
            }
        }

        $response = array(
            'status'  => 'success',
            'message' => 'Report successfully processed'
        );

        echo json_encode($response);
        exit;
    }




    public function getWeekDatabyYearandMonth()

    {

        $currentUserId = $this->session->userdata('staffId');


        if (!$currentUserId) {
            echo json_encode([
                'error' => 'User is not authenticated',
                'data' => []
            ]);
            return;
        }

        $monthYear = $this->input->post('monthYear');


        $reportData = $this->ReportModel->getWeekReportByMonthYearAndUser($monthYear, $currentUserId);

        $response = [];
        foreach ($reportData as $data) {
            $response[] = [
                'id' => $data->id,
                'dateOfEvent' => $data->dateOfEvent,
                'groupName' => $data->groupName,
                'groupLeader' => $data->groupLeader,
                'groupAttendance' => $data->groupAttendance,
                'submitReviewt' => $data->submitReviewt,
            ];
        }

        echo json_encode($response);
    }


    public function getDailyDatabyYearandMonth()

    {

        $currentUserId = $this->session->userdata('staffId');


        if (!$currentUserId) {
            echo json_encode([
                'error' => 'User is not authenticated',
                'data' => []
            ]);
            return;
        }

        $monthYear = $this->input->post('monthYear');


        $reportData = $this->ReportModel->getDailyReportByMonthYearAndUser($monthYear, $currentUserId);

        $response = [];
        foreach ($reportData as $data) {
            $response[] = [
                'dateOfEvent' => $data->dateOfEvent,
                'id' => $data->id,
                'event' => $data->event,
                'groupLocation' => $data->groupLocation,
                'resource' => $data->resource,
                'submitReviewt' => $data->submitReviewt,
            ];
        }

        echo json_encode($response);
    }

    public function deleteWeekReport()
    {
        $this->db->where('id', $this->input->post('rowId'));
        $this->db->delete('eg_weekreport');
    }

    public function delete_events()
    {
        $this->db->where('eventId', $this->input->post('rowId'));
        $this->db->delete('eg_events');
        // echo $this->db->last_query();
    }
    public function deletedailyReport()
    {
        $this->db->where('id', $this->input->post('rowId'));
        $this->db->delete('eg_dailyreport');
    }

    public function deleteEvent()

    {
        $this->load->model('ReportModel');

        $id = $this->input->post('id');
        $reportMonth = $this->input->post('reportMonth');

        if ($id && $reportMonth) {
            $result = $this->ReportModel->deleteEvent($id, $reportMonth);

            if ($result) {
                $response = array(
                    'status'  => 'success',
                    'message' => 'Event successfully deleted'
                );
            } else {
                $response = array(
                    'status'  => 'error',
                    'message' => 'Failed to delete event'
                );
            }
        } else {
            $response = array(
                'status'  => 'error',
                'message' => 'Invalid request'
            );
        }

        echo json_encode($response);
        exit;
    }

    public function monthDatabyYearandMonth()

    {
        $this->load->model('ReportModel');

        $currentUserId = $this->input->post('staffId');
        $monthYear = $this->input->post('monthYear');

        if (!$currentUserId) {
            echo json_encode([
                'error' => 'User is not authenticated',
                'events' => []
            ]);
            return;
        }

        $reportData = $this->ReportModel->getMonthReportByMonthYearAndUser($monthYear, $currentUserId);

        if (!$reportData) {
            echo json_encode([
                'error' => 'No report data found for the given month and year',
                'events' => []
            ]);
            return;
        }
        $events = $this->EventModel->getEventsByReportId($reportData->reportId);

        echo json_encode([
            'CGPF_Number' => $reportData->CGPF_Number,
            'House_Visit_Number' => $reportData->House_Visit_Number,
            'Hostel_Visit_Number' => $reportData->Hostel_Visit_Number,
            'Accepted_Christ' => $reportData->Accepted_Christ,
            'Baptism_Decision' => $reportData->Baptism_Decision,
            'Baptism_Number' => $reportData->Baptism_Number,
            'Holyspirit_Received' => $reportData->Holyspirit_Received,
            'Ministry_Commitments' => $reportData->Ministry_Commitments,
            'Existing_Student_Councils' => $reportData->Existing_Student_Councils,
            'New_Student_Councils' => $reportData->New_Student_Councils,
            'Existing_CGPF' => $reportData->Existing_CGPF,
            'New_CGPF' => $reportData->New_CGPF,
            'first_sunday_church_name' => $reportData->first_sunday_church_name,
            'second_sunday_church_name' => $reportData->second_sunday_church_name,
            'third_sunday_church_name' => $reportData->third_sunday_church_name,
            'fourth_sunday_church_name' => $reportData->fourth_sunday_church_name,
            'fifth_sunday_church_name' => $reportData->fifth_sunday_church_name,
            'events' => $events,
            'submitReviewt' => $reportData->submitReviewt,
        ]);
    }




    // public function saveReport()
    // {

    //     $this->load->model('ReportModel');
    //     $this->load->model('EventModel');
    //     $this->load->library('upload');

    //     $reportMonth = $this->input->post('reportMonth');

    //     $reportData = $this->prepareReportData($reportMonth);

    //     $existingReport = $this->ReportModel->getReportByMonth($reportMonth);

    //     if ($existingReport) {
    //         $reportId = $this->updateExistingReport($existingReport['reportId'], $reportData);
    //     } else {
    //         $reportId = $this->createNewReport($reportData);
    //     }


    //     $this->processEvents($reportId);

    //     echo json_encode(array('status' => 'success', 'message' => 'Report successfully processed'));
    // }

    // private function prepareReportData($reportMonth)
    // {

    //     return array(
    //         'staffName' => $_COOKIE['staffName'],
    //         'stationName' => $_COOKIE['stationName'],
    //         'stationId' => $_COOKIE['stationId'],
    //         'staffId' => $_COOKIE['staffId'],
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
    // }

    // private function updateExistingReport($reportId, $reportData)
    // {

    //     $this->ReportModel->updateReport($reportId, $reportData);
    //     $this->EventModel->deleteEventsByReportId($reportId);
    //     return $reportId;
    // }

    // private function createNewReport($reportData)
    // {

    //     return $this->ReportModel->insertReport($reportData);
    // }

    // private function processEvents($reportId)
    // {

    //     $events = $this->input->post('events');
    //     $uploadPath = './uploads/images/reports/';


    //     if (!is_dir($uploadPath)) {
    //         mkdir($uploadPath, 0755, true);
    //     }


    //     foreach ($events as $index => $event) {
    //         $eventData = $this->prepareEventData($reportId, $event);
    //         $eventData['eventPhotos'] = $this->handleFileUploads($index);
    //         $this->EventModel->insertEvent($eventData);
    //     }
    // }

    // private function prepareEventData($reportId, $event)
    // {

    //     return array(
    //         'reportId' => $reportId,
    //         'program_date' => $event['program_date'],
    //         'event_name' => $event['event_name'],
    //         'event_location' => $event['event_location'],
    //         'resource_person' => $event['resource_person'],
    //         'attendance' => $event['attendance']
    //     );
    // }

    // private function handleFileUploads($index)
    // {
    //     $uploadedFiles = array();
    //     $files = $_FILES['events']['name'][$index]['eventPhotos'];
    //     $uploadPath = './uploads/images/reports/';


    //     if (!empty($files)) {
    //         foreach ($files as $key => $fileName) {
    //             if (!empty($fileName)) {

    //                 $_FILES['file']['name'] = $fileName;
    //                 $_FILES['file']['type'] = $_FILES['events']['type'][$index]['eventPhotos'][$key];
    //                 $_FILES['file']['tmp_name'] = $_FILES['events']['tmp_name'][$index]['eventPhotos'][$key];
    //                 $_FILES['file']['error'] = $_FILES['events']['error'][$index]['eventPhotos'][$key];
    //                 $_FILES['file']['size'] = $_FILES['events']['size'][$index]['eventPhotos'][$key];

    //                 $this->upload->initialize(array(
    //                     'upload_path' => $uploadPath,
    //                     'allowed_types' => 'jpg|jpeg|png|gif',
    //                     'file_name' => uniqid() . '_' . $fileName
    //                 ));


    //                 if ($this->upload->do_upload('file')) {
    //                     $uploadData = $this->upload->data();
    //                     $uploadedFiles[] = $uploadData['file_name'];
    //                 } else {

    //                     log_message('error', $this->upload->display_errors());
    //                 }
    //             }
    //         }
    //     }


    //     return !empty($uploadedFiles) ? json_encode($uploadedFiles) : null;
    // }


}
