<head>
    <!-- <link rel="icon" href="assets/img/brand/favicon.png" type="image/png"> -->
    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <!-- Icons -->
    <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <!-- Argon CSS -->
    <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
</head>

<?php
$title = "Bảng tin";
include '../inc/admin_header.php';
?>

<div class="main">
    <?php
    // đếm số lượng đơn hàng
    require '../database.php';
    $sql_hd = "SELECT COUNT(maHD) AS count_hd  FROM hoadon";
    $result_hd = $db->query($sql_hd);
    $rs_hd = $result_hd->fetch();

    // đếm số lượng khách hàng
    $sql_user = "SELECT COUNT(maKH) AS count_user  FROM khachhang";
    $result_user = $db->query($sql_user);
    $rs_user = $result_user->fetch();

    // đếm số lượng sản phẩm
    $sql_sp = "SELECT COUNT(maSP) AS count_sp  FROM sanpham";
    $result_sp = $db->query($sql_sp);
    $rs_sp = $result_sp->fetch();

    // tổng tiền


    $sql_money = "SELECT SUM(tongTien) AS tong_tien  FROM hoadon where tinhTrang='Đã Thanh Toán'";
    $result_money = $db->query($sql_money);
    $rs_money = $result_money->fetch();

    // echo $test1;
    ?>
    <br>
    <h2 class="card-title text-uppercase text-muted mb-0">Bảng Tin</h2>
    <br>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Đơn Hàng</h5>
                            <span class="h2 font-weight-bold mb-0"><?php echo $rs_hd['count_hd']; ?></span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                <i class="ni ni ni-box-2"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap"><a href="order.php">Xem Chi Tiết</a></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Khách hàng</h5>
                            <span class="h2 font-weight-bold mb-0"><?php echo $rs_user['count_user']; ?></span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                <i class="ni ni-circle-08"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                      
                        <span class="text-nowrap"><a href="customer.php">Xem Chi Tiết</a></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Sản phẩm</h5>
                            <span class="h2 font-weight-bold mb-0"><?php echo $rs_sp['count_sp']; ?></span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                <i class="ni ni ni-bag-17"></i>

                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap"><a href="product.php">Xem Chi Tiết</a></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title text-uppercase text-muted mb-0">Thu nhập</h5>
                            <span class="h2 font-weight-bold mb-0"><?php echo number_format($rs_money['tong_tien']); ?> VNĐ</span>
                        </div>
                        <div class="col-auto">
                            <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                <i class="ni ni-money-coins"></i>
                            </div>
                        </div>
                    </div>
                    <p class="mt-3 mb-0 text-sm">
                    <span class="text-nowrap"><a href="order.php">Xem Chi Tiết</a></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!--row-->
    <!-- <div class="container-fluid mt--6"> -->
    <div class="row">

    </div>
   
    <!-- Footer -->

    <!-- </div> -->
    <!--container fiul-->

</div>
<!--main -->
<?php include '../inc/admin_footer.php' ?>