<?php
$title = "Thanh Toán";
$link = "css/cart.css";
include 'inc/header_full.php';
?>

<audio id="votay">
    <source src="sound/success-sound-effect.mp3" type="audio/mpeg">
</audio>

<!-- start product -->
<?php
require_once('database.php');

?>
<article>
    <h3>Giỏ Hàng</h3>
    <br>
    <?php
    if (!empty($_SESSION['cart'])) {
        $total = $i = 0;
        foreach ($_SESSION['cart'] as $key => $value) {
            $i++;
    ?>
            <section class="gio_hang">
                <div class="img_hang">
                    <img src="./images/<?php echo $_SESSION['cart'][$key]['image'] ?>" alt="">
                </div>
                <div class="name_hang">
                    <?php echo $_SESSION['cart'][$key]['name'] ?>


                    <!-- <a class="detail" href="">Để dành mua sau</a> -->
                    <div class="detail color-red">
                        <p><span class="price color-red "><?php echo number_format($_SESSION['cart'][$key]['price']) ?> VNĐ</span> </p>
                    </div>
                </div>
                <!-- <div class="price_hang"><p><span class="price"> 250.000</span> VNĐ</p></div> -->
                <div class="length_hang">
                    <span onclick="" class="btn_product">-</span>
                    <input class="so_luong" type="number" value="<?php echo $_SESSION['cart'][$key]['sl'] ?>">
                    <span onclick="" class="btn_product">+</span>
                </div>
                <div class="price_hang">
                    <p><span class="price color-red "> <?php
                                                        echo number_format(($_SESSION['cart'][$key]['price'] * $_SESSION['cart'][$key]['sl']));
                                                        $total += ($_SESSION['cart'][$key]['price'] * $_SESSION['cart'][$key]['sl']);
                                                        ?> VNĐ</span></p>
                </div>
                <div class="price_hang"> <a onclick="return confirm('Bạn muốn xóa sản phẩm này khỏi giỏ hàng ?')" href="delete-cart.php?maSP=<?php echo $key ?>"><button class="xoa">Xóa</button></a></div>
                <!--  -->

            </section>
    <?php }
    } else {
        echo '<script language="javascript">';
        echo 'alert("Chưa có mặt hàng nào trong giỏ hàng !")';
        echo '</script>';
        $total = 0;
    } ?>






</article>



<!-- aside bar -->
<aside>
    <div class="aside_widget">

        <!-- hiển thị thông tin khách hàng -->
        <?php
        if (isset($_SESSION['username'])) {

            $username = $_SESSION['username'];
            $sql = "SELECT * FROM khachhang WHERE username = '" . $username . "'";
            $result = $db->query($sql);
            $rs = $result->fetch();

        ?>

            <div class="thanh-tien">
                <span>Giao tới</span>
                <a class="thay_doi" href="user_edit.php">Thay đổi</a>
                <div class="thanh-toan">

                    <span style="font-size: 18px; color:rgb(36, 36, 36); font-weight:600;" class="title-thanhtoan"><?php echo $rs['tenKH'] ?> </span> |
                    <span style="font-size: 16px; margin-top: 10px;margin-left: 5px; color:rgb(36, 36, 36);font-weight:600" class="title-thanhtoan float-right"><?php echo $rs['soDT'] ?></span>
                </div>
                <div class="thanh-toan" style=" color:rgb(36, 36, 36);">
                    <span class="title-thanhtoan" style=" color:rgb(36, 36, 36);">Địa chỉ:</span>
                    <span class=" float-right"><?php echo $rs['diaChi'] ?></span>
                </div>

            </div>
        <?php } else { ?>

            <div class="thanh-tien">
                <span>Giao tới</span>
                <div class="thanh-toan" style=" color:rgb(36, 36, 36);">
                    <span class="title-thanhtoan" style=" color:rgb(36, 36, 36);">Vui lòng:</span>
                    <span class=" float-right">Bạn cần <a style="display:inline-block; color:#a10d0d; font-weight:300" href="pdo_login.php">Đăng Nhập</a> để thực hiện Đặt Hàng hoặc <a style="display:inline-block; color:#a10d0d; font-weight:300" href="user_register.php">Đăng ký</a></span>
                </div>
            </div>
        <?php } ?>


    </div><!-- aside_widget-->
    <div class="aside_widget">


        <form action="" method="post">
            <h3>THANH TOÁN</h3>

            <div class="thanh-tien">
                <div class="thanh-toan">
                    <span class="title-thanhtoan">Mã khuyến mãi</span>
                    <span style="font-size: 12px; margin-top: 10px;" class="title-thanhtoan float-right">Hết thời
                        hạn khuyến mãi</span>
                </div>
                <div class="thanh-toan">
                    <span class="title-thanhtoan">Thành Tiền</span>
                    <span class="giaTien float-right"><?php echo number_format($total) ?> VNĐ</span>
                </div>
                <input type="hidden" name="maKH" value="<?php echo $rs['maKH'] ?>">


                <input type="submit" class="bt-thanhtoan" onclick="return confirm('Xác nhận đặt hàng!')" name="dathang" value="Đặt hàng">
            </div>
        </form>
        <?php

        if (isset($_POST['dathang'])) {
            if (isset($_SESSION['username'])) {
                $maKH = $_POST['maKH'];
                $ghichu = '';
                $tongTien = $total;


                // insert vào bảng hóa đơn
                require_once('database.php');
                $sql = "INSERT INTO hoadon VALUES ('','" . $tongTien . "','" . date("Y-m-d H:i:s") . "','" . $ghichu . "','Chưa thanh toán','" . $maKH . "')";
                $result = $db->exec($sql);

                // insert vào bảng hóa đơn chi tiết
                $last_id = $db->lastInsertId();
                foreach ($_SESSION['cart'] as $key => $value) {
                    $sql = "INSERT INTO hoadonchitiet VALUES ('" . $last_id . "','" . $key . "','" . $value['sl'] . "','" . $value['price'] . "')";
                    $result = $db->exec($sql);
                }
                echo '<script>';
                echo "Swal.fire(
                            'Đặt Hàng Thành Công!',
                            'Đơn hàng sẽ sớm được giao đến quý khách!',
                            'success')";

                echo '</script>';
                echo '<script>';
                echo  'votay.play()';
                echo '</script>';
            } else {
                echo $message = " <script>
                         Swal.fire({
                         icon: 'error',
                         title: 'Oops...',
                         text: 'Bạn chưa đăng nhập!'});
                        </script>";;
            }
        }
        ?>

    </div><!-- aside_widget-->


    <!--danh mục-->
    <div class="banner_qc">
        <a href="#"> <img src="./images/banner-02.png" alt=""></a>
    </div><!-- banner quảng cáo-->

</aside>
<?php
include 'inc/footer_full.php';
?>