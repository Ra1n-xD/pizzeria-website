<?php
session_start();
include '../include/db.php';

function get_product(int $id)
{
    global $db;
    $stmt = $db->query("SELECT * FROM product WHERE id_product = $id");
    return $stmt->fetch();
}

if (isset($_GET['cart'])) {
    switch ($_GET['cart']) {
        case 'add':
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $product = get_product($id);
            $result = [
                'code' => 'ok',
                'answer' => $product,
            ];
            echo json_encode($result);
            break;
    }
}
