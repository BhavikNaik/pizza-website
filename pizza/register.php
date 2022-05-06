<?php
include_once("connect.php");

if($_SERVER['REQUEST_METHOD']=="POST"){
$uid_no = $_POST['uid_no']; 
$username = $_POST['username']; 
$pass = $_POST['pass'];
$phone = $_POST['phone']; 
$address = $_POST['address']; 
$mail = $_POST['mail']; 


$sql1 = "SELECT * FROM user1 where username = '$username'";
      
        $result = mysqli_query($con,$sql1);
        $n = mysqli_num_rows($result);
        if($n == 1)
        {
            header('location: register.php?error=User Name already exists');
            exit();
        }

$sql = "INSERT INTO user1 (uid_no,username,password,Contact,address,mail) 
    VALUES( '$uid_no','$username','$pass','$phone','$address','$mail')"; 

if (mysqli_query($con, $sql)) { 
header('location: llogin.php'); 
} else { 
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); 
} 
}
?>

<!DOCTYPE html>
<html>
    <head>
      <script>   
       /* function validate() {    
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
        } */
        function validate() {
            var flag=1;    
            var username = document.reg_form.username;    
            var pass = document.reg_form.pass;  
            var pas = document.reg_form.pas;     
            var phone = document.reg_form.phone; 
            var mail = document.reg_form.mail;    
            var mailform = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

            
    
            if (username.value.length <= 4 || username.value.length >= 16 || username.value =="") {    
                alert("Name is Too Short or Too long, Limit Username to 15 characters");    
                name.focus(); 
                flag=0;   
                return false;    
            }  
            if (pass.value.length <= 7 || pass.value.length >= 16) {    
                alert("Password of Minimum 8 digits and Maximum 15 digits is required ");    
                pass.focus();   
                flag=0; 
                return false; 
            }
            if (pas.value != pass.value) {    
                alert("Passwords are not same");    
                pas.focus();   
                flag=0;  
                return false; 
            }                    
            if (phone.value.length != 10) {    
                alert("Mobile number is not valid !!");    
                phone.focus();    
                flag=0; 
                return false;    
            }
            if (address.value.length <= 12 || address.value.length >= 100) {    
                alert("Proper Address for Delivery is required");    
                address.focus();   
                flag=0; 
                return false; 
            }
            if(mail.value.match(mailform))
            {
                alert("Valid email address!");
                mail.focus();
                
            }else{
                alert("You have entered an invalid email address!");
                mail.focus();
                flag=0; 
                
                return false;
            }
            if(flag==1){return true;
            }else{
 
              return false; 
            } 
            
            
        }
       /* function valid() {    
            var name = document.log_form.name; 
            var username = document.reg_form.username;   
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
        }  */ 
    </script> 
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="basic.css">
        <link rel="stylesheet" type="text/css" href="1.css">
        <!--<style type="text/css">@import url("basic2.css");</style>-->
        <title>1st program</title>
        <style>
          .star{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            margin: 2.5% 5%;
        }
        .star .ok a{
            text-decoration: none;
            margin: 1.3rem 2.5rem;
            padding: 1rem;
            color:black;
            text-shadow: 1px 1px white;
            background-color: #0079ff;
        }

        .ok{
            display: inline-block;
            align-items: center;
            list-style-type: none;
            font-size: 1.7rem;
        }
        .h{
            color: rgb(36, 4, 124);  
            padding: 10px;      
            text-shadow: 1em;
            font-size: 2em;
            background-color: #24ff12;

        }
        .star .ok a:hover{
            border-bottom: 3px solid black;}
        </style>
    </head>
    <body>
        <div class="star">
            <div class="h">CHeZZa PiZZa 🍕</div>
            <div class="ok">
                
                    <a href="home.php">Home</a>
                    <a href="register.php">Register</a>
                    <a href="llogin.php">Login</a>
                
            </div>
        </div>
        
<!--
        <div class="regi">
            <div class="one"><form id="reg" action="connect.php" method="get" name="reg_form" onsubmit="return validate()" style="background-color: rgba(243, 142, 11, 0.192); border:2px solid #ff0303;">
              <br><p style="font-size: 120%;">Please Register yourself at first and if already registered,<br> Login and enjoy your <b>CheZZelicious PiZZaS</b></p>
            <br<br><label for="uid_no">Special ID No:</label>
            <input type="number" id="uid_no" name="uid_no" placeholder="100"><br><br>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Bhavik"><br><br>
            <label for="pass">Password:</label>
            <input type="password" id="pass" name="pass" placeholder="12345678"><br><br>
            <label for="pas">Confirm Password:</label>
            <input type="password" id="pas" name="pas" placeholder="12345678"><br><br>
            <label for="phone">Contact number:</label>
            <input type="number" id="phone" name="phone" placeholder="8957468866"><br><br>
            <label for="address">Address:</label>
            <input type="text" maxlength="100" id="address" name="address" placeholder=" Flat no, Building name, Street name, Area"><br><br>
            <label for="mail">Email id:</label>
            <input type="email" id="mail" name="mail" placeholder="something@domain.com"><br><br>

            <input type="submit" class="btn btn-primary" name="submit" value="Submit"><br><br>
        </form></div></div>    
      -->
        
      <br><br>
      <div class="container register">
        <form action="" method="post" name="reg_form" onsubmit="return validate()">
        <div class="row">
        <div class="col-md-3 register-left">
        <img src="log1.JPG" alt=""/><br>
        <h2 style="text-shadow: 2px 2px black;">WELCOME</h2><br>
        <h3><p style="text-shadow: 2px 2px black;">You are Few Minutes away from Ordering your Favourite PIZZAS !!</p></h3>
        </div>
        <div class="col-md-9 register-right">
        
        <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <h3 class="register-heading">CHeZZa PiZZa </h3>
        <div class="row register-form">
        <div class="col-md-6">
        <div class="form-group">
        <?php if (isset($_GET['error'])) { ?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
        </div>
        <div class="form-group">
        <input type="text" class="form-control" id="username" name="username" placeholder="Username *">
        </div>
        <div class="form-group">
        <input type="password" class="form-control" id="pass" name="pass" placeholder="Password *">
         </div>
        <div class="form-group">
        <input type="password" class="form-control" id="pas" name="pas" placeholder="Confirm Password *">
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Your Phone *" pattern="[1-9]{1}[0-9]{9}">
        </div>
        <div class="form-group">
        <input type="text" class="form-control" id="address" name="address" placeholder=" Flat no, Building name, Street, Area">
        </div>
        <div class="form-group">
        <input type="email" class="form-control" id="mail" name="mail" placeholder="Your Email *">
        </div><br><br>
        <input type="submit" class="btn btn-primary" name="submit" value="Submit"/><br>
        </div>
        <p>&emsp;&emsp;Already have an Account? <a href="llogin.php">LOG IN</a></p>
        </div>
        </div>
        </div></div></div></form></div><br><br><br><br>

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