<?php
session_start();
include("config.php");
include ("ForumController.php");

$db = new DatabaseConnection;

$forum = new ForumController;
$inputData = [
    'tpcid' => $_POST['tpcid']

];
$result = $forum->DeleteTopics($inputData);

return $result;