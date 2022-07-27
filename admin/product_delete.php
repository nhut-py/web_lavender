<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    require '../database.php';
	$sql = "DELETE from sanpham WHERE maSP='".$id."'";

    $result=$db->query($sql);

	header("location:product.php");

}
?>
