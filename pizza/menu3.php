<?php
session_start();
require_once 'connect.php';

if (isset($_SESSION['address']) && isset($_SESSION['username'])) {}


if($_SERVER['REQUEST_METHOD']=="POST"){ 
$address = $_POST['address'];
$username = $_SESSION['username'];

$sql = "UPDATE user1 SET address='$address' WHERE username='$username'";

if (mysqli_query($con, $sql)) { 
header('location: menu3.php'); 
} else { 
echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); 
} 

}

// add, remove, empty
if (!empty($_GET['action'])) {
    switch ($_GET['action']) {
        // add product to cart
        case 'add':
            if (!empty($_POST['quantity'])) {
                $pid = $_GET['pid'];
                $query = "SELECT * FROM menu WHERE pizza_id=" . $pid;
                $result = mysqli_query($con, $query);
                while ($product = mysqli_fetch_array($result)) {
                    $itemArray = [
                        $product['pizza_id'] => [
                            'name' => $product['name'],
                            'pizza_id' => $product['pizza_id'],
                            'description' => $product['description'],
                            'quantity' => $_POST['quantity'],
                            'cost' => $product['cost'],
                            'img' => $product['img']
                        ]
                    ];
                    if (isset($_SESSION['cart_item']) &&!empty($_SESSION['cart_item'])) {
                        if (in_array($product['pizza_id'], array_keys($_SESSION['cart_item']))) {
                            foreach ($_SESSION['cart_item'] as $key => $value) {
                                if ($product['pizza_id'] == $key) {
                                    if (empty($_SESSION['cart_item'][$key]["quantity"])) {
                                        $_SESSION['cart_item'][$key]['quantity'] = 0;
                                    }
                                    $_SESSION['cart_item'][$key]['quantity'] += $_POST['quantity'];
                                }
                            }
                        } else {
                            $_SESSION['cart_item'] += $itemArray;
                        }
                    } else {
                        $_SESSION['cart_item'] = $itemArray;
                    }
                }
            }
            break;
        case 'remove':
            if (!empty($_SESSION['cart_item'])) {
                foreach ($_SESSION['cart_item'] as $key => $value) {
                    if ($_GET['code'] == $key) {
                        unset($_SESSION['cart_item'][$key]);
                    }
                    if (empty($_SESSION['cart_item'])) {
                        unset($_SESSION['cart_item']);
                    }
                }
            }
            break;
        case 'empty':
            unset($_SESSION['cart_item']);
            break;
    }
}


?>


