<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar</title>

    <?php

        include "../static/links/bootstrap.php";

    ?>
    <link rel="stylesheet" href="../static/css/navbar.css">
</head>
<body>
    
    <div class="nav">
        <div class="con-logo">
            Test App
        </div>
        <ul>
            <li><a href = "" class="active">Home</a></li>
            <li><a href = "">About Us</a></li>
            <li><a href = "">Contact Us</a></li>
        </ul>
        <div class="con-btn">
            <a href="../templates/login.php"> <button>Login</button> </a>
        </div>
    </div>
</body>
</html>