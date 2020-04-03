<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['assets/(:any)'] = 'assets/$1';
$route['default_controller'] = 'gigs/index';
$route['gigs/(:any)'] = 'gigs/view/$1';
$route['404_override'] = 'notfound';
$route['translate_uri_dashes'] = FALSE;
