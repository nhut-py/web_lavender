<?php
$title = "Thông tin khách hàng";
include '../inc/admin_header.php';
?>
<!-- phần nội dung chính -->
<style>
    th,
    td {
        text-align: left;
    }
</style>
<div class="main">
    <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        require '../database.php';
        $sql1 = 'SELECT * FROM khachhang where maKH="' . $id . '"';
        $result1 = $db->query($sql1);

        $sql2 = "SELECT * FROM hoadon where maKH='" . $id . "' ";
        $result2 = $db->query($sql2);
    }

    ?>
     
    <?php $rs1 = $result1->fetch(); ?>
    <br>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="mb-0">Thông Tin Khách Hàng</h3>
                    </div>
                    <div class="col text-right">
                        <a href="#!" class="btn btn-sm btn-primary">Mã KH: <?php echo $rs1['maKH'] ?></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">

                    <tbody>
                        <tr>
                            <td width="170">Tên khách hàng</td>
                            <td width="800"><?php echo $rs1['tenKH'] ?></td>
                        </tr>
                        <tr>
                            <td> <i class="ni ni-circle-08"></i> Tài khoản</td>
                            <td><?php echo $rs1['username'] ?></td>
                        </tr>
                        <tr>
                            <td>Mật khẩu</td>
                            <td><input type="password" value="<?php echo $rs1['password'] ?>"></td>
                        </tr>
                        <tr>
                            <td><i class="ni ni-email-83"></i> Email</td>
                            <td><?php echo $rs1['email'] ?></td>
                        </tr>
                        <tr>
                            <td><i class="fas fa-phone"></i> Số điện thoại</td>
                            <td><?php echo $rs1['soDT'] ?></td>
                        </tr>
                        <tr>
                            <td><i class="ni ni-square-pin"></i> Địa chỉ Giao hàng</td>
                            <td><?php echo $rs1['diaChi'] ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <br>

    <br>



    <div class="col-xl-12">
        <?php
        $stt = 0;
        while ($rs2 = $result2->fetch()) {
        ?>
         
            <?php
            $maHD = $rs2['maHD'];

            $sql = 'SELECT * FROM hoadonchitiet INNER JOIN sanpham ON hoadonchitiet.maSP=sanpham.maSP where  maHD="' . $maHD . '"';
            $result = $db->query($sql);
            ?>

            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Giỏ Hàng (<?php echo ++$stt; ?>)</h3>
                       
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary">Mã Đơn Hàng: <?php echo $rs2['maHD'] ?> </a>
                            <span>Ngày Tạo: <?php echo $rs2['ngayMua'] ?></span>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">


                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Mã SP</th>
                                <th scope="col">Ảnh SP</th>
                                <th scope="col">Tên SP</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Đơn Giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                          $stt1=0;
                            while ($rs = $result->fetch()) {
                               

                            ?>
                                <tr>
                                    <td><?php echo ++$stt1; ?></td>
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
            </div>
        <?php } ?>
    </div>





















    <!-- điều khiển -->
</div>
</div>

</div>

</body>

</html>