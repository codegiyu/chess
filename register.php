<?php
session_start();
//include('server.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
<style>
    *{
        margin: 0;
        padding: 0;
    }
    body{
        background-image: url('img/12.jpg');
        background-size: cover;
        line-height: 1.6em;
        margin: 0%;
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
    }
    #main-header ul{
        padding: 0;
        list-style: none;
    }
    #main-header ul li{
        display: inline-block;
        margin: 10px;
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
    .header{
        width: 25%;
        margin: 40px auto 0px;
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
        max-width: 23%;
        background: #FAFAFA;
        padding: 30px 30px 20px 30px;
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
        margin-top: 10px;
    } 
    .inputgroup ul li input[type="submit"]:hover {
        background: linear-gradient(to bottom, gray, black 100%);
    }
    .inputgroup ul li  .field-style:hover{
        border: 1px solid rgb(75, 72, 72);
    }
    #tos{
        margin-bottom: 0px;
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
        margin-bottom: 5px;
    }
    .success{
        color: #3c763d;
        background: #dff0d8;
        border: 1px solid #3c763d;
        margin-bottom: 5px;
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
    <div class="header">
        <h2>Create your free account</h2>
    </div>
    <form class="inputgroup" method="POST" action="processRegister.php">
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
                <input type="text" name="username" class="field-style" placeholder="Username" required/>
            </li>
            <li>
                <input type="email" name="email" class="field-style" placeholder="Email" required/>
            </li>
            <li>
                <input type="password" name="password" class="field-style " placeholder="Password" required/>
            </li>
            <li>
                <input type="password" name="cpassword" class="field-style" placeholder="Confirm Password" required/>
            </li>
            <li>
                <input class="field-style" name="skill" list="skilllevel" placeholder="Skill Level">
                <datalist id="skilllevel">
                    <option>New to Chess</option>
                    <option>Beginner</option>
                    <option>Intermediate</option>
                    <option>Skilled</option>
                    <option>Master</option>
                    <option>Grandmaster</option>
                </datalist>
            </li>
            <center>
            <li>
                <input type="submit" name="add" value="Create Account"/>
            </li>
            </center>
            <!-- <li>
                <h6 id="tos">I accept the <a href="#">Terms of Service</a> and agree to the <a href="#">Privacy Policy</a></h6>
            </li> -->
        </ul>
    </form>
    <footer><h5>Copyright LoneRider© 2019</h5></footer>
</body>
</html>