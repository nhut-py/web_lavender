<!DOCTYPE html>
<html lang="en">
<?php
include '../database.php';

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/quanly.css">
    <link rel="stylesheet" href="../css/allproduct.css">
    <link rel="stylesheet" href="../plugin/fontawesome/css/all.css">
    <title> <?php echo $title; ?></title>



       <!-- <link rel="icon" href="assets/img/brand/favicon.png" type="image/png"> -->
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>
<style>
  .table td,
    .table th {
        white-space: normal
    }
ul li ul {display: none;}
 ul li:hover ul{
    display: block;
}

/* th:nth-child(1){width: 30px;}
th:nth-child(2){width: 60px;} */
th,td{text-align: center;}
/* td{padding: 5px 10px;} */

</style>
<body>
    <div class="wraper">
        <div class="header">
            <ul>
                <li><a href="../index.php">Trang chủ</a></li>
                <!-- <li><a href="">Cài đặt Giao diện</a></li> -->

                <?php
                session_start();
                if (isset($_SESSION["username"])) {
                    echo ' <li><a href="">Welcome - ' . $_SESSION["username"] . '</a></li>';
                    echo ' <li><a href="logout.php">Logout</a> </li>';
                } else {
                    header("location:pdo_admin_login.php");
                }
                ?>

            </ul>
        </div>
        <!-- bọc nội dung chính -->
        <div class="content">
            <!-- phần side bar quản lý bên trái, thanh control quản lý các mục của trang quản lý -->
            <div class="side_bar">
                <ul>
                    <li class="<?php echo $title=="Bảng tin"?'active_bar':"" ?>"><a href="dashboard.php"><i class="fas fa-tachometer-alt"></i> Bảng tin</a></li>
                    <li class="<?php echo $title=="Danh Mục"?'active_bar':"" ?>"><a href="category.php"><i class="fas fa-tasks"></i> Danh mục</a></li>
                    <li class="<?php echo $title=="Tất cả sản phẩm"?'active_bar':"" ?>"><a href="product.php"><i class="far fa-newspaper"></i> Sản Phẩm</a>
                        <ul >
                            <li class="<?php echo $title=="Tất cả sản phẩm"?'active_bar':"" ?>"><a href="product.php"><i class="fas fa-folder-open"></i> Tất cả sản phẩm</a></li>
                            <li class="<?php echo $title=="Thêm Sản Phẩm"?'active_bar':"" ?>"><a href="product_add.php"><i class="fas fa-file-alt"></i> Thêm sản phẩm</a></li>
                        </ul>
                    </li>

                    <li class="<?php echo $title=="Quản lý đơn hàng"?'active_bar':"" ?>"><a href="order.php"><i class="fas fa-tasks"></i> Quản Lý Đơn Hàng</a></li>
                    <li  class="<?php echo $title=="Quản lý khách hàng"?'active_bar':"" ?>"><a href="customer.php"><i class="fas fa-users"></i> Quản Lý Khách Hàng</a></li>
                    <li><a href=""><i class="fas fa-cog"></i> Cài đặt</a></li>
                </ul>
            </div>
            <!-- phần nội dung chính -->
 