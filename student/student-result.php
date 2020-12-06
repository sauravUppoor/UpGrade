
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Student Result</title>
    <?php include "../static/links/bootstrap.php" ?>
    <!-- CSS -->
    <link rel="stylesheet" href="../static/css/navbar.css">
    <link rel="stylesheet" href="../static/css/form.css">
    <link rel="stylesheet" href="../static/css/edu-dashboard.css">

    <!-- IonIcons -->
    <script src="https://unpkg.com/ionicons@5.2.3/dist/ionicons.js"></script>
</head>

<body>
    <?php
        include "../templates/navbar.php";
    ?>
    <br>

    <div class="contain">
        <a href="student-dashboard.php"> <ion-icon name="arrow-back-outline" size="large"></ion-icon> </a>
        <h1>Test Result</h1>
    </div>
    <br>
    <div class="container text-center">
    <table class="table text-center table-bordered table-hover">
        <tr>
            <th colspan="2" class="bg-dark"><h1 class="text-white"> Results </h1></th>
        </tr>
        <tr>
            <td>Questions Attempted</td>
        <td>
        <?php

    // For $_SERVER, we need to start the session
        session_start();
        require_once "../connection.php";

    //$id = $_GET['id'];
    $id = $_SESSION['testid'];

        if(isset($_POST['submit'])){
            if(!empty($_POST['quizcheck'])){
                $count = count($_POST['quizcheck']);
                $q = "SELECT * FROM question WHERE test_id='$id';";
                $query = mysqli_query($con, $q);
                $cnt = mysqli_num_rows($query);
                echo "Out of ".$cnt.", you have attempted ".$count." questions";
                ?>
                </td>
                </tr>
                <?php
                $result = 0;
                $total=0;
                // $i = 1;
                $selected = $_POST['quizcheck'];
                // print_r($selected);

            
                
                while( $rows = mysqli_fetch_array($query) ){
                    $total += $rows['marks'];
                    // print_r($rows['correct_choice']);
                    // print_r($selected[$rows['question_id']]);
                    if(!empty($selected[$rows['question_id']])){
                        $checked = $rows['correct_choice'] == $selected[$rows['question_id']];

                       
                        
                        if($checked){
                            $result += $rows['marks'];
                        }
                    }
                    
                    
                    // $i++;
                }
                ?>
                <tr>
                    <td> Your Total Score </td>
                    <td colspan="2">
                        <?php
                            echo $result.'/'.$total;

                        ?>
                    </td>
                </tr>
                <?php
                
            }
        }

        
        $name = $_SESSION['name'];
        $fresult = "INSERT INTO result(test_id, full_name, final_result) VALUES ('$id','$name','$result');";

        $qresult = mysqli_query($con, $fresult);

        ?>
    
    </table>
    </div>

</body>
</html>