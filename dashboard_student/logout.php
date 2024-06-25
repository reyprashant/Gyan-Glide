<?php
session_start();
unset($_COOKIE['current_user']);
setcookie('current_user','hello',time()-8600,'/');
unset($_SESSION['current_user']);

if (isset($_SESSION['current_user'])){
    echo $_SESSION['current_user'];
    echo "session";
} 
elseif (isset($_COOKIE['current_user'])){
    echo $_COOKIE['current_user'];
    echo "cookie";
} else {
    echo "nnothing exists";
    header("location:../loginpage.php");
    die();
}




?>