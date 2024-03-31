<?php

function select_1_sach()
{
    $sql = "SELECT gio_hang_items.id,products.id as id_product, gio_hang_items.so_luong,products.gia AS gia, ( gio_hang_items.so_luong * products.gia ) 
    AS thanhtien, products.ten ,products.img AS hinhAnh 
    FROM gio_hang_items 
    JOIN products ON products.id=gio_hang_items.product_id 
    ORDER BY gio_hang_items.id desc";
    $gioHang = pdo_query($sql);
    return $gioHang;
}

function delete_gio_hang($id)
{
    $sql = "DELETE FROM gio_hang_items WHERE id = $id";
    pdo_query($sql);
}
function add_gio_hang($product_id, $so_luong, $gia)
{
    $sql = "INSERT INTO `gio_hang_items`( `product_id`, `so_luong`, `gia`) 
    VALUES ('$product_id','$so_luong','$gia')";
    pdo_execute($sql);
}
function tong_gia()
{
    $sql = "SELECT `id`, `product_id`, `so_luong`, `gia` ,SUM(so_luong*gia) AS tong FROM `gio_hang_items` ";
    $tongGia = pdo_query($sql);
    return $tongGia;
}
function update_SanPham_Da_co_cart($so_luong, $id_product){
    $sql = "UPDATE `gio_hang_items` SET `so_luong`='$so_luong' WHERE product_id =  $id_product";
    pdo_query($sql);
}
?>