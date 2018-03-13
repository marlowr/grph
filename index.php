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
require_once ('model/validation.php');
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
        $f3->reroute("./home");
    }

    if(isset($_POST['submit'])) {
        if(login($_POST['username'],$_POST['password'])) {
            $_SESSION['logged'] = true;
            $f3->reroute('./home');
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
            $title = ($_POST['title'] != null) ? $_POST['title'] : 'Unnamed';
            $description = $_POST['description'];
            $client = $_POST['client'];
            $siteurl = $_POST['siteurl'];
            $trello = $_POST['trello'];
            $github = $_POST['github'];
            $login = $_POST['login'];
            $password = $_POST['password'];
            $status = $_POST['status'];
            $notes = $_POST['notes'];
            $location = $_POST['location'];
            $companyurl = $_POST['companyurl'];
            $contactname = $_POST['contactname'];
            $contactemail = $_POST['contactemail'];
            $contactphone = $_POST['contactphone'];
            $instructor = $_POST['instructor'];
            $class = $_POST['class'];
            $quarter = $_POST['quarter'];
            $years = $_POST['year'];

            //trims company url
            if ($companyurl != "")
            {
                $companyurl = trimLink($companyurl);
            }

            //if the "Choose.." options are chosen, sets value to ""
            if ($class === "Choose...") {
                $class = "";
            }
            if ($quarter === "Choose...") {
                $quarter = "";
            }
            if ($years === "Choose...") {
                $years = "";
            }

            //insert the project into the DB
            $project_id = addProject($title, $description, $client, $login, $password, $status,
                $location, $companyurl, $contactname, $contactemail, $contactphone, $instructor,
                $class, $quarter, $years);

            addNote($notes,$project_id);
            //if admin enters a trello link, it adds to links database table if it doesn't exist
            if (!empty($trello)) {

                foreach ($trello as $link) {
                    if ($link != "") {
                        $link = trimTrello($link);
                        addLink("trello", $link, $project_id);
                    }
                }
            }

            //if admin enters a github link, it adds to links database table if it doesn't exist
            if (!empty($github)) {
                foreach ($github as $link) {
                    if ($link != "") {
                        $link = trimGitHub($link);
                        addLink("github", $link,$project_id);
                    }
                }
            }

            //if admin enters a site url link, it adds to links database table if it doesn't exist
            if (!empty($siteurl)) {
                foreach ($siteurl as $link) {
                    if ($link != "") {
                        $link = trimLink($link);
                        addLink("siteurl", $link, $project_id);
                    }

                }
            }
        }
        $projects = getProjects();
        $f3->set('projects', $projects);
        echo Template::instance()->render('views/home.html');
    } else {
        $f3->reroute("./");
    }
});

//View Project Template with the specific project loaded.
$f3->route('POST|GET /@title', function($f3, $params) {
    if($_SESSION['logged']) {
        $title = $params['title'];
        $project = getProject($title);
        $links = getLinks($project['project_id']);
        $notes = getNotes($project['project_id']);

        //If the project has just been deleted, show message.
        if($_POST['delete'] == 'Delete Project') {
            removeProject($project['project_id']);
            $f3->set('message','Project Deleted');
        }

        $f3->set('project', $project);
        $f3->set('links',$links);
        $f3->set('notes',$notes);
        echo Template::instance()->render('views/project.html');
    } else {
        $f3->reroute("./");
    }
});

//Run fat free
$f3->run();