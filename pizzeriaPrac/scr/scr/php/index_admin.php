<?php
/*session_start();
if (!$_SESSION['user']) {
    header('location: index_admin.php');
}*/
require_once '../include/db.php';
require_once '../include/header.php';
?>
    <link rel="stylesheet" href="../../css/style.min.css">

<!--<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Фитнес-клуб</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
<header>
    <nav>
        <div class="menu">
            <a href="../index.php">
                <img class="logo__icon" src="img/logo.png" alt="logo">
            </a>
            <div class="logo__text">Большой бабуин</div>
        </div>
        <div class="menu menu__nav">
            <div class="menu__item"><a href="php/selectService.php" class="menu__link">Поиск услуги</a></div>
            <div class="menu__item"><a href="#" class="menu__link">Поиск зала</a></div>
            <div class="menu__item"><a href="#" class="menu__link">Поиск клиента</a></div>
            <div class="menu__item"><a href="#" class="menu__link">Поиск тренера</a></div>
        </div>
        <div class="hamburger">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
</header>-->

<section class="promo" id="promo">
    <h1 class="promo__header">Панель управление сервиса пиццерии</h1>
    <div class="promo__btn">
        <div class="promo__btn__item"><a href="editProduct.php"><button class="btns">Редактировать продукты</button></a></div>
        <div class="promo__btn__item"><a href="admin\editService.php"><button class="btns">Редактировать пользователей</button></a></div>
        <div class="promo__btn__item"><a href="editService.php"><button class="btns">Редактировать заказы</button></a></div>
    </div>
</section>

<img src="img/fit.png" alt="fit" class="promo__img promo__mobile">


<!--
<script src="js/script.js"></script>
</body>

</html>-->

<?php
require_once '../include/footer.php';
?>