<?php
$title = "Quản lý đơn hàng";
include '../inc/admin_header.php';
?>
<!-- phần nội dung chính -->
<div class="main">
  

    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Quản Lý Đơn Hàng</h3>
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <form action="" method="post">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Mã Đơn Hàng</th>
                                    <th scope="col">Tên Khách Hàng</th>
                                    <th scope="col">Ngày Tạo Đơn</th>
                                    <th scope="col">Trạng Thái</th>
                                    <th scope="col">Đơn Giá</th>
                                    <th scope="col">View</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                                <?php
                                require '../database.php';

                                $sql = "SELECT * FROM hoadon,khachhang where hoadon.maKH=khachhang.maKH";
                                $result = $db->query($sql);
                                $stt = 0;
                                while ($rs = $result->fetch()) {
                                    $stt++;
                                ?>
                                    <tr>
                                        <td><?php echo $stt; ?></td>
                                        <td><i class="fas fa-barcode"></i> <?php echo $rs['maHD'] ?></td>
                                        <td><i class="ni ni-single-02"></i> <?php echo $rs['tenKH'] ?></td>
                                        <td><i class="ni ni-time-alarm"></i> <?php echo $rs['ngayMua'] ?></td>
                                        <td width="180">
                                            <?php
                                            if ($rs['tinhTrang'] == "Hủy Đơn") {
                                                echo "<button class='btn btn-danger'> " . $rs['tinhTrang'] . " </button>";
                                            } else if ($rs['tinhTrang'] == "Đã Thanh Toán") {
                                                echo "<button class='btn btn-success'> " . $rs['tinhTrang'] . " </button>";
                                            } else {
                                                echo "<button class='btn btn-warning ' style='background:#9c9c60'> " . $rs['tinhTrang'] . " </button>";
                                            }
                                            ?>

                                        </td>
                                        <td><?php echo number_format($rs['tongTien']) ?>VNĐ</td>


                                        <td><a class="btn btn-default" href="order_detail.php?id=<?php echo $rs['maHD'] ?>">Xem Chi tiết</a></td>
                                        <!-- <button class="btn btn_sua">Sửa</button> -->


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
<?php

include '../inc/admin_footer.php';
?>