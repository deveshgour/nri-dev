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
$route['default_controller'] = 'Welcome';
$route['login'] = 'Welcome/index';
$route['sign-up'] = 'Welcome/signup';
$route['changepass'] = 'Userdashboard/changepass';
$route['home'] = 'Userdashboard/home';
$route['about-us'] = 'Welcome/aboutus';
$route['privacypolicy'] = 'Welcome/privacypolicy';
$route['verify/(:any)/(:any)'] = 'Welcome/verify/$1/$2';
$route['forgotpassword'] = 'Welcome/forgotpassword';
$route['resetpass/(:any)'] = 'Welcome/resetpass/$1';
$route['home'] = 'Userdashboard/home';
$route['like'] = 'Userdashboard/like';
$route['myprofile'] = 'Userdashboard/my_profile';
$route['userprofile'] = 'Userprofile/userprofile';
$route['userphotoupload'] = 'Userprofile/userphotoupload';
$route['uservideoupload'] = 'Userprofile/uservideoupload';
$route['search_friends'] = 'Userprofile/search_friends';
$route['friendRequest'] = 'Userprofile/friendRequest';
$route['deleteRequest'] = 'Userprofile/deleteRequest';
$route['friendRequest_list'] = 'Userprofile/friendRequest_list';
$route['buzz_list'] = 'Userprofile/buzz_list';
$route['gov_list'] = 'Userprofile/gov_list';
$route['major_missing'] = 'Major_missing/major';
$route['recent_visit'] = 'Recent_visit/visit';
$route['fact_list'] = 'Userprofile/fact_list';
$route['event'] = 'Event/event1';
$route['fact_detail/(:any)'] = 'Userprofile/fact_detail/$1';
$route['buzz_detail/(:any)'] = 'Userprofile/buzz_detail/$1';
$route['friend-user/(:any)'] = 'Userprofile/friend_user/$1';
$route['root_detail/(:any)/(:any)'] = 'Userdashboard/root_detail/$1/$2';
$route['detail_gov/(:any)'] = 'Userprofile/gov_detail/$1';
$route['gov_detail'] = 'Userprofile/gov_detail';
$route['root_detail_list/(:any)'] = 'Userdashboard/root_detail_list/$1';
$route['chat/(:any)'] = 'Userdashboard/chat/$1';
$route['support'] = 'Support/chat';
$route['deleteselectedchat'] = 'Support/deleteselectedchat';
$route['logout'] = 'Userdashboard/logout';


$route['admin/login'] = 'Admin_login/login';
$route['admin/dashboard'] = 'Admin_dashboard/dashboard';
$route['admin/connect_to_root'] = 'Admin_dashboard/connect_to_root';
$route['admin/add_connect_to_root'] = 'Admin_dashboard/add_connect_to_root';
$route['admin/add_root_detail'] = 'Admin_dashboard/add_root_detail';
$route['admin/root_detail_list/(:any)'] = 'Admin_dashboard/root_detail_list/$1';
$route['admin/root_detail/(:any)/(:any)'] = 'Admin_dashboard/root_detail/$1/$2';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
