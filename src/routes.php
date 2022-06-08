<?php
use core\Router;

$router = new Router(); 

$router->get('/', 'HomeController@index');
$router->get('/notice/{id}', 'NoticeController@noticeBody');
$router->get('/login', 'LoginController@signin');
$router->post('/login', 'LoginController@signinAction');
$router->get('/cadastro', 'LoginController@signup');
$router->post('/cadastro', 'LoginController@signupAction');
$router->get('/perfil/{id}', 'ProfileController@userProfile');
$router->get('/perfil', 'ProfileController@userProfile');
$router->get('/historico/{id}', 'HistoricController@historic');
$router->get('/historico', 'HistoricController@historic');
$router->get('/pesquisa', 'SearchController@results');
$router->get('/config', 'ConfigController@config');
$router->post('/config', 'ConfigController@configAction');
$router->post('/ajax/comment', 'AjaxController@comment');
$router->get('/save/{id}','NoticeController@save');
$router->get('/sair', 'LoginController@logout');

