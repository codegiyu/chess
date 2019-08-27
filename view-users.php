<?php
session_start();
include("includes/connect.php");
if(!$_SESSION['email']){
    $_SESSION['error'] = 'You must login to access this page!';
    header("location:login.php");
}
    $email = $_SESSION['email'];
        $stmt = $conn->prepare("SELECT * FROM users JOIN members ON users.email = members.email");
        $stmt->execute(['email'=>$email]);

        $st = $conn->prepare("SELECT * FROM members WHERE email = :email");
        $st->execute(['email'=>$email]);
        $fetch = $st->fetch();

        $sql = $conn->prepare("SELECT * FROM users WHERE email = :email");
        $sql->execute(['email'=>$email]);
        $cols = $sql->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Users</title>
    <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="css/userstyle.css">
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
            <?php if($cols['role'] == 'Member' || $cols['role'] == 'Admin'){ ?>
            <th>Username</th>
            <th>Email</th>
            <th>Skill</th>
            <th>Photo</th>
            <th>Role</th>
            <?php } ?>
            <?php if($cols['role'] == 'Admin'){ ?>
            <th>Delete</th>
            <th>Update</th>
            <th>Status</th>
            <?php } ?>
        </tr>
        <?php foreach($stmt AS $rows){?>
        <tr>
            <?php if($cols['role'] == 'Member' || $cols['role'] == 'Admin'){ ?>
            <td><?php echo $rows['username'] ?></td>
            <td><?php echo $rows['email'] ?></td>
            <td><?php echo $rows['skill'] ?></td>
            <td><img style="width:50px; height:50px" src="img/<?php echo $rows['photo'] ?>"></td>
            <td><?php echo $rows['role'] ?><br><a href="#">Change</a></td>
            <?php } ?>
            <?php if($cols['role'] == 'Admin'){ ?>
            <td><a href="deleteUser.php?email=<?php echo $rows['email'] ?>" onclick="return confirm('Are you sure you want to delete?')">Delete</td>
            <td><a href="updateUser.php?email=<?php echo $rows['email'] ?>">Update</td>

            <td> <?php if($rows['status'] == 1){ ?>
                        <a href="deactivate.php?email=<?php echo $rows['email'] ?>" onclick="return confirm('Are you sure you want to deactivate this user?')">Deactivate</a>
                        <?php
                        }else if($rows['status'] == 0){ ?>
                        <a href="activate.php?email=<?php echo $rows['email'] ?>" onclick="return confirm('Are you sure you want to activate this user?')">Activate</a>
                      <?php  } ?></td>
            <?php } ?>

        </tr>
        <?php } ?>
    </table>
    <a href="logout.php">Logout</a>
</body>
</html>