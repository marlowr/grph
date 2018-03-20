<?php
/**
 * Created by PhpStorm.
 * User: mrrya
 * Date: 3/19/2018
 * Time: 5:30 PM
 */

require('/home/rmarlowg/config.php');
require('../model/db.php');
require_once ('../model/validation.php');

$dbh = connect();
$url = $_POST['url'];

removeLink($url);