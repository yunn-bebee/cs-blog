<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Log in</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">     
</head>
    <body style="height:100vh;">
        <div class="container w-100 h-100 d-flex align-items-center justify-content-center text-center " style ="height:100vh;">
        <form action="login.php" method="Post" class="p-5 login-form rounded text-white">
            <div class="form-group">
           <h6>Username</h6>
        <input type="text" class="form-control my-2" name="txtname" id="" placeholder="Enter Username"><br>
          <h6>Password</h6>  
        <input type="password" class="form-control my-2 " name="txtpassword" id="" placeholder="Enter Password">
        <br>
        <input type="submit" value="Login" class="btn btn-dark" name="submit"><br>
        <small class="text-white">Don't have an account? <a href="register.php" class="text-white text-bold">Register</a></small>
    </form></div>
    
<?php

        include("../config/db.php");
        if(isset($_POST['submit'])){
                session_start();
                $uname = $_POST['txtname'];
                $pwd = md5($_POST['txtpassword']);
                $sql = "SELECT * FROM user WHERE username='$uname' AND password='$pwd'";
                $result = mysqli_query($conn, $sql);
                $row = mysqli_num_rows($result);
                $data= mysqli_fetch_array($result);
                if($row!=0){
                if($data['status'] == 0){
                    header("Location:admin/admin-view.php");
                    
                }
                else{
                    $_SESSION['id'] = $data['user_id'];
                    $_SESSION['user']=$data['username'];
                    header("Location:blog.php");
                    
                }
                    
                }
                else{
                   ?>
                 <script>
                
                <?php echo "alert('Username and Password do not match')";
                 ?>
                </script>
                <?php }
                
                    // Close the database connection
                    mysqli_close($conn);
            } 

    ?>
          <center> <button class="btn btn-outline-primary m-2"><a href="blog.php" class="text-decoration-none text-dark  "> Go Back</a></button></center>
         
    </body>
</html>
