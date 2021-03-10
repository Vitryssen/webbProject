<?php
session_start();
$page_title = "Home Page";
include("includes/header.php");
include("includes/centerContent.php");
include("config/Dbconfig.php");
include('classes/dbHandler.php');
include('classes/post.php');
if(isset($_GET['delPostDb']) && isset($_SESSION['dbHandler'])){
    $dbHandler = unserialize($_SESSION['dbHandler']);
    $dbHandler->deletePost($_GET['delPostDb']);
    unset($_GET['delPostDb']);
}
?>

<h1>Thoughts</h1>

<div id="TextInputBox">
    <form action="functions/addPostDb.php" method="post" enctype="multipart/form-data">
        <p id="thoughtText">Thought:<p> 
        <textarea id="thoughtInput" cols="40" rows="2" name="message"></textarea>
        <input id="fileButton" type="file" name="file" value="Choose file">
        <input id="sendButton" type="submit" name="addPost" value="Send Thought">
    </form>
</div>

<!--<div id="PostContainer">
    <p id="PostInformation">test thoughts 2020-xx-xx-xxxxxx</p>
    <a href="" id="PostDelete"></a>
    <p id="PostText"></p>
    <img id="PostImage" src='https://media.sproutsocial.com/uploads/2017/02/10x-featured-social-media-image-size.png'>
</div>-->

<?php
if(isset($_SESSION['dbHandler'])){
    $dbHandler = unserialize($_SESSION['dbHandler']);
    $dbHandler->showPosts();
}
include("includes/footer.php");
?>