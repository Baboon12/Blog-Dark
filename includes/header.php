<?php
session_start();
include('admin/config/dbconfig.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <title>Bloggy</title> -->
    <title>
        <?php if (isset($page_title)) {
            echo "$page_title";
        } else {
            echo "Bloggy";
        }  ?>
    </title>
    <meta name="description" content="<?php if (isset($meta_description)) {
                                            echo "$meta_description";
                                        } else {
                                            echo "Bloggy";
                                        }  ?>">
    <meta name="keywords" content="<?php if (isset($meta_keyword)) {
                                        echo "$meta_keyword";
                                    } else {
                                        echo "Bloggy";
                                    }  ?>">
    <meta name="author" content="Bhavya">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/sticky-footer.css">
    <link rel="shortcut icon" href="assets/icon.png" type="image/x-icon">
</head>

<body class="bg-dark">