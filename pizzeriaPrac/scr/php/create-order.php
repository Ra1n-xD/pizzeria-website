<?php
session_start();
require_once '../include/db.php';


$userID = $_POST['userID'];


echo json_encode($_SESSION['cart']);
