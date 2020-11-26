<?php

// For $_SERVER, we need to start the session
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Take Test</title>


</head>    

<body>

<?php
    require_once "../connection.php";
    $testid = $_GET['id'];
    $q = "SELECT * FROM question WHERE test_id='$testid';";
    echo $testid;
    $query = mysqli_query($con, $q);
    while($res = mysqli_fetch_assoc($query)) {​​
    ?>

    <h3><?php echo $res['question_no'];?></h3><br>
    <h4><?php echo $res['choice_a'];?></h4><br>
    <h4><?php echo $res['choice_b'];?></h4><br>
    <h4><?php echo $res['choice_c'];?></h4><br>
    <h4><?php echo $res['choice_d']; ?></h4>
    <?php
    }​​
?>


</body>