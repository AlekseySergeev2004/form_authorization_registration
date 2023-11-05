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
        
        <form action="includes/signup.php" method="POST">
            <label>Логин</label>
            <input type="text" name="login">
            <label>Почта</label>
            <input type="text" name="email">
            <label>Пароль</label>
            <input type="password" name="password">
            <label>Подтверждение пароля</label>
            <input type="password" name="repassword">
            <button type="submit">Зарегистрироваться</button>
            <p>Уже есть аккаунт? <a href="index.php">Авторизироваться</a></p>
            <?php
                if(isset($_SESSION['message'])){
                    echo '<p class="msg1"> ' . $_SESSION['message'] . '</p>';
                }
                unset($_SESSION['message']);
            ?>
            
        </form>

    </body>

</html>