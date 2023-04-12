<?php 
session_start();

$_SESSION['user_id'] = NULL;
$_SESSION['username'] = NULL;
$_SESSION['password'] = NULL;
$_SESSION['user_type'] = NULL;
$_SESSION['first_name'] = NULL;
$_SESSION['last_name'] = NULL;

header("Location: index.php");

?>