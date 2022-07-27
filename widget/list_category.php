<div class="aside_widget">
    <h3>DANH MỤC</h3>
    <ul>
        <?php
        require 'database.php';
        // chọn danh mục
        $sqlDanhMuc = 'SELECT * FROM danhmuc';
        $resultDanhMuc = $db->query($sqlDanhMuc);
        $countDM = 0;
        while ($rsDM = $resultDanhMuc->fetch()) {
            $countDM++;
        ?>
            <li><a href="san_pham.php?maDanhMuc=<?php echo $rsDM['maDanhMuc'] ?>"><?php echo $rsDM['tenDanhMuc'] ?></a></li>

        <?php } ?>

    </ul>
</div>
<!--danh mục-->