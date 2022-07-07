<?php
session_start();
if (!$_SESSION['user']) {
    header('location: index.php');
}
include '../include/header.php';
include '../include/db.php';

$idUser = $_SESSION['user']['id_user'];
$selectOrdered = "SELECT * from ordered WHERE id_user =  $idUser";
$allOrdered = $db->query($selectOrdered);
$res = array_reverse($allOrdered->FetchAll(PDO::FETCH_NUM));
?>

<div class="container col-12">
    <div class="row mt-5">
        <div class="container bg-white col-8">
            <h3 class="text-center">Приветики, <?= $_SESSION['user']['name'] ?> </h3>
            <div class="card-text pt-2 text-center h6">Ваша почта: <?= $_SESSION['user']['email'] ?></div>

            <div class="orders mt-4">
                <h5>История заказов</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Дата</th>
                            <th scope="col">Адрес</th>
                            <th scope="col">Тип оплаты</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Сумма заказа</th>
                            <th scope="col">Чек</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? foreach ($res as $id => $item) : ?>
                            <tr>
                                <td><?= $id + 1 ?></td>
                                <td><?= $item[1] ?></td>
                                <td><?= $item[2] ?></td>
                                <td>
                                    <? if ($item[4] == 1) : ?>
                                        <?= "Карта" ?>
                                    <? else : ?>
                                        <?= "Наличные" ?>
                                    <? endif ?>
                                </td>
                                <td><?= $item[5] ?></td>
                                <td>
                                    <? $priceOrder = "SELECT SUM(product.price) as 'price' FROM
                                    ((product INNER JOIN cart_product on product.id_product=cart_product.id_product ) 
                                    INNER JOIN cart on cart_product.id_cart = cart.id_cart) WHERE cart.id_order = $item[0];";
                                    $finalPrice = $db->query($priceOrder)->fetch();
                                    echo $finalPrice['price'];
                                    ?> рублей
                                </td>
                                <td>
                                    <button type="button" data-toggle="modal" data-target="#order-modal" data-order="<?= $item[0] ?>" class="check-receipt btn btn-outline-info w-100 btn-sm">
                                        Посмотреть
                                    </button>
                                </td>
                            </tr>

                        <? endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- <div class="card-text pb-2 text-center"> <a href="logout.php">ВЫЙТИ</a></div> -->

            <div class="card-text p-4 text-center">
                <a href="logout.php"><button class="btns btns__profile">ВЫЙТИ</button></a>
            </div>
        </div>
    </div>
</div>
<!-- модалка -->
<div class="modal fade order-modal" id="order-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">История заказа</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-order-content">
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Название</th>
                                <th scope="col">Добавки</th>
                                <th scope="col">Общ.стоимость</th>
                                <th scope="col">Количество</th>
                            </tr>
                        </thead>
                        <tbody class="modal-table">

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
include '../include/footer.php';
?>