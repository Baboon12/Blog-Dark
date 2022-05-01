<?php
session_start();
include('auth.php');
include('includes/header.php');

?>

<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <?php include('../message.php') ?>
        <h1 class="h3 mb-0 text-white">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Posts</div>
                            <?php
                            $dashboard_post_query = "SELECT * FROM  posts";
                            $dashboard_post_query_run = mysqli_query($con, $dashboard_post_query);
                            if ($post_total = mysqli_num_rows($dashboard_post_query_run)) {
                                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>$post_total</div>";
                            } else {
                                echo '<div class="h5 mb-0 font-weight-bold text-gray-800">No Data</div>';
                            }
                            ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-blog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Total Categories</div>
                            <?php
                            $dashboard_category_query = "SELECT * FROM  categories";
                            $dashboard_category_query_run = mysqli_query($con, $dashboard_category_query);
                            if ($category_total = mysqli_num_rows($dashboard_category_query_run)) {
                                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>$category_total</div>";
                            } else {
                                echo '<div class="h5 mb-0 font-weight-bold text-gray-800">No Data</div>';
                            }
                            ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Users
                            </div>
                            <?php
                            $dashboard_user_query = "SELECT * FROM  users";
                            $dashboard_user_query_run = mysqli_query($con, $dashboard_user_query);
                            if ($user_total = mysqli_num_rows($dashboard_user_query_run)) {
                                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>$user_total</div>";
                            } else {
                                echo '<div class="h5 mb-0 font-weight-bold text-gray-800">No Data</div>';
                            }
                            ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Blocked Users</div>
                            <?php
                            $dashboard_user_query = "SELECT * FROM  users WHERE status='1'";
                            $dashboard_user_query_run = mysqli_query($con, $dashboard_user_query);
                            if ($user_total = mysqli_num_rows($dashboard_user_query_run)) {
                                echo "<div class='h5 mb-0 font-weight-bold text-gray-800'>$user_total</div>";
                            } else {
                                echo '<div class="h5 mb-0 font-weight-bold text-gray-800">No Data</div>';
                            }
                            ?>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users-slash fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- 
    <div class="row">

        <div class="col-lg-6 mb-4">

            <div class="row">
                <div class="col-lg-6 mb-4">
                    <div class="card bg-primary text-white shadow">
                        <div class="card-body">
                            Primary
                            <div class="text-white-50 small">#4e73df</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-success text-white shadow">
                        <div class="card-body">
                            Success
                            <div class="text-white-50 small">#1cc88a</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-info text-white shadow">
                        <div class="card-body">
                            Info
                            <div class="text-white-50 small">#36b9cc</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-warning text-white shadow">
                        <div class="card-body">
                            Warning
                            <div class="text-white-50 small">#f6c23e</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-danger text-white shadow">
                        <div class="card-body">
                            Danger
                            <div class="text-white-50 small">#e74a3b</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-secondary text-white shadow">
                        <div class="card-body">
                            Secondary
                            <div class="text-white-50 small">#858796</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-light text-black shadow">
                        <div class="card-body">
                            Light
                            <div class="text-black-50 small">#f8f9fc</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-4">
                    <div class="card bg-dark text-white shadow">
                        <div class="card-body">
                            Dark
                            <div class="text-white-50 small">#5a5c69</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </div> -->

</div>
<!-- /.container-fluid -->




<?php
include('includes/footer.php');
?>