
<?php
function Blogcard($row) { 
    echo '<a href="view_blog.php?id=' . $row['post_id'] . '" class="card blog-card text-decoration-none">';
    echo '<img src="../assets/images/' . $row['image_name'] . '" alt="img" class="card-img-top img" >';
    echo '<div class="card-body">';
    echo '<h5 class="card-title text-center">' . $row['title'] . '</h5>';
    echo '<p class="card-text">' . $row['content'].'</p>';
    echo '<small><strong>' . $row['username'] . ' </strong> </small>';
    echo '<small class="rounded-pill pill p-1">' . $row['tag_name'] . '</small><br>';
    echo '<small>' . $row['date_created'] . '</small>';
    echo '</div>';
    echo '</a>';
}
