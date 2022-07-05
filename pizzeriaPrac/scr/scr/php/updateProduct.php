<?php
require_once '../include/db.php';
require_once '../include/header.php';


$newName = $_POST['newName'];
$newCost = $_POST['newCost'];
$previousName = $_POST['previousName'];
$previousCost = $_POST['previousCost'];

$arResult = [];
$arResult['status'] = 'bad';

if ($newName != '') {
    $sql = $db->query("UPDATE product SET name = '$newName', price = '$newCost' WHERE product.name = '$previousName' and product.price = '$previousCost'");
    $arResult['status'] = 'success';
}

echo json_encode($arResult);
