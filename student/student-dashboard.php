<?php
session_start();

if(!isset($_SESSION['name'])) {
    header('location:../accounts/student-login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <?php
    require_once "../connection.php";

    if(isset($_POST['submit'])) {
        $testid=$_POST['testid']; 
        $_SESSION['testid']= $testid;

        ?>
        
        <script>
            location.replace('student-test.php?id=<?php 
                            echo $_SESSION['testid']; ?>');
        </script>

    <?php
    }
     ?>
  
</head>
<body>
    <h1>Welcome, <?php echo $_SESSION['name']; ?> !</h1>
    <a href="../accounts/logout.php">Logout</a>
    <br><br>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="con-input">
        <input type="text" id="testid" name="testid" placeholder="Test ID"><br><br>
        </div>
        
        <button type="submit" name="submit" value="Take Test" >Take a Test</button>
        
    </form>

    <br><br>
    <a href="./edu-test-archives.php">Test Results</a>
</body>
</html>