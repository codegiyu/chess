<?php
session_start();
include("includes/connect.php");
//$conn = $pdo->open();
if(isset($_POST['add'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $skill = $_POST['skill'];
    $photo = "user.jpg";
    $role = 'Member';
    $status = 1;
    
        $stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM users WHERE email = :email");
        $stmt->execute(['email'=>$email]);
        $rows = $stmt->fetch();
        if($rows['numrows'] > 0){
            $_SESSION['error'] = 'Email already exists!';
            header('location:register.php');
        }
        else
            if($password != $cpassword){
                $_SESSION['error'] = 'Passwords do not match!';
                header('location:register.php');
            }else
        
    try{
        $stmt = $conn->prepare("INSERT INTO members (email, username, photo, skill) VALUES (:email, :username, :photo, :skill)");
        $stmt->execute(['email'=>$email, 'username'=>$username, 'photo'=>$photo, 'skill'=>$skill]);

        $stmt = $conn->prepare("INSERT INTO users (email, password, role, status) VALUES (:email, :password, :role, :status)");
        $stmt->execute(['email'=>$email, 'password'=>$password, 'role'=>$role, 'status'=>$status]);
        $_SESSION['success'] = "Acccount Created Successfully. Please login!";
        header('location:login.php');
        // echo '<script> alert('Account created successfully'); window.location='register.php'</script>';
    }catch(PDOException $e){
        $_SESSION['error'] = $e->getMessage();
        header('location:register.php');
    }
}
?>