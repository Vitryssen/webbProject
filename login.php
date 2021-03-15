<!--
André Nordlund
VT21 DT100G/DT058G Datateknik Webbprogrammering 7.5 HP
Login sida
 -->
<?php
$page_title = "Login Page";
include("includes/loginHeader.php");
include("config/Dbconfig.php");
include('classes/dbHandler.php');
include('classes/post.php');
//Create new db handler and set session variable if not set
if(!isset($_SESSION['dbHandler'])){
    $dbHandler = new dbHandler();
    $_SESSION['dbHandler'] = serialize($dbHandler);
}
//if a user is logged in send them to index instead
if(isset($_SESSION['uname']))
    header("Location: index.php");
?>
<img id="coverPhoto" alt="Landing page image" src="https://i.pinimg.com/originals/c2/4b/e8/c24be8b914079df7aad2e3fb267d40f7.jpg"/>
<?php
include("includes/footer.php");
?>