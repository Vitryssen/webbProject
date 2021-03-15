<!--
André Nordlund
VT21 DT100G/DT058G Datateknik Webbprogrammering 7.5 HP
Index sida
 -->
<?php
$page_title = "Home Page";
include("includes/header.php");
include("config/Dbconfig.php");
include('classes/dbHandler.php');
include('classes/post.php');
//Gets the dbhandler object and deletes the given post if user has clicked X on a post
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
//gets the db handler object and outputs all the posts if its set
if(isset($_SESSION['dbHandler'])){
    $dbHandler = unserialize($_SESSION['dbHandler']);
    $dbHandler->showPosts();
}
//else creates a new db handler object, fetches all the posts and outputs them
//then set the dbhandler session variable
else{
    $dbHandler = new dbHandler();
    $dbHandler->showPosts();
    $_SESSION['dbHandler'] = serialize($dbHandler);
}
include("includes/footer.php");
?>