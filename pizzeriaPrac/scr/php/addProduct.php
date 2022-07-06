<?php
include '../include/db.php';

$addName = $_POST['addName'];
$addCost = $_POST['addCost'];

$sql_add = $db->exec(
    "INSERT INTO `product` (`id_product`, `id_type_product`, `name`, `price`, `weight`, `availability`, `picture`, `size`) 
    VALUES (NULL, 1, '$addName',  '$addCost', NULL, '1', '','')"
);

$db->query($sql_add);
