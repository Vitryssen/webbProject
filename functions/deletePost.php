<?php
if(isset($_SESSION['handler'])){
$handler = unserialize($_SESSION['handler']);
$oldArray = $handler->posts;
if($_GET['delPost'] == 0){
    array_shift($oldArray);
}
array_splice($oldArray, $_GET['delPost'], $_GET['delPost']);
$handler->posts = $oldArray;
$handler->savePosts();
unset($_GET['delPost']);
$_SESSION['handler'] = serialize($handler);
}
header("location: guest.php");
?>