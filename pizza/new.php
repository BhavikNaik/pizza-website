<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            box-sizing:border-box;
            margin:0;
            padding:0;
            font-weight: bold;
            font-family:Arial, Helvetica, sans-serif;
        }
        .star{
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: flex-start;
            margin: 2.5% 5%;
        }
        .star .ok a{
            text-decoration: none;}

        .star li{
            text-decoration: none;
            margin: 1.6rem 3rem;}

        .ok{
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            list-style-type: none;
            font-size: 1.5rem;
        }
        .h{
            color: rgb(36, 4, 124);  
            padding: 5px;      
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
        <div>
            <ul class="ok">
                <li><a href="home.php">Home</a></li>
                <li><a href="register.php">Menu</a></li>
                <li><a href="llogin.php">Menu</a></li>
            </ul>
        </div>
    </div>
</body>
</html>