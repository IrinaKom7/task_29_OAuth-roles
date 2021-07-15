<?php
    session_start();
    // Параметры приложения

    error_reporting(E_ALL);
    ini_set('display_errors', 'on');

    include 'db_connect.php';
    include_once 'reclog.php';

    if (isset($_SESSION["isauth"]) and $_SESSION["isauth"] === true){
        header("Location: tmp/hello.php"); 
    }

    // var_dump($_POST); echo "<br>";
    if (isset($_POST["token"])){
        $_SESSION['acl'] = 'NotAuth';
        $token = $_POST["token"];
        // echo('CSRF' . $_SESSION["CSRF"] . '<br>' . 'token' . $_POST["token"] . '<br>');

        if( $token == $_SESSION["CSRF"]) {
            //echo('WWWW');

            
            if(isset($_POST["login"]) && isset($_POST["pass"])) {
                $login = $_POST["login"];
                $pass = $_POST["pass"];
                $pass_hash = password_hash($pass, PASSWORD_DEFAULT);
                //echo('WWWW2');
                //$sel = "SELECT * FROM users_29m WHERE LOGIN='". $login. "' AND PASSWORD='". $pass_hash . "'";
                $sel = "SELECT * FROM users_29m WHERE LOGIN='". $login."'";
                $result = mysqli_query($link, $sel);
                //var_dump($result); 
                if(mysqli_num_rows($result) > 0) {
                    $data = mysqli_fetch_assoc($result); 
                    $old_hash = $data['PASSWORD'];
                    $test_pass = password_verify($pass, $old_hash);
                    if ($test_pass){
                        // логин и пароль нашли
                        $_SESSION["isauth"] = true;
                        $_SESSION['acl'] = 'SimpleUser';

                        header("Location: tmp/hello.php"); exit();
                    }
                    else{ 
                        echo 'Введен некорректный пароль, повторите заново';
                        // Добавляем записи
                        $log->error('Ошибка авторизации пользователя ' . $login);
                        $_SESSION['acl'] = 'NotAuth';

                    }
                }
                else {
                    $result = mysqli_query($link,"INSERT INTO users_29m SET LOGIN='".$_POST["login"]."', PASSWORD='".$pass_hash."'");
                    echo 'Добавлен новый пользователь!<br>Авторизуйтесь ещё раз.';


                    //header("Location: hello.html"); exit();
                    //Отображаем сообщение, что логин и пароль не найдены
                    //echo('user ' . $_POST["login"] . ' with password ' . $_POST["pass"] . ' not found in DB');
                }
            }

        }
    } 
    else{
        $token = hash('gost-crypto', random_int(0,999999));
       
        $_SESSION["CSRF"] = $token;
        //var_dump($_SESSION); echo "<br>";

    }
 
?>