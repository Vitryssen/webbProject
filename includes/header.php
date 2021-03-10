<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include("includes/config.php"); 
if(!isset($_SESSION['uname'])){
    header("Location: login.php");
}
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="functions/logout.php">Logout</a></li>
                </ul>
            </nav>
        </header>
