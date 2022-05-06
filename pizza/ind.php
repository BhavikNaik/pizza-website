<?php 

session_start();

	if(!isset($_SESSION['userlogin'])){
		header("Location: login.php");
	}

	if(isset($_GET['logout'])){
		session_destroy();
		unset($_SESSION);
		header("Location: login.php");
	}

?>

<!DOCTYPE html>
<html>
    <head>
      <script>   
        function welcome(){
            var now=new Date();
            var hour=now.getHours();
            var min=now.getMinutes();
            document.getElementById("timef").value="Hey User !! Time is "+hour+":"+min+" IST";
        } 
        setInterval('welcome()',1000);
        function wel(){
            var now=new Date();
            var hour=now.getHours();
            if (hour <= 11 && hour > 5){
                alert("Good Morning !! Order any Fresh Pizza to start your Day");    
                return true;
            }
            else if (hour <= 16 && hour > 11){
                alert("Good Afternoon !! Order any Seasoned Pizza for your lunch");       
                return true;
            }
            else if (hour <= 22 && hour > 16){
                alert("Good Evening !! Order any Chezzelicious Pizza for Dinner");      
                return true;
            }
            else{
                alert("Good Night !! End your Day with a Wonderful note and Pizza on side");       
                return true;
            }
        }
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
        }   
    </script> 
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="basic.css">
        <!--<style type="text/css">@import url("basic2.css");</style>-->
        <title>1st program</title>
    </head>
    <body class="d-flex flex-column" onload="wel()">
    <div class="start">
        <h1>CHeZZa PiZZa</h1>
        <nav class="fle">
        <ul class="no" style="color:indigo">
            <li class="i" style="margin: 1.5rem;"><a href="basic.html">Home</a></li>
            <li class="i" style="margin: 1.5rem;"><a href="menu.html">Menu</a></li>
        </ul>
        </nav>
        <div>
            <a href="ind.php?logout=true">Logout</a>
            <button style="margin: 2rem;" class="btn btn-primary" onclick="location.href='login.html'">LOGOUT</button></div>
    </div>
        <br><br><br><br><br><br>
        <div style="font-size: 3em;color: #ff7d03;text-shadow: 3px 3px #5351f0; text-align:center;">Welcome To CHeZZa PiZZa !!</div>
        <br><br><div style="font-size: 2em;color: purple;text-shadow: px 2px orange; text-align:center;">CHeZZiest PiZZas are Everyone's Favourites and We are Here With IT.</div>
        <br><br><br><br><br><br><br><br>
        <br><br>
        
        <div class="container1">
          <img class="photos" id="pho3" src="offer 2.PNG" alt="Pizza Offer" onclick="alert('USE Code APJP while Checking Out !!')"><p id="inner"> <br><p id="inn" style="font-size: 2.2rem; color: #ff7d03;"><i>INCREASED CHEESE !!</i></p><br><p id="in" style="font-size: 1.2rem; color: #840af7;">You Heard it Right !! We Deliver the CHESSIEST PIZZAS in the Town in Affordable Prices.</p></p>
        </div>
        <br><br>

        <div class="containe">
          <img class="photos" id="pho2" src="pizza offer.jpg" alt="Pizza Offer" onclick="alert('USE Code ABCP while Checking Out !!')"><p id="inner"> <br><p id="onn" style="font-size: 2.2rem; color: #ff7d03;"><i>THIN CRUST !!</i></p><br><p id="on" style="font-size: 1.2rem; color: #f593e4;"> Thick Dough Has No TASTE Anyways, So we have Decided to OFFER Thin Crust PIZZAS without any XTRA Charges. </p></p>
        </div>
        <br><br>

    <div class="container1">
      <img class="photos" id="pho3" src="3rd offer.JPG" alt="Pizza Offer" onclick="alert('USE Code BPJS while Checking Out !!')"><p id="inner"> <br><p id="inn" style="font-size: 2.2rem; color: #ff7d03;"><i>INCREASED TOPPINGS !!</i></p><br><p id="in" style="font-size: 1.2rem;color: #c81dfc;">ARE you also Bored of Less Toppings, Then Order from Our XtraVaganza List of Pizzas To Get 2X Number of Toppings. </p></p>
    </div>
    <br><br>

    <div class="containe">
      <img class="photos" id="pho2" src="offer3.JPG" alt="Pizza Offer"><p id="inner"> <br><p id="onn" style="font-size: 2.2rem; color: #ff7d03;"><i>CONTACT LESS DELIVERY !!</i></p><br><p id="on" style="font-size: 1.2rem; color: #5351f0;"> We understand your Concern for Safety, So We have kept the OPTION for leaving Your ORDER at Your DOOR. </p></p>
    </div>
    <br><br>
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
