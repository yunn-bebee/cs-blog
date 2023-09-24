<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Registration</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body style="height:100vh;">
    <div class="container w-100 h-100 d-flex align-items-center justify-content-center text-center text-white" style="height:100vh;">
        <form action="register.php" method="POST" class="p-5 login-form rounded">
            <div class="form-group">
                <h6>Email</h6>
                <input type="email" class="form-control my-2" name="txtemail" id="" placeholder="Enter Email" required>

                <h6>Username</h6>
                <input type="text" class="form-control my-2" name="txtuname" id="" placeholder="Enter Username" required>
                <br>

                <h6>Password</h6>
                <input type="password" class="form-control my-2" name="txtpwd" id="" placeholder="Enter Password" required>
                <br>
                
                <input type="submit" value="Register" class="btn btn-dark" name="Register">
              
            </div>
            <?php if (isset($registrationSuccess) && $registrationSuccess) { ?>
                <div class="alert alert-success" role="alert">
                    Registration successful! You can now <a href="login.php">Log in</a>.
                </div>
            <?php } ?>
            <br>
            <small class="text-white">Already have an account? <a href="login.php" class="text-white text-bold">Log in</a></small>
        </form>
    </div>
</body>
</html>
<?php
    // Include the database configuration file
    include('../config/db.php'); 

    if(isset($_POST["Register"])){
       
            // Get the username and password from the form
            $uname=$_POST["txtuname"];
            $pwd=md5($_POST["txtpwd"]);
            $email = $_POST["txtemail"];
            // Create an SQL query to insert the user data into the database
            $sql="insert into user(username,password,email,status) values('$uname','$pwd','$email',1)";
            // Execute the query
            $result = mysqli_query($conn, $sql);

            if (!$result) {
                // Query execution failed, handle the error
                $error = mysqli_error($conn);
                // You can log the error or display it to the user for debugging
                echo "Error: " . $error;
            } else {
                // Query executed successfully, redirect to login.php
                header("location:login.php");
                $registrationSuccess=true;
                 // Close the database connection
                mysqli_close($conn);
            }
        
        }
    ?>