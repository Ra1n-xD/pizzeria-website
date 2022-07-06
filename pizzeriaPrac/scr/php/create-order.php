<?php
session_start();
require_once '../include/db.php';

$adress = $_POST['adress'];
$isPaied = $_POST['isPaied'] * 1;

$userId = $_SESSION['user']['id_user'] * 1;
$cartId = $_SESSION['cart.id_cart'] * 1;
$qty = $_SESSION['cart.qty'] * 1;
$date = date("Y-m-d H:i:s");

$db->exec(
    "INSERT INTO `ordered`(`id_order`, `order_date`, `adress`, `id_user`, `isPaied`, `active`)
                   VALUES (NULL, '$date', '$adress', $userId , $isPaied, 'В процессе')"
);

$orderId = $db->lastInsertId();

$db->exec(
    "UPDATE `cart` SET `id_order`= $orderId, `amount`= $qty WHERE `id_cart` = $cartId"
);

unset($_SESSION['cart']);
unset($_SESSION['cart.sum']);
unset($_SESSION['cart.qty']);
unset($_SESSION['cart.id_cart']);


echo json_encode($_SESSION);
