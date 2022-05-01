<?php
include('auth.php');
include('includes/header.php');
?>

<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">
        <?php include('message.php'); ?>
        <div class="col-md-12 mb-4">
            <div class="card h-100 shadow">
                <div class="card-header">
                    <h2>View Category
                        <a href="add_category.php" class="btn float-end" style="background-color: #4c00b8; color: #fff;">Add Category</a>
                    </h2>

                </div>
                <div class="card-body">

                    <?php
                    $category = "SELECT * FROM categories";
                    $category_run = mysqli_query($con, $category);

                    if (mysqli_num_rows($category_run) > 0) {

                        foreach ($category_run as $item) {
                    ?>
                        <?php
                        }
                    } else {
                        ?>

                        <tr>
                            <td colspan="5">No Categories Found!</td>
                        </tr>

                    <?php
                    }
                    ?>

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="myDataTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $category = "SELECT * FROM categories WHERE status!='2'";
                                $category_run = mysqli_query($con, $category);

                                if (mysqli_num_rows($category_run) > 0) {

                                    foreach ($category_run as $item) {
                                ?>
                                        <tr>
                                            <td> <?= $item['id']; ?> </td>
                                            <td> <?= $item['name']; ?> </td>
                                            <td>
                                                <?php
                                                if ($item['status'] == '1') {
                                                    echo "Hidden";
                                                } else {
                                                    echo "Visible";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <center><a href="edit_category.php?id=<?= $item['id']; ?> ">
                                                        <i class="fa fa-pen"></i>
                                                    </a></center>
                                            </td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <center><button type="submit" class="btn" name="category_delete" value="<?= $item['id']; ?>">
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
                                        <td colspan="5">No Categories Found!</td>
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

<?php
include('includes/footer.php');
?>