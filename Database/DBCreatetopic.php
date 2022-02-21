<?php

session_start();
include("config.php");
include ("ForumController.php");

$db = new DatabaseConnection;
$inputData = [
    'tpcname' => $_POST['tpcname']

];

$forum = new ForumController;

$result = $forum->CreateTopic($inputData);

if ($result=='true'){
    return 'true';
}else {
    return 'false';
}