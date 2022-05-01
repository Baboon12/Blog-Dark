<?php
    session_start();
    include('config/dbconfig.php');
    if(!isset($_SESSION['auth'])){
        $_SESSION['message'] = "Login to access Dashboard";
        header("Location: ../login.php");
        exit(0);
    } else {
        if($_SESSION['auth_role'] != "1"){
            $_SESSION['message'] = "Login to access to admin only";
            header("Location: ../index.php");
            exit(0);
        }
    }


?>