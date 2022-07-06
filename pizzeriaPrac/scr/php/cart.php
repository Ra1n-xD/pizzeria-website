<?php
session_start();
require_once '../include/db.php';

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
            'weight' => $product['weight'],
            'qty' => 1,
        ];
    }

    $_SESSION['cart.qty'] = !empty($_SESSION['cart.qty']) ? ++$_SESSION['cart.qty'] : 1;
    $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $product['price'] : $product['price'];
}

if (isset($_GET['cart'])) {
    switch ($_GET['cart']) {
        case 'add':
            if (!$_SESSION['cart']) {
                $db->exec(
                    "INSERT INTO `cart`(`id_cart`, `id_order`, `amount`)
                     VALUES (NULL, NULL, 0)"
                );
            }
            $res = $db->query("SELECT id_cart FROM cart WHERE amount = 0");
            $cartParseId = $res->fetch();
            $cartId = $cartParseId['id_cart'];
            $_SESSION['cart.id_cart'] = $cartId;

            $id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
            $product = get_product($id);

            $db->exec(
                "INSERT INTO `cart_product`(`id_cart_product`, `id_cart`, `id_product`, `id_addition`) 
                 VALUES (NULL, $cartId, $id, NULL)"
            );

            if (!$product) {
                $result = [
                    'code' => 'error',
                    'answer' => 'error',
                ];
            } else {
                add_to_cart($product);
                ob_start();
                require 'cart-modal.php';
                $cart = ob_get_clean();
                $result = [
                    'code' => 'ok',
                    'answer' => $cart,
                ];
            }
            echo json_encode($result);
            break;
        case 'show':
            require 'cart-modal.php';
            break;
        case 'clear':
            $cartId = $_SESSION['cart.id_cart'] * 1;
            $db->exec(
                "DELETE FROM `cart_product` WHERE id_cart = $cartId"
            );
            $db->exec(
                "DELETE FROM `cart` WHERE id_cart = $cartId"
            );
            // echo json_encode($cartId);
            if (!empty($_SESSION['cart'])) {
                unset($_SESSION['cart']);
                unset($_SESSION['cart.sum']);
                unset($_SESSION['cart.qty']);
                unset($_SESSION['cart.id_cart']);
            }
            require 'cart-modal.php';
            break;
        case 'order':
            $orderId = $_GET['orderId'];
            // $orderId = $orderId * 1;

            $res = $db->query("SELECT SUM(product.price) as price, product.name as name, count(*) as count, product.weight as weight FROM ((product INNER JOIN cart_product on product.id_product=cart_product.id_product ) INNER JOIN cart on cart_product.id_cart = cart.id_cart) WHERE cart.id_order = $orderId GROUP by product.name, product.weight");
            $cartParseId = $res->FetchAll(PDO::FETCH_NUM);

            echo json_encode($cartParseId);
            // require 'order-modal.php';
            break;
    }
}
