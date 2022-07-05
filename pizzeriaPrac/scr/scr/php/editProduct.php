<?php
require_once '../include/db.php';
require_once '../include/header.php';

?>
<p class="promo__header">Редактирование продуктов</p>

<br><br><br>
<div class="container col-8">

    <?php
    $sql = "select name, price from product";
    $res = $db->query($sql);
    ?>

    <h4 class="col-12">Полный список продуктов</h4><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input sortBy" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
        <label class="form-check-label sortByName" for="flexRadioDefault1">
            Сортировать по имени
        </label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input sortBy" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
        <label class="form-check-label sortByCost" for="flexRadioDefault2">
            Сортировать по цене
        </label>
    </div>

    <div class="container mt-3 border border-2">
        <div class="row">
            <div class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                <div class="col-12">
                    <div class="row">
                        <div class="col-3">Название продукта</div>
                        <div class="col-3"> Стоимость продукта</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12" id="itemWrapper">
            <? $result = $res->FetchAll(PDO::FETCH_NUM);
            foreach ($result as $ID => $item) : ?>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="row">
                        <div class="tab col-3 border border-1 itemName"><?= $item[0] ?> </div>
                        <div class="tab col-3 border border-1"><?= $item[1] ?> руб</div>

                        <div class="col-3 p-0 px-2">
                            <a data-src="#updateForm" data-fancybox="updateForm<?= $ID ?>" class="w-100 btn btn-outline-primary btnUpdate">
                                Редактировать
                            </a>
                        </div>

                        <div class=" col-3 p-0 px-2">
                            <form action='deleteProduct.php' method='post'>
                                <input type='hidden' name='name_delete' value='<?= $item[0] ?>' />
                                <input class="w-100 btn btn-outline-danger btnDelete" type='submit' value='Удалить'></tr>
                            </form>
                        </div>
                    </div>
                </div>
            <? endforeach ?>
        </div>
    </div>
    <div id='updateForm' style="display: none;"></div>
</div>

<div class="container col-8 pt-5">
    <div class="row pb-4">
        <div class="col-12 add">
            <div class="h4">Добавление услуги</div>
            <div class=" arrow" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOneT" aria-expanded="false" aria-controls="flush-collapseOneT"></div>
        </div>
    </div>
    <form id="flush-collapseOneT" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample" action="" method="post">
        <p>Введите название продукта:
            <input class="addName" type="text">
        </p>
        <p>Введите стоимость продукта:
            <input class="addCost" type="number">
        </p>
        <input class="btn btn-success btnAdd" type="submit" value="Добавить">
    </form> <br>
</div>

<?php
include '../include/footer.php';
?>