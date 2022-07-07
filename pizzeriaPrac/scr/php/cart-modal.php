<div class="modal-body">
    <? if (!empty($_SESSION['cart'])) : ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Вес</th>
                    <th scope="col">Общ.стоимость</th>
                    <th scope="col">Количество</th>
                </tr>
            </thead>
            <tbody>
                <? foreach ($_SESSION['cart'] as $id => $item) : ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['weight'] ?> гр</td>
                        <td><?= $item['price'] * $item['qty_product'] ?> руб</td>
                        <td><?= $item['qty_product'] ?></td>
                    </tr>
                <? endforeach; ?>

                <tr>
                    <td colspan="4" align="right">
                        <div class="h6">
                            Кол-во товаров: <span id="modal-cart-qty"><?= $_SESSION['cart.qty'] ?></span>
                            <br>
                            Сумма: <?= $_SESSION['cart.sum'] ?> руб.
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