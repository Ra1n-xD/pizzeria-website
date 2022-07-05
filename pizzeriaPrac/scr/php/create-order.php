<?php
session_start();
require_once '../include/db.php';

if (isset($_GET['user'])) {

    echo $_GET['user'];
}
echo "SDA";
