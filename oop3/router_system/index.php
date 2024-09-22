<?php
require_once 'Router.php';

$router = new Router();
$router->addRoute('GET', '', 'HomeController', 'index');
$router->addRoute('GET', 'about', 'AboutController', 'index');
$router->route();
