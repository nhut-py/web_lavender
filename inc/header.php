<header>
    <?php
    session_start();
    $total = 0;
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) { ?>
            <?php $total += ($_SESSION['cart'][$key]['sl']); ?>
    <?php }
    }
    ?>
    <div class="container">
        <div class="logo">
            <a href="index.html"> <img src="./images/logo2.png" alt=""></a>
        </div>
        <!--logo-->
        <nav>
            <!-- menu -->
            <ul>
                <li><a href="index.php">TRANG CHỦ</a></li>
                <li><a href="san_pham.php">SẢN PHẨM</a></li>
                <li><a href="thanh_toan.php">THANH TOÁN</a></li>
                <li><a href="blog.php">BLOG</a></li>
                <li><a href="lien_he.php">LIÊN HỆ</a></li>
                <li><a href=""><i class="fas fa-search"></i></a></li>
                <li class="li_tb">
                    <div class="thong_bao">0</div>
                    <a href="thanh_toan.php"><i class="fas fa-shopping-cart"></i></a>
                </li>
            </ul>

            <!-- hiển thị phần đăng ký , đăng nhập -->
            <div class="account">
                <?php

                if (!isset($_SESSION['username'])) {
                ?>
                    <a href="user_register.php">Đăng ký</a>
                    <a href="pdo_login.php">Đăng nhập</a>
                <?php } else { ?>
                    <a href="#"><i class="fas fa-user-alt"></i> Xin chào: <span style="font-size:15px"><?php echo $_SESSION['username'] ?></span></a>
                    <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
                <?php } ?>

            </div>
        </nav>
    </div>
    <!--container-->
</header>