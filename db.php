<?php
require("/home/rmarlowg/config.php");

try {
    //Instantiate a database object
    $dbh = new PDO(GRPH_DSN,GRPH_USERNAME,GRPH_PASSWORD);
    echo 'Connected to database!';
} catch (PDOException $e) {
    echo $e->getMessage();
}

//Define query
$sql = "INSERT INTO projects (title, description, client, siteurl, trello, github, login, 
password,status, notes) VALUES (:title,:description,:client,:siteurl,:trello,:github,:login,
:password,:status,:notes)";

//prepare the statement
$statement = $dbh->prepare($sql);

//Bind the parameters
$title = 'test';
$description = 'test';
$client = 'testclient';
$siteurl = 'test.com';
$trello = 'trello.com';
$github = 'github.com';
$login = 'grphadmin';
$password = 'Password01';
$status = 'inactive';
$notes = 'testing notes';

$statement->bindParam(':title',$title, PDO::PARAM_STR);
$statement->bindParam(':description',$description, PDO::PARAM_STR);
$statement->bindParam(':client',$client, PDO::PARAM_STR);
$statement->bindParam(':siteurl',$siteurl, PDO::PARAM_STR);
$statement->bindParam(':trello',$trello, PDO::PARAM_STR);
$statement->bindParam(':github',$github, PDO::PARAM_STR);
$statement->bindParam(':login',$login, PDO::PARAM_STR);
$statement->bindParam(':password',$password, PDO::PARAM_STR);
$statement->bindParam(':status',$status,PDO::PARAM_STR);
$statement->bindParam(':notes',$notes, PDO::PARAM_STR);

//Execute
$statement->execute();


$row = $statement->fetch(PDO::FETCH_ASSOC);
echo $row['name']. " the " . $row['color']." ".$row['type'];

$sql = "SELECT * FROM projects";
$statement = $dbh->prepare($sql);
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
