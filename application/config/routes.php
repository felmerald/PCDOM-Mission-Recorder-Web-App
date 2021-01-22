<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'my_controller';
$route['index'] = 'my_controller/index';

// superadmin routes
$route['superadmin/home'] = 'my_controller/superadmin';


// mrec routes
$route['mrec/home'] = 'my_controller/mrec_home';
$route['mrec/create_companionship'] = 'my_controller/create_companionshipPage';
$route['mrec/companionship'] = 'my_controller/companionshipPage';
$route['mrec/zones_pages'] = 'my_controller/zone_pages';
$route['mrec/statistics'] = 'my_controller/statistics_page';
$route['mrec/create_statistics'] = 'my_controller/create_statistics_page';
$route['mrec/downloadpdf'] = 'my_controller/downloadstatisticsWeek1';
$route['mrec/downloadpdfweek2'] = 'my_controller/downloadstatisticsweek2';
$route['mrec/downloadpdfweek3'] = 'my_controller/downloadstatisticsweek3';
$route['mrec/downloadpdfweek4'] = 'my_controller/downloadstatisticsweek4';
$route['mrec/downloadpdfweek5'] = 'my_controller/downloadstatisticsweek5';
$route['mrec/downloadkeyindicators'] = 'my_controller/downloadkeyindicators';
$route['mrec/downloadmonthlystatistics'] = 'my_controller/montlykeyindicators';
$route['mrec/download_summaryreport'] = 'my_controller/download_summaryreport';

$route['sample'] = 'my_controller/sample';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
