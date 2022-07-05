<?php
session_start();
include '../include/db.php';

// function debug(array $data)
// {
//     echo '<pre>' . print_r($data, 1) . '<pre>';
// }

// function get_products(): array
// {
//     global $db;
//     $res = $db->query("SELECT * FROM product");
//     return $res->fetchAll();
// }

// function get_product(int $id)
// {
//     global $db;
//     $stmt = $db->query("SELECT * FROM product WHERE id_product = $id");

//     return $stmt->fetch();
// }

// function add_to_cart($product)
// {
//     if (isset($_SESSION['cart'][$product['id']])) {
//         $_SESSION['cart'][$product['id']]['qty'] += 1;
//     } else {
//         $_SESSION['cart'][$product['id']]['qty'] = [
//             'name' => $product['name'],
//             'price' => $product['price'],
//             'qty' => 1,
//             'weight' => $product['weight'],
//         ];
//     }
//     $_SESSION['cart.qty'] = !empty($_SESSION['cart.qty']) ? ++$_SESSION['cart.qty'] : 1;
//     $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] +  $product['price']  : $product['price'];
// }
