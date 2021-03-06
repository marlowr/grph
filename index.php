<?php
/**
 * index.php defines the routing for grph project
 *
 * Uses fat-free framework to define url routing for grph project.  In each URL
 * routing, POST values are received to create/set Project and EditedProject objects.
 *
 * @author Ryan Marlow <rmarlow@mail.greenriver.edu>
 * @author Cynthia Pham <cpham15@mail.greenriver.edu>
 * @link http://rmarlow.greenriverdev.com/IT328/grph
 */
//Require the autoload file
//error_reporting(E_ALL);
//ini_set('display_errors',TRUE);

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

//If /home is recieved, clears message variable and sends to login
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

            $project = new Project($title, $description, $client, $login, $password, $status,
                $location, $companyurl, $contactname, $contactemail, $contactphone, $instructor,
                $class, $quarter, $years);
            $project->addProject();
            $project->addNote($notes);

            //if admin enters a trello link, it adds to links database table if it doesn't exist
            if (!empty($trello)) {

                foreach ($trello as $link) {
                    if ($link != "") {
                        $link = trimTrello($link);
                        $project->addLink("trello", $link);
                    }
                }
            }

            //if admin enters a github link, it adds to links database table if it doesn't exist
            if (!empty($github)) {
                foreach ($github as $link) {
                    if ($link != "") {
                        $link = trimGitHub($link);
                        $project->addLink("github", $link);
                    }
                }
            }

            //if admin enters a site url link, it adds to links database table if it doesn't exist
            if (!empty($siteurl)) {
                foreach ($siteurl as $link) {
                    if ($link != "") {
                        $link = trimLink($link);
                        $project->addLink("siteurl", $link);
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

        $editProject = new EditProject($project['title'], $project['description'], $project['client'],
            $project['login'], $project['password'], $project['status'],$project['location'], $project['companyurl'],
            $project['contactname'], $project['contactemail'], $project['contactphone'], $project['instructor'],
            $project['class'], $project['quarter'], $project['years'],$project['project_id']);

        $editProject->getLinks();
        $editProject->getNotes();
        //$links = getLinks($project['project_id']);
        //$notes = getNotes($project['project_id']);

        //If the project has just been deleted, show message.
        if($_POST['delete'] == 'Delete Project') {
            removeProject($project['project_id']);
            $f3->set('message','Project Deleted');
        }

        $f3->set('project', $editProject);
        //$f3->set('links',$links);
        //$f3->set('notes',$notes);
        echo Template::instance()->render('views/project.html');
    } else {
        $f3->reroute("./");
    }
});

//Run fat free
$f3->run();