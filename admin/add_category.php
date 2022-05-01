<?php
include('auth.php');
include('includes/header.php');
?>

<div class="container-fluid">

    <!-- Content Row -->
    <div class="row">

        <div class="col-md-12 mb-4">
            <div class="card h-100 shadow">
                <?php  include('message.php'); ?>
                <div class="card-header">
                    <h2>Add Category</h2>
                </div>
                <div class="card-body">

                    <form action="code.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="category_name">Name</label>
                                <input type="text" name="category_name" class="form-control">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="category_slug">URL</label>
                                <input type="text" name="category_slug" class="form-control">
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="category_description">Description</label>
                                <textarea name="category_description" class="form-control" rows="4"></textarea>
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
                                <label for="navbar_status">Navbar Status</label>
                                <input type="checkbox" name="navbar_status">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status">Status</label>
                                <input type="checkbox" name="status">
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <button type="submit" name="add_category" class="btn" style="background-color: #4c00b8; color: #fff;">Save Category</button>
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