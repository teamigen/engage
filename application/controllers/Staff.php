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
        $data['countries'] = $this->Common_model->getallactive('eg_country', 'countryActive', 'countryName', 'asc');


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



    public function weekreport()
    {
        $data['countries'] = $this->Common_model->getallactive('eg_country', 'countryActive', 'countryName', 'asc');
        //$data['regions'] = $this->Common_model->getallactive('eg_region', 'regionActive', 'regionName', 'asc');

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('reports/weekreports', $data);
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
        // Save data using model
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
            'staffName'               => $this->input->post('staffName') ?? $currentStaffData->staffName,
            'station'                 => $this->input->post('station') ?? $currentStaffData->station,
            'region'                  => $this->input->post('region') ?? $currentStaffData->region,
            'staffType'               => $this->input->post('staffType') ?? $currentStaffData->staffType,
            'officeLocation'          => $this->input->post('officeLocation') ?? $currentStaffData->officeLocation,
            'joiningDate'             => $this->input->post('joiningDate') ? date('Y-m-d', strtotime(str_replace(',', '', $this->input->post('joiningDate')))) : $currentStaffData->joiningDate,
            'exitingDate'             => $this->input->post('exitingDate') ? date('Y-m-d', strtotime(str_replace(',', '', $this->input->post('exitingDate')))) : $currentStaffData->exitingDate,
            'dateofbirth'             => $this->input->post('dateofbirth') ? date('Y-m-d', strtotime(str_replace(',', '', $this->input->post('dateofbirth')))) : $currentStaffData->dateofbirth,
            'dateofAnniversary'       => $this->input->post('dateofAnniversary') ? date('Y-m-d', strtotime(str_replace(',', '', $this->input->post('dateofAnniversary'))))  : $currentStaffData->dateofAnniversary,
            'username'                => $this->input->post('username') ?? $currentStaffData->username,
            'whatsappNumber'          => $this->input->post('whatsappNumber') ?? $currentStaffData->whatsappNumber,
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
}
