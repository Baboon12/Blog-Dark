<?php
include('auth.php');

if (isset($_POST['update'])) {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE users SET username='$username', email='$email', password='$password', role_as='$role', status='$status' WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Updated Successfully";
        header("Location: view_registered.php");
        exit(0);
    } else {
    }
}

if (isset($_POST['add_user'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "INSERT INTO users(username, email, password, role_as, status) values('$username', '$email', '$password', '$role', '$status')";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "User/Admin Added Successfully";
        header("Location: view_registered.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong";
        header("Location: admin-add.php");
        exit(0);
    }
}

if (isset($_POST['user_delete'])) {
    $user_id = $_POST['user_delete'];
    $query = "DELETE FROM users where id='$user_id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: view_registered.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong";
        header("Location: view_registered.php");
        exit(0);
    }
}

if (isset($_POST['add_category'])) {
    $name = $_POST['category_name'];
    $slug = $_POST['category_slug'];
    $description = $_POST['category_description'];
    $meta_title = $_POST['meta_title'];
    $meta_desc = $_POST['meta_description'];
    $keyword = $_POST['keyword'];
    $navbar_status = $_POST['navbar_status'] == true ? '1' : '0';
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "INSERT INTO categories (name, slug, description, meta_title, meta_description, keyword, navbar_status, status) VALUES('$name', '$slug', '$description', '$meta_title', '$meta_desc', '$keyword', '$navbar_status', '$status')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Category Added Successfully";
        header("Location: view_category.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong";
        header("Location: add_category.php");
        exit(0);
    }
}

if (isset($_POST['edit_category'])) {
    $cat_id = $_POST['category_id'];
    $name = $_POST['category_name'];
    $slug = $_POST['category_slug'];
    $description = $_POST['category_description'];
    $meta_title = $_POST['meta_title'];
    $meta_desc = $_POST['meta_description'];
    $keyword = $_POST['keyword'];
    $navbar_status = $_POST['navbar_status'] == true ? '1' : '0';
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE categories SET name='$name', slug='$slug', description='$description', meta_title='$meta_title', meta_description='$meta_desc', keyword='$keyword', navbar_status='$navbar_status', status='$status' where id='$cat_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Category Updated Successfully";
        header("Location: view_category.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong";
        header("Location: edit_category.php?id=" . $cat_id);
        exit(0);
    }
}

if (isset($_POST['category_delete'])) {
    $cat_id = $_POST['category_delete'];
    $query = "UPDATE categories SET status='2' WHERE id='$cat_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Category Deleted Successfully";
        header("Location: view_category.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong";
        header("Location: view_category.php");
        exit(0);
    }
}

if (isset($_POST['add_post'])) {
    $cat_id = $_POST['category_id'];
    $name = $_POST['post_name'];
    $slug = $_POST['post_slug'];
    $description = $_POST['post_description'];
    $meta_title = $_POST['meta_title'];
    $meta_desc = $_POST['meta_description'];
    $keyword = $_POST['keyword'];
    $image = $_FILES['post_image']['name'];
    $image_ext = pathinfo($image, PATHINFO_EXTENSION); // Renaming image
    $filename = time() . "." . $image_ext;
    $status = $_POST['status'];

    $query = "INSERT INTO posts(category_id, name, slug, description, image, meta_title, meta_description, meta_keyword, status) VALUES('$cat_id', '$name', '$slug', '$description', '$filename', '$meta_title', '$meta_desc', '$keyword', '$status')";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        move_uploaded_file($_FILES['post_image']['tmp_name'], '../uploads/posts/' . $filename);
        $_SESSION['message'] = "Post Added Successfully!";
        header("Location: view_post.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong";
        header("Location: add_post.php");
        exit(0);
    }
}

if (isset($_POST['update_post'])) {
    $post_id = $_POST['post_id'];
    $cat_id = $_POST['category_id'];
    $name = $_POST['post_name'];
    $slug = $_POST['post_slug'];
    $description = $_POST['post_description'];
    $meta_title = $_POST['meta_title'];
    $meta_desc = $_POST['meta_description'];
    $keyword = $_POST['keyword'];
    $old_filename = $_POST['old_image'];
    $image = $_FILES['post_image']['name'];
    $update_filename = "";
    if ($image != NULL) {
        $image_ext = pathinfo($image, PATHINFO_EXTENSION); // Renaming image
        $filename = time() . "." . $image_ext;
        $update_filename = $filename;
    } else {
        $update_filename = $old_filename;
    }
    $status = $_POST['status'];

    $query = "UPDATE posts SET category_id = '$cat_id', name='$name', slug='$slug', description='$description', image='$update_filename', meta_title='$meta_title', meta_description='$meta_desc', meta_keyword='$keyword', status='$status' WHERE id='$post_id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        if ($image != NULL) {
            if (file_exists('../uploads/posts/' . $old_filename)) {
                unlink("../uploads/posts/" . $old_filename);
            }
            move_uploaded_file($_FILES['post_image']['tmp_name'], '../uploads/posts/' . $update_filename);
        }
        $_SESSION['message'] = "Post Updated Successfully!";
        header("Location: view_post.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong";
        header("Location: edit_post.php?id=" . $post_id);
        exit(0);
    }
}

if (isset($_POST['post_delete'])) {
    $post_id = $_POST['post_delete'];
    $check_image = "SELECT * FROM posts WHERE id='$post_id' LIMIT 1";
    $check_image_run = mysqli_query($con, $check_image);
    $data = mysqli_fetch_array($check_image_run);
    $image = $data['image'];

    $query = "DELETE FROM posts WHERE id='$post_id' LIMIT 1";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        if (file_exists('../uploads/posts/' . $image)) {
            unlink("../uploads/posts/" . $image);
        }
        $_SESSION['message'] = "Post Deleted Successfully!";
        header("Location: view_post.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Something Went Wrong";
        header("Location: view_post.php");
        exit(0);
    }
}
