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
function add_gio_hang($id,$gio_hang_id,$product_id,$so_luong){
    $sql= "INSERT INTO `gio_hang_items`(`id`, `gio_hang_id`, `product_id`, `so_luong`) 
    VALUES ('$id','$gio_hang_id','$product_id','$so_luong')";
    pdo_execute($sql);
}
// function add_to_card(){
//     $sql ="INSERT INTO gio_hang_items (`id`, `gio_hang_id`, `product_id`, `so_luong`)
//     SELECT gio_hang_items.id,( gio_hang_items.so_luong * products.gia ) AS tongsotien, gio_hang_items.so_luong,products.gia AS gia, ( gio_hang_items.so_luong * products.gia ) AS thanhtien, products.ten ,products.img AS hinhAnh
//      FROM gio_hang_items
//      JOIN  products ON products.id=gio_hang_items.product_id";
//     //  pdo_execute($sql);
//     //  $add_to_card = pdo_query($sql);
//     //  return $add_to_card;

// }
?>
