<?php 
    $host="localhost";
    $username="root";
    $password="";
    $database="blog";

    $conn=mysqli_connect($host,$username,$password,$database,3307);

    if(!$conn){
        echo "mysqli_error($conn)";
    }

?>