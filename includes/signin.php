<?php
session_start();
require_once 'connection.php';

$login = mysqli_real_escape_string($lnk, $_POST['login']); // Защита от SQL-инъекций
$password = mysqli_real_escape_string($lnk, $_POST['password']); // Защита от SQL-инъекций

$query = "SELECT * FROM users WHERE login = '$login'";
$result = mysqli_query($lnk, $query);

if ($result === false) {
    die(mysqli_error($lnk));
}

if (mysqli_num_rows($result) > 0) {
    $user = mysqli_fetch_assoc($result);
    $hashed_password = $user['password'];

    if (password_verify($password, $hashed_password)) {
        $_SESSION['user'] = [
            "login" => $user['login'],
            "email" => $user['email']
        ];
        header('location: ../profile.php');
    } else {
        $_SESSION['message'] = 'Неверный пароль';
        header('location: ../index.php');
    }
} else {
    $_SESSION['message'] = 'Пользователя с таким логином не существует';
    header('location: ../index.php');
}