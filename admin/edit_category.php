<?php
include('auth.php');
include('includes/header.php');
?>

<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12 mb-4">
            <div class="card h-100 shadow">
                <?php include('message.php'); ?>
                <div class="card-header">
                    <h2>Edit Category</h2>
                </div>
                <div class="card-body">

                    <?php
                    if (isset($_GET['id'])) {
                        $cat_id = $_GET['id'];
                        $edit_category = "SELECT * FROM categories WHERE id='$cat_id' LIMIT 1";
                        $edit_category_run = mysqli_query($con, $edit_category);
                        if (mysqli_num_rows($edit_category_run) > 0) {
                            $row = mysqli_fetch_array($edit_category_run);
                    ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" value="<?= $row['id'] ?>" name="category_id">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="category_name">Name</label>
                                        <input type="text" name="category_name" class="form-control" value="<?= $row['name'] ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="category_slug">URL</label>
                                        <input type="text" name="category_slug" class="form-control" value="<?= $row['slug'] ?>">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="category_description">Description</label>
                                        <textarea name="category_description" class="form-control" rows="4"><?= $row['description'] ?></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" value="<?= $row['meta_title'] ?>">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="4"><?= $row['meta_description'] ?></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="keyword">Keyword</label>
                                        <textarea name="keyword" class="form-control" rows="4"><?= $row['keyword'] ?></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="navbar_status">Navbar Status</label>
                                        <input type="checkbox" name="navbar_status" <?= $row['navbar_status'] == '1' ? 'checked' : '' ?>>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="status">Status</label>
                                        <input type="checkbox" name="status" <?= $row['status'] == '1' ? 'checked' : '' ?>>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="edit_category" class="btn btn-secondary">Update Category</button>
                                    </div>
                                </div>
                            </form>

                        <?php
                        } else {
                        ?>
                            <h4>No Records Found</h4>
                    <?php
                        }
                    }
                    ?>



                </div>
            </div>
        </div>

    </div>

</div>

<?php
include('includes/footer.php');
?>