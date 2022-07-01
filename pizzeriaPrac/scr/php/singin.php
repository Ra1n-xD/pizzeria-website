<?php
session_start();
require_once '../include/db.php';

$emailAuth = $_POST['emailAuth'];
$passwordAuth = $_POST['passwordAuth'];

$checkAuth = $db->query("SELECT * from `users` 
                    WHERE `email` = '$emailAuth' 
                    AND `password` = '$passwordAuth'");

if ($checkAuth->rowCount() > 0) {
    $user = $checkAuth->fetchAll(PDO::FETCH_ASSOC);
    $_SESSION['user'] = [
        "id_user" => $user[0]['id_user'],
        "name" => $user[0]['name'],
        "email" => $user[0]['email'],
        "password" => $user[0]['password'],
    ];
    header('Location: index.php');
} else {
    $_SESSION['messageAuth'] = "Не верный логин или пароль";
    header('Location: login.php');
}
?>

<pre>
<?php
print_r($_SESSION['user']);
?>
</pre>