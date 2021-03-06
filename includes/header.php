<!--
André Nordlund
VT21 DT100G/DT058G Datateknik Webbprogrammering 7.5 HP
Hanterar headern för alla sidor förutom login
 -->
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
include("includes/config.php"); 
//Check to see if user is logged in, if not redirect user to login page
if(!isset($_SESSION['uname'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <!--Set the page titel with given variables-->
    <title><?= $site_title . $divider . $page_title; ?></title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/stilmall.css" type="text/css">
    <script src="js/scripts.js"></script> 
</head>
<body>
    <div id="container">
        <header id="mainheader">
            <nav id="mainmenu">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="functions/logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
