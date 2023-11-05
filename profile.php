<?php
    session_start();
    if (!isset($_SESSION['user'])){
        header('location: index.php');
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
        <form>
            <h1 style="margin: 10px 0;">Ваш профиль</h1>
            <h3 style="margin: 8px 0;"><?= $_SESSION['user']['login'] ?></h3>
            <a href="#"><?= $_SESSION['user']['email'] ?></a>
            <a href="includes/logout.php" class="logout">Выход</a>
        </form>

    </body>

</html>