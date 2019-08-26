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
    <title>Shop</title>
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
            width: 100%;
            height: 1600px;
            background-image: url('img/20.jpg');
            background-size: cover;
        }
        #banner{
            width: 100%;
            height: 220px;
            background-image: url('img/banner.jpg');
            background-size: cover;
        }
        #main-body{
            width: 70%;
            height: 1350px;
            margin-top: 20px;
            background-color: rgb(229, 226, 226);
            padding: 2px;
            opacity:0.8;
            border-radius: 5px;
            float: left;
        }
        #main-block{
            width: 100%;
            margin: 30px 42px;
        }
        #write-main{
            width: 88%;
        }
        .row1{
            width: 100%;
            height: 350px;
            display: inline-block;
            box-sizing: border-box;
            /* border: 1px solid black; */
        }
        .row2{
            width: 100%;
            height: 350px;
            display: inline-block;
            box-sizing: border-box;
            /* border: 1px solid black; */
        }
        .row1 div.block{
            box-sizing: border-box;
            outline: none;
            padding: 0;
            /* border: 1px solid black; */
        }
        .row2 div.block{
            box-sizing: border-box;
            outline: none;
            padding: 0;
            /* border: 1px solid black; */
        }
        .block-split{
            width: 43%;
        }
        .left-block{
            float: left;
            margin: 0px 0px 30px 38px;
        }
        .write-left{
            width: 100%;
        }
        .right-block{
            float: right;
            margin: 0px 38px 30px 0px;
        }
        .write-right{
            width: 100%;
        }

        #aside{
            width: 27%;
            height: 1180px;
            margin-top: 20px;
            padding: 2px;
            background-color: rgb(229, 226, 226);
            /* border: 1px solid gray; */
            border-radius: 5px;
            /* box-shadow: 5px 5px 5px 5px gray; */
            float: right;
        }
        #aside .image{
            width: 99%;
            margin: 5px 2px 0px 2px;
            border-radius: 5px;
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
                        <a class="active" href="shop.php"><b>Lessons</b></a>
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
    <div class="whole">
        <section id="banner">
        </section>
        <div class="container" class="box">
            <section id="main-body">
                <div id="main-block">
                    <img src="img/main-block.jpg">
                    <div id="write-main">
                        <h2><font color="maroon">Saint Louis Rapid & Blitz Grand Chess Tour: MVL Catches Aronian, Overtakes Carlsen In Rapid Ratings
                        </font></h2>
                        <h5><font color="gray">PeterDoggers | 2 hrs ago</font></h5>
                        <p>
                                After day three, Levon Aronian finds Maxime Vachier-Lagrave next to him in the leaderboard of the Saint Louis Rapid & Blitz Grand Chess Tour. The French GM lost to Magnus Carlsen but won his last two rapid games take over the number-one position in the rapid live ratings. After Carlsen's disappointing first two<font color="gray">...</font>
                        </p>
                    </div>
                </div>
                <div class="row1">
                    <div class="block block-split left-block">
                        <img src="img/left-block1.jpg">
                        <div class="write-left">
                            <h4><font color="maroon">Nepomniachtchi Qualifies For FIDE World Fischer Random Chess Championship</font></h4>
                            <h5><font color="gray">News | 7 hrs ago</font></h5>
                            <p>
                                On Sunday, Russian top GM Ian Nepomniachtchi outlasted 15 opponents to reach the quarterfinals of the 2019 FIDE World Fischer Random Chess<font color="gray">...</font>
                            </p>
                        </div>
                    </div>
                    <div class="block block-split right-block">
                        <img src="img/right-block1.jpg">
                        <div class="write-right">
                            <h4><font color="maroon">The Unusual Side Of Blitz Chess</font></h4>
                            <h5><font color="gray">Gserper | 14 hrs ago</font></h5>
                            <p>
                                When we talk about blitz chess, we usually think about tactics, blunders and opening surprises that force our opponents to spend their precious<font color="gray">...</font>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row2">
                    <div class="block block-split left-block">
                        <img src="img/left-block2.jpg">
                        <div class="write-left">
                            <h4><font color="maroon">Learn To Play The Tarrasch Defense: Advancing The Isolated Pawn</font></h4>
                            <h5><font color="gray">MatBobula | 1 day ago</font></h5>
                            <p>
                                In any serious chess opening, the isolated pawn can be both a weakness and a strong point for an attack. Learn how to play the Tarrasch when the <font color="gray">...</font>
                            </p>
                        </div>
                    </div>
                    <div class="block block-split right-block">
                        <img src="img/right-block2.jpg">
                        <div class="write-right">
                            <h4><font color="maroon">Anand Wins Best Game AND Best Novelty! - Anand vs. Bologan, 2003</font></h4>
                            <h5><font color="gray">SamCopeland | 1 day ago</font></h5>
                            <p>
                                Winning a brilliancy prize is a rare and special thing. At one time, brilliancy prizes were standard at top chess tournaments. These days, they are<font color="gray">...</font>
                            </p>
                        </div>
                    </div>
                </div>
            </section>
            <aside id="aside">
                <img class="image" src="img/aside1.jpg">
                <img class="image" src="img/aside2.jpg">
                <img class="image" src="img/aside3.jpg">
            </aside>
        </div>
    </div>
    <footer><h5>Copyright LoneRider© 2019</h5></footer>
</body>
</html>