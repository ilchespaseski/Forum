<?php
session_start();

include ("config.php");
include ("ForumController.php");

$db = new DatabaseConnection();
$forum = new ForumController();

$query = $_POST['query'];
$result = $forum->$query();
return $result;

