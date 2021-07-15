
<?php
session_start();


// if (isset($_SESSION["isauth"]) and $_SESSION["isauth"] === true){

//         echo "<h1>Hello my authorized user</h1>";
//         echo '<img src="../img/01.jpg" alt="img" class="img_hand">';
// }
// else{

//     echo "<h1>You are not authorized. Cool picture must be here, but you not see it</h1>";
// }

if (isset($_SESSION["acl"])){
    $acl = $_SESSION['acl'];
    switch ($acl) {
        case 'NotAuth':
            header("Location: ../index.php");
            break;
        case 'SimpleUser':
            echo "<h1>Hello my Simple authorized user</h1>";
            break;
        case 'VKUser':
            echo "<h1>Hello my VK authorized user</h1>";
            echo '<img src="../img/01.jpg" alt="img" class="img_hand">';
            break;
    }
} else{
    header("Location: ../index.php"); exit();
}



