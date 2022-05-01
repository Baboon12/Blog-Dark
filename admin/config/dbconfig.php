<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "bloggy";
    $con = mysqli_connect("$host", "$username", "$password", "$database");
    
    // if connection fails
    if(!$con){
        // moving errors folder outside admin, so the url does not appear as localhost/bloggy/admin
        header("Location: ../errors/dberror.php"); 
        die(); 
    }
?>