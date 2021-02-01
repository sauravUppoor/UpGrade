<?php

require_once "../connection.php";
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
    <title>Test Archives</title>

    <?php include "../static/links/bootstrap.php" ?>
    <!-- CSS -->
    <link rel="stylesheet" href="../static/css/navbar.css">
    <link rel="stylesheet" href="../static/css/form.css">
    <link rel="stylesheet" href="../static/css/edu-dashboard.css">

    <!-- IonIcons -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>

    <style>
        .green {
            color: green;
        }

        .red {
            color: red;
        }
    </style>

</head>
<body>
    <?php
        include "../templates/navbar-logged_in.php";
    ?>
    <br>
    <div class="contain">
        <a href="edu-dashboard.php"> <ion-icon name="arrow-back-outline" size="large"></ion-icon> </a>
        <h1>Test Archives</h1>
    </div>

    <div class="container">
        <div class="col-lg-12">
            <br>
            <table class="table table-striped table-hover table-bordered">
            
                <tr class="text-white bg-dark text-center">
                    <th> Invite Code </th>
                    <th> Test Name </th>
                    <th> Total Marks </th>
                    <th> Results </th>
                    <th> Edit Test </th>
                </tr>
                <?php
                    $current_user_id = $_SESSION['user-id'];

                    $q = "SELECT * FROM test WHERE created_by = '$current_user_id'";

                    $query = mysqli_query($con,$q);

                    while($res = mysqli_fetch_array($query)) {
                ?>
                <tr class="text-center">
                    
                    <td> <?php echo $res['test_id']; ?> </td>
                    <td> <?php echo $res['name']; ?></td>
                    <td> <?php echo $res['total_marks']; ?> </td>
                    <td>
                        <a href="edu-test-result.php?id=<?php 
                            echo $res['test_id']; ?>"> 
                            <div class="text-white">
                            <ion-icon name="eye-outline" size="large" class="red"></ion-icon>
                            </div> </a>
                    </td>
                    <td>
                        <a href="edu-edit-test.php?id=<?php 
                            echo $res['test_id']; ?>"> 
                            <div class="text-white">
                            <ion-icon name="create-outline" size="large" class="green"></ion-icon>
                            </div> </a>
                    </td>
                
                </tr>

                <?php
                    }


                ?>
            </table>
        </div>

    </div>


    
</body>
</html>
