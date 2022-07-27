<?php
$title = "Chỉnh sửa thông tin khách hàng";
$link = "css/contact.css";
include 'inc/header_full.php';
?>
<article>
    <?php

    // Khi người dùng tiến hành cập nhật

    if (isset($_POST['capnhat'])) {
        $maKH = $_POST['maKH'];
        $tenKH = $_POST['tenKH'];
        $email = $_POST['email'];
        $soDT = $_POST['soDT'];
        $diaChi = $_POST['diaChi'];


        // update bảng khách hàng
        require('database.php');
        $sql1 = "UPDATE khachhang SET tenKH='" . $tenKH . "',email='" . $email . "',soDT='" . $soDT . "',diaChi='" . $diaChi . "' WHERE maKH='$maKH' ";

        $result1 = $db->exec($sql1);
        // insert vào bảng hóa đơn
        header("location: thanh_toan.php");
    }
    ?>
    <!-- form liên hệ -->
    <div class="form">

        <form action="" method="post">
            <?php
            require 'database.php';
            // Lấy lại thông tin khách hàng 
            $username = $_SESSION['username'];
            $sql = "SELECT * FROM khachhang WHERE username = '" . $username . "'";
            $result = $db->query($sql);
            $rs = $result->fetch();

            ?>
            <h1 style="color: #283943 ;font-size: 37px;"> Địa chỉ giao hàng</h1>


            <input type="hidden" name="maKH" value="<?php echo $rs['maKH'] ?>">
            <div class="form-group">
                <label for="" class="fullname">Họ Và Tên</label>
                <input type="text" name="tenKH" id="fullname" value="<?php echo $rs['tenKH'] ?>">
                <span class="form-massage"></span>
            </div>
            <!--form-group-->

            <div class="form-group">
                <label for="" class="enail">Email</label>
                <input type="email" name="email" id="email" value="<?php echo $rs['email'] ?>">
                <span class="form-massage"></span>
            </div>
            <!--form-group-->
            <div class="form-group">
                <label for="" class="enail">Số Điện Thoại</label>
                <input type="text" name="soDT" value="<?php echo $rs['soDT'] ?>">
                <span class="form-massage"></span>
            </div>
            <!--form-group-->



            <div class="form-group">
                <label for="" class="enail">Địa chỉ</label>
                <input type="text" name="diaChi" value="<?php echo $rs['diaChi'] ?>">
                <span class="form-massage"></span>
            </div>
            <!--form-group-->

            <input type="submit" class="bt-submit" onclick="return confirm('Cập nhật thành công')" name="capnhat" value="Cập nhật">


        </form>
    </div>



</article>
<!-- aside bar -->
<aside>
    <!--danh mục-->
    <div class="banner_qc">
        <a href="#"> <img src="./images/banner-02.png" alt=""></a>
    </div><!-- banner quảng cáo-->

</aside>
<!-- footer -->
<?php
include 'inc/footer_full.php';
?>