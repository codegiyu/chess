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
    <title>Register</title>
<style>
    *{
        margin: 0;
        padding: 0;
    }
    body{
        background-image: url('img/12.jpg');
        background-size: cover;
    }
    .header{
        width: 30%;
        margin: 60px auto 0px;
        padding: 15px 17px;
        color: white;
        background-color: black;
        text-align: center;
        border: 1px solid gray;
        border-radius: 0px;
        box-shadow: 5px 5px 10px gray;
        border: 5px solid black;
    }
    .inputgroup{
        max-width: 28%;
        max-height: 320px;
        background: #FAFAFA;
        padding: 30px;
        margin: auto;
        box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
        border-radius: 0px;
        border: 6px solid black;
        box-shadow: 5px 5px 10px gray;
    }
    .inputgroup ul{
        padding:0;
        margin:0;
        list-style:none;
    }
    .inputgroup ul li{
        display: block;
        margin-bottom: 10px;
        min-height: 35px;
    }
    .inputgroup ul li  .field-style{
        width: 100%;
        box-sizing: border-box; 
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box; 
        padding: 8px;
        outline: none;
        border: 1px solid gray;
    } 
    .inputgroup ul li input[type="submit"] {
        background-color: black;
        border: 1px solid gray;
        display: inline-block;
        cursor: pointer;
        color: white;
        padding: 18px 18px;
        text-decoration: none;
        font: 12px Arial, Helvetica, sans-serif;
        margin: 5px 0px 5px 125px;
    } 
    .inputgroup ul li input[type="submit"]:hover {
        background: linear-gradient(to bottom, gray, black 100%);
    }
    .inputgroup ul li  .field-style:hover{
        border: 1px solid rgb(75, 72, 72);
    }
    .inputgroup ul li h6{
        margin: 0;
        bottom: 0;
    }
    footer{
        background: rgb(27, 24, 24);
        width: 100%;
        height: 30px;
        bottom: 0;
        position: fixed;
        color: rgb(85, 93, 100);
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .error{
        width: 92%;
        background-color: #f2dede;
        padding: 10px;
        border-radius: 5px;
        margin: 0px auto;
        text-align: left;
        color: #a94442;
        border: 1px solid #a94442;
    }
    .success{
        color: #3c763d;
        background: #dff0d8;
        border: 1px solid #3c763d;
        margin-bottom: 20px;
    }
</style>
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