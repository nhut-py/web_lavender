<?php
$title = "Quản lý khách hàng";
include '../inc/admin_header.php';
?>

<div class="main">
    <!-- thêm sản phẩm -->

    <br>
    <?php
    require '../database.php';

    $sql = "SELECT * FROM khachhang";
    $result = $db->query($sql);

    if (isset($_GET['delete_kh'])) {
        $id = $_GET['delete_kh'];
        require '../function.php';
        xoaKhachHang($id);
        header("location:customer.php");
    }



    ?>
    <style>


    </style>
    
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Quản Lý Khách Hàng</h3>
                            </div>
                            <div class="col text-right">
                                <!-- <a href="#!" class="btn btn-sm btn-primary">See all</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <form action="" method="post">
                            <!-- Projects table -->
                            <table class="table align-items-center table-flush ">
                                <thead class="thead-light">
                                    <tr class="table_01">
                                        <th>STT</th>
                                        <th>Mã KH</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Tài Khoản</th>
                                        <th>Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Địa Chỉ</th>
                                        <th>Tùy Chỉnh</th>


                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- code xóa khách hàng -->
                                    <style>
                                        th,
                                        td {
                                            text-align: left;

                                        }

                                        td:nth-child(2) {
                                            max-width: 90px;
                                        }

                                        th:nth-child(2) {
                                            max-width: 90px;
                                        }

                                       

                                        th:nth-child(1) {
                                            max-width: 60px;
                                            padding-left: 0px;
                                            padding-right: 0px;
                                        }
                                        td:nth-child(7) {
                                            width: 200px;
                                            padding-left: 0px;
                                            padding-right: 0px;
                                        }

                                     

                                       
                                    </style>

                                    <?php
                                    $stt = 0;
                                    while ($rs = $result->fetch()) {
                                        $stt++;
                                    ?>
                                        <tr>
                                            <td><?php echo $stt; ?></td>
                                            <td><i class="fas fa-barcode"></i> <?php echo $rs['maKH'] ?></td>
                                            <td><?php echo $rs['tenKH'] ?></td>
                                            <td><i class="ni ni-single-02"> <?php echo $rs['username'] ?></td>
                                            <td><i class="ni ni-email-83"></i> <?php echo $rs['email'] ?> </td>
                                            <td><i class="fas fa-phone"></i> <?php echo $rs['soDT'] ?></td>
                                            <td><i class="ni ni-square-pin"></i> <?php echo $rs['diaChi'] ?></td>

                                            <td><a class="btn  btn-default" href="customer_order_detail.php?id=<?php echo $rs['maKH'] ?>">Xem </a>
                                                <!-- <button class="btn btn_sua">Sửa</button> -->
                                                <a class="btn btn_xoa btn-danger" onclick="return confirm('Bạn có chắc xóa khách hàng này')" href="customer.php?delete_kh=<?php echo $rs['maKH'] ?>">Xóa</a>
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

</body>

</html>