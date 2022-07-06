<?php
include '../include/db.php';

$name_update = $_POST["itemName"];
$sql = "SELECT * FROM product WHERE name = '$name_update'";
$res = $db->query($sql);
$num_results = $res->rowCount();
$result = $res->FetchAll(PDO::FETCH_NUM);
$arResult = [];
foreach ($result as $row) {
    $arResult['NAME'] = $row[2];
    $arResult['PRICE'] = $row[3];
}

echo json_encode($arResult);
