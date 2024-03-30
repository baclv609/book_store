<?php

function select_1_sach(){
    $sql ="SELECT gio_hang_items.id,( gio_hang_items.so_luong * products.gia ) AS tongsotien, gio_hang_items.so_luong,products.gia AS gia, ( gio_hang_items.so_luong * products.gia ) AS thanhtien, products.ten ,products.img AS hinhAnh
     FROM gio_hang_items
     JOIN  products ON products.id=gio_hang_items.product_id";
    $gioHang = pdo_query($sql);
    return $gioHang;
}

?>