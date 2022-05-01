<?php

session_start();
include('admin/config/dbconfig.php');

if (isset($_POST['submit'])) {

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $password = mysqli_real_escape_string($con, $_POST['password']);

    $login_query = "SELECT * FROM users WHERE username='$username' AND password='$password' LIMIT 1";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        foreach ($login_query_run as $data) {
            $user_id = $data['id'];
            $user_name = $data['username'];
            $user_role = $data['role_as'];
            $myusername = $data['username'];
            $mypass = $data['pass'];
        }

        if ($username == $myusername and $password == $mypass) {
            if (isset($_POST['remember'])) {
                setcookie('username', $username, time() + 60 * 60 * 5);
                setcookie('password', $password, time() + 60 * 60 * 5);
            }
        }

        $_SESSION['auth'] = true; // login successful

        $_SESSION['auth_role'] = "$user_role"; // 1= admin, 0=user

        // Storing authenticated user data in array
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
        ];

        if ($_SESSION['auth_role'] == 1) {
            // $_SESSION['message'] = "Welcome to Dashboard Admin";
            header("Location: ./admin/index.php");
            exit(0);
        } elseif ($_SESSION['auth_role'] == 0) {
            $_SESSION['message'] = "You are logged in";
            header("Location: index.php");
            exit(0);
        }
    } else {
        $_SESSION['message'] = "Invalid Email or Password!";
        header("Location: login.php");
        exit(0);
    }
} else {
    $_SESSION['message'] = "Unauthorized Access!";
    header("Location: login.php");
    exit(0);
}
