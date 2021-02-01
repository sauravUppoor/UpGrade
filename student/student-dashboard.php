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

    <?php include "../static/links/bootstrap.php" ?>

    <!-- CSS -->
    <link rel="stylesheet" href="../static/css/navbar.css">
    <link rel="stylesheet" href="../static/css/form.css">
    <link rel="stylesheet" href="../static/css/edu-dashboard.css">
    <link rel="stylesheet" href="../static/css/student-dashboard.css">

    <style>
        
    </style>
    <!-- IonIcons -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>

    <?php
    require_once "../connection.php";

    if(isset($_POST['submit'])) {
        $testid=$_POST['testid']; 
        $_SESSION['testid']= $testid;

        ?>
        
        <script>
            location.replace('student-test.php?id=<?php echo $_SESSION['testid']; ?>');
        </script>

    <?php
    }
     ?>
  
</head>
<body>
    <?php
        include "../templates/navbar-logged_in.php";
    ?>
    <div class="contain">
        <h1>Welcome, <?php echo $_SESSION['name']; ?> !</h1>
        <a href="../accounts/logout.php">Logout</a>
        <br><br>

        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="con-forms">
                <div class="con-inputs">
                    <div class="con-input">
                        <label for="">Invite Code</label>
                        <input type="text" id="testid" 
                        name="testid" placeholder="Test ID"
                        class="form-control"><br><br>
                    </div>
                </div>
                <footer>
                    <button type="submit" name="submit"
                    value="Take Test" 
                    class="btn-signin">Take a Test</button>
                </footer>
            </div>
            
            
            
        </form>
        <br>
        <div class="or mg-auto container">or</div>
        <br><br>
        <div class="container mg-auto">
            <a href="./student-test-archives.php">
            <button class="btn-1"> <ion-icon name="folder-open-outline" size="large"></ion-icon> <br>Test Results</button> </a>
        </div>
        
    </div>
    
</body>
</html>