<div class="modal-body">
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
            <? foreach ($_SESSION['cart'] as $id => $item) : ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td><?= $item['weight'] ?> гр</td>
                    <td><?= $item['price'] ?> руб</td>
                    <td><?= $item['qty'] ?></td>
                </tr>
            <? endforeach; ?>

            <tr>
                <td colspan="4" align="right">
                    Кол-во товаров: <span id="modal-cart-qty"><?= $_SESSION['cart.qty'] ?></span>
                    <br>
                    Сумма: <?= $_SESSION['cart.sum'] ?> руб.
                </td>
            </tr>
        </tbody>
    </table>
</div>