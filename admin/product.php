<?php
$title = "Tất cả sản phẩm";
include '../inc/admin_header.php';
?>
<style>
    .table td,
    .table th {
        white-space: normal
    }
    .table th:nth-child(1),.table th:nth-child(2){width: 20px;padding-right: 0px;padding-left: 0px;}
</style>
<div class="main">



    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Tất Cả Sản Phẩm</h3>
                        </div>
                        <div class="col text-right">

                            <a href="product_add.php"> <button class="btn btn-success float_right">Thêm Sản Phẩm</button></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <form action="" method="post">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th>Số TT</th>
                                    <th>Mã Sản Phẩm</th>
                                    <th>Tên Sản Phẩm</th>
                                    <th>Mô tả</th>
                                    <th>Danh mục</th>
                                    <th>Số lượng</th>
                                    <th>Giá Bán</th>

                                    <th>Ảnh</th>
                                    <th>Tùy chọn</th>
                                  
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                require '../database.php';
                                // $sql="SELECT * FROM sanpham";
                                $sql = "SELECT * FROM sanpham,danhmuc WHERE sanpham.maDanhMuc=danhmuc.maDanhMuc";
                                $result = $db->query($sql);
                                ?>
                                <?php
                                $stt = 0;
                                while ($rs = $result->fetch()) {
                                    $stt++;
                                ?>
                                    <tr>
                                        <td><?php echo $stt; ?></td>
                                        <td><?php echo $rs['maSP'] ?></td>
                                        <td><?php echo $rs['tenSP'] ?></td>
                                        <td><?php echo $rs['moTa'] ?></td>
                                        <td><?php echo $rs['tenDanhMuc'] ?></td>

                                        <td><?php echo $rs['soLuong'] ?>(Cái)</td>
                                        <td><?php echo number_format($rs['donGia']) ?> VNĐ</td>
                                        <td class="img_sp"><img src="../images/<?php echo $rs['image'] ?>" alt=""></td>

                                        <td><a class="btn btn-primary" href="product_edit.php?id=<?php echo $rs['maSP'] ?>">Edit</a>
                                        <!-- <button class="btn btn_sua">Sửa</button> -->

                                        
                                            <a onclick="return confirm('Are you sure?')" class="btn btn-danger" href="product_delete.php?id=<?php echo $rs['maSP'] ?>">Xóa</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>













</div>
<?php include '../inc/admin_footer.php' ?>