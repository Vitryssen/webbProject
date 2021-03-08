<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("includes/config.php"); 
/*session_start();
if (!isset($_SESSION["uname"])) {
    header("location: login.php");
}*/
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
                    <li><a href="index.php">Hem</a></li>
                    <li><a href="omsidan.php">Information</a></li>
                    <li><a href="guest.php">Gästbok del 1</a></li>
                    <li><a href="dbGuest.php">Gästbok del 2</a></li>
                    <li><a href="functions/logout.php">Logga ut</a></li>
                </ul>
            </nav>
        </header>
