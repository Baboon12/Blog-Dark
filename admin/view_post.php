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
                    <h2>View Post
                        <a href="add_post.php" class="btn float-end" style="background-color: #4c00b8; color: #fff;">Add Post</a>
                    </h2>
                </div>
                <div class="card-body">

                    <?php
                    $post = "SELECT * FROM posts";
                    $post_run = mysqli_query($con, $post);

                    if (mysqli_num_rows($post_run) > 0) {

                        foreach ($post_run as $item) {
                    ?>
                        <?php
                        }
                    } else {
                        ?>

                        <tr>
                            <td colspan="6">No Posts Found!</td>
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
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                // $post = "SELECT * FROM posts WHERE status!='2'";
                                $post = "SELECT p.*, c.name AS category_name FROM posts p, categories c WHERE c.id = p.category_id";
                                $post_run = mysqli_query($con, $post);

                                if (mysqli_num_rows($post_run) > 0) {

                                    foreach ($post_run as $item) {
                                ?>
                                        <tr>
                                            <td> <?= $item['id']; ?> </td>
                                            <td> <?= $item['name']; ?> </td>
                                            <td> <?= $item['category_name']; ?> </td>
                                            <td> <img src="../uploads/posts/<?= $item['image']; ?>" width="60px" height="60px"> </td>
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
                                                <center><a href="edit_post.php?id=<?= $item['id']; ?> ">
                                                        <i class="fa fa-pen"></i>
                                                    </a></center>
                                            </td>
                                            <td>
                                                <form action="code.php" method="POST">
                                                    <center>
                                                        <button type="submit" class="btn" name="post_delete" value="<?= $item['id']; ?>">
                                                            <i class="fa fa-trash"></i>
                                                        </button> 
                                                    </center>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                } else {
                                    ?>

                                    <tr>
                                        <td colspan="6">No Posts Found!</td>
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