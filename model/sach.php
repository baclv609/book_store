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
// function list_sach($danh_muc_id, $searchSp)
// {
//     $sql = "SELECT products.id,products.ten, products.img, products.gia, products.danh_muc_id, products.gia_sale, products.mo_ta, products.created_at, tac_gia.name AS tac_gia_name, danh_muc.name AS danh_muc_name, nha_san_xua.name AS nha_san_xua_name 
//     FROM products 
//     JOIN tac_gia 
//     ON tac_gia.id = products.tacGia_id 
//     JOIN danh_muc ON danh_muc.id = products.danh_muc_id 
//     JOIN nha_san_xua ON nha_san_xua.id = products.nha_san_xuat_id WHERE 1";

//     // $sql = "SELECT * FROM products WHERE 1";
//     if ($searchSp != "") {
//         $sql .= " AND name LIKE '%" . $searchSp . "%'";
//     }
//     $sql .= " ORDER BY id desc";
//     // echo $sql;
//     // die();

//     if ($danh_muc_id > 0) {
//         $sql .= " AND products.danh_muc_id = " . $danh_muc_id;
//     }

//     $sql .= " ORDER BY products.id DESC";
//     $listSach = pdo_query($sql);
//     return $listSach;
// }

function list_sach($danh_muc_id, $searchSp, $tacGia_id)
{
    // SQL query to select the necessary data from the 'products' table and join it with other related tables
    $sql = "SELECT products.id, products.tacGia_id, products.ten, products.img, products.gia, products.danh_muc_id, products.gia_sale, products.mo_ta, products.created_at, tac_gia.name AS tac_gia_name, danh_muc.name AS danh_muc_name, nha_san_xua.name AS nha_san_xua_name 
    FROM products 
    JOIN tac_gia ON tac_gia.id = products.tacGia_id 
    JOIN danh_muc ON danh_muc.id = products.danh_muc_id 
    JOIN nha_san_xua ON nha_san_xua.id = products.nha_san_xuat_id WHERE 1";

    // Add search criteria for product name
    if ($searchSp != "") {
        $sql .= " AND products.ten LIKE '%" . $searchSp . "%'";
    }

    // Add filter criteria for category ID
    if ($danh_muc_id > 0) {
        $sql .= " AND products.danh_muc_id = " . $danh_muc_id;
    }

    // Add filter criteria for author ID
    if ($tacGia_id > 0) {
        $sql .= " AND products.tacGia_id = " . $tacGia_id;
    }

    // Sort the results by product ID in descending order
    $sql .= " ORDER BY products.id DESC";

    // Execute the SQL query and retrieve the list of products
    $listSach = pdo_query($sql);

    // Return the list of products
    return $listSach;
}

function select_spct($id)
{
    $sql = "SELECT products.id,products.ten, products.img,products.tacGia_id, products.gia, products.gia_sale, products.mo_ta, products.created_at, products.danh_muc_id, tac_gia.name AS tac_gia_name, danh_muc.name AS danh_muc_name, nha_san_xua.name AS nha_san_xua_name FROM products JOIN tac_gia ON tac_gia.id = products.tacGia_id JOIN danh_muc ON danh_muc.id = products.danh_muc_id JOIN nha_san_xua ON nha_san_xua.id = products.nha_san_xuat_id WHERE products.id = $id";

    $listSach = pdo_query_one($sql);
    return $listSach;
}

function Select_sach_cungLoai($id, $danh_muc_id)
{
    $sql = "SELECT * FROM products WHERE danh_muc_id = $danh_muc_id and id != $id";
    $listSp = pdo_query($sql);
    return $listSp;
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

function update_sanpham_coHinhAnh($id,$tenSanPham, $tacGiaId, $danhMucId, $nhaSanXuatId, $filename, $gia, $giaSale, $moTa)
{

$sql = "UPDATE `products` SET 
`ten`='$tenSanPham',
`tacGia_id`='$tacGiaId',
`danh_muc_id`='$danhMucId',
`nha_san_xuat_id`='$nhaSanXuatId',
`img`='$filename',
`gia`='$gia',
`gia_sale`='$giaSale',
`mo_ta`='$moTa' 
 WHERE  id='$id'";
    pdo_execute($sql);
}
// ($tenSanPham, $tacGiaId, $danhMucId, $nhaSanXuatId, $filename, $gia, $giaSale, $moTa)
// $id, $tenSanPham,$tacGiaId,$nhaSanXuatId,$danhMucId,$gia,$giaSale,$moTa
function update_sanpham_KhongHinhAnh($id, $tenSanPham,$tacGiaId,$nhaSanXuatId,$danhMucId,$gia,$giaSale,$moTa)
{
    $sql = "UPDATE `products` SET 
    `ten`='$tenSanPham',
    `tacGia_id`='$tacGiaId',
    `danh_muc_id`='$danhMucId',
    `nha_san_xuat_id`='$nhaSanXuatId',
    `gia`='$gia',
    `gia_sale`='$giaSale',
    `mo_ta`='$moTa' 
     WHERE  id='$id'";
    //  echo $sql;
    //  die();
    pdo_execute($sql);

}
?>