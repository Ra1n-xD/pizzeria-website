<div class="modal-body">
    <? if (!empty($_SESSION['cart'])) : ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Количество</th>
                    <th scope="col">Добавки</th>
                    <th scope="col">Стоимость</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <? foreach ($_SESSION['cart'] as $id => $item) : ?>
                    <tr>
                        <td><?= $item['name'] . " [ " . $item['price'] * $item['qty_product'] . " руб ]" ?></td>
                        <td><?= $item['qty_product'] ?></td>
                        <td>
                            <? if ($item['id_addition']) : ?>
                                <? foreach ($item['id_addition'] as $add) : ?>
                                    <?
                                    $selectAdd = "SELECT name, price from addition WHERE id_addition = $add";
                                    $nameAdd = $db->query($selectAdd);
                                    $addtition = $nameAdd->fetch();
                                    echo $addtition["name"] . " [ " . $addtition["price"] * $item['qty_product'] . " руб ]";
                                    ?>
                                    <br>
                                <? endforeach; ?>
                            <? else : ?>
                                <?= "-" ?>
                            <? endif ?>

                        </td>
                        <td><?= $item['price'] * $item['qty_product'] + $addtition["price"] * $item['qty_product'] ?> руб</td>
                        <td>
                            <a class="increase-order btn btn-outline-success mr-2" id="increase-order" data-order="<?= $id ?>">
                                +
                            </a>
                            <a class="reduce-order btn btn-outline-danger" id="reduce-order" data-order="<?= $id ?>">
                                -
                            </a>
                        </td>
                    </tr>
                <? endforeach; ?>

                <tr>
                    <td colspan="6" align="right">
                        <div class="h5 mt-2">
                            Общее кол-во товаров: <span id="modal-cart-qty"><?= $_SESSION['cart.qty'] ?></span>
                            <br>
                            Итоговая сумма: <span><?= $_SESSION['cart.sum'] ?></span> руб.
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    <? else : ?>
        <p>Корзина пуста...</p>
    <? endif; ?>
</div>
<div class="modal-footer">
    <? if (!empty($_SESSION['cart']) && !empty($_SESSION['user'])) : ?>
        <a href="order.php"><button type="button" class="btn btn-primary" data-user="<?= $_SESSION['user']['id_user'] ?>" id="checkout">Перейти к оформлению</button></a>
        <button type="button" class="btn btn-danger" id="clear-cart">Очистить корзину</button>
    <? elseif (empty($_SESSION['cart']) && !empty($_SESSION['user'])) : ?>
        <button type="button" class="btn btn-danger" id="clear-cart">Очистить корзину</button>
    <? else : ?>
        <div>Для оформления заказа необходима авторизация:</div>
        <a href="login.php"><button type="button" class="btn btn-primary">Авторизоваться</button></a>
        <button type="button" class="btn btn-danger" id="clear-cart">Очистить корзину</button>
    <?php endif; ?>
</div>