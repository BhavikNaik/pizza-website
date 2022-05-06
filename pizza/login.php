<?php 
session_start(); 
include "connect.php";



if (isset($_POST['name']) && isset($_POST['pass'])) {

	function validate($data){
      $data = trim($data);
	    $data = stripslashes($data);
	    $data = htmlspecialchars($data);
	    return $data;
	}

	$name = validate($_POST['name']);
	$pass = validate($_POST['pass']);

	if (empty($name)) {
		  header("Location: llogin.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
      header("Location: llogin.php?error=Password is required");
	    exit();
	}else{

		if(isset($_POST['rememberme'])){
			setcookie('usernamec',$name,time()+604800);
			setcookie('passwordc',$pass,time()+604800);
		}

		$sql = "SELECT * FROM user1 WHERE username='$name' AND password='$pass'";

		$result = mysqli_query($con, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $name && $row['password'] === $pass) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['address'] = $row['address'];
            	header("Location: basic.php");
		        exit();
            }else{
				      header("Location: llogin.php?error=Incorrect User name or password");
		        exit();
			}
		}else{
			header("Location: llogin.php?error=Incorrect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: llogin.php");
	exit();
}


?>