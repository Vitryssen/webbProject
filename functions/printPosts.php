<?php
if(isset($_SESSION['handler'])){
    $handler = unserialize($_SESSION['handler']);
    $posts = $handler->posts;
    if(count($posts) > 0){
        $index = 0;
        foreach($posts as &$currentPost){
            echo "<p>".$currentPost->username."</p>";
            echo "<p>".$currentPost->text."</p>";
            echo "Publicerat ".$currentPost->date;
            echo "<a href='guest.php?delPost=".$index."' id='deleteBtn'>Radera Inlägg </a>";
            echo "<p style='border-bottom:1px solid black;'></p>";
            $index++;
        }
    }
}