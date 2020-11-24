<?php

// For $_SERVER, we need to start the session
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Educator Sign In</title>

    <!-- CSS Styles -->
    <link rel="stylesheet" href="../static/css/form.css">

    <!-- JS Script -->
    <script src="script.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>

</head>

<?php
    require_once "../connection.php";

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $emailSearchQuery = "SELECT * FROM teacher WHERE email = '$email';";
        $query = mysqli_query($con, $emailSearchQuery);

        $emailCount = mysqli_num_rows($query);

        if(!$emailCount || $emailCount == 0) {
            ?>
                <script>
                    alert("Email does not exist.");
                </script>
            <?php
        }
        else {

            // Fetch password from the query executed above
            // Loop through the rows retrieved from the query
            $row = mysqli_fetch_assoc($query);
            $dbpass = $row["password"];
            
            // Verify if the entered password is same as hashed passowrd
            $pass = password_verify($password, $dbpass);

            if($pass) {
                // Password matched
                $dbemail = $row['email'];
                $dbid = $row['teacher_id'];
                $dbname = $row['full_name'];
                
                // Use these variables on any php page as long as session is on
                $_SESSION['id'] = $dbid;
                $_SESSION['name'] = $dbname;

                ?>
                    <script>
                        // Go to dashboard of educator
                        location.replace('../templates/edu-dashboard.php');
                    </script>
                <?php
            }
            else {
                ?>
                    <script>
                        alert("Password does not match.");
                    </script>
                <?php
            }
        }
       
    }
?>
<body>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="con-form">
            <h1><span style = "color: #6555df">EDUCATOR</span> LOGIN</h1>
            <div class="con-inputs">
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
                

                <div class="con-already">
                    <a href="./edu-register.php">
                        Dont have an account? Sign Up
                    </a>
                </div>
            </div>
            <footer>
                <button name="submit"
                        type="submit"
                        class="btn-signin">
                    Login
                </button>
            </footer>
        </div>
    </form>
    
    

</body>
</html>