<?php
include('auth.php');
include('includes/header.php');

?>

<div class="container-fluid">
    <!-- Page Heading
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <?php include('../message.php') ?>
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div> -->


    <!-- Content Row -->
    <div class="row">
        <?php include('./message.php'); ?>

        <div class="col-md-12 mb-4">
            <div class="card h-100">
                <div class="card-header">
                    <h2>Registered Users
                        <a href="admin-add.php" class="float-end btn" style="background-color: #4c00b8; color: #fff;">Add Admin</a>
                    </h2>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="myDataTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $query = "SELECT * FROM users";
                                $query_run = mysqli_query($con, $query);
                                if (mysqli_num_rows($query_run) > 0) {

                                    foreach ($query_run as $item) {
                                ?>
                                        <tr>
                                            <td> <?= $item['id']; ?> </td>
                                            <td> <?= $item['username']; ?> </td>
                                            <td> <?= $item['email']; ?> </td>
                                            <td>
                                                <?php
                                                if ($item['role_as'] == "1")
                                                    echo "Admin";
                                                else
                                                    echo "User";
                                                ?>
                                            </td>
                                            <td>
                                                <center><a href="edit_registered.php?id=<?= $item['id']; ?> ">
                                                        <i class="fa fa-pen"></i>
                                                    </a></center>
                                            </td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <center><button type="submit" class="btn" name="user_delete" value="<?= $item['id']; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button></center>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>

                                    <tr>
                                        <td colspan="6">No Users Found!</td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->




<?php
include('includes/footer.php');
?>