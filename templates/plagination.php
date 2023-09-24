<?php
function generatePaginationLinks($currentPage, $totalPages, $baseURL) {
    echo "<div class='d-flex align-items-center justify-content-center'>";
    echo '<ul class="pagination ">';
    
    if ($currentPage > 1) {
        $prevPage = $currentPage - 1;
        echo "<li class='page-item '><a href='$baseURL?page=$prevPage' class='page-link p text-light'>Previous Page</a></li> ";
    }
    
    for ($i = 1; $i <= $totalPages; $i++) { 
        echo "<li class='page-item '><a href='$baseURL?page=$i' class='page-link p text-light'>$i</a></li>";
    }
    
    if ($currentPage < $totalPages) {
        $nextPage = $currentPage + 1;
        echo "<li class='page-item '><a href='$baseURL?page=$nextPage' class='page-link p text-light'>Next Page</a></li>";
    }

    echo '</ul> </div>';
}

function generatePaginationLinksWithCategory($currentPage, $totalPages, $pageUrl, $categoryId, $categoryName) {
   
    echo "<div class='d-flex align-items-center justify-content-center'>";
    echo '<ul class="pagination ">';
    
    if ($currentPage > 1) {
        $prevPage = $currentPage - 1;
        echo "<li class='page-item'><a href='$pageUrl?page=$prevPage&id=$categoryId&name=$categoryName' class='page-link p text-light'>Previous Page</a></li>";

    }
    for ($i = 1; $i <= $totalPages; $i++) { 
        echo " <li class='page-item'><a href='$pageUrl?page=$i&id=$categoryId&name=$categoryName' class='page-link p text-light'>$i</a><li>";
    }

    if ($currentPage < $totalPages) {
        $nextPage = $currentPage + 1;
        echo "<li class='page-item'><a href='$pageUrl?page=$nextPage&id=$categoryId&name=$categoryName'class='page-link p text-light' >Next Page</a></li>";
    }
    echo '</ul> </div>';
}

?>

