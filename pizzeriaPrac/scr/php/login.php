<?php
include '../include/header.php';
?>
<div class="container col-8">
    <div class="row pt-4">
        <div class="container bg-white col-6">
            <h3>Авторизация</h3>
            <form action="authorization.php" method="POST">
                <p>Имя:
                    <input type="text" name="F_Name" required />
                </p>
                <p>Фамилия:
                    <input type="text" name="S_Name" required />
                </p>
                <input class="btn btn-outline-secondary" type="submit" value="Подтвердить ввод">
            </form>
        </div>

        <div class="container bg-white col-md-6">
            <h3>Регистрация</h3>
            <form action="register.php" method="POST">
                <p>Имя:
                    <input type="text" name="F_Name" required />
                </p>
                <p>Фамилия:
                    <input type="text" name="S_Name" required />
                </p>
                <p>Номер телефона:
                    <input type="number" name="T_Number" required />
                </p>
                <p>Почта:
                    <input type="email" name="Mail" required />
                </p>
                <input class="btn btn-outline-secondary" type="submit" value="Подтвердить ввод">
            </form>
        </div>
    </div>
</div>


<?php
include '../include/footer.php';
?>