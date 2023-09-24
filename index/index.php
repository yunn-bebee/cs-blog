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
    include("../templates/blog-card.php"); 
    include("../templates/footer.php");
    if(!isset($_SESSION['id'])){ 
        session_start();
    
        ?>
<header style ="height:100vh;">

<!-- NavBar -->
<nav class="shadow">
    <ul class="nav d-flex align-items-center justify-content-between p-3 h-auto ">
        <li><a href="index.php"><img src="../assets/images/u.png" alt="logo" width = "50px" class="rounded-5"></a></li>
        <li class="d-block" style="height:40px; float:right;">
                    <ul class="list-unstyled profile" >
                            <li><button class='btn btn-secondary' ><a class='text-decoration-none text-white' href='../pages/register.php'><small>Register or Log-in</small></a></button></li>
                    </ul>
                </li>
            </div>        
        </li>
    </ul>
</nav>
        <section class="d-flex align-items-center justify-content-center text-light hero " style="height:80vh;">
           <div class="p-5 p d-flex align-items-center justify-content-center flex-column rounded"> <h1>Welcome to our Blog Website</h1>
            <button class="btn btn-cst"><a href="../pages/login.php" class="text-decoration-none ">Start Creating</a></button>
            </div>
        </section> 
</header>
<h1 class="text-center text-white">Photo Uploads</h2>
    <section class="slideshow">
        
        <div class="imgg">
            <img src="../assets/images/1.png" alt="">
            <img src="../assets/images/2.jpg" alt="">
            <img src="../assets/images/4 (Large).jpg" alt="">
            <img src="../assets/images/among-us-space-galaxy-4k-wallpaper-11625096754vqrawbaris.jpg" alt="">
                    
        </div>
     </section>
     <section class="blog d-flex flex-wrap align-items-center justify-content-around container w-75 ">
        <h1 class="text-white text-center" style="width:80%;">Latest Blog</h1>
        <?php 
          $query = "SELECT blog_posts.*, user.username, tags.tag_name FROM blog_posts 
          JOIN user ON blog_posts.user_id = user.user_id
          JOIN tags ON blog_posts.tag_id = tags.tag_id
          ORDER BY date_created DESC
          LIMIT 8";
      
          
          $result = mysqli_query($conn, $query);
          
          // Display the records
          while ($row = mysqli_fetch_assoc($result)){
                  Blogcard($row);
          }
                  ?> 
        
       <div style="width:100%" class="d-flex align-items-center justify-content-center"> <button class="btn btn-warning "onclick="signin()"><a href="../pages/register.php" class="text-decoration-none">View More</a></button>
        </div>
     </section>
     <section class="blog d-flex flex-wrap align-items-center justify-content-around flex-column container w-75 text-white my-5 about rounded" style="height:50vh">
        <h1>About Us</h1>
        <p>Welcome to Computer Science Hub! We're your trusted source for all things computer science and technology. Our mission is to provide valuable insights, tutorials, and updates to tech enthusiasts and learners worldwide</p>
        <p>At Computer Science Hub, we're passionate about the endless possibilities that technology offers. Our team of experts is dedicated to delivering high-quality content that empowers you to explore the ever-evolving world of computer science</p>
        <p>Join us on this exciting journey as we uncover the latest trends, share knowledge, and build a thriving tech community. Together, we're shaping the future of technology</p>
     </section>
    <script>
        function signin() {
            alert('Sign up or Login to View More');
        }
    </script>
    <?php }
    else{
        header("Location:../pages/blog.php");
    }
   ?>
</body>
</html>