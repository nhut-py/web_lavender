<?php
$title = "Đăng Ký Tài Khoản";
$link = "css/contact.css";
include 'inc/header_full.php';
?>
<?php

// Khi người dùng tiến hành cập nhật
require_once('database.php');
if (isset($_POST['dangky'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $tenKH = $_POST['tenKH'];
    $email = $_POST['email'];
    $soDT = $_POST['soDT'];
    $diaChi = $_POST['diaChi'];


    // update bảng khách hàng
    require('database.php');

    $sql1 = "INSERT INTO khachhang VALUES ('', '" . $tenKH . "', '" . $username . "', '" . $password . "', '" . $soDT . "','" . $email . "', '" . $diaChi . "')";
    $result1 = $db->exec($sql1);
    // insert vào bảng khách hàng 

    echo   " <script>";
    echo "
            Swal.fire(
            'Đăng ký thành công!',
            'Tài khoản " . $username . " ',
            'success')           
            ";
    echo " </script>";
    //  header("location: san_pham.php");
}
?>
<!-- form đăng ký -->
<div class="form">
    <form action="" method="post">
        <h1 style="color: #283943 ;font-size: 37px;"> Đăng ký tài khoản</h1>

        <!-- tên đăng nhập -->
        <div class="form-group">
            <label for="" class="username">Tên Đăng nhập</label>
            <input type="text" name="username" id="username" required>
            <span class="form-massage"></span>
        </div>

        <!-- password -->
        <div class="form-group">
            <label for="" class="password">Mật khẩu</label>
            <input type="password" name="password" id="password" required>
            <span class="form-massage"></span>
        </div>
        <!--form-group-->

        <div class="form-group">
            <label for="" class="fullname">Họ Và Tên</label>
            <input type="text" name="tenKH" id="fullname" required>
            <span class="form-massage"></span>
        </div>
        <!--form-group-->

        <div class="form-group">
            <label for="" class="enail">Email</label>
            <input type="email" name="email" id="email" required>
            <span class="form-massage"></span>
        </div>
        <!--form-group-->
        <div class="form-group">
            <label for="" class="enail">Số Điện Thoại</label>
            <input type="text" name="soDT" required>
            <span class="form-massage"></span>
        </div>
        <!--form-group-->



        <div class="form-group">
            <label for="" class="enail">Địa chỉ</label>
            <input type="text" name="diaChi" required>
            <span class="form-massage"></span>
        </div>
        <!--form-group-->

        <input type="submit" class="bt-submit" name="dangky" value="Đăng Ký">


    </form>
</div>
<!--from -->
<!-- footer -->
<?php include 'inc/footer_full.php' ?>