<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>
<body>
    <?php include("../config/db.php"); 
          include("../templates/categoriesbtn.php");
          session_start();
          if (isset($_POST['Create'])) {
              $title = mysqli_real_escape_string($conn, $_POST['title']);
              $content = mysqli_real_escape_string($conn, $_POST['content']);
              $categoryID = (int)$_POST['category'];
              $authorid = (int)$_SESSION['id'];
              $img = $_FILES['image']['name'];
  
              if ($categoryID == 0) {
                  echo '<script>alert("Please choose a category");</script>';
              } else {
                  $query = "INSERT INTO blog_posts (title, content, image_name, user_id, tag_id) VALUES ('$title', '$content', '$img', '$authorid', '$categoryID')";
                  $result = mysqli_query($conn, $query);
  
                  if ($result) {
                      move_uploaded_file($_FILES['image']['tmp_name'], "../assets/images/$img");
                      header("Location: blog.php");
                      
                  } else {
                      echo '<script>alert("Error! Please try again.");</script>';
                  }
              }
              }
  
    ?>  
    <div class="container d-flex align-items-center justify-content-center flex-column " style = "height:100vh;">
    <h4 class="p-3 mt-1 bg-warning rounded">Create a New Blog Post</h4>
    <form action="" method="POST" enctype="multipart/form-data" class="form d-flex align-items-center flex-column p-4 login-form text-white m-2 rounded" style="width:50%">
        <label for="title" class="form-label">Title:</label>
        <input type="text" id="title" name="title" required class="form-control" max="255">
        
        <label for="content" class="form-label">Content:</label>
        <textarea id="content" name="content" rows="3" required class="form-control"></textarea>
        <label for="categories" class="form-label">Categories</label>

        <div class="d-flex align-items-center justify-content-center flex-wrap">
            <?php 
            $categories = Categories($conn);
            foreach ($categories as $category): ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="category" id="category<?php echo $category['id']; ?>" value="<?php echo $category['id']; ?>">
                    <label class="form-check-label" for="category<?php echo $category['id']; ?>">
                        <?php echo $category['name']; ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
        
        <label for="image" class="form-label">Image:</label>
        <input type="file" id="image" name="image" class="form-control" required>
        <div class="form-text">Please enter a landscape image</div>
        <br>
        <input type="submit" value="Create Post" name="Create" class="form-control w-50">
    </form>
    <center> <button class="btn btn-outline-primary m-2"><a href="blog.php" class="text-decoration-none text-dark  "> Go Back</a></button></center>
         
    </div>
    </body>
    </html>
