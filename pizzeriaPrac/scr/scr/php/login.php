<?php
session_start();
if ($_SESSION['user']) {
    header('location: profile.php');
}
include '../include/header.php';
include '../include/db.php';

?>
<div class="container col-10">
    <div class="row pt-4">
        <div class="container bg-white col-5">
            <h3 class="pb-2">Авторизация</h3>
            <form>
                <label>Почта</label>
                <input type="email" name="emailAuth" class="form-control" aria-describedby="emailHelp">

                <label class="mt-3">Пароль</label>
                <input type="password" name="passwordAuth" class="form-control">

                <lable class="messege-auth text-danger small d-block"></lable>

                <button type="submit" class="login-btn mt-3 btn btn-primary">Войти</button>
            </form>
        </div>

        <div class="container bg-white col-5 pb-5">
            <h3 class="pb-2">Регистрация</h3>
            <form action="signup.php" method="POST">

                <label>Имя</label>
                <input type="text" name="name" class="form-control">

                <label class="mt-3">Почта</label>
                <input type="email" name="email" class="form-control" aria-describedby="emailHelp">

                <label class="mt-3">Пароль</label>
                <input type="password" name="password" class="form-control">

                <label class="mt-3">Подтверждение пароля</label>
                <input type="password" name="passwordConfirm" class="form-control">

                <lable class="messege-regi small d-block"></lable>

                <button type="submit" class="register-btn mt-3 btn btn-primary">Зарегистрироватся</button>
            </form>
        </div>
    </div>
</div>

<?php
include '../include/footer.php';
?>