<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../classes/dbHandler.php');
include('../classes/post.php');
session_start();
$Shop = new dbHandler();
if(isset($_SESSION['uname']) && isset($_REQUEST['message'])){
    if(strlen($_SESSION['uname']) > 0 && strlen($_REQUEST['message']) > 0){
        $newPost = new Post($_SESSION['uname'], filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING), date('m/d/Y H:i:s', time()), NULL);
        if(isset($_FILES['file'])){
            $temp = $Shop->uploadFile();
            if($temp != 0)
                $newPost->imageUrl = "../writeable/uploads/".$temp;
        }
        $Shop->addPost($newPost);
    }
}
header("location: ../index.php");
?>