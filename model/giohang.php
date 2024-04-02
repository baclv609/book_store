<?php

function select_1_sach($id_user)
{
    $sql = "SELECT gio_hang_items.id,products.id as id_product,gio_hang_items.loai_bia, gio_hang_items.so_luong,products.gia AS gia, ( gio_hang_items.so_luong * products.gia ) 
    AS thanhtien, products.ten ,products.img AS hinhAnh 
    FROM gio_hang_items 
    JOIN products ON products.id=gio_hang_items.product_id 
    WHERE gio_hang_items.user_id = $id_user
    ORDER BY gio_hang_items.id desc";
    $gioHang = pdo_query($sql);
    return $gioHang;
}

function delete_gio_hang($id)
{
    $sql = "DELETE FROM gio_hang_items WHERE id = $id";
    pdo_query($sql);
}
function add_gio_hang($id_user, $product_id, $so_luong, $gia, $loai_bia)
{
    $sql = "INSERT INTO gio_hang_items(user_id, product_id, so_luong, gia,loai_bia) 
     VALUES ('$id_user','$product_id','$so_luong','$gia','$loai_bia')";
    // echo $sql;
    // die;
    pdo_execute($sql);
}
function tong_gia($id_user)
{
    $sql = "SELECT id, product_id, so_luong, gia ,SUM(so_luong*gia) AS tong FROM gio_hang_items WHERE gio_hang_items.user_id = $id_user";
    $tongGia = pdo_query($sql);
    return $tongGia;
}
function update_SanPham_Da_co_cart($id_user, $so_luong, $id_product, $loai_bia, $gia)
{
    $sql = "UPDATE gio_hang_items 
    SET so_luong = $so_luong 
    WHERE product_id = $id_product 
    AND loai_bia = '$loai_bia' 
    AND gio_hang_items.user_id = $id_user";
    // echo $sql;
    // die;
    pdo_execute($sql);
}
?>