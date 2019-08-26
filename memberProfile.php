<?php
session_start();
include("includes/connect.php");
if(!$_SESSION['email']){
    $_SESSION['error'] = 'You must login to access this page!';
    header("location:login.php");
}
    $email = $_SESSION['email'];
        $stmt = $conn->prepare("SELECT * FROM users JOIN members ON users.email = members.email WHERE members.email = '$email'");
        $stmt->execute(['email'=>$email]);

        $st = $conn->prepare("SELECT * FROM members WHERE email = :email");
        $st->execute(['email'=>$email]);
        $fetch = $st->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <style type="text/css">
    *{
        margin: 0;
        padding: 0;
    }
    body{
        line-height: 1.6em;
        margin: 0%;
        background-image: url('img/20.jpg');
        background-size: cover;
    }
    .container{
        width: 80%;
        margin: auto;
        overflow: hidden;
    }
    header{
        width: 100%;
        height: 60px;
        background-color: rgb(233, 230, 230);
    }
    header .container ul li a{
        font-family: Lobster;
        text-decoration: none;
    }
    #main-header ul{
        padding: 0;
        list-style: none;
    }
    #main-header ul li{
        display: inline-block;
        margin: 10px;
    }
    header ul div.align-right{
        float: right;
        margin: 10px 0px 10px 10px;
        color: black;
    }
    #navbar{
        margin: 0;
        width: 100%;
        background-color: rgb(29, 28, 28);
    }
    #navbar a{
        color: white;
        font-size: 14px;
        /*padding: 15px 15px 15px 0px;*/
        font-family: Verdana;
        text-decoration: none;
        padding-right: 15px;
        
    }
    #navbar ul li{
        display: inline-block;
        margin: auto;
    }
    .container ul div.align-left{
        float: left;
        margin: 10px auto 0px;
    }
    .container ul div.align-left li a{
        text-transform: none;
        text-decoration: none;
        color: black;
    }
    .container div.align-right ul{
        float: right;
        margin: 10px 0px 10px 25px;
        color: black;
    }
    .btn{
        width: 20%;
        margin: auto;
        overflow: hidden;
    }
    #round{
        margin-top: 10px;
        width: 100px;
        border-radius: 50%;
        border: 3px solid black;
    }
    /* #round img{
        border-radius: 50%;
        margin: auto 0px;
    } */
    input{
        margin: 15px, auto 10px;
    }
    table{
        max-width: 60%;
        margin: 20px auto 0px;
        padding: 20px;
        text-align: center;
        opacity: 0.9;
    }
    table, th, td{
        border-collapse: collapse;
        border: 1px solid black;
        text-align: center;
    }
    th{
        text-align: left;
    }
    table tr:nth-child(odd){
        background-color: #fff;
    }
    table tr:nth-child(even){
        background-color: #eee;
    }
    .th{
        text-align: center;
        font-size: 20px;
        text-transform: uppercase;
    }
    </style>
</head>
<body>
<header id="main-header">
    <div class="container">
        <ul>
            <div class="align-left">
                <li>
                    <a href="index.php"><h1 id="sitename"><font size="7" color="maroon">C</font>hess</h1></a>
                </li>
            </div>
            <div id="first" class="align-right">
            <li>
                <img style="width:35px; height:35px" src="img/<?php echo $fetch['photo'] ?>">
            </li>
            <li>
                <b>Welcome <a href="memberProfile.php"><?php echo $fetch['username'] ?></a></b>
            </li>
            </div>
        </ul>
    </div>
</header>
<nav id="navbar">
    <div class="container">
        <div class="align-right">
            <ul>
                <li>
                    <a href="index.php"><b>Home</b></a>
                </li>
                <li>
                    <a href="shop.php"><b>Lessons</b></a>
                </li>
                <li>
                    <a href="about.php"><b>About</b></a>
                </li>
                <li>
                    <a href="contact.php"><b>Contact</b></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <center>
    <form method="POST" action="editProfile.php" enctype="multipart/form-data">
    <div id="round" class="container">
    <img class="container" style="width:100px; height:100px" src="img/<?php echo $fetch['photo'] ?>">
    </div><br>
    <input class="btn" type="file" value="choose" name="photo">
    <button class="btn" type="submit" name="upload">Upload new</button><br>
    </form>
    </center>
    <table class="container" cellpadding="7" >
        <tr><th colspan="8" class="th">User Information</th></tr>
        <tr><th colspan="8"><?php
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
    ?></th></tr>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Skill</th>
            <th>Photo</th>
        </tr>
        <?php foreach($stmt AS $rows){?>
        <tr>
            <td><?php echo $rows['username'] ?></td>
            <td><?php echo $rows['email'] ?></td>
            <td><?php echo $rows['skill'] ?></td>
            <td><img style="width:50px; height:50px" src="img/<?php echo $rows['photo'] ?>"></td>
        </tr>
        <?php } ?>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>