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
    <title><?= $site_title . $divider . $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/stilmall.css" type="text/css">
</head>
<body>
    <div id="container">
        <header id="mainheader">
            <!--<h1>PHP Struktur</h1>-->
            <nav id="mainmenu">
                <ul>
                    <li><a id="loginText">Login</a></li>
                </ul>
                <form id="loginForm" action="functions/login.php" method="post">
                    <?php if(isset($_SESSION['error']))echo "<li><a id='loginError'>".$_SESSION['error']."</a></li>"; ?>
                    <p>Username: <input type="text" name="uname"></p>
                    <p>Password:<input type="password" name="pword"></p> 
                    <input type="submit" name="login" value="Login">
                    <input type="submit" name="register" value="Register">
                </form>
            </nav>
        </header>