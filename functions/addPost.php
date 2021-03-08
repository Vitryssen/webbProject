<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once('../classes/handler.php');
require_once('../classes/post.php');
session_start();
$Shop = new Handler();
if(isset($_SESSION['handler'])){
    $Shop = unserialize($_SESSION['handler']);
}
if(isset($_REQUEST['author']) && isset($_REQUEST['message'])){
    if(strlen($_REQUEST['author']) > 0 && strlen($_REQUEST['message']) > 0){
        $Shop->addPost(new Post($_REQUEST['author'], $_REQUEST['message'], date('m/d/Y H:i:s', time())));
        unset($_REQUEST['author']);
        unset($_REQUEST['message']);
        $Shop->savePosts();
        $_SESSION['handler'] = serialize($Shop);
    }
}
header("location: ../guest.php");
?>