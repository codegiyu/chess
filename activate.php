<?php
session_start();
include("includes/connect.php");
$email = $_GET['email'];
try{
    $stmt = $conn->prepare("UPDATE users SET status =:status WHERE email =:email");
    $stmt->execute(['status'=>'1', 'email'=>$email]);
    $_SESSION['success'] = 'Account Deactivated!';
      header('location:view-users.php');
}catch(PDOException $e){
    $_SESSION['error'] = $e->getMessage();
    header('location:view-users.php');
}
?>

 