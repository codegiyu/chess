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
    <title>Contact</title>
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
        .whole{
            margin: 0;
            width: 100%;
            height: 1000px;
            background-image: url('img/20.jpg');
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
            display: block
        }
        .pic{
            width: 150px;
            height: 220px;
            margin: 10px 150px 20px 590px;
            box-sizing: border-box;
            top: 10;
            padding: 5px;
            border: 2px solid black;
        }
        .pic img{
            width: 128px;
            height: 192px;
            margin: 5px 5px 5px 4px;
        }
        .write1{
            margin: 10px 150px 40px 335px;
            width: 50%;
            text-align: center;
        }
        .write1 p{
            font-family: Arial, Helvetica, sans-serif;
        }
        .inputgroup{
            max-width: 28%;
            max-height: 320px;
            background: #FAFAFA;
            padding: 30px;
            margin: 40px 0px 40px 210px;
            box-shadow: 1px 1px 25px rgba(0, 0, 0, 0.35);
            border-radius: 0px;
            border: 6px solid black;
            box-shadow: 5px 5px 10px gray;
            opacity: 0.8;
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
            margin: 10px 0px 10px 10px;
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
                        <a class="active" href="contact.php"><b>Contact</b></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="whole">
        <div class="pic" "container">
            <img src="img/me.jpg">
        </div><br>
        <div class="write1" "container">
            <p><b><font size="7" color="maroon">Need to contact me?</font></b></p><br>
            <p><b><font size="5">Send me a message</font></b></p>
            <form class="inputgroup">
                <ul>
                    <li>
                        <input type="text" name="field1" class="field-style" placeholder="Your Name" />
                    </li>
                    <li>
                        <input type="email" name="field2" class="field-style" placeholder=" Your Email" required/>
                    </li>
                    <li>
                        <input type="text" name="field3" class="field-style " placeholder="Subject" />
                    </li>
                    <li>
                        <textarea name="" id="" rows="8" cols="24" placeholder=" Your Message" required></textarea>
                    </li>
                    <li>
                    <input type="submit" value="Send message"/>
                    </li>
                </ul>
            </form>
        </div>
</div>
    <footer><h5>Copyright LoneRider© 2019</h5></footer>
</body>
</html>