<?php
include_once("connect.php");


if($_SERVER['REQUEST_METHOD']=="POST"){
 
    $username = $_POST['username']; 
    $pass = $_POST['pass'];
    $mail = $_POST['mail']; 
    
            if(empty($username)){
                header("Location: forget.php?error=User Name is required");
                exit();
            }else if(empty($mail)){
                header("Location: forget.php?error=Email id is required");
                exit();
            }else if(empty($pass)){
                header("Location: forget.php?error=Password is required");
                exit();
            }else{
    
                $sql = "SELECT * FROM user1 WHERE username='$username' AND mail='$mail'";
    
                $result = mysqli_query($con, $sql);
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['username'] == $username && $row['mail'] == $mail) {
    
                        $sql1 = "UPDATE user1 SET password='$pass' WHERE username='$username'";
                        if (mysqli_query($con, $sql1)) { 
                            header("Location: llogin.php");
                            alert("Password Updated Successfully");
                            exit(); 
                            }
                    }else{
                        header("Location: forget.php?error= User name or Email id");
                        exit();
                    }
                }else{
                    header("Location: forget.php?error=Incorrect User name or Email id");
                    exit();
                }
            }
    }

?>