<?php
require_once '../include/db.php';
?>
<?php
require_once '../include/header.php';
?>
<?php
require_once  'slider.php';
?>

<section class="menu container col-10" id="pizza">
    <h3 class="col-12 text-left menu__header">Пицца </h3>
    <div class="container mt-3">
        <div class="col-12" id="itemWrapper">
            <div class="row">
                <?
                $selectProduct = "select * from product";
                $allPizza = $db->query($selectProduct);

                $selectAddition = "select * from addition";
                $allAddition = $db->query($selectAddition);

                $product = $allPizza->FetchAll(PDO::FETCH_NUM);
                foreach ($product as $ID => $item) : ?>
                    <div class="col-3 pb-3">
                        <div class="card border-3">
                            <div class="card-body  border-3">
                                <img class="card-img-top" src="../img/<?= $item[5] ?>" alt="Card image cap">

                                <h5 class="card-title pizza-name"><?= $item[1] ?></h5>
                                <div class="card-text pb-2">Цена: <?= $item[2] ?> руб</div>
                                <div class="card-text pb-2">Вес: <?= $item[3] ?> гр</div>
                                <div class="card-text pb-2">
                                    <? if ($item[4]) : ?>
                                        <?= "В наличии" ?>
                                    <? else : ?>
                                        <?= "Отсутствует" ?>
                                    <? endif ?>
                                </div>
                                <? if ($item[4]) : ?>
                                    <a data-src="#updateForm" data-fancybox="updateForm<?= $ID ?>" class="w-100 btn btn-outline-danger">
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
                <? endforeach ?>
            </div>
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


<?php
require_once '../include/footer.php';
?>