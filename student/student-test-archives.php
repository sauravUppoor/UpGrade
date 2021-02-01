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
    ?>
  
</head>
<body>
    <?php
        include "../templates/navbar-logged_in.php";
    ?>
    <br>
    <div class="contain">
        <a href="student-dashboard.php"> <ion-icon name="arrow-back-outline" size="large"></ion-icon> </a>
        <h1>Test Archives</h1>
    </div>
    
    <div class="container">
        <div class="col-lg-12">
            <br>
            <table class="table table-striped table-hover table-bordered">
            
                <tr class="text-white bg-dark text-center">
                    <th> # </th>
                    <th> Test Name </th>
                    <th> Total Marks </th>
                    <th> Marks Obtained </th>
                </tr>
                <?php
                    $current_user_id = $_SESSION['user-id'];

                    $cnt = 1;

                    $q = "SELECT * FROM result WHERE student_id = '$current_user_id'";

                    $query = mysqli_query($con,$q);

                    while($res = mysqli_fetch_array($query)) {
                        $testid = $res['test_id'];
                        $q2 = "SELECT * FROM test WHERE test_id = '$testid';";
                        $query2 = mysqli_query($con, $q2);
                        $test_name = "";
                        $total_marks = 0;
                        while($row = mysqli_fetch_array($query2)) {
                            $test_name = $row['name'];
                            $total_marks = $row['total_marks'];
                        }
                ?>
                <tr class="text-center">
                    
                    <td> <?php echo $cnt; ?> </td>
                    <td> <?php echo $test_name; ?></td>
                    <td> <?php echo $total_marks; ?> </td>
                    <td> <?php echo $res['final_result']; ?> </td>
                
                </tr>

                <?php
                    $cnt += 1;
                    }


                ?>
            </table>
        </div>

    </div>
</body>
</html>