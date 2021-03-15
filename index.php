<?php
$page_title = "Home Page";
include("includes/header.php");
include("config/Dbconfig.php");
include('classes/dbHandler.php');
include('classes/post.php');
if(isset($_GET['delPostDb']) && isset($_SESSION['dbHandler'])){
    $dbHandler = unserialize($_SESSION['dbHandler']);
    $dbHandler->deletePost($_GET['delPostDb']);
    unset($_GET['delPostDb']);
}
?>

<section id="centercontent">
<h1>Thoughts</h1>

<div id="TextInputBox">
    <form action="functions/addPostDb.php" method="post" enctype="multipart/form-data">
        <p id="thoughtText">Thought:<p> 
        <textarea id="thoughtInput" cols="40" rows="2" name="message"></textarea>
        <input id="fileButton" type="file" name="file">
        <input id="sendButton" type="submit" name="addPost" value="Send Thought">
    </form>
</div>
</section>
<?php
if(isset($_SESSION['dbHandler'])){
    $dbHandler = unserialize($_SESSION['dbHandler']);
    $dbHandler->showPosts();
}
<<<<<<< HEAD
=======
else{
    $dbHandler = new dbHandler();
    $dbHandler->fetchPosts();
    $dbHandler->showPosts();
    $_SESSION['dbHandler'] = $dbHandler;
}
>>>>>>> 27f057a3b130a8fd559b3fa4303a6a96b1912765
include("includes/footer.php");
?>