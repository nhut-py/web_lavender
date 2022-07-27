<div class="aside_widget">
    <h3>SẢN PHẨM Mới</h3>
    <ul class="ban_chay">
        <?php
        //top sản phẩm mới
        require 'database.php';
        $sqlnew = "SELECT  image,tenSP,donGia,maSP From sanpham  ORDER BY maSP DESC LIMIT 5";
        $resultnew = $db->query($sqlnew);

        while ($rsnew = $resultnew->fetch()) {

        ?>
            <li>
                <a href="" class="anh">
                    <img src="./images/<?php echo $rsnew['image'] ?> " alt="">
                </a>
                <div class="thong_tin">
                    <p class="title_product"><?php echo $rsnew['tenSP'] ?></p>
                    <p class="price_product"><?php echo number_format($rsnew['donGia']) ?> VNĐ </p>
                    <a href="product_detail.php?maSP=<?php echo $rsnew['maSP'] ?>" class="detail">Chi tiết ></a>
                </div>
            </li>

        <?php } ?>
    </ul>
</div>
<!--Sản phẩm bán chạy-->