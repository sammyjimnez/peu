<?php

require_once('./modulo-mcpa/controller/autoload.php');
$autoload = new autoload();

$route = isset($_GET['r']) ? $_GET['r'] : 'home'; //si no está definida la variable mandará a home
$peu = new Router($route);