<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['default_controller'] = 'gigs/index';
$route['assets/(:any)'] = 'assets/$1';
$route['404_override'] = 'notfound/index';
$route['translate_uri_dashes'] = FALSE;
