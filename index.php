<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::post('login', 'SecurityController');
Router::get('account', 'AccountController');
Router::get('accountInfo', 'AccountController');
Router::get('atc', 'FlightController');
Router::get('menu', 'MenuController');
Router::get('flight', 'FlightController');
Router::post('addFlight', 'FlightController');
Router::post('updateFlight', 'FlightController');
Router::get('session', 'SessionController');
Router::post('deleteFlight', 'FlightController');


Router::run($path);
