<?php
$page_title = "Register";
$meta_description = "Blogging Website";
$meta_keyword = "WPL mini project";
include('./includes/header.php');
if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "Already Logged In";
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
            <h2>Create Account</h2>
        </div>
        <form action="registercode.php" method="POST" class="form" id="form" onsubmit="return test()">
            <div class="form-control">
                <label for="username">Username</label>
                <input type="text" placeholder="John Doe" id="username" name="username" autocomplete="off" />
                <i class="uis uis-check-circle"></i>
                <i class="uis uis-exclamation-circle"></i>
                <small>Error Message</small>
            </div>

            <div class="form-control">
                <label for="email">Email</label>
                <input type="email" placeholder="johndoe@mail.com" id="email" name="email" autocomplete="off" />
                <i class="uis uis-check-circle"></i>
                <i class="uis uis-exclamation-circle"></i>
                <small>Error Message</small>
            </div>

            <div class="form-control">
                <label for="password">Password</label>
                <input type="password" placeholder="Password" id="password" name="password" autocomplete="off" />
                <i class="uis uis-check-circle"></i>
                <i class="uis uis-exclamation-circle"></i>
                <small>Error Message</small>
            </div>

            <div class="form-control">
                <label for="password2">Check Password</label>
                <input type="password" placeholder="Check Password" id="password2" name="password2" autocomplete="off" />
                <i class="uis uis-check-circle"></i>
                <i class="uis uis-exclamation-circle"></i>
                <small>Error Message</small>
            </div>
            <button type="reset" class="secondary_btn">Cancel</button>
            <button type="submit" name="submit" class="primary_btn">Submit</button>
            <a href="login.php" id="forgot_pass">Login?</a>
        </form>
    </div>
</div>

<script>
    const form = document.querySelector('.form');
    const username = document.querySelector('#username');
    const email = document.querySelector('#email');
    const password = document.querySelector('#password');
    const password2 = document.querySelector('#password2');

    const test = () => {
        const usernamevalue = username.value.trim();
        const emailvalue = email.value.trim();
        const passwordvalue = password.value.trim();
        const password2value = password2.value.trim();

        //custom validation
        if (usernamevalue === '') {
            alert('Username Is Mandatory');
            return false;
        } else if (emailvalue === '') {
            alert('Email Cannot be Blank');
            return false;
        } else if (!isEmail(emailvalue)) {
            alert('Please Enter a valid email');
            return false;
        } else if (passwordvalue === '') {
            alert('Password is Mandatory');
            return false;
        } else if (passwordvalue.length < 8) {
            alert('Password Length Should be Atleast 8 Characters Long!');
            return false;
        } else if (password2value === '') {
            alert('Password Confirmation is Mandatory');
            return false;
        } else if (password2value !== passwordvalue) {
            alert('Passwords Not Matching');
            return false;
        } else {
            alert('Registration Successful');
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