<?php
include '../include/db.php';

$itemId = $_POST['itemId'];

$sql_del = "DELETE FROM product WHERE id_product = $itemId";
$db->query($sql_del);
