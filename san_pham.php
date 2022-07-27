<?php
$title = "Sản Phẩm";
$link="";
include 'inc/header_full.php';
?>

<!-- start product -->
<?php
require_once('database.php');
$sql = "SELECT * From sanpham";
$result = $db->query($sql);

//điều kiện hiển thị
if (isset($_GET['maDanhMuc'])) {
    $maDanhMuc = $_GET['maDanhMuc'];
   
    $sql = "SELECT * FROM sanpham,danhmuc WHERE sanpham.maDanhMuc=danhmuc.maDanhMuc AND danhmuc.maDanhMuc ='" . $maDanhMuc . "' ORDER BY sanpham.maSP DESC";
    $result = $db->query($sql);
}
?>

<!-- article -->
<article>
    <section class="san_pham">
        <ul class="product">
            <?php
            $count = 0;
            while ($rs = $result->fetch()) {
                $count++;
            ?>
                <li>
                    <div class="img_product">
                        <img src="./images/<?php echo $rs['image'] ?>" alt="">
                        <!-- hiệu ứng khi hover vào ảnh -->
                        <div class="xem_them">
                            <a href="product_detail.php?maSP=<?php echo $rs['maSP'] ?>">Xem Sản Phẩm</a>
                            <div class="nen_den"></div>
                        </div>
                        <!--hover vào xuất hiên xem thêm-->
                    </div>
                    <p class="title_product"><?php echo $rs['tenSP'] ?></p>
                    <p class="price_product"><?php echo number_format($rs['donGia']) ?> VNĐ </p>

                    <a href="addcart.php?maSP=<?php echo $rs['maSP'] ?>"><button class="btn_product">THÊM GIỎ HÀNG</button></a>
                </li>
            <?php } ?>

        </ul>

    </section>
    <!-- end col1 trending -->
    <section class="list_page">
        <ul>
            <li class="page_active"><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fas fa-chevron-right"></i></a></li>
        </ul>
    </section>
</article>

<!-- aside bar -->
<aside>
    <!-- side bar -->
    <?php include_once 'inc/sidebar.php' ?>
</aside>

<?php
include 'inc/footer_full.php';
?>