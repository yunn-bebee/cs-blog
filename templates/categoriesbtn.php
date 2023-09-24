<?php 
function Categories($conn) {    
    $categories = []; // Initialize an empty array to store categories
    
    // Query to retrieve categories
    $query = "SELECT * FROM tags";
    $result = mysqli_query($conn, $query);

    // Check if there are categories
    if (mysqli_num_rows($result) > 0) {
        // Fetch and add categories to the array
        while ($row = mysqli_fetch_assoc($result)) {
            $categoryId = $row['tag_id'];
            $categoryName = $row['tag_name'];
            
            // Create an associative array for each category
            $category = [
                'id' => $categoryId,
                'name' => $categoryName
            ];

            // Add the category array to the categories array
            $categories[] = $category;
        }
    } else {
        echo "No categories found.";
    }

    // Return the categories array
    return $categories;
}
?>
