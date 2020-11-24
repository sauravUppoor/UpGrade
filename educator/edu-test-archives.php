<?php

require_once "../connection.php";
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Archives</title>

    <?php include "../static/links/bootstrap.php" ?>

</head>
<body>
    <br><br>
    
    <div class="container">
        <div class="col-lg-12">

            <h1>Test Archives</h1>
            <br><br>
            <table class="table table-striped table-hover table-bordered">
            
                <tr class="text-white bg-dark text-center">
                    <th> Invite Code </th>
                    <th> Test Name </th>
                    <th> Total Marks </th>
                    <th> Delete Test </th>
                    <th> Edit Test </th>
                </tr>
                <?php



                    $q = "SELECT * FROM test";

                    $query = mysqli_query($con,$q);

                    while($res = mysqli_fetch_array($query)) {


                ?>
                <tr class="text-center">
                    <td> <?php echo $res['test_id']; ?> </td>
                    <td> <?php echo $res['name']; ?></td>
                    <td> <?php echo $res['total_marks']; ?> </td>
                    <td> <button class="btn btn-danger" >
                        <a href="delete.php?id=<?php 
                            echo $res['id']; ?>"> 
                            <div class="text-white">
                                Delete
                            </div> </a>
                    </button></td>
                    <td> <button class="btn btn-success" >
                        <a href="edu-edit-test.php?id=<?php 
                            echo $res['test_id']; ?>"> 
                            <div class="text-white">
                            Edit
                            </div> </a>
                    </button></td>
                
                </tr>

                <?php
                    }


                ?>
            </table>
        </div>

    </div>


    
</body>
</html>
