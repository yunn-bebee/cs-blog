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
    <div class="d-flex align-items-center justify-content-center m-3 text-center text-light">
        <div>
            <h1>Categories</h1> 
        <div> 
            <?php 
            $categories = Categories($conn);
            foreach ($categories as $category): ?>
                <a href='category.php?id=<?=$category['id']?>&name=<?=$category['name']?>' class='btn btn-primary m-2'><?=$category['name']?></a>
            <?php endforeach;?>
    </div>
    </div>
    </div>

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

    $query = "SELECT blog_posts.*, user.username, tags.tag_name FROM blog_posts 
    JOIN user ON blog_posts.user_id = user.user_id
    JOIN tags ON blog_posts.tag_id = tags.tag_id
    ORDER BY date_created DESC
    LIMIT $recordsPerPage OFFSET $offset";

    
    $result = mysqli_query($conn, $query);
    
    // Display the records
    while ($row = mysqli_fetch_assoc($result)){
            Blogcard($row);
    }
            ?>  
    </div>
    <?php   
        // Count the total number of records in the table
        $totalRecordsQuery = "SELECT COUNT(*) AS total FROM blog_posts ";
        $totalRecordsResult = mysqli_query($conn, $totalRecordsQuery);
        $totalRecords = mysqli_fetch_assoc($totalRecordsResult)['total'];
        
        // Calculate the total number of pages
        $totalPages = ceil($totalRecords / $recordsPerPage);
     
    // Display pagination links
    generatePaginationLinks($currentPage, $totalPages, 'blog.php');
?>

</body>
</html>