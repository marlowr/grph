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

    $title = $_POST['title'];
    $description = $_POST['description'];
    $client = $_POST['client'];
    $login = $_POST['login'];
    $password = $_POST['password'];
    $status = $_POST['status'];
    $notes = $_POST['notes'];
    $oldtitle = $_POST['notes'];

    //Insert the project into the DB
    updateProject($title, $description, $client, $login, $password, $status,$oldtitle);