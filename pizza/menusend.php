<?php
include_once("connect.php");
session_start();


if($_SERVER['REQUEST_METHOD']=="POST"){ 
    $address = $_POST['address'];
    $username = $_SESSION['username'];
    
    $sql = "UPDATE user1 SET address='$address' WHERE username='$username'";
    
    if (mysqli_query($con, $sql)) { 
    header('location: menu.php'); 
    }
    
    }
header('location: menu.php');

?>


