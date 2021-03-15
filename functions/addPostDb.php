<!--
André Nordlund
VT21 DT100G/DT058G Datateknik Webbprogrammering 7.5 HP
Hanterar tillägg av nya inlägg till databasen
 -->
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('../classes/dbHandler.php');
include('../classes/post.php');
session_start();
$Shop = new dbHandler();
//checks that the user is logged in and that values are not empty
if(isset($_SESSION['uname']) && isset($_REQUEST['message'])){
    if(strlen($_SESSION['uname']) > 0 && strlen($_REQUEST['message']) > 0){
        //Sanitizes the input, creates a new post object
        $newPost = new Post($_SESSION['uname'], filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING), date('m/d/Y H:i:s', time()), NULL);
        //If a file is selected run the corresponding function
        if(isset($_FILES['file'])){
            $temp = $Shop->uploadFile();
            if($temp != 0) //If the file was uploaded set the imageUrl variable to the correct path
                $newPost->imageUrl = "../writeable/uploads/".$temp;
        }
        //Adds the post to the database
        $Shop->addPost($newPost);
    }
}
header("location: ../index.php");
?>