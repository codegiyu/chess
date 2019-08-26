<?php
session_start();
include("includes/connect.php");
if(isset($_POST['update'])){
$id = $_GET['email'];
$username = $_POST['username'];
$email = $_POST['email'];
$skill = $_POST['skill'];
try{
    //update from members table
$stmt = $conn->prepare("UPDATE members SET username = :username, email = :email, skill = :skill WHERE email = :email");
$stmt = $stmt->execute(['username'=>$username, 'email'=>$email, 'skill'=>$skill, 'email'=>$id]);
   
$_SESSION['success'] = 'Record Updated!';
    header('location:view-users.php');
}catch(PDOException $e){
    $_SESSION['error'] = $e->getMessage();
    header('location:view-users.php');
}
}
?>