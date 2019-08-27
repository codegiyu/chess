<?php
session_start();
include("includes/connect.php");
$email = $_GET['email'];
$stmt = $conn->prepare("SELECT * FROM members WHERE email = :email");
$stmt->execute(['email'=>$email]);
$rows = $stmt->fetch();

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update User</title>
    <link rel="stylesheet" type="text/css" href="registerstyle.css">
</head>
<body>
    <div class="header">
        <h2>Update your account</h2>
    </div>
    <form class="inputgroup" method="POST" action="#">
    <?php //include('errors.php'); ?>
    <?php
    if(isset ($_SESSION['error'])) {
        echo "
        <div class= 'error'>
        <p>".$_SESSION['error']."</p>
        </div>
        ";
        unset($_SESSION['error']);
    }

    if(isset($_SESSION['success'])){
        echo "
        <div class= 'success'>
        <p>".$_SESSION['success']. "</p>
        </div>
        ";
        unset($_SESSION['success']);
    }
    ?>
        <ul>
        <li>
            <input type="text" name="username" class="field-style" placeholder="Username" value="<?php echo $rows['username'] ?>"/>
        </li>
        <li>
            <input type="email" name="email" class="field-style" placeholder="Email" value="<?php echo $rows['email'] ?>"/>
        </li>
        <li>
            <input class="field-style" name="skill" list="skilllevel" placeholder="Skill Level" value="<?php echo $rows['skill'] ?>"/>
            <datalist id="skilllevel">
                <option>New to Chess</option>
                <option>Beginner</option>
                <option>Intermediate</option>
                <option>Skilled</option>
                <option>Master</option>
                <option>Grandmaster</option>
            </datalist>
        </li>
        <li>
        <input type="submit" name="update" value="Update Account"/>
        </li>
        </ul>
    </form>
    <footer><h5>Copyright LoneRider© 2019</h5></footer>
</body>
</html>