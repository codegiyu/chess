<?php
session_start();
include("includes/connect.php");
$email = $_GET['email'];
try{
    //delete from members table
$stmt = $conn->prepare("DELETE FROM members WHERE email =:email");
$stmt = $stmt->execute(['email'=>$email]);
    //delete from users table
$stmt = $conn->prepare("DELETE FROM users WHERE email =:email");
$stmt = $stmt->execute(['email'=>$email]);
$_SESSION['success'] = 'User deleted';
    header('location:view-users.php');
}catch(PDOException $e){
    $_SESSION['error'] = $e->getMessage();
    header('location:view-users.php');
}
?>