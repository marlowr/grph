<?php
/**
 * @author Ryan Marlow <rmarlow@mail.greenriver.edu>
 * @version 1.0
 *
 * This file handles the editing of projects via Ajax/JS and html editable content.
 */
    require('/home/rmarlowg/config.php');
    require('../model/db.php');

    $dbh = connect();

    print_r($_POST);
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
    updateProject($title, $description, $client, $siteurl, $trello,
        $github, $login, $password, $status, $notes);