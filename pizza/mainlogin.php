<?php

session_start();
ob_start();
include_once("connect.php");
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: basic.php");
    exit;
}
if($_SERVER['REQUEST_METHOD']=="POST"){
  if(empty(trim($_POST["name"]))){
    $username_err = "Please Enter Correct Username.";
  } else{
    $username = trim($_POST["name"]);
  }
  
  
  if(empty(trim($_POST["pass"]))){
    $password_err = "Please Enter Correct password.";
  } else{
    $password = trim($_POST["pass"]);
  }

  //! Setting Cookies.
  if(isset($_POST['rememberme'])){
    setcookie('namecookie',$username,time()+86400);
    setcookie('passwordcookie',$password,time()+86400);
    header('location:basic.php');
  }
   

  $query = "SELECT * FROM user1 where username = '$username'";
  $res = mysqli_query($con,$query);
  if(mysqli_num_rows($res)==0){
    
  }else{
    $row = mysqli_fetch_assoc($res);
    if($password == $row['password']){
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['user'] = $row['username'];
      $_SESSION['address'] = $row['address'];
      header("location: basic.php");
    }
  }
}



?>


<!DOCTYPE html>
<html>
    <head>
      <script>   
        function validate() {    
            var username = document.reg_form.username;    
            var pass = document.reg_form.pass;  
            var pas = document.reg_form.pas;     
            var phone = document.reg_form.phone; 
            var mail = document.reg_form.mail;    
            var mailform = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    
            if (username.value.length <= 0 || username.value.length >= 16) {    
                alert("Name is Too Short or Too long, Limit Username to 15 characters");    
                name.focus();    
                return false;    
            }  
            if (pass.value.length <= 7 || pass.value.length >= 16) {    
                alert("Password of Minimum 8 digits and Maximum 15 digits is required ");    
                pass.focus();    
                return false; 
            }
            if (pas.value != pass.value) {    
                alert("Passwords are not same");    
                pas.focus();    
                return false; 
            }                    
            if (phone.value.length != 10) {    
                alert("Mobile number is not valid !!");    
                phone.focus();    
                return false;    
            }
            if(mail.value.match(mailform))
            {
                alert("Valid email address!");
                mail.focus();
                return true;
            }else{
                alert("You have entered an invalid email address!");
                mail.focus();
                return false;
            }     
            return false;    
        } 
        function valid() {    
            var name = document.log_form.name;  
            var pass = document.log_form.pass; 
                
            if (name.value.length <= 0 || name.value.length >= 16) {    
                alert("Name is Too Short or Too long, Limit Username to 15 characters");    
                name.blur();    
                return false;    
            }  
            if (pass.value.length <= 7 || pass.value.length >= 16) {    
                alert("Minimum 8 digits and Maximum 15 digits is required");    
                pass.focus();    
                return false; 
            }     
            return false;    
        }   
    </script> 
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>  
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
      <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="basic.css">
        <link rel="stylesheet" type="text/css" href="2.css">
        <!--<style type="text/css">@import url("basic2.css");</style>-->
        <title>1st program</title>
        <style>
          body{
              background-image: url("pizza.PNG");
              background-repeat: no-repeat;
              background-size: cover;
              font-weight: bold;
              font-family:Arial, Helvetica, sans-serif;
          }
          .start{
              display: flex;
              flex-wrap: wrap;
              justify-content: space-around;
              align-items: flex-start;
          }
          .start li a{
              text-decoration: none;}
          .l{
              list-style-type: none;
              padding: 0;
              display: flex;
              flex-wrap: wrap;
              justify-content: end;
              font-size: 1.5rem;}
          .fle{
            display: flex;
              flex-wrap: wrap;
              justify-content: end;
          }
          .le{
              list-style-type: none;
              padding: 0;
              display: flex;
              flex-wrap: wrap;
              justify-content: space-evenly;
              font-size: 1.5rem;}
          .i{
              padding: 1rem 1.5rem;}
          h1{
              color: rgb(36, 4, 124);
              text-shadow: 1em;
              font-size: 2em;
              border-radius: 10%;
              background-color: #24ff12;}
          .start li:hover{
              border-bottom: 3px solid whitesmoke;}
          footer{
              background-color: rgba(243, 119, 3, 0.801) !important;
          }
          .footer-copyright text-center py-3{
              position: relative;
              right: 10px;
          }
          @media screen and (max-width: 600px) {
          .column {
              width: 100%;
              padding-bottom: 2em;
          }
          }
      </style>
    </head>
    <body class="d-flex flex-column">
    <div class="start">
        <h1 class="p">CHeZZa PiZZa</h1>
        <nav class="fle">
        <ul class="no" style="color:indigo">
            <li class="ok"><a href="home.html">Home</a></li>
            <li class="ok"><a href="register.php">Register</a></li>
            <li class="ok"><a href="login.html">Login</a></li>
        </ul>
        </nav>
    </div>


     <!--   <div class="logi">
            <form id="log"  name="log_form" onsubmit="return valid()" style="background-color: rgba(243, 142, 11, 0.192); border:2px solid #ff0404">
              <br><p style="font-size: 120%;">Login and enjoy whole range of <b>CheZZelicious PiZZaS</b></p>
                <label for="name">Username:</label>
                <input type="text" id="name" name="name" placeholder="Bhavik"><br><br>
                <label for="pass">Password:</label>
                <input type="password" id="pass" name="pass" placeholder="12345678"><br><br>
                <label for="pas" id="forg"><a href="forgot.html">Forgot Password?</a></label><br>
                <input type="submit" class="btn btn-primary" name="submit" value="Submit"><br><br>
            </form><br>
        </div>-->
          
          <div class="container register">
            <form action="" method="post" id="log"  name="log_form" onsubmit="return valid()">
            <div class="row">
            <div class="col-md-9 register-left">
            
            <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <h3 class="register-heading">CHeZZa PiZZa</h3>
            <div class="row register-form">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <div class="form-group">
            <input type="text" class="form-control" id="name" name="name" placeholder="Username *" value="<?php if(isset($_COOKIE['namecookie'])) {echo $_COOKIE['namecookie']; }  ?>">
            </div>
            <div class="form-group">
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password *" value="<?php if(isset($_COOKIE['passwordcookie'])) {echo $_COOKIE['passwordcookie']; }  ?>">
            </div>
            <div class="form-group">
            <input type="checkbox" name="rememberme"> Remember Me
            </div>
            <br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
            <a href="#">Forgot Password?</a>
            </div><br>
        
            <div class="col-md-3"></div>
            <div class="col-md-9">
            <br>
            <input type="submit" class="btnRegister" name="submit" value="Submit">
            </div>
            </div>
            <p>&emsp;&emsp;Dont have an Account? <a href="register.html">SIGN UP</a></p><br>
            </div>
            </div>
            </div>
            <div class="col-md-3 register-right"><br>
                <img src="log.JPG" alt=""/><br>
                <p style="color: black;font-size: 1.8rem; text-shadow: 2px 2px white;"><b>WELCOME</b></p>
                <h3><p style="text-shadow: 2px 2px white;">You are Few Minutes away from Ordering your Favourite PIZZAS !!</p></h3>
              </div>
        
        </div></form></div><br><br><br><br>

    <!-- Footer -->
<footer class="page-footer blue pt-4">
  <div class="container-fluid text-center text-md-left">
    <div class="row">
      <div class="col-md-6 mt-md-0 mt-3">
        <!-- Content -->
        <h5>CheZZa PiZZa</h5>
        <p>We serve you one of the most Chezziest pizzas in Mumbai. Quality Service has been our top Feature since the beginning of our Company. So what are you waiting for order at the earliest and enjoy the Offers present.</p>
      </div>
      <hr class="clearfix w-100 d-md-none pb-3">

      <div class="col-md-3 mb-md-0 mb-3">
        <h5 class="text-uppercase">Know more about us</h5><br>
        <ul class="list-unstyled">
          <li>
            <a>Branches: Ghatkopar(E), Vidyavihar(W)</a></li>
          <li>
            <a>Contact us @ +91 90000 12345</a></li>
        </ul>
      </div>
      <!-- Grid column -->
    </div>
    <!-- Grid row -->
  </div>
  <!-- Copyright -->
  <div class="footer-copyright text-center py-3">CHeZZa PiZZa © 2020 Copyright</div>
</footer>
    </body>
</html>