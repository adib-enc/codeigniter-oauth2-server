<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['oauth2/'] = 'Oauth2';
$route['oauth2/(:any)'] = 'Oauth2/$1';
$route['oauth2/(:any)/(:any)'] = 'Oauth2/$1/$2';
