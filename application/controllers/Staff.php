<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller

{
    public function create()
    {
        $this->load->model('Station_model');

        $data['regions'] = $this->Station_model->getallactiveregions();
        $data['stations'] = $this->Station_model->getallactivestations();
        $data['locations'] = $this->Station_model->getallactivelocations();
        // var_dump($data);

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('staff/create', $data);
        $this->load->view('templates/footer');
    }

    public function manage()

    {
        $this->load->model('StaffModel');

        $data['staffs'] = $this->StaffModel->getallstaffdetails();

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('staff/manage', $data);
        $this->load->view('templates/footer');
    }



    public function monthreport()
    {
        $this->load->model('ChurchModel');
        $data['countries'] = $this->Common_model->getallactive('eg_country', 'countryActive', 'countryName', 'asc');
        $data['churches'] = $this->ChurchModel->getAllChurches();

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('reports/monthreports', $data);
        $this->load->view('templates/footer');
    }







    public function adminmonthreport()
    {
        $this->load->model('ChurchModel');
        $data["churches"] = $this->ChurchModel->getallchurches();
        $data['countries'] = $this->Common_model->getallactive('eg_country', 'countryActive', 'countryName', 'asc');


        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('reports/adminmonthreports', $data);
        $this->load->view('templates/footer');
    }

    public function regionmonthreport()
    {
        $this->load->model('StaffModel');
        $this->load->model('ChurchModel');
    
        $data["churches"] = $this->ChurchModel->getallchurches();
        $data['countries'] = $this->Common_model->getallactive('eg_country', 'countryActive', 'countryName', 'asc');
        $data['staff'] = $this->StaffModel->getAllStaff(); 
    
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('reports/regionmonthreports', $data);
        $this->load->view('templates/footer');
    }
    



    public function weekreport()

    {
        $this->load->model('GroupModel');
        $data['countries'] = $this->Common_model->getallactive('eg_country', 'countryActive', 'countryName', 'asc');

        $data['weeklyGroups'] = $this->GroupModel->getAllWeeklyGroupsbystaff();
        $this->load->model('LeaderModel');
        $data['leaders'] = $this->LeaderModel->getAllLeadersbyStaff($_COOKIE['staffId']);

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('reports/weekreports', $data);
        $this->load->view('templates/footer');
    }

    public function dailyreport()

    {
        $this->load->model('GroupModel');
        $data['countries'] = $this->Common_model->getallactive('eg_country', 'countryActive', 'countryName', 'asc');
        //$data['regions'] = $this->Common_model->getallactive('eg_region', 'regionActive', 'regionName', 'asc');
        $data['weeklyGroups'] = $this->GroupModel->getAllWeeklyGroupsbystaff();
        $this->load->model('LeaderModel'); // Load your model
        $data['leaders'] = $this->LeaderModel->getAllLeadersbyStaff($_COOKIE['stationId']);
        $this->load->model('Station_model');
        $this->db->where("stationId", $_COOKIE['stationId']);
        $data['locations'] = $this->Station_model->getallactivelocationsArr();

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('reports/dailyreport', $data);
        $this->load->view('templates/footer');
    }


    public function previousreports()

    {
        $data['countries'] = $this->Common_model->getallactive('eg_country', 'countryActive', 'countryName', 'asc');
        //$data['regions'] = $this->Common_model->getallactive('eg_region', 'regionActive', 'regionName', 'asc');

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('reports/previousreports', $data);
        $this->load->view('templates/footer');
    }

    public function saveregion()

    {

        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        // Get field value from POST data
        $regionName = $this->security->xss_clean($this->input->post('regionName')); // Sanitize input

        $data = array(
            'regionName' => $regionName,
            'regionActive' => 1
        );
        // Save data using model
        $regionName = $this->Common_model->insert('eg_region', $data);

        $response = array(
            'success' => $regionName,
            'message' => $regionName ? 'Field saved successfully!' : 'An error occurred while saving.'
        );

        echo json_encode($response);
    }


    public function savestation()
    {

        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        // Get field value from POST data
        $stationName = $this->security->xss_clean($this->input->post('stationName')); // Sanitize input
        $districtId = $this->security->xss_clean($this->input->post('districtId')); // Sanitize input
        $regionId = $this->security->xss_clean($this->input->post('regionId')); // Sanitize input

        $data = array(

            'stationName' => $stationName,
            'districtId' => $districtId,
            'regionId' => $regionId,
            'stationActive' => 1
        );

        $stationName = $this->Common_model->insert('eg_station', $data);

        $response = array(
            'success' => $stationName,
            'message' => $stationName ? 'Field saved successfully!' : 'An error occurred while saving.'
        );

        echo json_encode($response);
    }


    public function savecountry()
    {
        // echo "hasdfs";
        // die();

        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        // Get field value from POST data
        $countryName = $this->security->xss_clean($this->input->post('countryName')); // Sanitize input

        $data = array(
            'countryName' => $countryName,
            'countryActive' => 1
        );
        // Save data using model
        $countryName = $this->Common_model->insert('eg_country', $data);

        $response = array(
            'success' => $countryName,
            'message' => $countryName ? 'Field saved successfully!' : 'An error occurred while saving.'
        );

        echo json_encode($response);
    }


    public function savestate()
    {
        // echo "hasdfs";
        // die();

        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        // Get field value from POST data
        $stateName = $this->security->xss_clean($this->input->post('stateName'));
        $countryId = $this->security->xss_clean($this->input->post('countryId'));

        $data = array(
            'stateName' => $stateName,
            'countryId' => $countryId,
            'stateActive' => 1
        );
        // Save data using model
        $countryName = $this->Common_model->insert('eg_state', $data);

        $response = array(
            'success' => $stateName,
            'message' => $stateName ? 'Field saved successfully!' : 'An error occurred while saving.'
        );

        echo json_encode($response);
    }

    public function savedistrict()
    {

        // echo "hasdfs";
        // die();

        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        // Get field value from POST data
        $districtName = $this->security->xss_clean($this->input->post('districtName')); // Sanitize input
        $stateId = $this->security->xss_clean($this->input->post('stateId')); // Sanitize input

        $data = array(
            'districtName' => $districtName,
            'stateId' => $stateId,
            'districtActive' => 1
        );
        // Save data using model
        $districtName = $this->Common_model->insert('eg_district', $data);

        $response = array(
            'success' => $districtName,
            'message' => $districtName ? 'Field saved successfully!' : 'An error occurred while saving.'
        );

        echo json_encode($response);
    }
    public function getstates($countryId)
    {
        $states = $this->Common_model->getvalue('eg_state', 'countryId', $countryId, 'stateName', 'asc');
        echo json_encode($states);
    }
    public function getdistricts($stateId)
    {
        $districts = $this->Common_model->getvalue('eg_district', 'stateId', $stateId, 'districtName', 'asc');
        echo json_encode($districts);
    }


    public function __construct()
    {
        parent::__construct();
        $this->load->model('StaffModel');
        $this->load->model('Family_model');
        $this->load->model('Transfer_model');
    }



    // public function insertStaffDetails()
    // {
    //     $this->load->model('StaffModel');

    //     $whatsappNumber = $this->input->post('whatsappNumber');


    //     if ($this->StaffModel->checkWhatsAppNumberExists($whatsappNumber)) {
    //         echo json_encode(['success' => false, 'message' => 'WhatsApp number already exists!']);
    //         return;
    //     }

    //     $staffName = $this->input->post('staffName');
    //     $staffSlug = $this->generateUniqueSlug($this->input->post('staffSlug'));
    //     $staffData = [
    //         'staffName' => $staffName,
    //         'staffSlug' => $staffSlug,
    //         'station' => $this->input->post('station'),
    //         'region' => $this->input->post('region'),
    //         'staffType' => $this->input->post('staffType'),
    //         'officeLocation' => $this->input->post('officeLocation'),
    //         'joiningDate' => $this->input->post('joiningDate') ? date('Y-m-d', strtotime($this->input->post('joiningDate'))) : null,
    //         'exitingDate' => $this->input->post('exitingDate') ? date('Y-m-d', strtotime($this->input->post('exitingDate'))) : null,
    //         'dateofbirth' => $this->input->post('dateofbirth') ? date('Y-m-d', strtotime($this->input->post('dateofbirth'))) : null,
    //         'dateofAnniversary' => $this->input->post('dateofAnniversary') ? date('Y-m-d', strtotime($this->input->post('dateofAnniversary'))) : null,
    //         'username' => $this->input->post('username'),
    //         'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
    //         'whatsappNumber' => $whatsappNumber,
    //         'alternateWhatsappNumber' => $this->input->post('alternateWhatsappNumber'),
    //     ];

    //     $staffId = $this->StaffModel->insertStaff($staffData);

    //     $familyNames = $this->input->post('familyName');
    //     $familyRelations = $this->input->post('familyRelation');
    //     $familyAges = $this->input->post('FamDOB');
    //     $familyOccupations = $this->input->post('familyOccupation');
    //     if (!empty($familyNames)) {
    //         foreach ($familyNames as $index => $name) {

    //             $dob = $familyAges[$index] ?? null;
    //             $formattedDob = $dob ? date('Y-m-d', strtotime(str_replace(',', '', $dob))) : null;

    //             $familyData = [
    //                 'staffId' => $staffId,
    //                 'familyName' => $name,
    //                 'familyRelation' => $familyRelations[$index] ?? null,
    //                 'FamDOB' => $formattedDob,
    //                 'familyOccupation' => $familyOccupations[$index] ?? null,
    //             ];

    //             $this->StaffModel->insertFamilyDetails($familyData);
    //         }
    //     }


    //     $fromStations = $this->input->post('fromStation') ?? null;
    //     $toStations = $this->input->post('toStation') ?? null;
    //     $transferDates = $this->input->post('transferDate') ?? null;

    //     if (!empty($fromStations)) {
    //         foreach ($fromStations as $index => $fromStation) {
    //             $transferData = [
    //                 'staffId' => $staffId,
    //                 'fromStation' => $fromStation,
    //                 'toStation' => $toStations[$index] ?? null,
    //                 'transferDate' => isset($transferDates[$index]) && !empty($transferDates[$index]) ? date('Y-m-d', strtotime($transferDates[$index])) : null,
    //             ];
    //             $this->StaffModel->insertTransferDetails($transferData);
    //         }
    //     }

    //     echo json_encode(['success' => true, 'message' => 'Staff details saved successfully!']);
    //     redirect('staff/manage');
    // }

    public function insertStaffDetails()
    {
        $this->load->model('StaffModel');

        $whatsappNumber = $this->input->post('whatsappNumber');

        if ($this->StaffModel->checkWhatsAppNumberExists($whatsappNumber)) {
            echo json_encode(['success' => false, 'message' => 'WhatsApp number already exists!']);
            return;
        }

        $staffName = $this->input->post('staffName');
        $staffSlug = $this->generateUniqueSlug($this->input->post('staffSlug'));
        $staffData = [
            'staffName' => $staffName,
            'staffSlug' => $staffSlug,
            'station' => $this->input->post('station'),
            'region' => $this->input->post('region'),
            'staffType' => $this->input->post('staffType'),
            'officeLocation' => $this->input->post('officeLocation'),
            'joiningDate' => $this->input->post('joiningDate') ? date('Y-m-d', strtotime($this->input->post('joiningDate'))) : null,
            'exitingDate' => $this->input->post('exitingDate') ? date('Y-m-d', strtotime($this->input->post('exitingDate'))) : null,
            'dateofbirth' => $this->input->post('dateofbirth') ? date('Y-m-d', strtotime($this->input->post('dateofbirth'))) : null,
            'dateofAnniversary' => $this->input->post('dateofAnniversary') ? date('Y-m-d', strtotime($this->input->post('dateofAnniversary'))) : null,
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'whatsappNumber' => $whatsappNumber,
            'alternateWhatsappNumber' => $this->input->post('alternateWhatsappNumber'),
        ];

        $staffId = $this->StaffModel->insertStaff($staffData);

        $familyNames = $this->input->post('familyName');
        $familyRelations = $this->input->post('familyRelation');
        $familyAges = $this->input->post('FamDOB');
        $familyOccupations = $this->input->post('familyOccupation');
        $familyDetailsInserted = true;

        if (!empty($familyNames)) {
            $this->StaffModel->deleteFamilyDetails($staffId);

            foreach ($familyNames as $index => $name) {
                $dob = $familyAges[$index] ?? null;
                $formattedDob = $dob ? date('Y-m-d', strtotime(str_replace(',', '', $dob))) : null;

                $familyData = [
                    'staffId' => $staffId,
                    'familyName' => $name,
                    'familyRelation' => $familyRelations[$index] ?? null,
                    'FamDOB' => $formattedDob,
                    'familyOccupation' => $familyOccupations[$index] ?? null,
                ];

                if (!$this->StaffModel->insertFamilyDetails($familyData)) {
                    $familyDetailsInserted = false;
                    break;
                }
            }
        }

        $fromStations = $this->input->post('fromStation') ?? null;
        $toStations = $this->input->post('toStation') ?? null;
        $transferDates = $this->input->post('transferDate') ?? null;
        $transferDetailsInserted = true;

        if (!empty($fromStations)) {
            foreach ($fromStations as $index => $fromStation) {
                $transferData = [
                    'staffId' => $staffId,
                    'fromStation' => $fromStation,
                    'toStation' => $toStations[$index] ?? null,
                    'transferDate' => isset($transferDates[$index]) && !empty($transferDates[$index]) ? date('Y-m-d', strtotime($transferDates[$index])) : null,
                ];

                if (!$this->StaffModel->insertTransferDetails($transferData)) {
                    $transferDetailsInserted = false;
                    break;
                }
            }
        }

        if ($familyDetailsInserted && $transferDetailsInserted) {
            echo json_encode(['success' => true, 'message' => 'Staff details saved successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to save family or transfer details.']);
        }
    }


    public function sendsms()
    {
        //send sms

        $staffId = $this->input->post('staffId');
        $staff = $this->StaffModel->getStaffById($staffId);
        $phone = $staff->whatsappNumber;
        $staffName = $staff->staffName;
        $staffUsername = $staff->username;
        $staffPassword = $staff->readPass;

        if ($staffPassword != "" || $staffPassword !== 'null') {

            $m = "
		
		Dear " . $staffName . ",

We're excited to announce the launch of ICPF Engage, our new reporting platform designed to streamline your work and enhance our mission.

ICPF Engage is a user-friendly tool that will provide you with a centralized space for reporting, tracking, and analyzing your activities. It's designed to make your work more efficient and effective.

To access ICPF Engage, please visit: https://icpf.org/engage/

Your login credentials are:

Username: " . $staffUsername . "  
Password: " . $staffPassword . "

If you have any questions or encounter any issues, please don't hesitate to contact your Regional Staff.

Thank you for your dedication to ICPF's mission. We look forward to seeing the impact you'll make with ICPF Engage!

Best regards,
Team ICPF
		
		";
            if (strlen($phone) == '10') {

                $mobile = '91' . $phone;
            } else {
                exit();
            }
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => 'https://wa.qubez.in/api/create-message',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => array(
                    'appkey' => '3b901daf-2d46-42d8-adc8-68d6948ccde2',
                    'authkey' => '20wnM082kB5minKxlpSvmyHy34KD4E7YddRVZ4Wud93PT15YpP',
                    'to' => $mobile,
                    'message' => $m,
                    'sandbox' => 'false'
                ),
            ));

            $response = curl_exec($curl);

            curl_close($curl);
            $mdata = json_decode($response, true);
            $message_status = $mdata['message_status'];
            // echo $message_status;

        } else {
            echo "No Password Set!";
        }
    }


    private function generateUniqueSlug($slug)
    {
        $originalSlug = $slug;
        $i = 1;

        while ($this->StaffModel->slugExists($slug)) {
            $slug = $originalSlug . '-' . $i;
            $i++;
        }

        return $slug;
    }



    public function delete($staffId)
    {

        $this->load->model('StaffModel');


        if (is_numeric($staffId)) {

            $result = $this->StaffModel->delete_staff($staffId);


            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
        } else {
            echo json_encode(['success' => false]);
        }
    }




    public function edit($staffSlug)
    {
        $this->load->model('StaffModel');
        $this->load->model('Station_model');
        $this->load->model('Family_model');
        $this->load->model('Transfer_model');

        $data['staff'] = $this->StaffModel->get_staff_by_slug($staffSlug);

        if (!empty($data['staff'])) {
            $staffId = $data['staff']['staffId'];

            $data['family_details'] = $this->Family_model->get_family_by_staff($staffId) ?? [];
            $data['transfer_details'] = $this->Transfer_model->get_transfer_by_staff($staffId) ?? [];
            $data['regions'] = $this->Station_model->getallactiveregions();
            $data['stations'] = $this->Station_model->getallactivestations();
            $data['locations'] = $this->Station_model->getallactivelocations();

            $this->load->view('templates/header');
            $this->load->view('templates/nav');
            $this->load->view('staff/edit', $data);
            $this->load->view('templates/footer');
        } else {
            show_404();
        }
    }

    // public function updateStaffDetails()

    // {
    //     $staffId = $this->input->post('staffId');


    //     $this->load->model('StaffModel');


    //     $currentStaffData = $this->StaffModel->getStaffById($staffId);

    //     $staffData = [

    //         'staffName'              => $this->input->post('staffName') ?? $currentStaffData->staffName,
    //         'station'                => $this->input->post('station') ?? $currentStaffData->station,
    //         'region'                 => $this->input->post('region') ?? $currentStaffData->region,
    //         'staffType'              => $this->input->post('staffType') ?? $currentStaffData->staffType,
    //         'officeLocation'         => $this->input->post('officeLocation') ?? $currentStaffData->officeLocation,
    //         'joiningDate'        => $this->input->post('joiningDate') ? date('Y-m-d', strtotime(str_replace(',', '', $this->input->post('joiningDate')))) : $currentStaffData->joiningDate,
    //         'exitingDate'        => $this->input->post('exitingDate') ? date('Y-m-d', strtotime(str_replace(',', '', $this->input->post('exitingDate')))) : $currentStaffData->exitingDate,
    //         'dateofbirth'        => $this->input->post('dateofbirth') ? date('Y-m-d', strtotime($this->input->post('dateofbirth'))) : $currentStaffData->dateofbirth,
    //         'dateofAnniversary'  => $this->input->post('dateofAnniversary') ? date('Y-m-d', strtotime($this->input->post('dateofAnniversary'))) : $currentStaffData->dateofAnniversary,
    //         'username'               => $this->input->post('username') ?? $currentStaffData->username,
    //         'password'               => $this->input->post('password') ? password_hash($this->input->post('password'), PASSWORD_BCRYPT) : $currentStaffData->password,
    //         'whatsappNumber'          => $this->input->post('whatsappNumber') ?? $currentStaffData->whatsappNumber,
    //         'alternateWhatsappNumber' => $this->input->post('alternateWhatsappNumber') ?? $currentStaffData->alternateWhatsappNumber,
    //     ];


    //     $this->StaffModel->updateStaff($staffId, $staffData);


    //     $familyNames = $this->input->post('familyName') ?? [];
    //     $familyRelations = $this->input->post('familyRelation') ?? [];
    //     $familyAges = $this->input->post('familyAge') ?? [];
    //     $familyOccupations = $this->input->post('familyOccupation') ?? [];

    //     if (!empty($familyNames)) {
    //         $this->StaffModel->deleteFamilyDetails($staffId);
    //         foreach ($familyNames as $index => $name) {

    //             $familyData = [
    //                 'staffId' => $staffId,
    //                 'familyName' => $name,
    //                 'familyRelation' => $familyRelations[$index] ?? null,
    //                 'familyAge' => $familyAges[$index] ?? null,
    //                 'familyOccupation' => $familyOccupations[$index] ?? null,
    //             ];
    //             $this->StaffModel->insertFamilyDetails($familyData);
    //         }
    //     }


    //     $fromStations = $this->input->post('fromStation') ?? [];
    //     $toStations = $this->input->post('toStation') ?? [];
    //     $transferDates = $this->input->post('transferDate') ?? [];

    //     if (!empty($fromStations)) {
    //         $this->StaffModel->deleteTransferDetails($staffId);
    //         foreach ($fromStations as $index => $fromStation) {
    //             $transferData = [
    //                 'staffId' => $staffId,
    //                 'fromStation' => $fromStation,
    //                 'toStation' => $toStations[$index] ?? null,
    //                 'transferDate' => isset($transferDates[$index]) && !empty($transferDates[$index]) ? date('Y-m-d', strtotime($transferDates[$index])) : null,
    //             ];

    //             $this->StaffModel->insertTransferDetails($transferData);
    //         }
    //     }


    //     redirect('staff/manage');
    // }

    public function updateStaffDetails()
    {


        $staffId = $this->input->post('staffId');

        $this->load->model('StaffModel');

        $currentStaffData = $this->StaffModel->getStaffById($staffId);

        $staffData = [
            'staffName' => $this->input->post('staffName') ?? $currentStaffData->staffName,
            'station' => $this->input->post('station') ?? $currentStaffData->station,
            'region' => $this->input->post('region') ?? $currentStaffData->region,
            'staffType' => $this->input->post('staffType') ?? $currentStaffData->staffType,
            'officeLocation' => $this->input->post('officeLocation') ?? $currentStaffData->officeLocation,
            'joiningDate' => $this->input->post('joiningDate') ? date('Y-m-d', strtotime(str_replace(',', '', $this->input->post('joiningDate')))) : $currentStaffData->joiningDate,
            'exitingDate' => $this->input->post('exitingDate') ? date('Y-m-d', strtotime(str_replace(',', '', $this->input->post('exitingDate')))) : $currentStaffData->exitingDate,
            'dateofbirth' => $this->input->post('dateofbirth') ? date('Y-m-d', strtotime(str_replace(',', '', $this->input->post('dateofbirth')))) : $currentStaffData->dateofbirth,
            'dateofAnniversary' => $this->input->post('dateofAnniversary') ? date('Y-m-d', strtotime(str_replace(',', '', $this->input->post('dateofAnniversary')))) : $currentStaffData->dateofAnniversary,
            'username' => $this->input->post('username') ?? $currentStaffData->username,
            'whatsappNumber' => $this->input->post('whatsappNumber') ?? $currentStaffData->whatsappNumber,
            'alternateWhatsappNumber' => $this->input->post('alternateWhatsappNumber') ?? $currentStaffData->alternateWhatsappNumber,
        ];


        $newPassword = $this->input->post('password');
        if (!empty($newPassword)) {
            $staffData['password'] = password_hash($newPassword, PASSWORD_BCRYPT);
        } else {
            $staffData['password'] = $currentStaffData->password;
        }


        $this->StaffModel->updateStaff($staffId, $staffData);

        $familyNames = $this->input->post('familyName') ?? [];
        $familyRelations = $this->input->post('familyRelation') ?? [];
        $familyAges = $this->input->post('FamDOB') ?? [];
        $familyOccupations = $this->input->post('familyOccupation') ?? [];

        if (!empty($familyNames)) {
            $this->StaffModel->deleteFamilyDetails($staffId);
            foreach ($familyNames as $index => $name) {
                $dob = $familyAges[$index] ?? null;
                $formattedDob = $dob ? date('Y-m-d', strtotime(str_replace(',', '', $dob))) : null;

                $familyData = [
                    'staffId' => $staffId,
                    'familyName' => $name,
                    'familyRelation' => $familyRelations[$index] ?? null,
                    'FamDOB' => $formattedDob,
                    'familyOccupation' => $familyOccupations[$index] ?? null,
                ];

                $this->StaffModel->insertFamilyDetails($familyData);
            }
        }


        $fromStations = $this->input->post('fromStation') ?? [];
        $toStations = $this->input->post('toStation') ?? [];
        $transferDates = $this->input->post('transferDate') ?? [];

        if (!empty($fromStations)) {
            $this->StaffModel->deleteTransferDetails($staffId);
            foreach ($fromStations as $index => $fromStation) {
                $transferData = [
                    'staffId' => $staffId,
                    'fromStation' => $fromStation,
                    'toStation' => $toStations[$index] ?? null,
                    'transferDate' => isset($transferDates[$index]) && !empty($transferDates[$index]) ? date('Y-m-d', strtotime($transferDates[$index])) : null,
                ];

                $this->StaffModel->insertTransferDetails($transferData);
            }
        }

        redirect('staff/manage');
    }




    // public function insertReport()
    // {
    //     $this->load->model('ReportModel');
    //     $this->load->model('EventModel');
    //     $this->load->library('form_validation');
    //     $this->load->library('upload');


    //     $this->form_validation->set_rules('CGPF_Number', 'Number of CGPF Meetings', 'required');
    //     $this->form_validation->set_rules('House_Visit_Number', 'Number of House Visits', 'required');
    //     $this->form_validation->set_rules('Hostel_Visit_Number', 'Number of Hostel Visits', 'required');
    //     $this->form_validation->set_rules('Evangelisms_Number', 'Number of Personal Evangelisms', 'required');
    //     $this->form_validation->set_rules('Accepted_Christ', 'Accepted Christ', 'required');
    //     $this->form_validation->set_rules('Baptism_Decision', 'Decision for Baptism', 'required');
    //     $this->form_validation->set_rules('Baptism_Number', 'No of Baptisms', 'required');
    //     $this->form_validation->set_rules('Holyspirit_Received', 'Holyspirit Received', 'required');
    //     $this->form_validation->set_rules('Ministry_Commitments', 'Ministry Commitments', 'required');
    //     $this->form_validation->set_rules('Existing_Student_Councils', 'Existing Student Councils', 'required');
    //     $this->form_validation->set_rules('New_Student_Councils', 'New Student Councils', 'required');

    //     if ($this->form_validation->run() == FALSE) {
    //         $response = array('success' => false, 'error' => validation_errors());
    //     } else {
    //         $uploadPath = 'uploads/images/reports/';

    //         if (!is_dir($uploadPath) && !mkdir($uploadPath, 0755, true)) {
    //             $response = array('success' => false, 'error' => 'Failed to create upload directory.');
    //             echo json_encode($response);
    //             return;
    //         }

    //         $formData = $this->input->post();

    //         $reportData = array(
    //             'CGPF_Number' => $formData['CGPF_Number'],
    //             'House_Visit_Number' => $formData['House_Visit_Number'],
    //             'Hostel_Visit_Number' => $formData['Hostel_Visit_Number'],
    //             'Evangelisms_Number' => $formData['Evangelisms_Number'],
    //             'Accepted_Christ' => $formData['Accepted_Christ'],
    //             'Baptism_Decision' => $formData['Baptism_Decision'],
    //             'Baptism_Number' => $formData['Baptism_Number'],
    //             'Holyspirit_Received' => $formData['Holyspirit_Received'],
    //             'Ministry_Commitments' => $formData['Ministry_Commitments'],
    //             'Existing_Student_Councils' => $formData['Existing_Student_Councils'],
    //             'New_Student_Councils' => $formData['New_Student_Councils'],
    //             'first_sunday_church' => $formData['first_sunday_church'],
    //             'second_sunday_church' => $formData['second_sunday_church'],
    //             'third_sunday_church' => $formData['third_sunday_church'],
    //             'fourth_sunday_church' => $formData['fourth_sunday_church'],
    //             'fifth_sunday_church' => $formData['fifth_sunday_church'],
    //         );

    //         $reportInserted = $this->ReportModel->insert($reportData);

    //         if ($reportInserted) {
    //             $uploadedFiles = [];

    //             if (isset($_FILES['eventPhotos']) && !empty($_FILES['eventPhotos']['name'][0])) {
    //                 $files = $_FILES['eventPhotos'];                  

    //                 for ($i = 0; $i < count($files['name']); $i++) {
    //                     if ($files['error'][$i] == 0) {
    //                         $fileTmpName = $files['tmp_name'][$i];
    //                         $fileExt = pathinfo($files['name'][$i], PATHINFO_EXTENSION);
    //                         $imageName = uniqid() . '.' . $fileExt;

    //                         if (move_uploaded_file($fileTmpName, $uploadPath . $imageName)) {
    //                             $uploadedFiles[] = $imageName;
    //                         } else {
    //                             $response = array('success' => false, 'error' => 'Failed to upload some files.');
    //                             echo json_encode($response);
    //                             return;
    //                         }
    //                     }
    //                 }
    //             }

    //             $formData['eventPhotos'] = json_encode($uploadedFiles);

    //             if (isset($formData['events']) && is_array($formData['events'])) {
    //                 foreach ($formData['events'] as $event) {
    //                     $eventData = array(
    //                         'report_id' => $reportInserted,
    //                         'program_date' => $event['program_date'],
    //                         'event_name' => $event['event_name'],
    //                         'event_location' => $event['event_location'],
    //                         'resource_person' => $event['resource_person'],
    //                         'attendance' => $event['attendance'],
    //                         'eventPhotos' => json_encode($uploadedFiles),
    //                     );
    //                     $this->EventModel->insert($eventData);
    //                 }
    //             }

    //             $response = array('success' => true);
    //         } else {
    //             $response = array('success' => false, 'error' => 'An error occurred while saving the report.');
    //         }

    //         echo json_encode($response);
    //     }
    // }

    public function staffWithoutLocation()
    {
        // Load the database library
        $this->load->database();

        // Query to find staff who don't have an entry in the location table
        $this->db->select('staff.staffName')
            ->from('staff')
            ->join('eg_location', 'eg_location.stationId = staff.station', 'left')
            ->where('eg_location.stationId IS NULL');
        $query = $this->db->get();

        // Fetch result
        $data['staffWithoutLocation'] = $query->result();

        // var_dump($data['staffWithoutLocation']);
        // die();

        // Load the view and pass data
        $this->load->view('staff_without_location', $data);
    }
    public function staffLocationCount()
    {
        // Load the database library
        $this->load->database();

        // Query to get the number of locations created by each staff
        $this->db->select('staff.staffName, COUNT(eg_location.locationId) as locationCount')
            ->from('staff')
            ->join('eg_location', 'eg_location.stationId = staff.station', 'left')
            ->group_by('staff.staffId');
        $query = $this->db->get();

        // Fetch result
        $data['staffLocations'] = $query->result();

        // Load the view and pass data
        $this->load->view('staff_location_count', $data);
    }
    public function staffGroupCount()
    {
        // Load the database library
        $this->load->database();

        // Query to get the number of groups created by each staff
        $this->db->select('staff.staffName, COUNT(groups.stationId) as groupCount')
            ->from('staff')
            ->join('groups', 'groups.stationId = staff.station', 'left')
            ->group_by('staff.staffId');
        $query = $this->db->get();

        // Fetch result
        $data['staffGroups'] = $query->result();

        // Load the view and pass data
        $this->load->view('staff_group_count', $data);
    }
    public function staffCouncilCount()
    {
        // Load the database library
        $this->load->database();

        // Query to get the number of councils created by each staff
        $this->db->select('staff.staffName, COUNT(eg_council.stationId) as councilCount')
            ->from('staff')
            ->join('eg_council', 'eg_council.stationId = staff.station', 'left')
            ->group_by('staff.staffId');
        $query = $this->db->get();

        // Fetch result
        $data['staffCouncils'] = $query->result();

        // Load the view and pass data
        $this->load->view('staff_council_count', $data);
    }
    public function staffCgpfCount()
    {
        // Load the database library
        $this->load->database();

        // Query to get the number of cgpf entries created by each staff
        $this->db->select('staff.staffName, COUNT(cgpf.stationId) as cgpfCount')
            ->from('staff')
            ->join('cgpf', 'cgpf.stationId = staff.station', 'left')
            ->group_by('staff.staffId');
        $query = $this->db->get();

        // Fetch result
        $data['staffCgpf'] = $query->result();

        // Load the view and pass data
        $this->load->view('staff_cgpf_count', $data);
    }
    public function staffChurchCount()
    {
        // Load the database library
        $this->load->database();

        // Query to get the number of churches created by each staff
        $this->db->select('staff.staffName, COUNT(churches.stationId) as churchCount')
            ->from('staff')
            ->join('churches', 'churches.stationId = staff.station', 'left')
            ->group_by('staff.staffId');
        $query = $this->db->get();

        // Fetch result
        $data['staffChurches'] = $query->result();

        // Load the view and pass data
        $this->load->view('staff_church_count', $data);
    }
    public function staffInstituteCount()
    {
        // Load the database library
        $this->load->database();

        // Query to get the number of institutes created by each staff
        $this->db->select('staff.staffName, COUNT(eg_institutes.stationId) as instituteCount')
            ->from('staff')
            ->join('eg_institutes', 'eg_institutes.stationId = staff.station', 'left')
            ->group_by('staff.staffId');
        $query = $this->db->get();

        // Fetch result
        $data['staffInstitutes'] = $query->result();

        // Load the view and pass data
        $this->load->view('staff_institute_count', $data);
    }
}
