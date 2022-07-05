<?php
session_start();
include '../include/db.php';

function get_product(int $id)
{
    global $db;
    $stmt = $db->query("SELECT * FROM product WHERE id_product = $id");
    return $stmt->fetch();
}

function add_to_cart($product)
{
    if (isset($_SESSION['cart'][$product['id_product']])) {
        $_SESSION['cart'][$product['id_product']]['qty'] += 1;
    } else {
        $_SESSION['cart'][$product['id_product']] = [
            'name' => $product['name'],
            'price' => $product['price'],
            'qty' => 1,
        ];
    }

    $_SESSION['cart.qty'] = !empty($_SESSION['cart.qty']) ? ++$_SESSION['cart.qty'] : 1;
    $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $product['price'] : $product['price'];
}

if (isset($_GET['cart'])) {
    switch ($_GET['cart']) {
        case 'add':
            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $product = get_product($id);
            if (!$product) {
                $result = [
                    'code' => 'error',
                    'answer' => 'error',
                ];
            } else {
                add_to_cart($product);
                $result = [
                    'code' => 'ok',
                    'answer' => $product,
                ];
            }
            echo json_encode($result);
            break;
    }
}
