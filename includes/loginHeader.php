<!--
André Nordlund
VT21 DT100G/DT058G Datateknik Webbprogrammering 7.5 HP
Headern för inloggning
 -->
<?php 
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("includes/config.php"); 
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <!--Set the page titel with given variables-->
    <title><?= $site_title . $divider . $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/stilmall.css" type="text/css">
</head>
<body>
    <div id="container">
        <header id="mainheader">
            <nav id="mainmenu">
                <ul>
                    <li><a id="loginText">Login</a></li>
                </ul>
                <!--Output the login form and any error message if its set-->
                <form id="loginForm" action="functions/login.php" method="post">
                    <?php if(isset($_SESSION['error']))echo "<li><a id='loginError'>".$_SESSION['error']."</a></li>"; ?>
                    <p>Username: <input type="text" name="uname"></p>
                    <p>Password:<input type="password" name="pword"></p> 
                    <input type="submit" name="login" value="Login">
                    <input type="submit" name="register" value="Register">
                </form>
            </nav>
        </header>
