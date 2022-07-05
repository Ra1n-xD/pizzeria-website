<div class="modal-body">
    <?php if (!empty($_SESSION['cart'])) : ?>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Название</th>
                    <th scope="col">Вес</th>
                    <th scope="col">Стоимость</th>
                    <th scope="col">Количество</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($_SESSION['cart'] as $id => $item) : ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td><?= $item['weight'] ?> гр</td>
                        <td><?= $item['price'] ?> руб</td>
                        <td><?= $item['qty'] ?></td>
                    </tr>
                <?php endforeach; ?>

                <tr>
                    <td colspan="4" align="right">
                        Кол-во товаров: <span id="modal-cart-qty"><?= $_SESSION['cart.qty'] ?></span>
                        <br>
                        Сумма: <?= $_SESSION['cart.sum'] ?> руб.
                    </td>
                </tr>
            </tbody>
        </table>
    <?php else : ?>
        <p>Корзина пуста...</p>
    <?php endif; ?>
</div>
<div class="modal-footer">
    <?php if (!empty($_SESSION['cart'])) : ?>
        <button type="button" class="btn btn-primary">Оформить заказ</button>
        <button type="button" class="btn btn-danger" id="clear-cart">Очистить корзину</button>
    <?php endif; ?>
</div>