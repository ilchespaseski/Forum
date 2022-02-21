<?php
session_start();
class Topics
{
    public $author;
    public $topicname;
    public $id;
}
$topics = array();


include("config.php");
include ("ForumController.php");

$db = new DatabaseConnection;

$forum = new ForumController;
$result=$forum->GetTopics();
$i=0;

foreach ($result as $row) {
    $topics[$i] = new Topics();
    $topics[$i]->author = $row['author'];
    $topics[$i]->topicname = $row['topicname'];
    $topics[$i]->id = $row['id'];
    $i++;
}

echo json_encode($topics);
?>
