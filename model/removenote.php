<?php
/**
 * This file is used by an Ajax call to remove a link from the database, based on unique note provided.
 *
 * @authors Ryan Marlow<rmarlow@mail.greenriver.edu>
 * @version 1.0
 *
 */

require('/home/rmarlowg/config.php');
require('../model/db.php');
require_once ('../model/validation.php');

$dbh = connect();
$note = $_POST['note'];

removeNote($note);