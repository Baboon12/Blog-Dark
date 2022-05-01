<?php
session_start();
include('admin/config/dbconfig.php');


if (isset($_POST['submit'])) {

    // to avoid sql injections use mysqli_real_escape_string();

    $username = mysqli_real_escape_string($con, $_POST['username']);

    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $password2 = mysqli_real_escape_string($con, $_POST['password2']);

    if ($password == $password2) {
        // Check if mail exists
        $check_email = "SELECT * FROM users WHERE email='$email'";
        $check_email_run = mysqli_query($con, $check_email);

        if (mysqli_num_rows($check_email_run) > 0) {
            // Already Exists
            $_SESSION['message'] = "Email Already Exists";
            header("Location:register.php");
            exit(0);
        } else {
            $user_query = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
            $user_query_run = mysqli_query($con, $user_query);
            // if query is sucessful
            if ($user_query_run) {
                $_SESSION['message'] = "Register Successfully";
                header("Location:login.php");
                exit(0);
            } else {
                $_SESSION['message'] = "Something Went Wrong";
                header("Location:register.php");
                exit(0);
            }
        }
    } else {
        $_SESSION['message'] = "Passwords do not match";
        header("Location:register.php");
        exit(0);
    }
} else {
    header("Location: register.php");
    exit(0);
}
