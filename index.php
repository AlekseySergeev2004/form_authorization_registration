<?php
    session_start();
    if (isset($_SESSION['user'])){
        header('location: profile.php');
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>authorization and registration</title>
        <link rel ="stylesheet" href="css/main.css">

    </head>
    <body>
        <form action="includes/signin.php" method="POST">
            <label>Логин</label>
            <input type="text" name="login">
            <label>Пароль</label>
            <input type="password" name="password">
            <button type="submit">Войти</button>
            <p>Нет аккаунта? <a href="registration.php">Зарегистрироваться</a></p>
            <?php
                if(isset($_SESSION['message']) && $_SESSION['message'] == 'Вы успешно зарегистрировались') {
                    echo '<p class="msg2"> ' . $_SESSION['message'] . ' </p>';
                } elseif(isset($_SESSION['message']) && ($_SESSION['message'] == 'Неверный пароль' || $_SESSION['message'] == 'Пользователя с таким логином не существует')) {
                    echo '<p class="msg1"> ' . $_SESSION['message'] . ' </p>';
                }
                unset($_SESSION['message']);
            ?>
        </form>

    </body>

</html>