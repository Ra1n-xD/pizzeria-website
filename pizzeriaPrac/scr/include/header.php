<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пиза</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <?php
    $host = 'localhost';
    $db = 'pizza';
    $user = 'root';
    $password = 'root';
    $db = new PDO("mysql:host=$host;dbname=$db", $user, $password);
    //Установка кодировки в UTF-8 для текущего соединения с MySQL
    $sql = 'SET CHARACTER SET utf8';
    $res = $db->query($sql);
    $sql = "select * from product";
    $res = $db->query($sql);
    ?>
    <header>
        <nav class="container col-9">
            <div class="navigation">
                <a href="../php/index.php">
                    <img class="logo__icon" src="../img/logo2.png" alt="logo">
                </a>
                <div class="logo__text">Супер Пиза</div>
            </div>

            <div class="navigation navigation__nav">
                <div class="navigation__item"><a href="#pizza" class="navigation__link">Пицца</a></div>
                <div class="navigation__item"><a href="#" class="navigation__link">Напитки</a></div>
                <div class="navigation__item"><a href="#" class="navigation__link">Закуски</a></div>
                <div class="navigation__item"><a href="#" class="navigation__link">Сосусы</a></div>
                <div class="navigation__item"><a href="#" class="navigation__link">Десерты</a></div>
                <div class="navigation__item"><a href="#footer" class="navigation__link">О нас</a></div>
            </div>
            <div class="navigation">
                <div class="navigation__item"><a href="../php/order.php"><button class="btns">Корзина</button></a></div>
                <div class="navigation__item"><a href="../php/order.php"><button class="btns btns__auth">Войти</button></a></div>
            </div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
    </header>