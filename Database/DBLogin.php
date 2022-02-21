<?php
session_start();
include("config.php");
include ("ForumController.php");

$db = new DatabaseConnection;

$inputData = [
    'username' => $_POST['username'],
    'password' => $_POST['password']

];

$forum = new ForumController;

$result = $forum->Login($inputData);
if($result==false){
    echo 'false';
} else {
    echo 'true';
}
?>