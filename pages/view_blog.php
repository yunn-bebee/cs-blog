<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Blog Post</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <style>
        .blog-card {
            width:70% !important;
            margin:auto !important;
        }
    </style>
</head>

<body>
<?php 
    include("../config/db.php");
    include("../templates/header.php");
    include("../templates/blog-card.php");
    include("../templates/footer.php");
    
   ?>
        <div class="container align-items-center justify-content-center m-auto mt-4 flex-column">
            <?php


            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $blogId = $_GET['id'];

                $query = "SELECT blog_posts.*, user.username, tags.tag_name FROM blog_posts 
                JOIN user ON blog_posts.user_id = user.user_id
                JOIN tags ON blog_posts.tag_id = tags.tag_id  WHERE post_id = $blogId";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['view_blog']= true;
                    Blogcard($row);
                   
                } else {
                    echo "<p class='alert alert-danger'>Blog post not found.<a href='../pages/blog.php' class='alert-link'>Go Back<a></p>";
                }
            } else {
                echo "<p class='alert alert-danger'>Invalid request.<a href='../pages/blog.php' class='alert-link'>Go Back<a></p>";
            }

            mysqli_close($conn);
            ?>

       
           <center> <button class="btn btn-outline-primary m-2"><a href="blog.php" class="text-decoration-none text-dark  "> Go Back</a></button></center>
            </div>

</body>
</html>
