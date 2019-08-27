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
    <link rel="stylesheet" type="text/css" href="css/contactstyle.css">
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