<?php
include("db.php");
class dbHandler extends Database{
    private $posts = array();
    public function fetchPosts(){
        $db = new Database();
        $db->dbConnect();
        if ($db->connectionString) {
            $sql = "SELECT Id, Username, Post, PostDate FROM ProjectPosts";
            $result = $db->connectionString->query($sql);
            while($row = $result->fetch()) {
                $tempPost = new Post($row["Username"], $row["Post"], $row["PostDate"]);
                $tempPost->id = $row['Id'];
                $this->posts[] = $tempPost;
            }
            $db->dbDisconnect();
        }
    }
    public function addPost($postObj){
        $this->posts[] = $postObj;
        $db = new Database();
        $db->dbConnect();
        if ($db->connectionString) {
            $sql = "INSERT INTO ProjectPosts (Username, Post, PostDate)
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
                echo "<a href='index.php?delPostDb=".$currentPost->id."' id='deleteBtn'>Radera Inlägg </a>";
                echo "<p style='border-bottom:1px solid black;'></p>";
                $index++;
            }
        }
    }
    public function deletePost($id){
        $db = new Database();
        $db->dbConnect();
        if ($db->connectionString) {
            $sql = "DELETE FROM ProjectPosts where Id='".$id."'";
            $db->connectionString->query($sql);
            $db->dbDisconnect();
        }
    }
    public function login($username, $password){
        $db = new Database();
        $db->dbConnect();
        if ($db->connectionString) {
            $sql = "SELECT Password FROM ProjectUsers WHERE Username = :username";
            $stmt = $db->connectionString->prepare($sql);
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();
            $users = $stmt->fetch();
            if (isset($users[0])) {
                if (password_verify($password, $users[0])) {
                    return 1;
                } else {
                    return 0;
                }
            }
        }
    }
    public function register($username, $password){
        $db = new Database();
        $db->dbConnect();
        if ($db->connectionString) {
            try{
                $username = filter_input(INPUT_POST, 'uname', FILTER_SANITIZE_STRING);
                echo $username;
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO ProjectUsers (Username, Password) VALUES (:username,:password)";
                $stmt = $db->connectionString->prepare($sql);
                $stmt->bindParam(':username', $username, PDO::PARAM_STR);
                $stmt->bindParam(':password', $hash, PDO::PARAM_STR);
                $stmt->execute();
                return 1;
            }
            catch(PDOException $e){
                return 0;
            }
        }
    }
}
?>