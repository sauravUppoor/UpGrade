<?php

session_start();

if(!isset($_SESSION['name'])) {
    header('location:../accounts/edu-login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educator Dashboard</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../static/css/navbar.css">
    <link rel="stylesheet" href="../static/css/edu-dashboard.css">

    <!-- IonIcons -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>

</head>
<body>
    <?php
        include "../templates/navbar.php";
    ?>

    <div class="contain">
        <br><br>
        <h1>Welcome, <?php echo $_SESSION['name']; ?> !</h1>
        <a href="../accounts/logout.php">Logout</a>
        <br><br>
        <div class="contain-btns">
            <a href="./edu-create-test.php"> <button class="btn-1"> <ion-icon name="add-outline" size="large"></ion-icon> <br> Create New Test</button> </a>
            <br><br>
            <a href="./edu-test-archives.php"> <button class="btn-1"> <ion-icon name="folder-open-outline" size="large"></ion-icon> <br>  Test Archives</button> </a>
        </div>
    </div>
    
</body>
</html>