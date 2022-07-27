<?php
 function update_HoaDon($maHD,$tinhTrang){
    require 'database.php';
    $sql1 = "UPDATE hoadon SET tinhTrang='".$tinhTrang."' WHERE maHD='".$maHD."'  ";
    $db->exec($sql1);
    
}

function xoaKhachHang($maKH)
{
    require 'database.php';
    $sql1 = "DELETE FROM khachhang where maKH='".$maKH."' ";
    $db->exec($sql1);
}
function xoaDanhMuc($maDanhMuc)
{
    require 'database.php';
    $sql1 = "DELETE FROM danhmuc where maDanhMuc='".$maDanhMuc."' ";
    $db->exec($sql1);
}

?>