<?php

session_start();
include ("ForumController.php");
include ("config.php");
$db = new DatabaseConnection;

$forum = new ForumController;
$inputData = $_POST['topicname'];
$inputData=[
    'topicname' => $_POST['topicname'],

];
$topicname = $forum->GetTopicId($inputData);

echo json_encode($topicname);
?>
