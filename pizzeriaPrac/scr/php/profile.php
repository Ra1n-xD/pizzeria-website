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
$res = $allOrdered->FetchAll(PDO::FETCH_NUM);
?>
<div class="container col-10">
    <div class="row mt-5">
        <div class="container bg-white col-6">
            <h3 class="text-center">Приветики, <?= $_SESSION['user']['name'] ?> </h3>
            <div class="card-text pt-2 text-center h6">Ваша почта: <?= $_SESSION['user']['email'] ?></div>

            <div class="orders mt-4">
                <h5>История заказов</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Дата</th>
                            <th scope="col">Адрес</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Чек</th>
                        </tr>
                    </thead>
                    <tbody>
                        <? foreach ($res as $id => $item) : ?>
                            <tr>
                                <td><?= $item[1] ?></td>
                                <td><?= $item[2] ?></td>
                                <td><?= $item[5] ?></td>
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




<?php
include '../include/footer.php';
?>