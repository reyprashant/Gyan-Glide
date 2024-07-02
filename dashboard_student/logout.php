<?php
session_start();
// unset($_COOKIE['current_user']);
// unset($_COOKIE['email']);
// setcookie('current_user','',time()-8600,'/');
// setcookie('email','',time()-8600,'/');
// unset($_SESSION['current_user']);
// unset($_SESSION['email']);
$_SESSION = [];
$_SESSION['loginerror'] = false;
$_SESSION['signuperror'] = false;
$_SESSION['signup'] = false;
header("location:../loginpage.php");
die();





?>