<!DOCTYPE html>
<html>
    <head>
        <script>
            function validate(){
                var address=document.reg_form.value;
            if (address.value.length <= 12 || address.value.length >= 100) {    
                alert("Proper Address for Delivery is required");    
                address.focus();   
                return false; 
            }else{
                return true;
            }
        }
        </script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Welcome</title>
        <link rel="stylesheet" href="style.css">
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
            .le{
                list-style-type: none;
                padding: 0;
                display: flex;
                flex-wrap: wrap;
                justify-content: space-evenly;
                font-size: 1.5rem;}
            .i{
                padding: 1rem 1.5rem;}
            .start li:hover{
                border-bottom: 3px solid whitesmoke;}
            .pizza{
            width:fit-content;}
            th{
            border:2px solid black;
            font-size: 1.5em;}
            tr{
            border:2px solid black;}
            td{
            border:2px solid black;}
            .table{
                background-color:#aaffff;
            }
            .column {
                float: left;
                width: 30%;
                margin-left:3%;
            }
            .row{
                align-items: center;
            }

                /* Clear floats after the columns */
            .row:after {
                content: "";
                display: table;
                clear: both;
            }
            img{
                float: left;
            }
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

            .star{
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
                align-items: flex-start;
                margin: 2.5% 5%;
            }
            .star .ok a{
                text-decoration: none;
                margin: 1rem 2rem;
                padding: 0.5rem 1rem;
                color:black;
                text-shadow: 1px 1px white;
                background-color: #0079ff;
            }

            .star li{
                text-decoration: none;
                margin: 1.6rem 3rem;}

            .ok{
                display: flex;
                flex-wrap: wrap;
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
            .m{
                margin:2% 1%;
            }
            .d-flex{
                display:flex;

            }

        </style>
    </head>
    <body>
        
        <div class="star">
            <div class="h">CHeZZa PiZZa 🍕</div>
            <div class="ok">
                
                    <a href="basic.php">Home</a>
                    <a href="menu3.php">Menu</a>
                
            </div>
            <div style="margin: 1rem;color: #24ff12;font-size:1.8rem;text-shadow:2px 2px black;">Hi, <?php echo $_SESSION['username']; ?>&emsp;&emsp;<button class="btn btn-dark"><a href="logout.php">Logout</a></button></div>
        </div>
        <br><br>
        <div class = "screen" style="display: none;" id="after-co">
        <div class = "thank">THANK YOU! 

        </div></div>
        
        <br>
        <div style="font-size: 3.8rem;color: rgb(0, 255, 255);text-shadow: 4px 4px black; text-align:center;">Explore Best PiZZas in Town !!</div>
        <br><br>

    
        

    <ul class="le">
        <li class="i" style="font-size: 2.8rem;text-shadow: 3px 3px #000000;"><a href="#piz">PiZZaS</a></li>
        <li class="i" style="font-size: 2.8rem;text-shadow: 3px 3px #000000;"><a href="#op">Sides</a></li>
        <li class="i" style="font-size: 2.8rem;text-shadow: 3px 3px #000000;"><a href="#fiz">Beverages</a></li>
        <li class="i" style="font-size: 2.8rem;text-shadow: 3px 3px #000000;"><a href="#fizi">Cart</a></li>
    </ul><br><br><br>


    <div class="container py-5">
    <div class="row">
        <div class="col-md-12">
        <h2 class="section-header" id="piz" style="font-size: 2.8rem;color: #24ff12;margin:auto;text-align:center;text-shadow: 3px 3px #000000;">PIZZAS</h2>
            <div class="d-flex">
                <div class="card-deck">
                    <?php
                    $ui=1086;
                    $query = "SELECT * FROM menu WHERE pizza_id < '$ui'";
                    $product = mysqli_query($con, $query);
                    if (!empty($product)) {
                        while ($row = mysqli_fetch_array($product)) { ?>
                            <form action="menu3.php?action=add&pid=<?= $row['pizza_id']; ?>" method="post" class="m">

                                <div class="shop-item"><br>
                                    <span class="shop-item-title" style="color:#24d6ff;font-weight:700;text-shadow:2px 2px black;font-size: 2rem;"><?= $row['name']; ?></span>
                                    <img class="shop-item-image" src="<?= $row['img']; ?>" alt="<?= $row['name']; ?>" /><br><br><br><br><br><br><br><br><br><br>
                                    <span class="shop-item-details">
                                        <div style="background-color:black;color:#00bfff;font-size: 1.5rem;text-shadow:1px 1px black;"><?= $row['description']; ?></div><br>
                                        <div class="shop-item-price" style="background-color:white;text-align:center;color:black;"><?= number_format($row['cost'], 2); ?></div><br>
                                        <input type="text" name="quantity" value="1" size="2">
                                        <input style="float:right;" type="submit" value="Add to Cart" class="btn btn-success btn-sm">
                                    </span>
                                </div>

                                
                            </form>
                        <?php }
                    } else {
                        echo "no products available";
                    }
                    ?>
                </div>
            </div></div></div><br><br><br><br>

        <div class="row">
            <div class="col-md-12">
            <h2 class="section-header" id="op" style="font-size: 2.8rem;color: #24ff12;margin:auto;text-align:center;text-shadow: 3px 3px #000000;">SIDES</h2>
                <div class="card-deck">
                    <?php
                    $ui=1086;
                    $uiu=1096;
                    $query = "SELECT * FROM menu WHERE pizza_id < '$uiu' AND pizza_id > '$ui'";
                    $product = mysqli_query($con, $query);
                    if (!empty($product)) {
                        while ($row = mysqli_fetch_array($product)) { ?>
                            <form action="menu3.php?action=add&pid=<?= $row['pizza_id']; ?>" method="post" class="m">

                                <div class="shop-item"><br>
                                    <span class="shop-item-title" style="color:#24d6ff;font-weight:700;text-shadow:2px 2px black;font-size: 2rem;"><?= $row['name']; ?></span>
                                    <img class="shop-item-image" src="<?= $row['img']; ?>" alt="<?= $row['name']; ?>" /><br><br><br><br><br><br><br><br><br><br>
                                    <span class="shop-item-details">
                                        <div style="background-color:black;color:#00bfff;font-size: 1.5rem;text-shadow:1px 1px black;"><?= $row['description']; ?></div><br>
                                        <div class="shop-item-price" style="background-color:white;text-align:center;color:black;"><?= number_format($row['cost'], 2); ?></div><br>
                                        <input type="text" name="quantity" value="1" size="2">
                                        <input style="float:right;" type="submit" value="Add to Cart" class="btn btn-success btn-sm">
                                    </span>
                                </div>

                                
                            </form>
                        <?php }
                    } else {
                        echo "no products available";
                    }
                    ?>
                </div>
            </div></div><br><br><br><br>

        <div class="row">
            <div class="col-md-12">
            <h2 class="section-header" id="fiz" style="font-size: 2.8rem;color: #24ff12;margin:auto;text-align:center;text-shadow: 3px 3px #000000;">BEVERAGES</h2>
                <div class="card-deck">
                    <?php
                    $ui=1096;
                    $uiu=2006;
                    $query = "SELECT * FROM menu WHERE pizza_id < '$uiu' AND pizza_id > '$ui'";
                    $product = mysqli_query($con, $query);
                    if (!empty($product)) {
                        while ($row = mysqli_fetch_array($product)) { ?>
                            <form action="menu3.php?action=add&pid=<?= $row['pizza_id']; ?>" method="post" class="m">

                                <div class="shop-item"><br>
                                    <span class="shop-item-title" style="color:#24d6ff;font-weight:700;text-shadow:2px 2px black;font-size: 2rem;"><?= $row['name']; ?></span>
                                    <img class="shop-item-image" src="<?= $row['img']; ?>" alt="<?= $row['name']; ?>" /><br><br><br><br><br><br><br><br><br><br>
                                    <span class="shop-item-details">
                                        <div style="background-color:black;color:#00bfff;font-size: 1.5rem;text-shadow:1px 1px black;"><?= $row['description']; ?></div><br>
                                        <div class="shop-item-price" style="background-color:white;text-align:center;color:black;"><?= number_format($row['cost'], 2); ?></div><br>
                                        <input type="text" name="quantity" value="1" size="2">
                                        <input style="float:right;" type="submit" value="Add to Cart" class="btn btn-success btn-sm">
                                    </span>
                                </div>

                                
                            </form>
                        <?php }
                    } else {
                        echo "no products available";
                    }
                    ?>
                </div>
            </div><br><br><br><br>
    </div>

<br><br><br><br>
    <div class="d-flex justify-content-between mb-2">
    <h2 class="section-header" id="fizi" style="font-size: 2.8rem;color: #24ff12;margin:auto;text-align:center;text-shadow: 3px 3px #000000;">CART</h2>
        <a class="btn btn-danger" href="menu3.php?action=empty">Remove All</a>
    </div>
    <div class="row">
        <?php
            $total_quantity = 0;
            $total_price = 0;
        ?>
        <table class="table">
            <tbody>
            <tr>
                <th class="text-left">Name</th>
                <th class="text-right">Quantity</th>
                <th class="text-right">Item Price</th>
                <th class="text-right">Price</th>
                <th class="text-center">Remove</th>
            </tr>
            <?php
            if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])){
                foreach ($_SESSION['cart_item'] as $item) {
                    $item_price = $item['quantity'] * $item['cost'];
                    ?>
                    <tr>
                        <td class="text-left">
                            <img src="<?= $item['img'] ?>" alt="<?= $item['name'] ?>" class="img-fluid" width="100">
                            <?= $item['name'] ?>
                        </td>
                        <td class="text-right"><?= $item['quantity'] ?></td>
                        <td class="text-right">₹<?= number_format($item['cost'], 2) ?></td>
                        <td class="text-right">₹<?= number_format($item_price, 2) ?></td>
                        <td class="text-center">
                            <a href="menu3.php?action=remove&code=<?= $item['pizza_id']; ?>" class="btn btn-danger">X</a>
                        </td>
                    </tr>

                    <?php
                    $total_quantity += $item["quantity"];
                    $total_price += ($item["cost"]*$item["quantity"]);
                }
            }

            if (isset($_SESSION['cart_item']) && !empty($_SESSION['cart_item'])){
                ?>
                <tr>
                    <td align="right">Total:</td>
                    <td align="right"><strong><?= $total_quantity ?></strong></td>
                    <td></td>
                    <td align="right"><strong>₹<?= number_format($total_price, 2); ?></strong></td>
                </tr>

            <?php }

                ?>
            </tbody>
        </table>
    </div>
