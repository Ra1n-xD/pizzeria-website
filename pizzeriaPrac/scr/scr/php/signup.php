<?php
session_start();
require_once '../include/db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$passwordConfirm = $_POST['passwordConfirm'];

$checkEmail = $db->query("SELECT * from `users` 
                    WHERE `email` = '$email'");

if ($checkEmail->rowCount() > 0) {
    $response = [
        "status" => false,
        "message" => 'Данная почта уже используется ',
    ];
    echo json_encode($response);
} elseif (($password === $passwordConfirm) && $name && $email && $password) {
    $registration = $db->exec(
        "INSERT INTO `users` (`id_user`, `id_role`, `name`, `phone`, `email`, `password`) 
        VALUES (NULL, 1, '$name',  '', '$email', '$password')"
    );
    $response = [
        "status" => true,
        "message" => 'Вы зарегистрированы',
    ];
    echo json_encode($response);
} else {
    $response = [
        "status" => false,
        "message" => 'Ошибка при регистрации, проверьте введенные данные',
    ];
    echo json_encode($response);
}
