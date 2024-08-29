<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stations extends CI_Controller
{
    public function index()
    {
        $this->load->model('Station_model');
        $regions = $this->Station_model->getallactiveregions();
        $data['stations'] = $this->Station_model->getstations();
        $data['regions'] = $regions;
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('stations/stations', $data);
        $this->load->view('templates/footer');
    }

    public function edit($stationSlug)
    {
        $this->load->model('Station_model');
        $regions = $this->Station_model->getallactiveregions();
        $data['stations'] = $this->Station_model->getstations();

        $data['regions'] = $regions;

        $data['stn'] = $this->Station_model->get_station_by_slug($stationSlug);

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('stations/edit_station', $data);
        $this->load->view('templates/footer');
    }

    public function create()

    {
        $data['countries'] = $this->Common_model->getallactive('eg_country', 'countryActive', 'countryName', 'asc');
        $data['regions'] = $this->Common_model->getallactive('eg_region', 'regionActive', 'regionName', 'asc');
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('stations/create', $data);
        $this->load->view('templates/footer');
    }


    public function regions()
    {
        $data['regions'] = $this->Station_model->getregions();
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('stations/regions', $data);
        $this->load->view('templates/footer');
    }

    public function manage()
    {
        $data['countries'] = $this->Common_model->getallactive('eg_country', 'countryActive', 'countryName', 'asc');
        $data['regions'] = $this->Common_model->getallactive('eg_region', 'regionActive', 'regionName', 'asc');
        $data['stations'] = $this->Station_model->getallactivestations();
        $data['states'] = $this->Station_model->getallactivestates();
        $data['districts'] = $this->Station_model->getallactivedistricts();

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('stations/manage', $data);
        $this->load->view('templates/footer');
    }


    public function saveregion()

    {


        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $regionName = $this->security->xss_clean($this->input->post('regionName'));
        $regionSlug = $this->security->xss_clean($this->input->post('regionSlug'));

        $data = array(
            'regionName' => $regionName,
            'regionActive' => 1,
            'regionSlug' =>  $regionSlug
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


        $stationName = $this->security->xss_clean($this->input->post('stationName'));
        $regionId = $this->security->xss_clean($this->input->post('selectedRegion'));
        $stationSlug = $this->security->xss_clean($this->input->post('stationSlug'));
        $data = array(
            'stationName' => $stationName,
            'selectedRegion' => $regionId,
            'stationStatus' => 1,
            'stationSlug' => $stationSlug
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


        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }


        $countryName = $this->security->xss_clean($this->input->post('countryName')); // Sanitize input

        $data = array(
            'countryName' => $countryName,
            'countryActive' => 1
        );

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
        
        $countryName = $this->Common_model->insert('eg_state', $data);

        $response = array(
            'success' => $stateName,
            'message' => $stateName ? 'Field saved successfully!' : 'An error occurred while saving.'
        );

        echo json_encode($response);
    }



    public function savedistrict()
    {


        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $districtName = $this->security->xss_clean($this->input->post('districtName'));
        $stateId = $this->security->xss_clean($this->input->post('stateId'));
        $data = array(
            'districtName' => $districtName,
            'stateId' => $stateId,
            'districtActive' => 1
        );
        
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

    public function updateStation()
    {
        $stationId = $this->input->post('stationId');


        $this->load->model('Station_model');


        $currentStationData = $this->Station_model->get_station_by_slug($stationId);


        $stationData = [
            'stationName' => $this->input->post('stationName') ?? $currentStationData['stationName'],
            'stationSlug' => $this->input->post('stationSlug') ?? $currentStationData['stationSlug'],
            'selectedRegion' => $this->input->post('selectedRegion') ?? $currentStationData['selectedRegion'],
        ];


        $this->Station_model->update('eg_station', $stationData, ['stationId' => $stationId]);


        redirect('');
    }

    public function delete($stationId)
    {

        $this->load->model('StaffModel');


        if (is_numeric($stationId)) {

            $result = $this->Station_model->delete_station($stationId);


            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
        } else {
            echo json_encode(['success' => false]);
        }
    }


    public function editRegion($regionSlug)
    {
        $this->load->model('Station_model');
        $regions = $this->Station_model->getregions();


        $data['regions'] = $regions;

        $data['rgn'] = $this->Station_model->get_region_by_slug($regionSlug);

        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('stations/edit_region', $data);
        $this->load->view('templates/footer');
    }


    public function updateRegion()

    {
        $regionId = $this->input->post('regionId');


        $this->load->model('Station_model');


        $currentRegionData = $this->Station_model->get_region_by_slug($regionId);


        $regionData = [
            'regionName' => $this->input->post('regionName') ?? $currentRegionData['regionName'],
            'regionSlug' => $this->input->post('regionSlug') ?? $currentRegionData['regionSlug'],

        ];


        $this->Station_model->update('eg_region', $regionData, ['regionId' => $regionId]);


        redirect('');
    }


    public function deleteRegion($regionId)
    {

        $this->load->model('Station_model');


        if (is_numeric($regionId)) {

            $result = $this->Station_model->delete_region($regionId);


            if ($result) {
                echo json_encode(['success' => true]);
            } else {
                echo json_encode(['success' => false]);
            }
        } else {
            echo json_encode(['success' => false]);
        }
    }
}
