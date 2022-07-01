<?php
session_start();
require_once '../include/db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];

if (($password === $passwordConfirm) && $name && $email) {
    $registration = $db->exec(
        "INSERT INTO `users` (`id_user`, `id_role`, `name`, `surname`, `phone`, `email`, `password`) 
        VALUES (NULL, 1, '$name', NULL, NULL, '$email', '$password')"
    );
    $_SESSION['message'] = "Вы зарегистрированы";
    header('Location: login.php');
} else {
    $_SESSION['message'] = "Ошибка при регистрации, проверьте введенные данные";
    header('Location: login.php');
}
