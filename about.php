<?php
session_start();
include("includes/connect.php");
$email = $_SESSION['email'];
    $stmt = $conn->prepare("SELECT * FROM users JOIN members ON users.email = members.email");
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
    <title>About</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        body{
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
        .active{
            text-transform: uppercase;
            text-decoration: underline;
            text-decoration-color: maroon;
        }
        .container div.align-right ul li a:hover{
            text-transform: uppercase;
            text-decoration: underline;
            background-color: maroon;
            padding: 20px;
            
        }
        .showcase{
            width: 100%;
            height: 400px;
            margin: auto;
            background-image: url('img/9.jpg');
            background-size: cover;
            
        }
        .showcase #shorttext{
            margin: 150px 0px 0px 0px;
            color: maroon;
            padding: 10px 0px;
            font-size: 25px;
        }
        .whole{
            width: 100%;
            height: 1000px;
            background-image: url('img/17.jpg');
            background-size: cover;
            border: 1px solid gray;
        }
        .opaque{
            width: 100%;
            height: 1000px;
            margin: 0;
            background-color: white;
            opacity: 0.8;
            border: 1px solid gray;
        }
        footer{
            background: rgb(27, 24, 24);
            width: 100%;
            height: 30px;
            bottom: 0;
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
                        <a class="active" href="about.php"><b>About</b></a>
                    </li>
                    <li>
                        <a href="contact.php"><b>Contact</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="showcase">
        <section class="container">
            <div id="shorttext">
                <h1><i>...Everything about chess</i></h1>
            </div>
        </section>
    </div>
    <div class="whole">
        <div class="opaque">

        </div>
    </div>
    <footer><h5>Copyright LoneRider© 2019</h5></footer>
</body>
</html>