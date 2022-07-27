<?php
$title = "Chi tiết đơn hàng";
include '../inc/admin_header.php';
?>
<div class="main">
    <?php

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        require '../database.php';

        $sql2 = "SELECT * FROM hoadon inner join khachhang on khachhang.maKH=hoadon.maKH where maHD='" . $id . "'";
        $result2 = $db->query($sql2);

        $sql = 'SELECT * FROM hoadonchitiet INNER JOIN sanpham ON hoadonchitiet.maSP=sanpham.maSP where  maHD="' . $id . '"';
        $result = $db->query($sql);
    }

    ?>

    <?php $rs2 = $result2->fetch(); ?>

    <br>
    <?php
    require "../function.php";

    if (isset($_POST['daThanhToan'])) {
        update_HoaDon($rs2['maHD'], "Đã Thanh Toán");
        header("location:order.php");
    }
    if (isset($_POST['ChuaThanhToan'])) {
        update_HoaDon($rs2['maHD'], "Chưa Thanh Toán");
        header("location:order.php");
    }
    if (isset($_POST['Huy'])) {
        update_HoaDon($rs2['maHD'], "Hủy Đơn");
        header("location:order.php");
    }

    ?>

    <div class="col-xl-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Thông Tin Đơn Hàng </h3>
                    </div>
                    <div class="col text-right">
                        <a href="#!" class="btn btn-sm btn-primary">Mã đơn: </i><?php echo $rs2['maHD'] ?></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">

                    <tbody>
                        <style>
                            td,
                            th:nth-child(2) {
                                text-align: left;
                            }

                            td:nth-child(5) {
                                text-align: center;
                            }
                        </style>
                        <tr>
                            <td width="150" scope="row">Tên khách hàng</td>
                            <td width="800"><?php echo $rs2['tenKH'] ?></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td><?php echo $rs2['email'] ?></td>
                        </tr>
                        <tr>
                            <td>Số điện thoại</td>
                            <td><?php echo $rs2['soDT'] ?></td>
                        </tr>
                        <tr>
                            <td>Địa chỉ Giao hàng</td>
                            <td><?php echo $rs2['diaChi'] ?></td>
                        </tr>
                        <tr>
                            <td>Thời gian đặt hàng</td>
                            <td><?php echo $rs2['ngayMua'] ?></td>
                        </tr>
                        <tr>
                            <td>Tổng Tiền</td>
                            <td><?php echo number_format($rs2['tongTien']) ?> VNĐ</td>
                        </tr>
                        <tr>
                            <td>Ghi chú</td>
                            <td><?php echo $rs2['ghiChu'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <br>
    <div class="dieu_khien">
        <form action="" method="post">
            <input class="btn btn-success " type="submit" name="daThanhToan" value="Xác Nhận Đã Thanh Toán">
            <input class="btn btn-warning " type="submit" name="ChuaThanhToan" value="Chưa Thanh Toán">
            <input class="btn btn-danger " type="submit" name="Huy" value="Hủy Đơn Hàng">
        </form>
    </div>
    <!-- điều khiển -->
    <br>
    <h3>Giỏ hàng</h3>






    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Giỏ Hàng</h3>
                        </div>
                        <div class="col text-right">
                            <!-- <a href="#!" class="btn btn-sm btn-primary">See all</a> -->
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <form action="" method="post">
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Mã SP</th>
                                    <th scope="col">Ảnh Sản Phẩm</th>
                                    <th scope="col">Tên Sản Phẩm</th>
                                    <th scope="col">số Lượng</th>
                                    <th scope="col">Đơn Giá</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $stt = 0;
                                while ($rs = $result->fetch()) {
                                    $stt++;

                                ?>
                                    <tr>
                                        <td><?php echo $stt; ?></td>
                                        <td><?php echo $rs['maSP'] ?></td>
                                        <td><img src="../images/<?php echo $rs['image'] ?>" alt=""></td>
                                        <td><?php echo $rs['tenSP'] ?></td>
                                        <td><?php echo $rs['soLuongMua'] ?></td>
                                        <td><?php echo number_format($rs['donGia']) ?> VNĐ</td>

                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                </div>
                <!--from-->

            </div>
        </div>


    </div>



















    <br>
    <div class="dieu_khien">
        <form action="" method="post">
            <input class="btn btn-success " type="submit" name="daThanhToan" value="Xác Nhận Đã Thanh Toán">
            <input class="btn btn-warning " type="submit" name="ChuaThanhToan" value="Chưa Thanh Toán">
            <input class="btn btn-danger " type="submit" name="Huy" value="Hủy Đơn Hàng">
        </form>
    </div>
    <!-- điều khiển -->








</div>
<?php

include '../inc/admin_footer.php';
?>