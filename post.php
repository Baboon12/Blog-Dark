<?php
session_start();
include('admin/config/dbconfig.php');

if (isset($_GET['title'])) {
    $slug = mysqli_real_escape_string($con, $_GET['title']);
    $post_query = "SELECT * FROM posts WHERE slug='$slug'";
    $post_query_run = mysqli_query($con, $post_query);
    if (mysqli_num_rows($post_query_run) > 0) {
        $post_item = mysqli_fetch_array($post_query_run);
        $page_title = $post_item['meta_title'];
        $meta_description = $post_item['meta_description'];
        $meta_keyword = $post_item['meta_keyword'];
    } else {
        $page_title = "Post Page";
        $meta_description = "Blogging Website";
        $meta_keyword = "WPL mini project";
    }
} else {
    $page_title = "Post Page";
    $meta_description = "Blogging Website";
    $meta_keyword = "WPL mini project";
}
include('./includes/header.php');
include('./includes/navbar.php');

?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (isset($_GET['title'])) {
                    $slug = mysqli_real_escape_string($con, $_GET['title']);
                    $post_query = "SELECT * FROM posts WHERE slug='$slug'";
                    $post_query_run = mysqli_query($con, $post_query);
                    if (mysqli_num_rows($post_query_run) > 0) {
                        foreach ($post_query_run as $post_item) {
                ?>
                            <a href="post.php?title=<?= $post_item['slug'] ?>" class="text-decoration-none">
                                <div class="card shadow-sm mb-2">
                                    <div class="card-header bg-light">
                                        <h3 style="color: #6a00ff;"><?= $post_item['name'] ?></h3>
                                    </div>
                                    <div class="card-body">
                                        <label for="" class="text-dark me-2">Posted On: <?= date('d-M-Y', strtotime($post_item['created_at'])) ?></label>
                                        <hr class="bg-dark">
                                        <?php
                                        if ($post_item['image'] != NULL) : ?>
                                            <img src="uploads/posts/<?= $post_item['image'] ?>" alt="<?= $post_item['name'] ?>" class="w-10" width="20%">
                                        <?php endif; ?>
                                        <div class="desc text-black">
                                            <?= $post_item['description'] ?>
                                        </div>
                                    </div>



                                </div>

                            </a>
                    <?php

                        }
                    }
                } else {
                    ?>
                    <h4>No Such Post Found</h4>
                <?php
                }

                ?>
            </div>
        </div>
    </div>
</div>

<?php
include('./includes/footer.php');
?>