<?php
$title = "Chi Tiết Sản Phẩm";
$link = "css/xu_huong.css";
include 'inc/header_full.php';
?>

<?php require "database.php";

if (isset($_GET['maSP'])) {
    $maSP = $_GET['maSP'];
    $sql = "SELECT * from sanpham where maSP='" . $maSP . "'";
    $result = $db->query($sql);
    $rs = $result->fetch();
}

?>
<article>
    <!-- làm thông tin giỏ hàng -->
    <section class="detail_sp">

        <div class="detail_img">
            <img src="./images/<?php echo $rs['image'] ?> " alt="">
        </div>
        <!--img-->
        <div class="detail_nd">

            <h3><?php echo $rs['tenSP'] ?></h3>
            <p class="code_sp">mã sản phẩm :<?php echo $rs['maSP'] ?></p>
            <p class="price_product"><?php echo number_format($rs['donGia']); ?> VNĐ
                <!-- <span class="price_del">300.000đ</span> -->
            </p>
            <p class="detail_ndct"><?php echo $rs['moTa'] ?></p>
            <span class="detail_soLuong">Số lượng: <input type="text" value="<?php echo $rs['soLuong'] ?>" disabled></span>
            <br>

            <a href="addcart.php?maSP=<?php echo $rs['maSP'] ?>"><button class="btn_product  buy_now">Mua Ngay</button></a>
        </div><!-- nội dung-->
    </section>
    <br>
    <hr>
    <!--thông tin sản phẩm, chi tiết về sản phẩm -->
    <section class="info_sanPham">
        <p class="ttsp">Thông tin sản phẩm</p>
        <p class="ttsp">Bình luận</p>

    </section>
    <div class="bai_viet">
        <h2><?php echo $rs['tenSP'] ?></h2>
        <p class="detail_ndct"><?php echo $rs['moTa'] ?></p>
        <img src="./images/<?php echo $rs['image'] ?> " alt="">



        <p>Ký kết hợp tác chiến lược từ ngày 25/12/2015 với giao dịch trị giá 1,1 tỷ USD, cho tới hôm nay,
            Singha đã chuyển khoản vốn đầu tư đợt đầu với tổng 650 triệu đô la Mỹ, bao gồm 50 triệu đô la Mỹ
            để sở hữu 33,3% cổ phần Masan Brewery và 600 triệu đô la Mỹ để sở hữu 14,3% cổ phần Masan
            Consumer Holdings.</p>
        <p>Khoản vốn đầu tư 600 triệu đôla Mỹ chuyển vào Masan Consumer Holdings sẽ được sử dụng để mua thêm
            cổ phần của Masan Consumer, mảng kinh doanh thực phẩm và đồ uống không cồn của Masan.</p>
        <p>Như vậy, tỷ lệ sở hữu trực tiếp của Masan Consumer Holdings trong công ty Masan Consumer sẽ tăng
            từ 77,8% lên 96,7%.</p>

        <p>Tập đoàn Masan là một trong những công ty hàng đầu của Việt Nam, công ty con Masan Consumer
            Holdings tập trung vào các mặt hàng tiêu dùng với nhiều cơ hội tăng trưởng cao như là thực phẩm,
            đồ uống, với những thương hiệu tiêu biểu như Chinsu, Nam Ngư, Omachi, Vinacafe, Wake-up…</p>
        <p>Còn Singha Asia là một công ty thành viên quan trọng của Tập đoàn Boon Rawd Brewery - hãng bia
            đầu tiên và lớn nhất của Thái Lan. Hiện nay công ty đang sản xuất các sản phẩm với nhiều thương
            hiệu khác nhau như Singha, Leo, B-ing, Purra, Sanvo… thông qua 50 công ty thành viên</p>
        <p>Đợt góp vốn đầu tiên này là sự xác thực mạnh mẽ cho hợp tác chiến lược giữa Masan và Singha, tiếp
            cận gần hơn mục tiêu mở rộng thị trường kinh doanh thực phẩm và đồ uống của hai công ty lớn này,
            đặt trọng tâm là các nước “Inland ASEAN” (Việt Nam, Thái Lan, Myanmar, Campuchia, Lào) với 250
            triệu người tiêu dùng.</p>

        <p>Đợt góp vốn 450 triệu đôla Mỹ còn lại sẽ gia tăng tỷ lệ sở hữu cổ phần công ty Masan Consumer
            Holdings của Singha lên 25% sau khi thực hiện đầy đủ các quy định của pháp luật.</p>
    </div>
    <!-- bài viết -->

</article>

<!-- aside bar -->
<aside>
    <!-- sider bar -->
    <?php include 'inc/sidebar.php' ?>
</aside>
<?php
include 'inc/footer_full.php';
?>