<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top" style="background-color: #5C2A9D !important;">
    <div class="container">
        <a class="navbar-brand" href="index.php">Bloggy</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categories
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php
                        $navbar_cat = "SELECT * FROM categories WHERE navbar_status='0' AND status='0'";
                        $navbar_cat_run = mysqli_query($con, $navbar_cat);
                        if (mysqli_num_rows($navbar_cat_run) > 0) {
                            foreach ($navbar_cat_run as $item) {
                        ?>

                                <li>
                                    <a class="dropdown-item" href="category.php?category=<?= $item['slug'] ?>"><?= $item['name'] ?></a>
                                </li>

                            <?php
                            }
                        } else {
                            ?>
                            <h4>Non</h4>
                        <?php
                        }
                        ?>
                    </ul>
                </li>

                <?php
                if (isset($_SESSION['auth_user'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
                            <?= $_SESSION['auth_user']['user_name']; ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <form method="POST" action="allcode.php">
                                    <button type="submit" class="dropdown-item" name="logout_btn">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>

                <?php
                else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php">Register</a>
                    </li>
            </ul>

        <?php
                endif; ?>

        </div>
    </div>
</nav>