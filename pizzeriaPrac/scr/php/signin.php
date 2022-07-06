<?php
session_start();
require_once '../include/db.php';
?>
<?php
$emailAuth = $_POST['emailAuth'];
$passwordAuth = $_POST['passwordAuth'];

$checkAuth = $db->query("SELECT * from `users` 
                    WHERE `email` = '$emailAuth' 
                    AND `password` = '$passwordAuth'");

if ($checkAuth->rowCount() > 0) {
    $user = $checkAuth->fetchAll(PDO::FETCH_ASSOC);
    if ($user[0]['id_role'] == 2) {
        $_SESSION['user'] = [
            "id_user" => $user[0]['id_user'],
            "name" => $user[0]['name'],
            "email" => $user[0]['email'],
            "password" => $user[0]['password'],
            "id_role" => $user[0]['id_role'],
        ];
        $response = [
            "status" => 'admin',
        ];
        echo json_encode($response);
    } else {
        $_SESSION['user'] = [
            "id_user" => $user[0]['id_user'],
            "name" => $user[0]['name'],
            "email" => $user[0]['email'],
            "password" => $user[0]['password'],
            "id_role" => $user[0]['id_role'],
        ];
        $response = [
            "status" => 'user',
        ];
        echo json_encode($response);
    }
} else {
    // $_SESSION['messageAuth'] = "Не верный логин или пароль";
    // header('Location: login.php');
    $response = [
        "status" => false,
        "message" => 'Неправильная почта или пароль',
    ];
    echo json_encode($response);
}
?>