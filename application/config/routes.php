<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');




$route['default_controller'] = "home";
$route['dev'] = 'dev';


$route['logout'] = 'logout';
$route['category/(:any)'] = 'home/category';
$route['fix'] = 'home/fix';
$route['search'] = 'home/search';
$route['getmore_search'] = 'home/getmore_search';
$route['getmore_category'] = 'home/getmore_category';
$route['getmore_home'] = 'home/getmore_home';




$route['getusers'] = 'home/getUsers';
$route['getlocations'] = 'home/getlocations';
$route['getusersbylocation'] = 'home/getUsersByLocation';
$route['getusersbylocationcoords'] = 'home/getUsersByLocationCoords';
$route['setmappos'] = 'home/setmappos';




$route['404_override'] = 'home';



/* End of file routes.php */
/* Location: ./application/config/routes.php */