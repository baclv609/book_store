<?php

function select_1_sach(){
    $sql ="SELECT gio_hang_items.id,( gio_hang_items.so_luong * products.gia ) AS tongsotien, gio_hang_items.so_luong,products.gia AS gia, ( gio_hang_items.so_luong * products.gia ) AS thanhtien, products.ten ,products.img AS hinhAnh
     FROM gio_hang_items
     JOIN  products ON products.id=gio_hang_items.product_id";
    $gioHang = pdo_query($sql);
    return $gioHang;
}
function delete_gio_hang($id){
    $sql = "DELETE FROM gio_hang_items WHERE id = $id";
    pdo_query($sql);
}
function add_gio_hang($product_id,$so_luong,$gia){
    $sql= "INSERT INTO `gio_hang_items`( `product_id`, `so_luong`, `gia`) 
    VALUES ('$product_id','$so_luong','$gia')";
    pdo_execute($sql);
}

?>
