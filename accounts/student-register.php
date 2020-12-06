<?php

// For $_SERVER, we need to start the session
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Sign Up</title>

    <!-- CSS Styles -->
    <link rel="stylesheet" href="../static/css/form.css">
    <link rel="stylesheet" href="../static/css/navbar.css">

    <!-- JS Script -->
    <script src="script.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

</head>

<?php
    include "../connection.php";
    include "../templates/navbar.php";

    if(isset($_POST['submit'])) {

        // Data filled by the user
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $email = $_POST['email'];
        $number = $_POST['number'];

    
        // Hashing the passwords
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        // Checking for duplicate emails
        $emailQuery = "SELECT * FROM student WHERE email = '$email';";
        $query = mysqli_query($con, $emailQuery);
        $emailCount = mysqli_num_rows($query);

        // if(!$emailCount) {
        //     die(mysqli_error($con));
        // }

        if(!$emailCount || $emailCount == 0) {
            // Checking if password and confirm password are same
            if($password != $cpassword) {
                ?>
                        <script>
                            alert("Passwords do not match.");
                        </script>
                    <?php
            }
            else {
                // Enter data in database
                $insertQuery = "INSERT INTO student (email, full_name, password, cpassword, contact_no) VALUES ('$email', '$username', '$pass', '$cpass', '$number');";

                if(mysqli_query($con, $insertQuery)) {
                    ?>
                        <script>
                            alert("Inserted successfully!");
                        </script>
                    <?php
                }
                else {
                    ?>
                        <script>
                            alert("Error in inserting!");
                        </script>
                    <?php
                }
            }
        }
        else {
            ?>
                <script>
                    alert("Email already used.");
                </script>
            <?php
        }
    }
?>
<body>
    <br>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="con-form">
            <h1><span style = "color: #6555df; font-weight:700;">Student</span> <span style="font-weight:400;">SignUp</span></h1>
            <div class="con-inputs">
                <div class="con-input">
                    <label for="name">
                        Name
                    </label>
                    <input id="name" 
                            type="text" 
                            placeholder="John Doe" 
                            name="username"
                            required>
                </div>
                <div class="con-input">
                    <label for="email">
                        Email
                    </label>
                    <input id="email"
                            type="text" 
                            placeholder="example@gmail.com" 
                            name="email"
                            required>
                </div>
                <div class="con-input">
                    <label for="password">
                        Password
                    </label>
                    <div class="con-input__password con-input__input">
                        <input id="password" 
                                type="password" 
                                placeholder="Enter your password" 
                                class="password"
                                name="password"
                                required>
                    </div>
                </div>
                <div class="con-input">
                    <label for="password">
                        Confirm Password
                    </label>
                    <div class="con-input__password con-input__input">
                        <input id="password" 
                                type="password" 
                                placeholder="Re-enter your password" 
                                class="password"
                                name="cpassword"
                                required>
                    </div>
                </div>
                <div class="con-input">
                    <label for="number">
                        Contact Number
                    </label>
                    <input type="number"
                            id="name" 
                            placeholder="Enter 10-digit contact number"
                            name="number">
                </div>

                <div class="con-already">
                    <a href="./student-login.php">
                        Already have an account? Log in
                    </a>
                </div>
            </div>
            <footer>
                <button name="submit"
                        type="submit"
                        class="btn-signin">
                    Sign Up
                </button>
            </footer>
        </div>
    </form>
    
    

</body>
</html>