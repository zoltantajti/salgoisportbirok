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
$route['calendar'] = 'welcome/calendar';
$route['event/(:num)'] = 'welcome/event/$1';
$route['event/(:num)/join'] = 'welcome/event/$1/join';
$route['my-events'] = 'welcome/myEvents';
$route['secus'] = 'welcome/secus/list';
$route['secus/list'] = 'welcome/secus/list';
$route['secus/new'] = 'welcome/secus/new';
$route['secus/edit/(:num)'] = 'welcome/secus/edit/$1';
$route['secus/rem/(:num)'] = 'welcome/secus/rem/$1';
$route['invlinks'] = 'welcome/invlinks';
$route['invlinks/generate'] = 'welcome/invlinks/generate';
$route['invlinks/open/(:num)'] = 'welcome/invlinks/open/$1';
$route['invlinks/rem/(:num)'] = 'welcome/invlinks/rem/$1';


$route['admin/allow/(:num)'] = 'admin/allowUser/$1';
$route['admin/deny/(:num)'] = 'admin/denyUser/$1';
$route['admin/events/joins/(:num)'] = 'admin/events/joins/$1';
$route['admin/events/approve/(:num)/(:num)'] = 'admin/events/approve/$1/$2';
$route['admin/events/deny/(:num)/(:num)'] = 'admin/events/approve/$1/$2';

//External links
$route['invite/success'] = 'Invite/success';
$route['invite/(:any)'] = 'Invite/accept/$1';

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
