<?php
session_start();
include("includes/connect.php");
//$conn = $pdo->open();
if(isset($_POST['add'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $skill = $_POST['skill'];
    $photo = "user.jpg";
    $role = 'Members';
    $status = 1;

?>