<?php
session_start();
class Posts
{
    public $author;
    public $body;
}

$posts = array();

include("config.php");
include ("ForumController.php");

$db = new DatabaseConnection;

$forum = new ForumController;

$topicid = $forum->GetTopicId($_POST['topicname']);

$result = $forum->GetPosts();


$i=0;
foreach ($result as $row) {
    if($row['topic_id']==$topicid) {
        $posts[$i] = new Posts();
        $posts[$i]->author = $row['body'];
        $posts[$i]->body = $row['author'];
        $i++;
    }
}

echo json_encode($posts);


?>