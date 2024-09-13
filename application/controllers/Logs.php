<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Logs extends CI_Controller
{

	public function index()
	{
	    $table = 'loginLogs';
	    $orderby = 'logId';
	    $ascdes = 'desc';
	    $data['logs'] = $this->Common_model->getall($table, $orderby, $ascdes);
	   
		$this->load->model('StaffModel');
		$this->load->view('templates/header');
		$this->load->view('templates/nav');
		$this->load->view('logs/manage', $data);
		$this->load->view('templates/footer');
	}
	public function testlocation(){
	    $ip = $_SERVER['REMOTE_ADDR'];
	    $phpVersion = phpversion();
$userAgent = "MyLocationApp/$phpVersion";
$contextOptions = array(
  'http' => array(
    'user_agent' => $userAgent
  )
);

$apiUrl = "https://nominatim.openstreetmap.org/reverse?format=json&addressdetails=1&zoom=18&query=" . $ip;
$response = file_get_contents($apiUrl, false, stream_context_create($contextOptions));

	    function get_location_from_openstreetmaps($ip) {
    $apiUrl = "https://nominatim.openstreetmap.org/reverse?format=json&addressdetails=1&zoom=18&query=" . $ip;

    $response = file_get_contents($apiUrl);
    $data = json_decode($response, true);

    if (isset($data['address'])) {
        $location = $data['address'];
        return $location;
    } else {
        return null;
    }
}

// Replace 'YOUR_IP_ADDRESS' with the actual IP address
$ipAddress = $ip;
$location = get_location_from_openstreetmaps($ipAddress);

if ($location) {
    echo "City: " . $location['city'] . "\n";
    echo "State: " . $location['state'] . "\n";
    echo "Country: " . $location['country'] . "\n";
    echo "Latitude: " . $location['lat'] . "\n";
    echo "Longitude: " . $location['lon'] . "\n";
} else {
    echo "Unable to get location information.\n";
}
	}
	
	
}