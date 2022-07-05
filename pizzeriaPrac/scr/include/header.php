<?php
session_start();
require_once '../include/db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Пиза</title>

    <link rel="stylesheet" href="../css/style.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <div class="container col-9 nav_flex">
            <div class="navigation">
                <a href="../php/index.php">
                    <img class="logo__icon" src="../img/logo1.svg" alt="logo">
                </a>
                <div class="logo__text">СУПЕР ПИЗА</div>
            </div>

            <nav class="navigation">
                <div class="navigation__nav">
                    <a href="#pizza" class="navigation__link navigation__item">Пицца</a>
                    <a href="#snacks" class="navigation__link navigation__item">Закуски</a>
                    <a href="#drinks" class="navigation__link navigation__item">Напитки</a>
                    <a href="#b" class="navigation__link navigation__item">Сосусы</a>
                    <a href="#f" class="navigation__link navigation__item">Десерты</a>
                    <a href="#footer" class="navigation__link navigation__item">О нас</a>
                </div>
            </nav>

            <div class="navigation">
                <div class="navigation__item"><a href="../php/order.php"><button class="btns">Корзина</button></a></div>
                <div class="navigation__item">
                    <? if ($_SESSION['user']['name']) : ?>
                        <a href="../php/profile.php" class="navigation__link"><?= $_SESSION['user']['name'] ?> &#129313</a>
                    <? else : ?>
                        <a href=" ../php/login.php"><button class="btns btns__auth">Войти</button></a>
                    <? endif ?>
                </div>
            </div>
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </header>