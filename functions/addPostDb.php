<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../classes/dbHandler.php');
include('../classes/post.php');
session_start();
$Shop = new dbHandler();
if(isset($_SESSION['uname']) && isset($_REQUEST['message']) && isset($_FILES['file'])){
    if(strlen($_SESSION['uname']) > 0 && strlen($_REQUEST['message']) > 0){
        $temp = $Shop->uploadFile();
        if($temp != 0)
            $Shop->addPost(new Post($_SESSION['uname'], $_REQUEST['message'], date('m/d/Y H:i:s', time()), "../writeable/uploads/".$temp));
        else{
            //failed to upload file, cancel the post
        }
    }
}
else if(isset($_SESSION['uname']) && isset($_REQUEST['message'])){
    if(strlen($_SESSION['uname']) > 0 && strlen($_REQUEST['message']) > 0){
        $Shop->addPost(new Post($_SESSION['uname'], $_REQUEST['message'], date('m/d/Y H:i:s', time()), NULL));
    }
}
header("location: ../index.php");
?>