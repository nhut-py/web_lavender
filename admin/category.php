<?php
$title = "Danh Mục";
include '../inc/admin_header.php';
?>
<div class="main">
    <?php

    require '../database.php';
    $sql = "SELECT * FROM danhmuc ";
    $result = $db->query($sql);




    if (isset($_POST['addDanhMuc'])) {

        $tenDanhMuc = $_POST['tenDanhMuc'];
        require '../database.php';
        $sql1 = "INSERT INTO danhmuc values('','" . $tenDanhMuc . "')";
        $result1 = $db->exec($sql1);

        header("location: category.php");
    }


    ?>
    <!-- thêm sản phẩm -->

    <div class="form">
        <form action="" method="post">
            <div class="form-left">
                <h2>Thêm Danh Mục</h2>
                <div class="form-group">
                    <label for="">Tên Danh Mục</label>
                    <input type="text" name="tenDanhMuc">
                </div>

                <!-- submit -->
                <div class="form-group">
                    <button class="btn-submit" type="submit" name="addDanhMuc" value="Sửa">Thêm Danh Mục</button>
                </div>
            </div>
            <!--form-left-->

        </form>
    </div> <!-- form-->

    <div class="form-right">

        <?php
        if (isset($_GET['delete_dm'])) {
            require '../function.php';
            $maDM = $_GET['delete_dm'];

            xoaDanhMuc($maDM);
            header("location:category.php");
        }
        ?>




        <div class="col-xl-12">
            <div class="card">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-0">Tất Cả Danh Mục</h3>
                        </div>
                        <div class="col text-right">
                            <a href="#!" class="btn btn-sm btn-primary">See all</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Tên danh mục</th>
                                <th scope="col">Số lượng </th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($rs = $result->fetch()) {
                                $maDM = $rs['maDanhMuc'];
                                //đếm số lượng sản phẩm có trong danh mục
                                $sql_dem = "SELECT COUNT(maSP) as count_sp FROM sanpham where maDanhMuc='" . $maDM . "'";
                                $result_dem = $db->query($sql_dem);
                                $rs_dem = $result_dem->fetch();
                            ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $rs['tenDanhMuc'] ?>
                                    </th>

                                    <td>

                                        <div class="d-flex align-items-center">
                                            <span class="mr-2"> <?php echo $rs_dem['count_sp'] ?></span>
                                            <div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-gradient-danger" role="progressbar" aria-valuenow="   <?php echo $rs_dem['count_sp'] ?>" aria-valuemin="0" aria-valuemax="100" style="width:<?php echo $rs_dem['count_sp'] ?>%;"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td><a href="category.php?delete_dm=<?php echo $rs['maDanhMuc'] ?>"><button  class="btn  btn-danger">Xóa</button></a></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>

    <!--form right-->



</div>
</div>

</div>

</body>

</html>