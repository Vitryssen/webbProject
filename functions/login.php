<!--
André Nordlund
VT21 DT100G/DT058G Datateknik Webbprogrammering 7.5 HP
Hanterar inloggning/registrering
 -->
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../classes/dbHandler.php');
session_start();
$dbHandler = new dbHandler();
if(!isset($_SESSION['dbHandler'])){
    $_SESSION['dbHandler'] = serialize($dbHandler);
}
else{
    $dbHandler = unserialize($_SESSION['dbHandler']);
}
if(isset($_REQUEST['uname']) && isset($_REQUEST['pword'])){
    if(isset($_REQUEST['login'])){
        if($dbHandler->login($_REQUEST['uname'], $_REQUEST['pword'])){
            $_SESSION['uname'] = $_REQUEST['uname'];
            unset($_REQUEST['uname']);
            unset($_REQUEST['pword']);
        }
        else{
            $_SESSION['error'] = "Error trying to log in";
        }
    }
    else if(isset($_REQUEST['register'])){
        if($dbHandler->register($_REQUEST['uname'], $_REQUEST['pword'])){
            $_SESSION['uname'] = $_REQUEST['uname'];
            unset($_REQUEST['uname']);
            unset($_REQUEST['pword']);
        }
        else{
            $_SESSION['error'] = "Error trying to create account";
        }
    }
}
header("Location: ../index.php");
?>