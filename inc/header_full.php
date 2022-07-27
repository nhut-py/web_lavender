<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/1.css">
    <link rel="stylesheet" href="./plugin/fontawesome/css/all.css">

    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/catagory.css">
    <link rel="stylesheet" href="css/layout.css">
    <link rel="stylesheet" href="<?php echo $link; ?>">

    <script src="js/sweetalert2-11.1.2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="js/sweetalert2-11.1.2/dist/sweetalert2.min.css">


</head>

<body>
    <div class="wraper">
    

        <header>
                <!-- code hiện số lượng sản phẩm có trong giỏ hàng -->
            <?php
            session_start();
            $total=0;
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) 
                 {?>
                    <?php   $total += ($_SESSION['cart'][$key]['sl']); ?>
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
                            <div class="thong_bao"><?php echo $total ?></div>
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
        <!-- phần link danh mục -->
        <section class="danh_muc mg_top">
            <div class="container">
                <ul>
                    <li><a href=""><i class="fas fa-home"></i></a></li>
                    <li><a href=""> Trang Chủ</a></li>
                    <li><a href="">> <? echo $title; ?></a></li>
                </ul>
            </div>
        </section>
        <div class="container main">