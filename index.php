<?php
    require_once 'vendor/autoload.php';
    include 'tmp/config.php';
    include_once  'tmp/db_connect.php';
?>


<h3>Авторизация</h3>

<form method="post" action="">
    <!-- <form method="post" > -->
    <input type="text" name="login" placeholder="Логин" required><br/>
    <input type="password" name="pass" required> <br/>
    <input type="hidden" name="token" value="<?=$token?>"> <br/>
    <input type="submit" value="Войти">
</form>

<form action="vk1.php">

    <input type="submit" value="Войти через VK" >
    <input type="hidden" name="token" value="<?=$token?>"> <br/>

</form>

<a href="tmp/hello.php">Вход без авторизации</a>