<?php
session_start();
if (!$_SESSION['user']) {
    header('location: index.php');
}
include '../include/header.php';
include '../include/db.php';
?>
<div class="container col-10">
    <div class="row pt-5">
        <div class="container bg-white col-5">
            <h3 class="text-center">Приветики, <?= $_SESSION['user']['name'] ?> </h3>
            <div class="card-text pb-2 text-center">Ваша почта: <?= $_SESSION['user']['email'] ?></div>

            <div class="card-text pb-2 text-center"> <a href="logout.php">ВЫЙТИ</a></div>
        </div>
    </div>
</div>


<?php
include '../include/footer.php';
?>