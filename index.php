<?php
/* Ryan Marlow / Cynthia Pham
   IT 328 Final Project - Green River Project Hub
   index.php
*/
//Require the autoload file
error_reporting(E_ALL);
ini_set('display_errors',TRUE);
require_once ('vendor/autoload.php');
require_once('/home/cphamgre/config.php');
require_once ('model/db.php');
//Create an instance of the Base class
$f3 = Base::instance();
$f3->set('DEBUG',3);
//Connect to database
$dbh = connect();
//Define a default route
$f3->route('GET|POST /', function($f3) {
    if(isset($_POST['submit']))
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $client = $_POST['client'];
        $siteurl = $_POST['siteurl'];
        $trello = $_POST['trello'];
        $github  = $_POST['github'];
        $login = $_POST['login'];
        $password = $_POST['password'];
        $status = $_POST['status'];
        $notes = $_POST['notes'];
        //Insert the project into the DB
        addProject($title, $description, $client, $siteurl, $trello,
            $github, $login, $password, $status, $notes);
    }
    $projects = getProjects();
    $f3->set('projects', $projects);
    echo Template::instance()->render('views/home.html');
});
//View Project Route
$f3->route('GET /@title', function($f3, $params) {
    $title = $params['title'];
    $project = getProject($title);
    $f3->set('project', $project);
    echo Template::instance()->render('views/project.html');
});
//Run fat free
$f3->run();