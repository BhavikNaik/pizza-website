<?php 

    $server = "localhost"; 
    $user = "root"; 
    $pass = ""; 
    $dbname = "pizza"; 

    $con = mysqli_connect($server, $user, $pass, $dbname); 
    
    if (!$con){
        die("Connection failed"); }

?> 