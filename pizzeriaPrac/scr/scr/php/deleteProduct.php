<?php
require_once '../include/db.php';
require_once '../include/header.php';

?>
<?php

$host = 'localhost';
$db = 'Fit_club';
$user = 'postgres';
$password = 'X123908330xxx';
$db = new PDO("pgsql:host=$host;dbname=$db", $user, $password);

$itemName = $_POST["itemName"];

$sql_del = "select del_service('$itemName')";
$db->query($sql_del);
