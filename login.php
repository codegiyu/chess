<?php
session_start();
// include("includes/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/loginstyle.css">
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
        <h2>LOGIN to your free account</h2>
    </div>
    <form class="inputgroup" method="POST" action="loginProcess.php">

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
                <input type="text" name="email" class="field-style" placeholder="Email" required/>
            </li>
            <li>
                <input type="Password" name="password" class="field-style " placeholder="Password" required/>
            </li>
            <li>
                <a href="#"><h4><i>Forgot password?</i></h4></a>
            </li>
            <li>
                <input type="submit" name="login" value="Login"/>
            </li>
        </ul>
    </form>
    <footer><h5>Copyright LoneRider© 2019</h5></footer>
</body>
</html>