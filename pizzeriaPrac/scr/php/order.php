<?php
session_start();
if (!$_SESSION['cart']) {
    header('location: index.php');
}
include '../include/header.php';
include '../include/db.php';
?>

<section class=" container col-10 mt-5">
    <pre><?= print_r($_SESSION, 1) ?></pre>
</section>

<div class="container bg-white col-8 pb-5">
    <h2 class="p-4" align="center">Оформление заказа</h2>
    <table class="container table col-8">
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
                    <td><?= $item['qty_product'] ?></td>
                </tr>
            <? endforeach; ?>

            <tr>
                <td class="h5" colspan="4" align="right">
                    Кол-во товаров: <span id="modal-cart-qty"><?= $_SESSION['cart.qty'] ?></span>
                    <br>
                    Сумма: <?= $_SESSION['cart.sum'] ?> руб.
                </td>
            </tr>
        </tbody>
    </table>
    <form class="container col-8">
        <label class="h6">Адрес доставки</label>
        <input type="text" name="adress" id="sss" class="mb-3 form-control">

        <lable class="h6">Способ оплаты</lable><br>
        <div class="form-check form-check-inline mb-3">
            <input class="form-check-input card-payment" type="radio" value="1" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Карта
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input cash-payment" type="radio" value="0" name="flexRadioDefault" id="flexRadioDefault2" checked>
            <label class="form-check-label" for="flexRadioDefault2">
                Наличка
            </label>
        </div>
        <div class="payment">

        </div>
        <lable class="messege-auth text-danger small d-block"></lable>

        <button type="submit" class="final-order mb-4 btn btn-primary">Оформить заказ</button>
    </form>
</div>

<?php
include '../include/footer.php';
?>