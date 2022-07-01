<div class="col-12 mt-4">
    <div class="owl-carousel owl-theme">
        <?
        $selectNews = "select * from news";
        $allNews = $db->query($selectNews);

        $news = $allNews->FetchAll(PDO::FETCH_NUM);
        foreach ($news as $ID => $item) : ?>
            <div class="item">
                <? if ($item[2]) : ?>
                    <span> <?= $item[2] ?></span>
                <? endif ?>
                <img src="../img/<?= $item[3] ?>" alt="Card image cap">
            </div>
        <? endforeach ?>
    </div>
</div>