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
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['name']; ?> !</h1>
    <a href="../accounts/logout.php">Logout</a>
    <br><br>
    <a href="./edu-create-test.php">Create New Test</a>
    <br><br>
    <a href="./edu-test-archives.php">Test Archives</a>
</body>
</html>