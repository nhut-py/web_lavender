<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
 
</head>

<body>
    <!-- Start Product  -->
    <!-- start product -->
    <?php
    require_once('database.php');
    $sql = "SELECT * From sanpham Where maDanhMuc ='003' ORDER BY maSP DESC";
    $result = $db->query($sql);
    //  với 003 là thời trang dành cho nam

    //danh mục phân loại
    $sqll = 'SELECT * FROM danhmuc';
    $result1 = $db->query($sqll);

    //điều kiện hiển thị
    if (isset($_GET['maDanhMuc'])) {
        $maDanhMuc = $_GET['maDanhMuc'];
        echo $maDanhMuc;
        $sql = "SELECT * FROM sanpham,danhmuc WHERE sanpham.maDanhMuc=danhmuc.maDanhMuc AND danhmuc.maDanhMuc ='" . $maDanhMuc . "' ORDER BY sanpham.maSP DESC";
        $result = $db->query($sql);
    }


    ?>
    <!-- End Product -->

    <!-- Shopping cart -->
    <?php
    session_start();
    require_once('database.php');
    if (isset($_GET['maSP'])) {
        $maSP = $_GET['maSP'];

        $sql = "SELECT * FROM sanpham WHERE maSP = '" . $maSP . "' ";
        $result = $db->query($sql);
        $rs = $result->fetch();


        if (!empty($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];

         
            // Kiểm tra lần thứ 2 mua hàng đã có id phần tử mảng hay chưa dùng hàm array_key_exists
            if (array_key_exists($maSP, $cart)) {
                $cart[$maSP] = array(
                    "sl" => (int)$cart[$maSP]["sl"] + 1,
                    "price" => $rs[4],
                    "image"=> $rs[2],
                    "name" => $rs[1]

                );
            } else {
                $cart[$maSP] = array(
                    "sl" => 1,
                    "price" => $rs[4],
                    "image"=> $rs[2],
                    "name" => $rs[1]

                );
            }
        } else {
            // Lần đầu tiên mua hàng
            $cart[$maSP] = array(
                "sl" => 1,
                "price" => $rs[4],
                "image"=> $rs[2],
                "name" => $rs[1]

            );
        }
        $_SESSION['cart'] = $cart;
        echo '<pre>';
        echo print_r(  $_SESSION['cart']);
        echo '</pre>';
    } else {
    }
    header('location:thanh_toan.php');
    ?>
    <!-- End Shopping cart -->

    <!--
              Check đăng nhập
             -->
    <?php
    if (!isset($_SESSION['username'])) {
    ?>
        <a href="user_register.php">Đăng ký</a> |
        <a href="pdo_login.php">Đăng nhập</a>
    <?php } else { ?>
        <a href="user_register.php" style="display:none">Đăng ký</a> |
        <a href="pdo_login.php" style="display:none">Đăng nhập</a>
        <a href="#"><i class="far fa-smile-beam"></i> Xin chào: <span style="font-size: 17px"><?php echo $_SESSION['username'] ?></span></a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a>
        <a href="list-product.php"><i class="fas fa-shopping-cart fa-lg"></i></a>
    <?php } ?>

   
    </header>
    
 
</body>

</html>