<?php

require_once "../connection.php";
$id = $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Test</title>

    <?php include "../static/links/bootstrap.php"; ?>

</head>
<body>
    <br><br>
    <div class="container">
        <div class="col-lg-12">


            <h1>
                <?php 
                    
                    $sql = "SELECT * FROM test WHERE test_id='$id';";
                    $query = mysqli_query($con, $sql);
                    if($query) {
                        $row = mysqli_fetch_assoc($query);
                        echo $row['name'];
                    }
                    else {
                        ?>
                            <script>
                                alert("Can't find test!");
                            </script>
                        <?php
                    }
                ?>
                 Test
            </h1>
            
            <br>

            <div class="d-flex justify-content-end">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#addQModal">Add Question</button>
                <br>
            </div>

            <br><br>
            
            <div>
                <table class="table table-striped table-hover table-bordered">    
                    <tr class="text-white bg-dark text-center">
                        <th> Question No. </th>
                        <th> Marks </th>
                        <th> Statement </th>
                        <th> Option A </th>
                        <th> Option B </th>
                        <th> Option C </th>
                        <th> Option D </th>
                        <th> Correct Answer </th>
                        <th> Delete Question </th>
                        <th> Edit Question </th>
                    </tr>
                    <tbody id="questionContent">
                    <?php
                        $id = $_GET['id'];
                        $q = "SELECT * FROM question WHERE test_id='$id';";
                    
                        $query = mysqli_query($con,$q);
                    
                        $number = 1;
                        while($res = mysqli_fetch_array($query)) {
                            ?>
                            <tr class="text-center">
                                <td><?php echo $number; ?></td>
                                <td><?php echo $res['marks']; ?></td>
                                <td><?php echo $res['statement']; ?></td>
                                <td><?php echo $res['choice_a']; ?></td>
                                <td><?php echo $res['choice_b']; ?></td>
                                <td><?php echo $res['choice_c']; ?></td>
                                <td><?php echo $res['choice_d']; ?></td>
                                <td><?php echo $res['correct_choice'] ?></td>
                                <td> <button class="btn btn-danger" onclick="deleteQuestion(<?php echo $res['question_id'] ?>, this)">Delete</button> </td>
                                <td> <button class="btn btn-success" onclick="getQuestionInfo(<?php echo $res['question_id'] ?>, this)" >Edit</button> </td>
                            </tr>
                            <?php
                            $number++;
                        }
                    
                    ?>
                    </tbody>
        
                </table>
            </div>

            <div id="addQModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn btn-default text-left" data-dismiss="modal">&times;</button>
                            <h5 class="modal-header">Question Panel</h5>
                        </div>
                
                        <div class="modal-body">
                            <div class="container">
                                <form action="" method="POST">

                                <label for="">Question Statement</label>
                                <input type="text" 
                                        id="statement" 
                                        class="form-control"
                                        placeholder="Eg- What is 2 * 2?"
                                        required><br>

                                <label for="">Marks</label>
                                <input type="number" 
                                        id="marks" 
                                        class="form-control" 
                                        placeholder="Eg - 5"
                                        requried><br>

                                <label for="">Option A</label>
                                <input type="text" 
                                        id="choice_a" 
                                        class="form-control"
                                        placeholder="Eg - Four" 
                                        required><br>

                                <label for="">Option B</label>
                                <input type="text" 
                                        id="choice_b" 
                                        class="form-control"
                                        placeholder="Eg - Two" 
                                        required><br>

                                <label for="">Option C</label>
                                <input type="text" 
                                        id="choice_c" 
                                        placeholder="Eg - Zero" 
                                        class="form-control"><br>

                                <label for="">Option D</label>
                                <input type="text" 
                                        id="choice_d"
                                        placeholder="Eg - Eight"  
                                        class="form-control"><br>
                                
                                <label for="">Correct Option</label>
                                <input type="number" 
                                        id="correct_choice"
                                        placeholder="Eg - 2"  
                                        class="form-control"><br>
                                
                                <div class="container my-3">
                                    <div class="col-md-12 text-center">
                                        <button type="button" 
                                                class="btn btn-success"
                                                data-dismiss="modal" 
                                                name="addQuestion"
                                                onclick="addQ()">Submit</button>
                                        <button type="button" 
                                                class="btn btn-danger" 
                                                data-dismiss="modal">Cancel</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Edit Modal -->
            <div id="updateQModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn btn-default text-left" data-dismiss="modal">&times;</button>
                            <h5 class="modal-header">Question Panel</h5>
                        </div>
                
                        <div class="modal-body">
                            <div class="container">
                                <form action="" method="POST">

                                <label for="">Question Statement</label>
                                <input type="text" 
                                        id="update_statement" 
                                        class="form-control"
                                        placeholder="Eg- What is 2 * 2?"
                                        required><br>

                                <label for="">Marks</label>
                                <input type="number" 
                                        id="update_marks" 
                                        class="form-control" 
                                        placeholder="Eg - 5"
                                        requried><br>

                                <label for="">Option A</label>
                                <input type="text" 
                                        id="update_choice_a" 
                                        class="form-control"
                                        placeholder="Eg - Four" 
                                        required><br>

                                <label for="">Option B</label>
                                <input type="text" 
                                        id="update_choice_b" 
                                        class="form-control"
                                        placeholder="Eg - Two" 
                                        required><br>

                                <label for="">Option C</label>
                                <input type="text" 
                                        id="update_choice_c" 
                                        placeholder="Eg - Zero" 
                                        class="form-control"><br>

                                <label for="">Option D</label>
                                <input type="text" 
                                        id="update_choice_d"
                                        placeholder="Eg - Eight"  
                                        class="form-control"><br>
                                
                                <label for="">Correct Option</label>
                                <input type="number" 
                                        id="update_correct_choice"
                                        placeholder="Eg - 2"  
                                        class="form-control"><br>
                                
                                <div class="container my-3">
                                    <div class="col-md-12 text-center">
                                        <button type="button" 
                                                class="btn btn-success"
                                                data-dismiss="modal" 
                                                name="updateQuestion"
                                                onclick="updateQ()">Update</button>
                                        <button type="button" 
                                                class="btn btn-danger" 
                                                data-dismiss="modal">Cancel</button>
                                        <input type="hidden" id="hidden_question_id">
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    

    <script type="text/javascript">

        function readQs(id) {
            const readQ = "readQ";
            $.ajax({
                url: "backend-edit-quest.php",
                type: "post",
                data: {
                    readQ: readQ,
                    id: <?php echo $_GET['id']; ?>
                },
                success: function(data, staus) {
                    $('#questionContent').html(data);
                }
            });
        }

        function addQ() {
            const statement = $('#statement').val();
            const marks = $('#marks').val();
            const choice_a = $('#choice_a').val();
            const choice_b = $('#choice_b').val();
            const choice_c = $('#choice_c').val();
            const choice_d = $('#choice_d').val();
            const correct_choice = $('#correct_choice').val();
            const test_id = <?php echo $id; ?>;
            alert("In");
            $.ajax({
                url: "backend-edit-quest.php",
                type: "post",
                data: {
                    statement: statement,
                    marks: marks,
                    choice_a: choice_a,
                    choice_b: choice_b,
                    choice_c: choice_c,
                    choice_d: choice_d,
                    correct_choice: correct_choice,
                    test_id: test_id
                },
                success: function(data,status) {
                    $('#questionContent').append(data);
                }
            });
        }
            
        function deleteQuestion(deleteid, elem) {
            const conf = confirm("Are you sure you want to delete the question " + deleteid + "?" );

            if(conf==true) {
                $.ajax({
                    url: "backend-edit-quest.php",
                    type: "post",
                    data: {
                        deleteid: deleteid,
                        id: <?php echo $id; ?>
                    },
                    success: function(data, status) {
                        elem.closest('tr.text-center').remove();
                    }
                });
            }
        }

        function getQuestionInfo(id, elem) {
            $('#hidden_question_id').val(id);

            console.log("getinfo " + id);
            $.post(
                "backend-edit-quest.php",
                {
                    id:id
                },
                function(data, status) {
                    const user = JSON.parse(data);
                    $('#update_statement').val(user.statement);
                    $('#update_marks').val(user.marks);
                    $('#update_choice_a').val(user.choice_a);
                    $('#update_choice_b').val(user.choice_b);
                    $('#update_choice_c').val(user.choice_c);
                    $('#update_choice_d').val(user.choice_d);
                    $('#update_correct_choice').val(user.correct_choice);
                    
                }
            );

            $('#updateQModal').modal("show");
        }

        function updateQ() {
            const statement = $('#update_statement').val();
            const marks =  $('#update_marks').val();
            const choice_a = $('#update_choice_a').val();
            const choice_b = $('#update_choice_b').val();
            const choice_c = $('#update_choice_c').val();
            const choice_d = $('#update_choice_d').val();
            const correct_choice = $('#update_correct_choice').val();
            
            const hidden_question_id = $('#hidden_question_id').val();

            console.log(hidden_question_id);
            console.log(marks);
                
            $.post(
                "backend-edit-quest.php",
                {
                    hidden_question_id: hidden_question_id,
                    statement: statement,
                    marks: marks,
                    choice_a: choice_a,
                    choice_b: choice_b,
                    choice_c: choice_c,
                    choice_d: choice_d,
                    correct_choice: correct_choice,
                    id: <?php echo $id; ?>
                    

                },
                function(data, status) {
                    $('#updateQModal').modal("hide");
                    console.log("closed");
                    readQs();
                }

            );
        }

    </script>
</body>
</html>
