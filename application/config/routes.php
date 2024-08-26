<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'dashboard/staff';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['Staff/insertStaffDetails'] = 'Staff/insertStaffDetails'; 
$route['Staff/delete/(:num)'] = 'Staff/delete/$1';
$route['staff/edit/(:any)'] = 'staff/edit/$1';




