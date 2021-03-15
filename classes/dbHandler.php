<?php
include("db.php");
class dbHandler extends Database{
    private $posts = array();
    public function fetchPosts(){
        $db = new Database();
        $db->dbConnect();
        $this->posts = array();
        if ($db->connectionString) {
            $sql = "SELECT Id, Username, Post, PostDate, imageUrl FROM ProjectPosts";
            $result = $db->connectionString->query($sql);
            while($row = $result->fetch()) {
                $tempPost = new Post($row["Username"], $row["Post"], $row["PostDate"], $row["imageUrl"]);
                $tempPost->id = $row['Id'];
                $this->posts[] = $tempPost;
            }
            $db->dbDisconnect();
        }
    }
    public function uploadFile(){
        $target_dir = "../../writeable/uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $fileName = uniqid(rand(), true) . ".".$imageFileType;
        $target_file = $target_dir . $fileName;
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } 
            else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }
        if ($_FILES["file"]["size"] > 500000) {
            $uploadOk = 0;
        }
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        if($uploadOk){
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
            return $fileName;
        }
        return 0;
    }
    public function addPost($postObj){
        $db = new Database();
        $db->dbConnect();
        if ($db->connectionString) {
            $sql = "INSERT INTO ProjectPosts (Username, Post, PostDate, imageUrl)
                    VALUES (:username, :text, :date, :url)";
            $stmt = $db->connectionString->prepare($sql);
            $stmt->bindParam(':username', $postObj->username, PDO::PARAM_STR);
            $stmt->bindParam(':text', $postObj->text, PDO::PARAM_STR);
            $stmt->bindParam(':date', $postObj->date, PDO::PARAM_STR);
            $stmt->bindParam(':url', $postObj->imageUrl, PDO::PARAM_STR);
            $stmt->execute();
            $db->dbDisconnect();
        }
    }
    public function showPosts(){
        $this->fetchPosts();
        $tempPosts = $this->posts;
        if(count($tempPosts) > 0){
            $index = 0;
            foreach($tempPosts as &$currentPost){
                echo "<div class='PostContainer'>";
                echo "<p class='PostInformation'>".$currentPost->username."'s thought on ".$currentPost->date."</p>";
                echo "<a href='index.php?delPostDb=".$currentPost->id."' class='PostDelete'></a>";
                echo "<p class='PostText'>".$currentPost->text."</p>";
                if($currentPost->imageUrl != NULL)
                    echo "<img class='PostImage' src='".$currentPost->imageUrl."' alt='Post Image'>";
                echo "</div>";
                $index++;
            }
        }
    }
    public function deletePost($id){
        $db = new Database();
        $db->dbConnect();
        if ($db->connectionString) {
            $sql = "SELECT imageUrl FROM ProjectPosts where Id='".$id."'";
            $stmt = $db->connectionString->prepare($sql);
            $stmt->execute();
            $post = $stmt->fetch();
            if(file_exists($post[0]))
                unlink($post[0]);
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