<?php
include '../include/header.php';
?>

<div class="container col-9 mt-4">
    <div class="owl-carousel owl-theme">
        <div class="item"><img src="../img/слайдер1.webp" alt="Card image cap"></div>
        <div class="item"><img src="../img/слайдер2.webp" alt="Card image cap"></div>
        <div class="item"><img src="../img/слайдер3.webp" alt="Card image cap"></div>
        <div class="item"><img src="../img/слайдер4.webp" alt="Card image cap"></div>
    </div>
</div>

<div class="menu container col-9" id="pizza">
    <h3 class="col-12 text-left">Пицца </h3>
    <div class="container mt-3">
        <div class="col-12" id="itemWrapper">
            <div class="row">
                <? $result = $res->FetchAll(PDO::FETCH_NUM);
                foreach ($result as $ID => $item) : ?>
                    <div class="col-3 pb-3">
                        <div class="card border-3">
                            <div class="card-body">
                                <img class="card-img-top" src="../img/пеперони.png" alt="Card image cap">

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

                            </div>
                        </div>
                    </div>
                <? endforeach ?>
            </div>
        </div>
    </div>
</div>


<?php
include '../include/footer.php';
?>