<?php
class ForumController
{
    private  $conn;

    public function __construct() {
        $db = new DatabaseConnection;
        $this->conn = $db->conn;
    }

    public function Register(){

        $username = $_POST['username'];
        $password = $_POST['password'];


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

    public function Login(){
        $username = $_POST['username'];
        $password = $_POST['password'];

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

    public function CreateTopic()
    {
        $tpcname = $_POST['tpcname'];
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
        $topics = array();
        $i=0;

        foreach ($result as $row) {
            $topics[$i] = new stdClass();
            $topics[$i]->author = $row['author'];
            $topics[$i]->topicname = $row['topicname'];
            $topics[$i]->id = $row['id'];
            $i++;
        }

        echo json_encode($topics);
    }

    public function DeleteTopics(){
        $tpcid = $_POST['tpcid'];

        $sql = "DELETE FROM topics
                WHERE id = $tpcid ";

        $result = $this->conn->query($sql);

        return $result;
    }

    public function CreatePost(){
        $post = $_POST['post'];
        $topicname = $_POST['topicname'];

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
    public function GetTopicId() {
        $topicname = $_POST['topicname'];
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
        $posts = array();

        $topicid = $this->GetTopicId();

        $i=0;
        foreach ($result as $row) {
            if($row['topic_id']==$topicid) {
                $posts[$i] = new stdClass();
                $posts[$i]->author = $row['body'];
                $posts[$i]->body = $row['author'];
                $i++;
            }
        }

        echo json_encode($posts);
    }
    public function Logout(){

        $_SESSION = array();

        session_destroy();
        header("location: ../views/index.php");
        exit;
    }
}
?>