</div>

<div style="margin:auto;text-align:center;">
    <form action="send.php" method="post" name="reg_form" style="margin: 2% 10%;padding: 2% 10%;text-align:center;">
        <input type="submit" class="btn btn-primary" name="submi" id="pur" value="PURCHASE">
            </form><div>
    
    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submi'])){
        if (empty($_SESSION['cart_item'])){
            alert("Cart is Empty!!");
        }else{
            $username = $_SESSION['username'];
            foreach ($_SESSION['cart_item'] as $item) {
                $pizid=$item['name'];
                $tprice = ($item["cost"]*$item["quantity"]);
                
                $sql1 = "INSERT INTO cart(piza,user,price) VALUES ('$pizid','$username','$tprice')";
        
                $tprice=0;
        
                if (mysqli_query($con, $sql1)) { 
                } else { 
                    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); 
                } 
            }
        }
    }

    ?>

<!--
    <div style="margin:auto;text-align:center;"><a href="send.php"><button>Purchase</button></a><div>-->

<div style="margin:auto;text-align:center;">
    <form action="menusend.php" method="post" name="reg_form" onsubmit="return validate()" style="margin:10%;padding: 2% 10%;text-align:center;border:2px solid black;">
        <label for="address" style="color: #00ffff;font-size: 1.5rem;text-shadow:2px 2px black;">After Purchasing, Food will be Delivered to Following Location: </label>
        <input type="text" class="form-control" minlength="10" maxlength="100" id="address" name="address" placeholder=" Flat no, Building name, Street, Area" value="<?php echo $_SESSION['address']; ?>">
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
    </form><div>


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

<script>
    function showinvoice(){
                document.getElementById('after-co').style.display = 'block';
        }

</script>
            </body>
            </html>
