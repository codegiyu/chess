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
    <title>Home</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/indexstyle.css">
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
                        <a class="active" href="index.php"><b>Home</b></a>
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
    <div class="showcase">
        <section class="container">
            <div id="shorttext">
                <h1><i>...For the love of strategy!</i></h1>
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