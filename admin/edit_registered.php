<?php
session_start();
include('auth.php');
include('includes/header.php');

?>

<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12 mb-4">
            <div class="card h-100 shadow">
                <div class="card-header">
                    <h2>Edit Users</h2>
                </div>
                <div class="card-body">

                    <?php
                    if (isset($_GET['id'])) {
                        $user_id = $_GET['id'];
                        $users = "SELECT * FROM users WHERE id='$user_id'";
                        $users_run = mysqli_query($con, $users);
                        if (mysqli_num_rows($users_run) > 0) {

                            foreach ($users_run as $user) {
                    ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="user_id" value=" <?= $user['id'] ?> ">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="username">UserName</label>
                                            <input type="text" name="username" class="form-control" value="<?= $user['username']; ?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email">Email</label>
                                            <input type="email" name="email" class="form-control" value="<?= $user['email'];?>">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="password">password</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="role">Role</label>
                                            <select name="role" class="form-control">
                                                <option value="1" <?=  $user['role_as']=='1'? 'selected':''; ?> >Admin</option>
                                                <option value="0" <?=  $user['role_as']=='0'? 'selected':''; ?>>User</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="status">Status</label>
                                            <input type="checkbox" name="status" <?=  $user['status']=='1'? 'checked':''; ?>> 
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <button type="submit" name="update" class="btn btn-secondary">Update User</button>
                                        </div>
                                    </div>
                                </form>

                            <?php
                            }
                        } else {
                            ?>
                            <h4>No Record Found</h4>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- /.container-fluid -->




<?php
include('includes/footer.php');
?>