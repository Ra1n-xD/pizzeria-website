<?php
session_start();
require_once '../include/db.php';
?>
<?php
require_once '../include/header.php';
?>
<?php
require_once  '../include/slider.php';
?>

<?php
$selectProduct = "SELECT * from product";
$allProduct = $db->query($selectProduct);

$selectAddition = "SELECT * from addition";
$allAddition = $db->query($selectAddition);

$product = $allProduct->FetchAll(PDO::FETCH_NUM);
?>

<section class="menu container col-10 mt-5" id="pizza">
    <h3 class="col-12 text-left menu__header">Пицца </h3>
    <div class="container">
        <div class="row pt-3">
            <? foreach ($product as $ID => $item) : ?>
                <? if ($item[1] == 1) : ?>
                    <div class="col-3 pb-3">
                        <div class="card border-3">
                            <div class="card-body  border-3">
                                <img class="card-img-top" src="../img/<?= $item[6] ?>" alt="Card image cap">

                                <h5 class="card-title pizza-name"><?= $item[2] ?></h5>
                                <div class="card-text pb-2">Цена: <?= $item[3] ?> руб</div>
                                <div class="card-text pb-2">Вес: <?= $item[4] ?> гр</div>
                                <div class="card-text pb-2">
                                    <? if ($item[5]) : ?>
                                        <?= "В наличии" ?>
                                    <? else : ?>
                                        <?= "Отсутствует" ?>
                                    <? endif ?>
                                </div>
                                <? if ($item[5]) : ?>
                                    <a data-src="#updateForm" data-fancybox="updateForm<?= $ID ?>" class="w-100 btn btn-outline-danger add-to-cart" data-id="<?= $item[0] ?>">
                                        Выбрать
                                    </a>
                                <? else : ?>
                                    <a class="w-100 btn btn-outline-secondary">
                                        Выбрать
                                    </a>
                                <? endif ?>
                            </div>
                        </div>
                    </div>
                <? endif ?>
            <? endforeach ?>
        </div>
    </div>
    <div id='updateForm' style="display: none;" class="col-8">
        <h3 class="text-center">Дополнения к заказу</h3>
        <div class="mt-2 d-flex flex-wrap">
            <? $addition = $allAddition->FetchAll(PDO::FETCH_NUM);
            foreach ($addition as $ID => $item) : ?>
                <div class="m-1 card border-3">
                    <div class=" w-50 mx-auto"><img src="../img/дополнение.png" alt="" class="w-100"></div>
                    <div class="itemName text-center">
                        <?= $item[1] ?>
                    </div>
                    <div class="text-center">Цена: <?= $item[2] ?> руб</div>
                    <a class="btn btn-outline-danger">
                        Выбрать
                    </a>
                </div>
            <? endforeach ?>
        </div>
    </div>
</section>

<section class="menu container col-10 mt-5" id="snacks">
    <h3 class="col-12 text-left menu__header">Закуски</h3>
    <div class="container">
        <div class="row pt-3">
            <? foreach ($product as $ID => $item) : ?>
                <? if ($item[1] == 2) : ?>
                    <div class="col-3 pb-3">
                        <div class="card border-3">
                            <div class="card-body  border-3">
                                <img class="card-img-top" src="../img/<?= $item[6] ?>" alt="Card image cap">

                                <h5 class="card-title pizza-name"><?= $item[2] ?></h5>
                                <div class="card-text pb-2">Цена: <?= $item[3] ?> руб</div>
                                <div class="card-text pb-2">Вес: <?= $item[4] ?> гр</div>
                                <div class="card-text pb-2">
                                    <? if ($item[5]) : ?>
                                        <?= "В наличии" ?>
                                    <? else : ?>
                                        <?= "Отсутствует" ?>
                                    <? endif ?>
                                </div>
                                <? if ($item[5]) : ?>
                                    <a class="w-100 btn btn-outline-danger">
                                        Выбрать
                                    </a>
                                <? else : ?>
                                    <a class="w-100 btn btn-outline-secondary">
                                        Выбрать
                                    </a>
                                <? endif ?>
                            </div>
                        </div>
                    </div>
                <? endif ?>
            <? endforeach ?>
        </div>
    </div>
</section>


<section class="menu container col-10 mt-5" id="drinks">
    <h3 class="col-12 text-left menu__header">Напитки</h3>
    <div class="container">
        <div class="row pt-3">
            <? foreach ($product as $ID => $item) : ?>
                <? if ($item[1] == 3) : ?>
                    <div class="col-3 pb-3">
                        <div class="card border-3">
                            <div class="card-body  border-3">
                                <img class="card-img-top" src="../img/<?= $item[6] ?>" alt="Card image cap">

                                <h5 class="card-title pizza-name"><?= $item[2] ?></h5>
                                <div class="card-text pb-2">Цена: <?= $item[3] ?> руб</div>
                                <div class="card-text pb-2">Вес: <?= $item[4] ?> гр</div>
                                <div class="card-text pb-2">
                                    <? if ($item[5]) : ?>
                                        <?= "В наличии" ?>
                                    <? else : ?>
                                        <?= "Отсутствует" ?>
                                    <? endif ?>
                                </div>
                                <? if ($item[5]) : ?>
                                    <a class="w-100 btn btn-outline-danger">
                                        Выбрать
                                    </a>
                                <? else : ?>
                                    <a class="w-100 btn btn-outline-secondary">
                                        Выбрать
                                    </a>
                                <? endif ?>
                            </div>
                        </div>
                    </div>
                <? endif ?>
            <? endforeach ?>
        </div>
    </div>
</section>




<?php
require_once '../include/footer.php';
?>