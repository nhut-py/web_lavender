
<?php
$title="Sửa sản phẩm";
include '../inc/admin_header.php';
?>
            <!-- phần nội dung chính -->
            <div class="main">
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                    require '../database.php';
                    $sql = "SELECT * FROM sanpham WHERE maSP='" . $id . "'";
                    $result = $db->query($sql);
                    $rs = $result->fetch();

                    if (isset($_POST['edit'])) {

                        $newmaSP = $_POST['id'];
                        $tenSP = $_POST['tenSP'];
                        $moTa = $_POST['moTa'];
                        $maDanhMuc = $_POST['maDanhMuc'];
                        $soLuong = $_POST['soLuong'];
                        $donGia = $_POST['donGia'];
                        $moTa = $_POST['moTa'];

                        if ($_FILES['file']['name'] != '') {
                            $image = $_FILES['file']['name'];
                            $linkup = "images/";
                            move_uploaded_file($_FILES['file']['tmp_name'], $linkup . $image);
                        } else {
                            $image = $_POST['img_old'];
                        }

                        require '../database.php';
                        $sql1 = "UPDATE sanpham SET  tenSP='" . $tenSP . "', image='" . $image . "', moTa='" . $moTa . "', soLuong='" . $soLuong . "', donGia='" . $donGia . "', maDanhMuc='" . $maDanhMuc . "' WHERE maSP='$newmaSP'";
                        $result1 = $db->exec($sql1);
                        header("location: product.php");
                    }
                }


                ?>
                <!-- thêm sản phẩm -->
                <h2>Thêm Sản Phẩm mới</h2>
                <div class="form">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-left">
                            <input type="hidden" name="id" value="<?php echo $rs['maSP'] ?>" />

                            <div class="form-group">
                                <label for="">Mã sản phẩm</label>
                                <input type="text" name="maSP" value="<?php echo $rs['maSP'] ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="">Tên Sản Phẩm</label>
                                <input type="text" name="tenSP" value="<?php echo $rs['tenSP'] ?>">
                            </div>

                            <div class="form-group">
                                <label for="">Danh Mục</label>
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
                                <input type="text" name="soLuong" value="<?php echo $rs['soLuong'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Giá bán</label>
                                <input type="text" name="donGia" value="<?php echo number_format($rs['donGia']) ?>">
                            </div>
                            <!-- submit -->
                            <div class="form-group">

                                <button class="btn-submit" type="submit" name="edit" value="Sửa">Cập nhật</button>
                            </div>
                        </div>
                        <!--form-left-->
                        <div class="form-right">
                            <input type="hidden" name="img_old" value="<?php echo $rs['image'] ?>" />
                            <div class="form-group">
                                <label for="">Ảnh sản phẩm</label>
                                <input type="file" name="file" value="">
                                <img class="file_anh" src="../images/<?php echo $rs['image'] ?>" alt="">
                            </div>
                            <div class="form-group">
                                <label for="">Mô tả sản phẩm</label>
                                <textarea class="textarea" name="moTa"><?php echo $rs['moTa'] ?></textarea>
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