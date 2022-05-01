<?php
    if (isset($_SESSION['message'])) {
        $mes = $_SESSION['message'];
        echo "<script>alert('$mes');</script>";
        unset($_SESSION['message']);
    }
?>
