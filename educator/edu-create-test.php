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
    <br><br><br>

    <div class="col-lg-6 m-auto">
        <h2>Test Creation</h2>
        <form action="" method="POST">
            <div class="card">
                <label for="">Test Name</label>
                <input type="text" name="tname" class="form-control"><br>

                <!-- Show questions here  -->

                <!-- Add question button -->
                <!-- <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addQModal">Add Question</button>
                <br> -->
                <button class="btn btn-success"
                        type="submit"
                        name="submit">Create Test</button>
            </div>
        </form>
    </div>
    
    <!-- Question modal -->
    <!-- <div id="addQModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

             Modal content-->
            <!-- <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn btn-default text-left" data-dismiss="modal">&times;</button>
                <h5 class="modal-header">Question Panel</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="" method="POST">

                    <label for="">Question Statement</label>
                    <input type="text" 
                            name="statement" 
                            class="form-control"
                            required><br>

                    <label for="">Marks</label>
                    <input type="number" 
                            name="marks" 
                            class="form-control" 
                            requried><br>

                    <label for="">Option A</label>
                    <input type="text" 
                            name="choice_a" 
                            class="form-control" 
                            required><br>

                    <label for="">Option B</label>
                    <input type="text" 
                            name="choice_b" 
                            class="form-control" 
                            required><br>

                    <label for="">Option C</label>
                    <input type="text" 
                            name="choice_c" 
                            class="form-control"><br>

                    <label for="">Option D</label>
                    <input type="text" 
                            name="choice_d" 
                            class="form-control"><br>
                    
                    <label for="">Correct Option</label>
                    <input type="number" 
                            name="correct_choice" 
                            class="form-control"><br>
                    
                    <div class="container my-3">
                        <div class="col-md-12 text-center">
                            <button type="submit" 
                                    class="btn btn-success" 
                                    
                                    name="addQuestion">Submit</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>
            

        </div>
    </div> --> -->
</body>
</html>