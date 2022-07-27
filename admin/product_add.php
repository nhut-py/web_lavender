<?php 
$title ="Thêm Sản Phẩm";
include '../inc/admin_header.php';

?> 

            <!-- phần nội dung chính -->
            <div class="main">
                
                <?php

                if (isset($_POST['submit'])) {
                    $maSP = $_POST['maSP'];
                    $tenSP = $_POST['tenSP'];
                    $maDanhMuc = $_POST['maDanhMuc'];
                    $soLuong = $_POST['soLuong'];
                    $donGia = $_POST['donGia'];
                    $moTa = $_POST['moTa'];
                    //với file là hình ảnh    
                    $image = $_FILES['file']['name'];
                    $linkup = "../images/";
                    move_uploaded_file($_FILES['file']['tmp_name'], $linkup . $image);



                    require '../database.php';
                    $sql1 = "INSERT INTO sanpham VALUES ('" . $maSP . "', '" . $tenSP . "', '" . $image . "', '" . $soLuong . "', '" . $donGia . "', '" . $maDanhMuc . "','" . $moTa . "')";
                    $result1 = $db->exec($sql1);



                    header("location: product.php");
                }



                ?>
                <!-- thêm sản phẩm -->
                <h2>Thêm Sản Phẩm mới</h2>
                <div class="form">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-left">
                            <div class="form-group">
                                <label for="">Mã sản phẩm</label>
                                <input type="text" name="maSP">
                            </div>
                            <div class="form-group">
                                <label for="">Tên Sản Phẩm</label>
                                <input type="text" name="tenSP">
                            </div>

                            <div class="form-group">
                                <label for="">Danh Mục</label><br>
                                <select name="maDanhMuc" id="maDanhMuc">
                                    <?php
                                    require '../database.php';
                                    $sql2 = "SELECT * From danhmuc";
                                    $result2 = $db->query($sql2);

                                    while ($rs2 = $result2->fetch()) {
                                    ?>
                                        <option value="<?php echo $rs2['maDanhMuc'] ?>"><?php echo $rs2['tenDanhMuc'] ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Số lượng</label>
                                <input type="text" name="soLuong">
                            </div>
                            <div class="form-group">
                                <label for="">Giá bán</label>
                                <input type="text" name="donGia">
                            </div>
                            <!-- submit -->
                            <div class="form-group">

                                <button class="btn-submit" type="submit" name="submit" value="Đăng Sản Phẩm">Thêm mới</button>
                            </div>
                        </div>
                        <!--form-left-->
                        <div class="form-right">
                            <div class="form-group">
                                <label for="">Ảnh sản phẩm</label>
                                <input type="file" name="file">
                            </div>
                        
                            <div class="form-group">
                                <label for="">Mô tả sản phẩm</label>
                                <textarea class="textarea" name="moTa"></textarea>
                            </div>
                        </div>
                        <!--form right-->


                    </form>
                </div> <!-- form-->
            </div>
        </div>

    </div>

</body>

</html>