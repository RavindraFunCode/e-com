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
$route['default_controller'] = 'Web';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['contact-us'] = 'Web/contact';
$route['account'] = 'User/account';
$route['wishlist'] = 'Web/wishlist';
$route['cart'] = 'Web/cart';
$route['checkout'] = 'Web/checkout';
$route['shop'] = 'Web/shop';
$route['shop/(:any)'] = 'Web/shop/$1';
$route['product-details/(:any)'] = 'Shop/product_details/$1';

$route['user-registration'] = 'Web/registration';
$route['user-login'] = 'Web/login';
$route['forgot-password'] = 'Web/forgot_password';

$route['user-address'] = 'Web/address';
$route['user-address/(:any)'] = 'Web/address/$1';

$route['admin-dashboard'] = 'dashboard/admin/index';
$route['admin-password'] = 'dashboard/admin/password';
$route['admin-profile'] = 'dashboard/admin/profile';
$route['slider-list'] = 'dashboard/home/all_slider';
$route['add-slider'] = 'dashboard/home/slider';
$route['add-slider/(:any)'] = 'dashboard/home/slider/$1';


$route['add-privacypolicy'] = 'dashboard/home/privacypolicy';
$route['add-term-and-conditions'] = 'dashboard/home/term_and_conditions';
$route['add-returns-policy'] = 'dashboard/home/returns_policy';






