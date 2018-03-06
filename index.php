<?php
/* Ryan Marlow / Cynthia Pham
   IT 328 Final Project - Green River Project Hub
   index.php
*/
//Require the autoload file
error_reporting(E_ALL);
ini_set('display_errors',TRUE);
session_start();
require_once ('vendor/autoload.php');
require_once('/home/rmarlowg/config.php');
require_once ('model/db.php');
require_once ('model/login.php');
//Create an instance of the Base class
$f3 = Base::instance();
$f3->set('DEBUG',3);
//Connect to database
$dbh = connect();
//Define a default route

$f3->set('logged',false);

//Login page if not already logged in.
$f3->route('GET|POST /', function($f3) {
    if($_SESSION['logged']) {
        header('Location: ./home');
    }

    if(isset($_POST['submit'])) {
        if(login($_POST['username'],$_POST['password'])) {
            $_SESSION['logged'] = true;
            $f3->reroute('/home');
        }
    } else {
        echo Template::instance()->render('views/login.html');
    }
});

//If /home is recieved, clears message variable and sends to
$f3->route('GET|POST /home', function($f3) {
    $f3->set('message',null);
    if($_SESSION['logged']) {
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $description = $_POST['description'];
            $client = $_POST['client'];
            $siteurl = $_POST['siteurl'];
            $trello = $_POST['trello'];
            $github = $_POST['github'];
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
    } else {
        header('Location: ./');
    }
});

//View Project Template with the specific project loaded.
$f3->route('POST|GET /@title', function($f3, $params) {
    if($_SESSION['logged']) {
        $title = $params['title'];
        if($_POST['delete'] == 'Delete Project') {
            removeProject($title);
            $f3->set('message','Project Deleted');
        }
        $project = getProject($title);
        $f3->set('project', $project);
        echo Template::instance()->render('views/project.html');
    } else {
        header('Location: ./');
    }
});
//Run fat free
$f3->run();