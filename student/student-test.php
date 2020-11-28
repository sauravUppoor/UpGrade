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
    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>    

<body>
<form action="student-result.php" method="post">
<div class="container">
    <div class="col-lg-8 m-auto d-block">
<?php

    $q = "SELECT * FROM question WHERE test_id = '$id';";
    $query = mysqli_query($con, $q);

    while ( $rows = mysqli_fetch_array($query) ) {​​
?>
    <div class="card">
        <h4 class="card-header"> <?php echo $rows['statement'] ?> </h4>
            <!-- Display Questions with options -->
                <div class="card-body">
                    <input type="radio" name="quizcheck[<?php echo $rows['question_id'] ;?>]" value="<?php echo 1; ?>"> 
                    <?php echo $rows['choice_a']; ?> <br>

                    <input type="radio" name="quizcheck[<?php echo $rows['question_id'] ;?>]" value="<?php echo 2; ?>"> 
                    <?php echo $rows['choice_b']; ?> <br>

                    <input type="radio" name="quizcheck[<?php echo $rows['question_id'] ;?>]" value="<?php echo 3; ?>"> 
                    <?php echo $rows['choice_c']; ?> <br>

                    <input type="radio" name="quizcheck[<?php echo $rows['question_id'] ;?>]" value="<?php echo 4; ?>"> 
                    <?php echo $rows['choice_d']; ?> <br>
                    

                </div>
            


        <?php
            }
    
    
        ?>
        <input type="submit" name="submit" value="Submit" class="btn btn-success m-auto d-block">
        </form>
        </div>
    </div>
    <div class="m-auto d-block">
        <a href="../templates/login.php" class="btn btn-primary "> LOGOUT </a>
    </div>
</div>

</body>