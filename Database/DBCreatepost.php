<?php
session_start();
include("config.php");
include ("ForumController.php");

$db = new DatabaseConnection;
$inputData = [
    'post' => $_POST['post'],
    'topicname' => $_POST['topicname']

];
$forum = new ForumController;

$result = $forum->CreatePost($inputData);

if ($result==true){
    return 'true';
}else {
    return 'false';
}


?>