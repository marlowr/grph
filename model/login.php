<?php
/**
 *
 * @author Ryan Marlow <rmarlow@mail.greenriver.edu>
 * Version 1.0
 *
 * This php file provides functionality of the login
 */
require_once('/home/rmarlowg/config.php');
require_once ('model/db.php');

function login($username, $password) {
    global $dbh;

    $sql = "SELECT id, username, password FROM members WHERE username = :username";
    //2. Prepare the statement
    $statement = $dbh->prepare($sql);
    //3. Bind parameters
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    //4. Execute the query
    $statement->execute();

    //5. Get the results
    $project = $statement->fetch(PDO::FETCH_ASSOC);
    $checkPwd = $project['password'];

    if(hash(SHA512,$password) == $checkPwd) {
        $success = true;
    } else {
        $success = false;
    }
    //6. Return student
    return $success;
}