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
                    <h2>Add Post</h2>
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="category_list">Category List</label>
                                <?php
                                $category = "SELECT * FROM categories WHERE status='0'";
                                $category_run = mysqli_query($con, $category);
                                if (mysqli_num_rows($category_run) > 0) {
                                ?>
                                    <select name="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        <?php
                                        foreach ($category_run as $cat_item) {
                                        ?>
                                            <option value="<?= $cat_item['id'] ?>">
                                                <?= $cat_item['name']; ?>
                                            </option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                <?php
                                } else {
                                ?>
                                    <h4>No Categories Found</h4>
                                <?php
                                }
                                ?>

                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="post_name">Name</label>
                                <input type="text" name="post_name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="post_slug">URL</label>
                                <input type="text" name="post_slug" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="post_description">Description</label>
                                <textarea name="post_description" class="form-control" rows="4" id="summernote"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="keyword">Keyword</label>
                                <textarea name="keyword" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="post_image">Image</label>
                                <input type="file" name="post_image" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status">
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="add_post" class="btn" style="background-color: #4c00b8; color: #fff;">Save Post</button>
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