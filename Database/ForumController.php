<?php
class ForumController
{
    private $conn;

    public function __construct() {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function Register($inputData){

        $username = $inputData['username'];
        $password = $inputData['password'];


        $sql = "INSERT INTO users (Username,Password) 
        VALUES (?, ?)";

        $q = $this->conn->prepare($sql);
        $q->bind_param("ss",$param_username,$param_password);
        $param_username = $username;
        $param_password = password_hash($password, PASSWORD_DEFAULT);
        if($q->execute()) {
            $result = $q->fetchColumn();
            return $result;
        }
        else {
            return false;
        }
        $this->conn->close();
    }

    public function Login($inputData){
        $username = $inputData['username'];
        $password = $inputData['password'];

        $sql = "SELECT id, username, password FROM users WHERE username = '$username'";


        $result = $this->conn->query($sql);
        foreach ($result as $row) {
            if(password_verify($password,$row['password'])) {
                session_start();
                $_SESSION['user'] = $row['username'];
                $_SESSION['iflogedin'] = true;
                return true;
                exit();
            }else {
                return false;
            }
        }
    }

    public function CreateTopic($inputData)
    {
        $tpcname = $inputData['tpcname'];
        $author = $_SESSION['user'];

        $sql = "INSERT INTO topics (author,topicname) 
        VALUES ('$author', '$tpcname')";

        $result = $this->conn->query($sql);
        if ($result === true) {

            return true;
        } else {
            return false;
        }
    }

    public function GetTopics(){
        $sql = "SELECT * FROM topics";

        $result = $this->conn->query($sql);
        return $result;
    }

    public function DeleteTopics($inputData){
        $tpcid = $inputData['tpcid'];

        $sql = "DELETE FROM topics
                WHERE id = $tpcid ";

        $result = $this->conn->query($sql);

        return $result;
    }

    public function CreatePost($inputData){
        $post = $inputData['post'];
        $topicname = $inputData['topicname'];

        $sql = "SELECT * FROM topics";
        $result = $this->conn->query($sql);
        $author = $_SESSION['user'];

        foreach ($result as $row){
            if($row['topicname']==$topicname)
            {
                $topic_id = $row['id'];
            }
        }
        $sql = "INSERT INTO posts (body,author,topic_id) 
        VALUES ('$author', '$post','$topic_id')";

        $result = $this->conn->query($sql);

        return $result;
    }
    public function GetTopicId($inputData) {
        $topicname = $inputData;
        $sql = "SELECT * FROM topics";

        $result = $this->conn->query($sql);
        foreach ($result as $row){
            if($row['topicname']==$topicname)
            {
                $topic_id = $row['id'];
            }
        }
        return $topic_id;
    }

    public function GetPosts(){


        $sql = "SELECT * FROM posts";


        $result = $this->conn->query($sql);
        return $result;
    }
}
?>