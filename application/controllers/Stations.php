<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stations extends CI_Controller
{

    public function create()
    {
        $data['countries'] = $this->Common_model->getallactive('eg_country', 'countryActive','countryName', 'asc');
        $data['regions'] = $this->Common_model->getallactive('eg_region', 'regionActive', 'regionName', 'asc');
        $this->load->view('templates/header');
        $this->load->view('templates/nav');
        $this->load->view('stations/create', $data);
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
            'regionStatus' => 1,
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
        // $districtId = $this->security->xss_clean($this->input->post('districtid')); 
        $regionId = $this->security->xss_clean($this->input->post('selectedRegion')); 
        $stationSlug = $this->security->xss_clean($this->input->post('stationSlug')); 
        $data = array(
            'stationName' => $stationName,
            // 'districtId' => $districtId,
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
        $stateName = $this->security->xss_clean($this->input->post('stateName')); // Sanitize input
        $countryId = $this->security->xss_clean($this->input->post('countryId')); // Sanitize input

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
}
