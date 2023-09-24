<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php 
        include("../config/db.php");
        include("../templates/header.php");
        include("../templates/plagination.php");
        include("../templates/blog-card.php");
        include("../templates/categoriesbtn.php");
    ?>
     
    <header>


<?php
    if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $name = $_SESSION['user'];
    echo "<h1 class='text-center header-text p-4 text-light'>Profile</h1>";
    echo "<h4 class='text-center header-text p-2 text-light name-tag'>$name</h4>";
            ?>
     </header>
     <div class="blog container-fluid p-3 d-flex flex-wrap align-items-center justify-content-evenly">
            <?php
            // Define the number of records to display per page
            $recordsPerPage = 10;
            
            // Determine the current page number from the URL
            if (isset($_GET['page']) && is_numeric($_GET['page'])) {
                $currentPage = $_GET['page'];
            } else {
                $currentPage = 1; // Default to page 1
            }
            
            // Calculate the offset for the SQL query
            $offset = ($currentPage - 1) * $recordsPerPage;
            
            // Perform a database query to retrieve matching blog posts, including related data
            $sql = "SELECT blog_posts.*, user.username, tags.tag_name FROM blog_posts
                    JOIN user ON blog_posts.user_id = user.user_id
                    JOIN tags ON blog_posts.tag_id = tags.tag_id
                    WHERE blog_posts.user_id = $id
                    ORDER BY date_created DESC
                    LIMIT $recordsPerPage OFFSET $offset";

            $result = mysqli_query($conn, $sql);

            // Display the search results
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    Blogcard($row);
                  }
            } else {
                // No results found
                echo '<p class="alert alert-warning w-75 text-center" role="alert" style="margin:0 auto;">No matching blog posts found.<a href="../pages/blog.php" class="alert-link">Go Back<a><p>';
            }

            // Count the total number of records in the table
            $totalRecordsQuery = "SELECT COUNT(*) AS total FROM blog_posts WHERE user_id = $id";
            $totalRecordsResult = mysqli_query($conn, $totalRecordsQuery);
            $totalRecords = mysqli_fetch_assoc($totalRecordsResult)['total'];
            
            // Calculate the total number of pages
            $totalPages = ceil($totalRecords / $recordsPerPage);

                echo"</div>";
                // Display pagination links
                generatePaginationLinks($currentPage,$totalPages,'profile.php');
                // Close the database connection
                mysqli_close($conn);
                ?>
        </div>
        <?php
    }
        else{
            header("Location:../pages/blog.php");
        }
        ?>
            <center> <button class="btn btn-outline-primary m-2"><a href="blog.php" class="text-decoration-none text-dark  "> Go Back</a></button></center>
      
        </div></body>