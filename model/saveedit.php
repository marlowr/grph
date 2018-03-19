<?php
/**
 * @author Ryan Marlow <rmarlow@mail.greenriver.edu>
 * @version 1.0
 *
 * This file handles the editing of projects via Ajax/JS and html editable content.
 */
require('/home/cphamgre/config.php');
require('../model/db.php');
$dbh = connect();
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


//Insert the project into the DB
updateProject($title, $description, $client, $contactname, $location, $contactemail, $contactphone,
    $companyurl, $login, $password, $status, $class, $instructor, $quarter, $year);