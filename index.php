<?php
/* Ryan Marlow / Cynthia Pham
   IT 328 Final Project - Green River Project Hub
   index.php
*/

//Require the autoload file
error_reporting(E_ALL);
ini_set('display_errors',TRUE);
require_once ('vendor/autoload.php');

//Create an instance of the Base class
$f3 = Base::instance();

$f3->set('DEBUG',3);

//Define a default route
$f3->route('GET /', function() {

    echo Template::instance()->render('views/home.html');
});

//Run fat free
$f3->run();

