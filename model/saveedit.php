<?php
/**
 * saveedit.php handles the editing of projects via Ajax/JS and html editable content.
 *
 * Receives POST values from Ajax call in js/edit.js and saves into php variables.
 * The variables are then used to add links into links database table and update
 * projects in projects database tables
 *
 * @author Ryan Marlow <rmarlow@mail.greenriver.edu>
 * @author Cynthia Pham <cpham15@mail.greenriver.edu>
 * @copyright 2018
 * @version 1.0
 *
 */
require('/home/rmarlowg/config.php');
require('../model/db.php');
require_once ('../model/validation.php');


//Connects to database
$dbh = connect();

//Saves POST values from Ajax call in js/edit.js into variables
$title = $_POST['title'];
$description = $_POST['description'];
$client = $_POST['client'];
$location = $_POST['location'];
$contactname = $_POST['contactname'];
$contactemail = $_POST['contactemail'];
$contactphone = $_POST['contactphone'];
$companyurl = $_POST['companyurl'];
$login = $_POST['login'];
$password = $_POST['password'];
$status = $_POST['status'];
$class = $_POST['classs'];
$instructor = $_POST['instructor'];
$quarter = $_POST['quarter'];
$year = $_POST['year'];
$notes = $_POST['notes'];
$newSiteurl = $_POST['newSiteurl'];
//$oldSiteurl = $_POST['oldSiteurl'];
$updatedSiteurl = $_POST['updatedSiteurl'];
$newTrello = $_POST['newTrello'];
//$oldTrello = $_POST['oldTrello'];
$updatedTrello = $_POST['updatedTrello'];
$newGithub = $_POST['newGithub'];
//$oldGithub = $_POST['oldGithub'];
$updatedGithub = $_POST['updatedGithub'];
$newNotes = $_POST['newNotes'];
//$oldNotes = $_POST['oldNotes'];
$updatedNotes = $_POST['updatedNotes'];

//gets project id using project title
$project_id = getProjectLinkId($title);


//if admin enters a trello link, it adds to links database table
if (!empty($newTrello)) {
    foreach ($newTrello as $link) {
        if ($link != "") {
            $link = trimTrello($link);
            addLink("trello", $link, $project_id);
        }
    }
}

//if admin enters a github link, it adds to links database table
if (!empty($newGithub)) {
    foreach ($newGithub as $link) {
        if ($link != "") {
            $link = trimGitHub($link);
            addLink("github", $link,$project_id);
        }
    }
}

//if admin enters a site url link, it adds to links database table
if (!empty($newSiteurl)) {
    foreach ($newSiteurl as $link) {
        if ($link != "") {
            $link = trimLink($link);
            addLink("siteurl", $link, $project_id);
        }

    }
}

//if admin enters a new note, it adds to notes database table if it doesn't exist
if (!empty($newNotes)) {
    foreach ($newNotes as $note) {
        if ($note != "") {
            addNote($note, $project_id);
        }

    }
}

//Insert the project into the DB
updateProject($title, $description, $client, $contactname, $location, $contactemail, $contactphone,
    $companyurl, $login, $password, $status, $class, $instructor, $quarter, $year);

