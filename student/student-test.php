<?php

// For $_SERVER, we need to start the session
session_start();
require_once "../connection.php";
$id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Test</title>
    <?php include "../static/links/bootstrap.php" ?>

    <!-- CSS -->
    <link rel="stylesheet" href="../static/css/navbar.css">
    <link rel="stylesheet" href="../static/css/edu-dashboard.css">

    <style>
        .btn-signin {
            justify-content: right;
            background-color: #6555df;
            color: #fff;
            border: 0px;
            padding: 14px 20px;
            width: 100%;
            border-radius: 18px;
            display: block;
            cursor: pointer;
            font-size: 1.1rem;
            transition: all .25s ease;
            box-shadow: 0px 15px 20px 0px rgba(101, 85, 223,0.4);
            max-width: 150px;
            max-height: 50px;
        }

        .btn-signin:hover {
            transform: translate(0px,5px);
            box-shadow: none;
        }

    </style>
    <!-- IonIcons -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>

</head>    

<body>
    <?php
        include "../templates/navbar.php";
    ?>
<form action="student-result.php" method="post">
<div class="container">
    <div class="col-lg-8 m-auto d-block">
<?php
    error_reporting(E_ALL ^ E_WARNING);
    $q = "SELECT * FROM question WHERE test_id = '$id';";
    $query = mysqli_query($con, $q);
    
    if(mysqli_num_rows($query) > 0) {
        while($res = mysqli_fetch_array($query)){​​
?>
    <div class="card">
        <h4 class="card-header"> <?php echo $res['statement'] ?> </h4>
            <!-- Display Questions with options -->
                <div class="card-body">
                    <input type="radio" name="quizcheck[<?php echo $res['question_id'] ;?>]" value="<?php echo 1; ?>"> 
                    <?php echo $res['choice_a']; ?> <br>

                    <input type="radio" name="quizcheck[<?php echo $res['question_id'] ;?>]" value="<?php echo 2; ?>"> 
                    <?php echo $res['choice_b']; ?> <br>

                    <input type="radio" name="quizcheck[<?php echo $res['question_id'] ;?>]" value="<?php echo 3; ?>"> 
                    <?php echo $res['choice_c']; ?> <br>

                    <input type="radio" name="quizcheck[<?php echo $res['question_id'] ;?>]" value="<?php echo 4; ?>"> 
                    <?php echo $res['choice_d']; ?> <br>
                    

                </div>
            


        <?php
            }
        }
    
        ?>
        <input type="submit" 
            name="submit" 
            value="Submit" 
            class="btn-signin m-auto">
        </form>
        <br>
        </div>
    </div>
</div>

</body>