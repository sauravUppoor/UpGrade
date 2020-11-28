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
    if(isset($_POST['submit'])) {
    }
     ?>
  
    <?php
    $testid = $_GET['id'];
    $q = "SELECT * FROM question WHERE test_id='$testid';";
    
        $query = mysqli_query($con, $q);?>
         <form action="student-result.php" method="post">
        <?php
            while($res = mysqli_fetch_array($query)) {​​
            ?>

                <h3><?php echo $res['question_no'];?>.<?php echo $res['statement'];?></h3>

                    <input type="radio" name="quizcheck[<?php echo $res['question_id'];?>" value="<?php echo $res['choice_a'] ?>;">
                    <?php echo $res['choice_a']?>

                    <input type="radio" name="quizcheck[<?php echo $res['question_id'];?>" value="<?php echo $res['choice_b']?>;">
                    <?php echo $res['choice_b']?>

                    <input type="radio" name="quizcheck[<?php echo $res['question_id'];?>" value="<?php echo $res['choice_c'] ?>;">
                    <?php echo $res['choice_c']?>

                    <input type="radio" name="quizcheck[<?php echo $res['question_id'];?>" value="<?php echo $res['choice_d'] ?>;">
                    <?php echo $res['choice_d']?>

            <?php
            }​​
            ?>
            <button type="submit" name="submit" value="submit" class="btn-signin" >Submit</button>
        </form>


</body>