<?php
//Get the pet name from the Ajax call
$name = $_POST['petname'];

//Connect to database
require_once '/home/tina/config.php';
$cnxn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );

//Define a query
$select = "SELECT * FROM pets WHERE name = :name";
$statement = $cnxn->prepare($select);
$statement->bindValue(':name', $name, PDO::PARAM_STR);
$statement->execute();

//Get the results
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
    $id = $row['id'];
    $name = $row['name'];
    $color = $row['color'];
    $type  = $row['type'];
    echo "<p>$id: $name, $color, $type</p>";
}