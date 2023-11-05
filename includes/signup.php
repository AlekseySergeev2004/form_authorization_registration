<?php
    session_start();
    require_once 'connection.php';
    $login=$_POST['login'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];
    function validPass($password) {
        $minLength = 8;
        if (strlen($password) < $minLength) {
            return false;
        }
        if (!preg_match('/[A-Z]/', $password)) {
            return false;
        }
        if (!preg_match('/[a-z]/', $password)) {
            return false;
        }
        if (!preg_match('/[0-9]/', $password)) {
            return false;
        }
        if (!preg_match('/[\W_]/', $password)) {
            return false;
        }
        return true;
    }
    if($password===$repassword && validPass($password)){
        $password = password_hash($password, PASSWORD_DEFAULT);
        mysqli_query($lnk, "INSERT INTO `users` (`id`, `login`, `email`, `password`) VALUES (NULL, '$login', '$email', '$password')");
        $_SESSION['message'] = 'Вы успешно зарегистрировались';
        header('location: ../index.php');

    } else{
        if ($password !== $repassword) {
            $_SESSION['message'] = 'Пароли не совпадают';
        } else {
            $_SESSION['message'] = 'Пароль не соответствует требованиям безопасности';
        }
        header('location: ../registration.php');
    }

?>