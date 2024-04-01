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
    echo $sql;
    // die;
    pdo_execute($sql);
}
function tong_gia($id_user)
{
    $sql = "SELECT id, product_id, so_luong, gia ,SUM(so_luong*gia) AS tong FROM gio_hang_items WHERE gio_hang_items.user_id = $id_user";
    $tongGia = pdo_query($sql);
    return $tongGia;
}
// function update_SanPham_Da_co_cart($so_luong, $id_product,$loai_bia)
// {
//     $sql = "UPDATE gio_hang_items SET so_luong='$so_luong' WHERE product_id =  $id_product AND loai_bia = $loai_bia";
//     // echo $sql;
//     // die;
//     pdo_query($sql);
// }
function Check_IDProduct_loai_bia($id_product, $loai_bia)
{
    $sql = "SELECT COUNT(*) AS count FROM gio_hang_items WHERE product_id = ? AND loai_bia = ?";
    return pdo_query_value($sql, $id_product, $loai_bia);
}
function update_SanPham_Da_co_cart($so_luong, $id_product, $loai_bia, $gia)
{
    // $sql = "SELECT COUNT(*) AS count FROM gio_hang_items WHERE product_id = ? AND loai_bia = ?";
    // $count = pdo_query_value($sql, $id_product, $loai_bia);
    // echo $count;
    // if ($count > 0) {
    // Đã có bản ghi với product_id và loai_bia tương ứng, thực hiện update số lượng
    $sql = "UPDATE gio_hang_items SET so_luong = $so_luong WHERE product_id = $id_product AND loai_bia = '$loai_bia'";
    // echo $sql;
    // die;
    pdo_execute($sql);
    // }
    // if ($count <= 0) {
    //     // Chưa có bản ghi với product_id và loai_bia tương ứng, thực hiện thêm mới dữ liệu
    //     $id_user = $_SESSION['user']['id']; // Lấy id_user từ session hoặc tham số truyền vào
    //     add_gio_hang($id_user, $id_product, $so_luong - 1, $gia, $loai_bia);
    //     // echo $sql;
    //     // die;
    // }
}
?>