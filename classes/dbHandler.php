<?php
include("db.php");
class dbHandler extends Database{
    private $posts = array();
    public function fetchPosts(){
        $db = new Database();
        $db->dbConnect();
        if ($db->connectionString) {
            $sql = "SELECT Id, Username, Post, PostDate FROM GuestBookTable";
            $result = $db->connectionString->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                   $tempPost = new Post($row["Username"], $row["Post"], $row["PostDate"]);
                   $tempPost->id = $row['Id'];
                   $this->posts[] = $tempPost;
                }
            }
            $db->dbDisconnect();
        }
    }
    public function addPost($postObj){
        $this->posts[] = $postObj;
        $db = new Database();
        $db->dbConnect();
        if ($db->connectionString) {
            $sql = "INSERT INTO GuestBookTable (Username, Post, PostDate)
                    VALUES ('".$postObj->username."', '".$postObj->text."', '".$postObj->date."')";
            $db->connectionString->query($sql);
            $db->dbDisconnect();
        }
    }
    public function showPosts(){
        $this->fetchPosts();
        $tempPosts = $this->posts;
        if(count($tempPosts) > 0){
            $index = 0;
            foreach($tempPosts as &$currentPost){
                echo "<p>".$currentPost->username."</p>";
                echo "<p>".$currentPost->text."</p>";
                echo "Publicerat ".$currentPost->date;
                echo "<a href='dbGuest.php?delPostDb=".$currentPost->id."' id='deleteBtn'>Radera Inlägg </a>";
                echo "<p style='border-bottom:1px solid black;'></p>";
                $index++;
            }
        }
    }
    public function deletePost($id){
        $db = new Database();
        $db->dbConnect();
        if ($db->connectionString) {
            $sql = "DELETE FROM GuestBookTable where Id='".$id."'";
            $db->connectionString->query($sql);
            $db->dbDisconnect();
        }
    }
}
?>