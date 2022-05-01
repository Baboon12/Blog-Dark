<?php
include('auth.php');
include('includes/header.php');
?>

<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12 mb-4">
            <div class="card h-100 shadow">
                <div class="card-header">
                    <h2>Add Users</h2>
                </div>
                <div class="card-body">

                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="role">Role</label>
                                <select name="role" class="form-control">
                                    <option value="1">Admin</option>
                                    <option value="0">User</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status">
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="add_user" class="btn" style="background-color: #4c00b8; color: #fff;">Add Admin/User</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>

</div>

<?php
include('includes/footer.php');
?>