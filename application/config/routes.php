<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'AuthController/login';
// $route['default_controller'] = 'dashboard/staff';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['Staff/insertStaffDetails'] = 'Staff/insertStaffDetails'; 
$route['Staff/delete/(:num)'] = 'Staff/delete/$1';
$route['staff/edit/(:any)'] = 'staff/edit/$1';
$route['Stations/editStation/(:any)'] = 'Stations/edit/$1';
$route['Stations/delete/(:num)'] = 'Stations/delete/$1';
$route['Council/updateCouncil/(:num)'] = 'Council/updateCouncil/$1';
$route['Institutes/delete/(:num)'] = 'Institutes/delete/$1';
$route['Leaders/edit/(:any)'] = 'Leaders/edit/$1';
$route['Leaders/delete/(:any)'] = 'Leaders/delete/$1';
$route['leaders/update'] = 'leaders/update';








