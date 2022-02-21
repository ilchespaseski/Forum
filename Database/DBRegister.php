<?php
session_start();

include('config.php');
include('ForumController.php');

$db = new DatabaseConnection();

$inputData = [
    'username' => $_POST['username'],
    'password' => $_POST['password']

];

$forum = new ForumController;
$result = $forum->Register($inputData);

if($result) {
    header("Location: views/index.php");
}


?>
