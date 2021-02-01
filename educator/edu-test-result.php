<?php
    require_once "../connection.php";
    session_start();
    if(!isset($_SESSION['name'])) {
        header('location:../accounts/edu-login.php');
    }
    $id = $_GET['id'];
    // echo $id;
    $q = "SELECT * FROM test WHERE test_id='$id';";
    $tquery = mysqli_query($con, $q);
    $tname = "Saurav";
    while($row = mysqli_fetch_array($tquery)) {
        $tname = $row['name'];
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $tname;?> Results </title>

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
        <a href="edu-test-archives.php"> <ion-icon name="arrow-back-outline" size="large"></ion-icon> </a>
        <h1><?php echo $tname;?> Results</h1>
    </div>

    <div class="container">
        <div class="col-lg-12">
            <br>
            <table class="table table-striped table-hover table-bordered">
            
                <tr class="text-white bg-dark text-center">
                    <th> Student ID </th>
                    <th> Student Name </th>
                    <th> Total Marks </th>
                    <th> Marks Scored </th>
                </tr>
                <?php
                    $current_user_id = $_SESSION['user-id'];

                    $q = "SELECT * FROM result WHERE test_id = '$id' ORDER BY final_result DESC;";

                    $query = mysqli_query($con,$q);
                    
                    while($res = mysqli_fetch_array($query)) {
                        $sname = "";
                        $tmarks = 0;
                        $sid = $res['student_id'];
                        $q = "SELECT * FROM student WHERE student_id='$sid';";
                        $squery = mysqli_query($con, $q);
                        // $sname = $squery;
                        while($row = mysqli_fetch_array($squery)) {
                            $sname = $row['full_name'];
                        }
                        $q = "SELECT * FROM test WHERE test_id='$id';";
                        $tquery = mysqli_query($con, $q);
                        // $tmarks = $tquery[0];
                        while($row = mysqli_fetch_array($tquery)) {
                            $tmarks = $row['total_marks'];
                        }
                ?>
                <tr class="text-center">
                    
                    <td> <?php echo $res['student_id']; ?> </td>
                    <td> <?php echo $sname; ?></td>
                    <td> <?php echo $tmarks; ?> </td>
                    <td> <?php echo $res['final_result']; ?> </td>                
                </tr>

                <?php
                    }
                ?>
            </table>
        </div>

    </div>


    
</body>
</html>