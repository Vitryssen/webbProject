<?php
session_start();
if($_REQUEST["uname"] == "test" && $_REQUEST["psw"] == "test"){
    $_SESSION["uname"] = $_REQUEST["uname"];
    $_SESSION["ps"] = $_REQUEST["psw"];
    header("location: ../index.php");
}
else{
    header("location: ../login.php");
}
?>