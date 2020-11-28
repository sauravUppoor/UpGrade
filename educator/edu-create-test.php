<?php

session_start();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create a Test</title>

    <?php include "../static/links/bootstrap.php" ?>
    <!-- CSS -->
    <link rel="stylesheet" href="../static/css/navbar.css">
    <link rel="stylesheet" href="../static/css/form.css">
    <link rel="stylesheet" href="../static/css/edu-dashboard.css">
    <style>

        form {
            max-width: 400px;
            margin: auto;
        }
    </style>

    <!-- IonIcons -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</head>

<?php
require_once "../connection.php";

if(isset($_POST['submit'])) {
    $tname = $_POST['tname'];
    $created = $_SESSION['id'];

    $sql = "INSERT INTO test (created_by, name, total_marks) VALUES ('$created', '$tname', '0');";
    
    if(mysqli_query($con, $sql)) {
        ?>
        <script>
            alert("Test created successfully!");
        </script>
        <?php
        header('edu-dashboard.php');
    }
    else {
        echo mysqli_error($con);
    }

}

?>

<body>

    <?php
        include "../templates/navbar.php";
    ?>
    <br>
    <div class="contain">
        <a href="edu-dashboard.php"> <ion-icon name="arrow-back-outline" size="large"></ion-icon> </a>
        <h1>Test Creation</h1>
    </div>
    
    <div class="col-lg-6 m-auto">
        
        <form action="" method="POST">
            <div class="con-forms">
                <div class="con-inputs">
                    <div class="con-input">
                        <label for="">Test Name</label>
                        <input type="text" name="tname" class="form-control"><br>
                    </div>
                </div>
                
                <footer>
                    <button class="btn-signin"
                            type="submit"
                            name="submit">Create Test</button>
                </footer>
            </div>
        </form>
    </div>
</body>
</html>