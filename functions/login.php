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
//If the database handler is not initialized, serialize it and set it
if(!isset($_SESSION['dbHandler'])){
    $_SESSION['dbHandler'] = serialize($dbHandler);
}
//else get the dbhandler
else{
    $dbHandler = unserialize($_SESSION['dbHandler']);
}
//Check that username and password is given
if(isset($_REQUEST['uname']) && isset($_REQUEST['pword'])){
    //Check if login was requested or if it was register
    if(isset($_REQUEST['login'])){
        //Run the login function and unset the credentials
        if($dbHandler->login($_REQUEST['uname'], $_REQUEST['pword'])){
            $_SESSION['uname'] = $_REQUEST['uname'];
            unset($_REQUEST['uname']);
            unset($_REQUEST['pword']);
        }
        //If it failed set the error session variable
        else{
            $_SESSION['error'] = "Error trying to log in";
        }
    }
    else if(isset($_REQUEST['register'])){
        //Run the register function and unset the credentials
        if($dbHandler->register($_REQUEST['uname'], $_REQUEST['pword'])){
            $_SESSION['uname'] = $_REQUEST['uname'];
            unset($_REQUEST['uname']);
            unset($_REQUEST['pword']);
        }
        //If it failed set the error session variable
        else{
            $_SESSION['error'] = "Error trying to create account";
        }
    }
}
header("Location: ../index.php");
?>