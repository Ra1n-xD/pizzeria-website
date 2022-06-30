<?php
include '../include/header.php';
?>
<div class="container col-10">
    <div class="row pt-5">
        <div class="container bg-white col-5">
            <h3>Авторизация</h3>
            <form action="../include/signup.php" method="POST">
                <label>Почта</label>
                <input type="email" class="form-control" aria-describedby="emailHelp">

                <label class="mt-3">Пароль</label>
                <input type="password" class="form-control">

                <button type="submit" class="mt-3 btn btn-primary">Войти</button>
            </form>
        </div>

        <div class="container bg-white col-5">
            <h3>Регистрация</h3>
            <form action="" method="POST">

                <label>Имя</label>
                <input type="text" class="form-control">

                <label class="mt-3">Почта</label>
                <input type="email" class="form-control" aria-describedby="emailHelp">

                <label class="mt-3">Пароль</label>
                <input type="password" class="form-control">

                <label class="mt-3">Подтверждение пароля</label>
                <input type="password" class="form-control">

                <button type="submit" class="mt-3 btn btn-primary">Зарегистрироватся</button>
            </form>
        </div>
    </div>
</div>


<?php
include '../include/footer.php';
?>