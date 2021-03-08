<?php
session_start();
$page_title = "Gästbok Fil";
include("includes/header.php");
include("includes/centerContent.php");
require_once('classes/handler.php');
require_once('classes/post.php');
if(!isset($_SESSION['handler'])){
    $handler = new Handler();
    $_SESSION['handler'] = serialize($handler);
}
if(isset($_GET['delPost'])){
    include("functions/deletePost.php");
}
?>

<h1> Andrés gästbok</h1>

<form action="functions/addPost.php" method="post">
<p>
Namn: <br><input type="text" name="author">
</p>
<p>
Meddelande:<br> <textarea cols="40" rows="2" name="message"></textarea>
</p>
<p>
<input type="submit" name="addPost" value="Skapa Inlägg" class="btn">
</p>
</form>
<a href="../writeable/rawData" target="_blank">Visa datafil</a>
<?php
include("functions/printPosts.php");
include("includes/guestInput.php");
include("includes/footer.php");
?>