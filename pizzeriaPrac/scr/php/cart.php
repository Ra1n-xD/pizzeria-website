<?php
session_start();
require_once '../include/db.php';

function get_product(int $id)
{
    global $db;
    $stmt = $db->query("SELECT * FROM product WHERE id_product = $id");
    return $stmt->fetch();
}

function get_add(int $id)
{
    global $db;
    $stmt = $db->query("SELECT * FROM addition WHERE id_addition = $id");
    return $stmt->fetch();
}


function add_to_cart($product)
{
    if (isset($_SESSION['cart'][$product['id_product']])) {
        $_SESSION['cart'][$product['id_product']]['qty_product'] += 1;
    } else {
        $_SESSION['cart'][$product['id_product']] = [
            'name' => $product['name'],
            'price' => $product['price'],
            'weight' => $product['weight'],
            'qty_product' => 1,
        ];
    }
    // if (isset($_SESSION['cart'][$product['id_product']]['id_addition'])) {
    //     // unset($_SESSION['cart.das']);
    //     foreach ($_SESSION['cart'][$product['id_product']]['id_addition'] as $item) {
    //         $_SESSION['cart.sum'] += $item;
    //     }
    // }

    $_SESSION['cart.qty'] = !empty($_SESSION['cart.qty']) ? ++$_SESSION['cart.qty'] : 1;
    $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $product['price'] : $product['price'];
}

if (isset($_GET['cart'])) {
    switch ($_GET['cart']) {
        case 'reduce':
            $id = $_GET['id'];
            $product = get_product($id);
            if (($_SESSION['cart.qty'] > 1) && ($_SESSION['cart'][$product['id_product']]['qty_product'] > 1)) {
                --$_SESSION['cart'][$product['id_product']]['qty_product'];
                $_SESSION['cart.sum'] -= $product['price'];
                --$_SESSION['cart.qty'];
            } elseif (($_SESSION['cart.qty'] >= 2) && ($_SESSION['cart'][$product['id_product']]['qty_product'] = 1)) {
                --$_SESSION['cart'][$product['id_product']]['qty_product'];
                $_SESSION['cart.sum'] -= $product['price'];
                --$_SESSION['cart.qty'];
                unset($_SESSION['cart'][$product['id_product']]);
            } else {
                unset($_SESSION['cart']);
                unset($_SESSION['cart.sum']);
                unset($_SESSION['cart.qty']);
                unset($_SESSION['cart.id_cart']);
                unset($_SESSION['cart.id_cart_product']);
                unset($_SESSION['cart.id_product']);
            }
            ob_start();
            require 'cart-modal.php';
            $cart = ob_get_clean();
            echo json_encode($cart);
            break;
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
            $_SESSION['cart.id_product'] = $id;

            $product = get_product($id);

            $db->exec(
                "INSERT INTO `cart_product`(`id_cart_product`, `id_cart`, `id_product`, `id_addition`) 
                 VALUES (NULL, $cartId, $id, NULL)"
            );

            $lastPizza = $db->lastInsertId();
            $_SESSION['cart.id_cart_product'] = $lastPizza;

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
        case 'addition':
            $idCartProduct = $_SESSION['cart.id_cart_product'];
            $idAdd = $_GET["idAdd"];
            $idProd = $_SESSION['cart.id_product'];
            $addition = get_add($idAdd);

            if (!$_SESSION['cart'][$idProd]['id_addition']) {
                $_SESSION['cart'][$idProd]['id_addition'][0] = $idAdd;
            } else {
                array_push($_SESSION['cart'][$idProd]['id_addition'], $idAdd);
            }

            $isNull = $db->query(
                "SELECT `id_addition` FROM `cart_product` WHERE `id_cart_product` = $idCartProduct"
            )->fetch();

            if ($isNull['id_addition'] === null) {
                $db->exec(
                    "UPDATE `cart_product` SET `id_addition`= $idAdd WHERE `id_cart_product` = $idCartProduct"
                );
            } else {
                $idCart = $_SESSION['cart.id_cart'];
                $db->exec(
                    "INSERT INTO `cart_product`(`id_cart_product`, `id_cart`, `id_product`, `id_addition`) 
                     VALUES (NULL, $idCart, $idProd, $idAdd)"
                );
            }
            $_SESSION['cart.sum'] = !empty($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $addition['price'] * $_SESSION['cart'][$idProd]['qty_product'] : false;

            echo json_encode("123");
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
                unset($_SESSION['cart.id_cart_product']);
                unset($_SESSION['cart.id_product']);
            }
            require 'cart-modal.php';
            break;
        case 'order':
            $orderId = $_GET['orderId'];
            // $orderId = $orderId * 1;

            $res = $db->query("SELECT SUM(product.price) as price, product.name as name, count(*) as count, product.weight as weight FROM ((product INNER JOIN cart_product on product.id_product = cart_product.id_product ) INNER JOIN cart on cart_product.id_cart = cart.id_cart) WHERE cart.id_order = $orderId GROUP by product.name, product.weight");

            $cartParseId = $res->FetchAll(PDO::FETCH_NUM);

            echo json_encode($cartParseId);
            // require 'order-modal.php';
            break;
    }
}
