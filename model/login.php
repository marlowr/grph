<?php
/**
 * This php file provides functionality of the login
 * @author Ryan Marlow <rmarlow@mail.greenriver.edu>
 * @version 1.0
 *
 */
require_once('/home/rmarlowg/config.php');
require_once ('model/db.php');

/**
 * Provides the database statement to secure login from only authorized personnel
 * @param $username
 * @param $password
 * @return bool true if successful login
 */
function login($username, $password) {
    echo $username;
    echo $password;
    global $dbh;

    $sql = "SELECT member_id, username, password FROM members WHERE username = :username";
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