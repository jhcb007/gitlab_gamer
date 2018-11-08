<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['api/projetos']['GET'] = 'api/projetos/all';
$route['api/projeto/(:num)']['GET'] = 'api/projetos/get_project/$1';
$route['api/projeto']['POST'] = 'api/projetos/set_project';

$route['api/painel/projetos']['GET'] = 'api/projetos/list_projetos';
$route['api/painel/ranking/(:num)']['GET'] = 'api/projetos/list_ranking/$1';

$route['sync/projects'] = 'api/sync/projects';
$route['sync/commit'] = 'api/sync/commit';


$route['admin'] = 'admin/index';

$route['default_controller'] = 'painel';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
