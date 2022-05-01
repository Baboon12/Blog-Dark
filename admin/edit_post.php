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
                    <h2>Edit Post</h2>
                </div>
                <div class="card-body">
                    <?php
                    if (isset($_GET['id'])) {
                        $post_id = $_GET['id'];
                        $post_query = "SELECT * FROM posts WHERE id='$post_id'";
                        $post_query_run = mysqli_query($con, $post_query);
                        if (mysqli_num_rows($post_query_run) > 0) {
                            $row = mysqli_fetch_array($post_query_run);
                    ?>
                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <input type="hidden" name="post_id" class="form-control" value=" <?= $row['id']; ?> ">
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
                                                    <option value="<?= $cat_item['id'] ?>" <?= $cat_item['id'] == $row['category_id'] ? 'selected' : ''; ?>>
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
                                        <input type="text" name="post_name" class="form-control" value=" <?= $row['name'] ?> ">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="post_slug">URL</label>
                                        <input type="text" name="post_slug" class="form-control" value=" <?= $row['slug'] ?> ">
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="post_description">Description</label>
                                        <textarea name="post_description" id="summernote" class="form-control" rows="4"><?= htmlentities($row['description']) ?></textarea>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control" value=" <?= $row['meta_title'] ?> ">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="meta_description">Meta Description</label>
                                        <textarea name="meta_description" class="form-control" rows="4"><?= $row['meta_description'] ?> </textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="keyword">Keyword</label>
                                        <textarea name="keyword" class="form-control" rows="4"><?= $row['meta_keyword'] ?></textarea>
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="post_image">Image</label>
                                        <input type="hidden" name="old_image" value=" <?= $row['image'] ?> ">
                                        <input type="file" name="post_image" class="form-control" value=" <?= $row['image'] ?> ">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="status">Status</label>
                                        <input type="checkbox" name="status" <?= $row['status'] == '1' ? 'checked' : '' ?>>
                                    </div>

                                    <div class="col-md-12 mb-3">
                                        <button type="submit" name="update_post" class="btn btn-secondary">Update Post</button>
                                    </div>
                                </div>
                            </form>

                        <?php
                        } else {
                        ?>
                            <h2>No Records Found!</h2>
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