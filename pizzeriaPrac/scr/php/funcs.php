<?php
include '../include/db.php';
function debug(array $data): void
{
    echo '<pre>' . print_r($data, 1) . '<pre>';
}

function get_products(): array
{
    global $db;
    $res = $db->query("SELECT * FROM product");
    return $res->fetchAll();
}

function get_product(int $id)
{
    global $db;
    $stmt = $db->query("SELECT * FROM product WHERE id_product = $id");

    return $stmt->fetch();
}


print_r(get_product(1));
