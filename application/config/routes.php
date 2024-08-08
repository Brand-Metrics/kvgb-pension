<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Login/index';
$route['logout'] = 'User/logout';
$route['translate_uri_dashes'] = FALSE;


$route['dashboard'] = 'User/index';
$route['form-16'] = 'User/form16';
$route['arrears'] = 'User/arrears';
$route['computer-arrears'] = 'User/computerarrears';
$route['pension-slip'] = 'User/pensionslip';
$route['pension-data/(:any)'] = 'User/pensiondata/$1';
$route['pension-slip/download/(:any)'] = 'User/pdf_pensiondata/$1';

//admin
$route['random'] = 'Login/admin';
$route['forget-password'] = 'Login/forget';


$route['add-notice'] = 'Admin/addnotice';
$route['add-documents'] = 'Admin/adddocuments';
$route['add-pensioner'] = 'Admin/addpensioner';
$route['delete-pensioner/(:any)'] = 'Admin/deletepensioner/$1';
$route['admin-dashboard'] = 'Admin/index';
$route['admin'] = 'login/logout';
$route['pension-slip/import'] = 'Admin/import_pensionslip';




$route['404_override'] = 'Login/page404';


