<?php
$page_title = "Login";
$meta_description = "Blogging Website";
$meta_keyword = "WPL mini project";

include('./includes/header.php');
if (isset($_SESSION['auth'])) {

    if (!isset($_SESSION['message'])) {
        $_SESSION['message'] = "Already Logged In";
    }
    header("Location: index.php");
    exit(0);
}

?>
<link rel="stylesheet" href="assets/css/custom.css">

<center>
    <div class="test">
        <?php include('message.php'); ?>
    </div>
</center>

<div class="parent_container">
    <div class="container">
        <div class="header">
            <h2>Login</h2>
        </div>
        <form action="logincode.php" class="form" id="form" method="post">
            <div class="form-control">
                <label for="fullname">Username</label>
                <input type="text" placeholder="John Doe" id="username" name="username" autocomplete="off" />
                <i class="uis uis-check-circle"></i>
                <i class="uis uis-exclamation-circle"></i>
                <small>Error Message</small>
            </div>

            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="password" autocomplete="off" name="password" />
                <i class="uis uis-check-circle"></i>
                <i class="uis uis-exclamation-circle"></i>
                <small>Error Message</small>
            </div>

            <div class="form-control">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>

            <button type="reset" class="secondary_btn">Cancel</button>
            <button type="submit" class="primary_btn" name="submit">Submit</button>
            <a href="register.php" id="forgot_pass">New User?</a>
            <!-- <a href="username.php" id="forgot_pass">Forgot Password?</a> -->
        </form>
    </div>
</div>


<script>
    const form = document.querySelector('.form');
    const username = document.querySelector('#username');
    const password = document.querySelector('#password');

    const test = () => {
        const usernamevalue = username.value.trim();
        const passwordvalue = password.value.trim();
        
        //custom validation
        if (usernamevalue === '') {
            alert('Username Is Mandatory');
            return false;
        } else if (passwordvalue === '') {
            alert('Password is Mandatory');
            return false;
        } else {
            alert('Login Successful');
            return true;
        }
    }


    const isEmail = (email) => {
        const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(email);
    }
 </script>


<?php
include('./includes/scripts.php');
?>