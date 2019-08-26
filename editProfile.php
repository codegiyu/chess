
	<?php 
    session_start();
	include 'includes/connect.php';
	$email = $_SESSION['email'];

	if(isset($_POST['upload'])){

		$img = $_FILES['photo']['name'];
		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM users WHERE email = :email");
        $stmt->execute(['email'=>$email]);
        $row = $stmt->fetch();
		if($row['role'] == 'Admin'){
			if(!empty($img)){
			$ext = pathinfo($img, PATHINFO_EXTENSION);
			$newImg = 'Updated'.time();
			move_uploaded_file($_FILES['photo']['tmp_name'], 'img/'.$newImg);	
			}
			else{
				$newImg = '';
			}
			try{
			$stmt = $conn->prepare("UPDATE members SET photo=:photo WHERE email=:email");
			$stmt->execute(['photo'=>$newImg, 'email'=>$email]);
			$_SESSION['success'] = 'Updated successfully';
			header('location: view-users.php');
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				header('location: view-users.php');
			}
		}
		else{
			if(!empty($img)){
			$ext = pathinfo($img, PATHINFO_EXTENSION);
			$newImg = 'Updated'.time();
			move_uploaded_file($_FILES['photo']['tmp_name'], 'img/'.$newImg);	
			}
			else{
				$newImg = '';
			}
			try{
			$stmt = $conn->prepare("UPDATE members SET photo=:photo WHERE email=:email");
			$stmt->execute(['photo'=>$newImg, 'email'=>$email]);
			$_SESSION['success'] = 'Updated successfully';
			header('location: memberProfile.php');
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
				header('location: memberProfile.php');
			}	
		}
	}
?>