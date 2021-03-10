<?php
$page_title = "Login Page";
include("includes/loginHeader.php");
include("config/Dbconfig.php");
include('classes/dbHandler.php');
include('classes/post.php');
if(!isset($_SESSION['dbHandler'])){
    $dbHandler = new dbHandler();
    $_SESSION['dbHandler'] = serialize($dbHandler);
}
?>
<img id="coverPhoto" alt="Landing page image" src="https://i.pinimg.com/originals/c2/4b/e8/c24be8b914079df7aad2e3fb267d40f7.jpg"/>
<?php
include("includes/footer.php");
?>