<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['index'] = 'welcome/index';
$route['register'] = 'welcome/register';
$route['logout'] = 'welcome/logout';
$route['dashboard'] = 'welcome/dashboard';
$route['my-profile'] = 'welcome/myprofile';
$route['my-cars'] = 'welcome/mycars/list';
$route['my-cars/list'] = 'welcome/mycars/list';
$route['my-cars/add'] = 'welcome/mycars/add';
$route['my-cars/edit/(:num)'] = 'welcome/mycars/edit/$1';
$route['my-cars/rem/(:num)'] = 'welcome/mycars/rem/$1';
$route['my-cars/noCar'] = 'welcome/mycars/noCar';
$route['my-cars/haveCar'] = 'welcome/mycars/haveCar';

$route['admin/allow/(:num)'] = 'admin/allowUser/$1';
$route['admin/deny/(:num)'] = 'admin/denyUser/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
