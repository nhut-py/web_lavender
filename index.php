<!DOCTYPE html>
<html lang="en">
<?php 
    require "database.php";
    $sql="SELECT * from sanpham limit 12";
    $result= $db-> query($sql);

    $sql2="SELECT * from sanpham order by maSP DESC limit 4";
    $result2= $db-> query($sql2);
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/1.css">
    <link rel="stylesheet" href="./plugin/fontawesome/css/all.css">
  
    <title>Home</title>
</head>

<body>
    <div class="wraper">
         <!-- mở đầu phần header -->
         <?php include_once './inc/header.php' ?>
       <!-- end header -->
     

        <!-- phần banner  -->
        <section class="banner  mg_top">
            <img src="./images/perfume.jpg" alt="">
        </section>

        <!-- phần main chính trang web -->
        <main class="container">
    <!-- col1 slide_trending -->
            <section class="col1 slide_trending">
                <p class="title">SẢN PHẦM NỔI BẬC</p>

                <ul class="product">
            <?php
                while($rs2=$result2->fetch()){
            ?>
                 <li>
                        <div class="img_product">
                          <img src="./images/<?php echo $rs2['image'] ?>" alt="">
                         <!-- hiệu ứng khi hover vào ảnh -->
                           <div class="xem_them">
                             <a href="product_detail.php?maSP=<?php echo $rs2['maSP'] ?>">Xem Sản Phẩm</a>
                            <div class="nen_den"></div>
                           </div> <!--hover vào xuất hiên xem thêm-->
                        </div>
                        <p class="title_product"><?php echo $rs2['tenSP'] ?></p>
                        <p class="price_product"><?php echo number_format($rs2['donGia']) ?> VNĐ</span></p>
                       <a href="addcart.php?maSP=<?php echo $rs2['maSP'] ?>"> <button class="btn_product">THÊM GIỎ HÀNG</button></a>
                </li>
            <?php } ?>

                    
                </ul>
                <!-- nút slide trái và phải -->
                <div class="all_nut">
                    <div id="nut_trai" class="nut_trai">
                        <img src="./images/left.png" alt="">
                    </div>
                    <div id="nut_phai" class="nut_phai">
                        <img src="./images/right.png" alt="">
                    </div>
                </div>

            </section>
            <!-- end col1 trending -->


            <!-- col2 thời trang thu đông -->
            <section class="col2 ">
                <p class="title">NƯỚC HOA NAM</p>

                <ul class="product">

                <?php 
                while($rs=$result->fetch()){
                ?>
                    <li>
                       <div class="img_product">
                        <img src="./images/<?php echo $rs['image']?>" alt="">
                        <div class="xem_them">
                                <a href="product_detail.php?maSP=<?php echo $rs['maSP'] ?>">Xem Sản Phẩm</a>
                               <div class="nen_den"></div>
                              </div> <!--hover vào xuất hiên xem thêm-->
                        </div>
                        <p class="title_product"><?php echo $rs['tenSP']?></p>
                        <p class="price_product"><?php echo number_format($rs['donGia'])?> VNĐ</p>

                        <a href="addcart.php?maSP=<?php echo $rs['maSP']?>"><button class="btn_product">THÊM GIỎ HÀNG</button></a>
                        
                    </li>
                <?php } ?>
                   
                </ul>


            </section>
            <!-- end col2 thời trang thu đông-->

            <!-- start col3 xu hướng -->

            <section class="col3 xu_huong">
                <p class="title">Tư vấn</p>
                <ul class="col3_list_hot">
                    <li>
                        <div class="img_hot">
                            <img src="./images/nenchon.jpg" alt="">
                        </div>
                        <p class="title_product">Nên Chọn Nước Hoa Nồng Độ EDT Hay EDP ?</p>
                        <p class="content_product " style="text-align: justify;">Với những ai đã từng dùng nước hoa thì không còn 
                            quá xa xạ với khái niệm EDT, EDP và nhiều khi đó còn được xem là một trong 
                            nhữg tiêu chí quan trọng để người dùng quyết định có nên chọn mua loại nước 
                            hoa đó hay không.</p>
                    </li>
                    <li>
                        <div class="img_hot">
                            <img src="./images/valen.jpg" alt="">
                        </div>
                        <p class="title_product">Chọn Quà Valentine Cho Nàng?</p><br>
                        <p class="content_product" style="text-align: justify;">Ngày lễ tình nhân Valentine đang đến rất gần, nếu bạn là một chàng trai thì chắc chắn là bạn đang rất đắn đo chọn quà cho nàng phải không nào? Chúng tôi
                         sẽ gợi ý cho bạn những xu hướng quà tặng HOT nhất trong dịp Valentine này.</p>
                    </li>
                    <li>
                        <div class="img_hot">
                            <img src="./images/Top-7-Nuoc-Hoa-Nam-Mua-Dong-2018-1.jpg" alt="">
                        </div>
                        <p class="title_product">TOP 7 Nước Hoa Mùa Đông 2021 Cho Nam Giới</p>
                        <p class="content_product" style="text-align: justify;">Tiết trời cuối năm với chút gió se, chút sương lạnh. 
                            Chàng nhà mình “tranh thủ” dịp này mà “sưởi ấm” cho nàng thì còn gì yêu 
                            thương bằng! Đón Đông cùng lavender bằng TOP 7 mùi hương ấm áp làm tan chảy trái
                             tim bất cứ cô nàng dù kiêu kỳ hay tiểu thư, dù công chúa hay cá tính. </p>
                    </li>
                </ul>

            </section>
            <!-- end col3 xu hướng -->

        </main>
        <section class="col4 khuyen_mai">
            <div class="container">
                <h3>ĐĂNG KÝ ĐỂ NHẬN KHUYẾN MÃI</h3>
                <p>Đăng ký để nhận thêm thông tin khuyến mãi mới nhất</p>


                <div id="input_dk">
                    <form>
                        <input type="text" placeholder="NHẬP EMAIL CỦA BẠN">
                        <!-- <br /> -->
                        <input type="submit" style="float: right;">
                    </form>
                </div>

            </div>
        </section>
        <!--col4 đăng ký để nhận khuyến mãi-->

        <!-- footer -->
        <?php include_once'inc/footer.php' ?>
        <!-- end footer -->

    </div>
    <!--wraper-->


    <script src="js/js.js"></script>
    <script>
        // hiệu ứng javascript slide 
        var slide=document.getElementsByClassName('product')[0];

        var nut_trai=document.getElementById('nut_trai');
        var nut_phai=document.getElementById('nut_phai');

        //  hiệu ứng khi click vào nút phải
        nut_phai.addEventListener('click',click_nutPhai);
        function click_nutPhai() {
         var child=slide.children[0];
        slide.removeChild(child);
        slide.appendChild(child);   
        };

//  hiệu ứng khi click vào nút trái
        nut_trai.addEventListener('click',click_nutTrai);
        function click_nutTrai(){
        var child=slide.children[3];
        var next_child=slide.children[0];
            slide.removeChild(child);
            slide.insertBefore(child,next_child);
}
// chế độ tự động chạy khi không click
// setInterval(function(){ click_nutTrai(); }, 3000);
    </script>
</body>

</html>