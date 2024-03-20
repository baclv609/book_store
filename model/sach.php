<?php
function insert_sach($name)
{
    $sql = "INSERT INTO `products`(`ten`, `tacGia_id`, `danh_muc_id`, `nha_san_xuat_id`, `img`, `the_loai_id`, `gia`, `gia_sale`, `mo_ta`, `created_at`) 
    VALUES 
    ('[value-1]','tacGia_id','[value-3]','danh_muc_id','nha_san_xuat_id','img','[value-7]','the_loai_id','gia','gia_sale','mo_ta','created_at')";
    pdo_execute($sql);
}
function delete_sach($id)
{
    $sql = "DELETE FROM danh_muc WHERE id = $id";
    pdo_query($sql);
}
function list_sach($searchName)
{
    $sql = "SELECT * FROM danh_muc WHERE 1";
    if ($searchName != "") {
        $sql .= " AND name LIKE '%" . $searchName . "%'";
    }
    $sql .= " ORDER BY id desc";
    // echo $sql;
    // die();
    $listDm = pdo_query($sql);
    return $listDm;
}
function edit_sach($id)
{
    $sql = "SELECT * FROM danh_muc WHERE id = $id";
    $dm = pdo_query_one($sql);
    return $dm;
}
function update_sach($id, $name)
{
    $sql = "UPDATE danh_muc
                SET name='$name' WHERE id = $id";
    pdo_execute($sql);
}
?>