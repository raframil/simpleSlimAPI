<?php

use Slim\App;
use Slim\Container;


$app = new App(new Container);

// Main page
$app->get('/', function(){
  echo "Login Page";
});

// After login go to dashboard
$app->get('/login', function(){
  $app->render('login.php');
});



include __DIR__.'/modules/cities.php';
include __DIR__.'/modules/stores.php';

$app->run();
