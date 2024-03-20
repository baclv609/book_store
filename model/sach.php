<?php
function insert_sach($tenSanPham, $tacGia_id, $danh_muc_id, $nha_san_xuat_id, $img, $gia, $gia_sale, $mo_ta, $created_at)
{
    $sql = "INSERT INTO `products`(`ten`, `tacGia_id`, `danh_muc_id`, `nha_san_xuat_id`, `img`, `gia`, `gia_sale`, `mo_ta`, `created_at`) 
    VALUES 
    ('$tenSanPham', '$tacGia_id', '$danh_muc_id', '$nha_san_xuat_id', '$img', '$gia', '$gia_sale', '$mo_ta', '$created_at')";
    pdo_execute($sql);
}
function delete_sach($id)
{
    $sql = "DELETE FROM products WHERE id = $id";
    pdo_query($sql);
}
function list_sach()
{
    $sql = "SELECT products.id,products.ten, products.img, products.gia, products.gia_sale, products.mo_ta, products.created_at, tac_gia.name AS tac_gia_name, danh_muc.name AS danh_muc_name, nha_san_xua.name AS nha_san_xua_name 
    FROM products 
    JOIN tac_gia 
    ON tac_gia.id = products.tacGia_id 
    JOIN danh_muc ON danh_muc.id = products.danh_muc_id 
    JOIN nha_san_xua ON nha_san_xua.id = products.nha_san_xuat_id;";

    // if ($searchName != "") {
    //     $sql .= " AND name LIKE '%" . $searchName . "%'";
    // }
    // $sql .= " ORDER BY id desc";
    // echo $sql;
    // die();
    $listSach = pdo_query($sql);
    return $listSach;
}
function edit_sach($id)
{
    $sql = "SELECT * FROM products WHERE id = $id";
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_sach($id, $name)
{
    $sql = "UPDATE products
                SET name='$name' WHERE id = $id";
    pdo_execute($sql);
}
?>