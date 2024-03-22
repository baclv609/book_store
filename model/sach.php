<?php
function insert_sach($tenSanPham, $tacGia_id, $danh_muc_id, $nha_san_xuat_id, $gia, $gia_sale, $mo_ta, $created_at)
{

    $sql = "INSERT INTO `products`(`ten`, `tacGia_id`, `danh_muc_id`, `nha_san_xuat_id`, `gia`, `gia_sale`, `mo_ta`, `created_at`) 
    VALUES 
    ('$tenSanPham', '$tacGia_id', '$danh_muc_id', '$nha_san_xuat_id', '$gia', '$gia_sale', '$mo_ta', '$created_at')";
    return pdo_execute_return_lastInsertId($sql);

}
function delete_sach($id)
{
    $sql = "DELETE FROM products WHERE id = $id";
    pdo_query($sql); 
    $sql2 = "DELETE FROM product_images WHERE product_id = $id";
    pdo_query($sql2);
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
    $sql = "SELECT products.id, products.tacGia_id, products.ten, products.gia, products.danh_muc_id, products.gia_sale, products.mo_ta, products.created_at, tac_gia.name AS tac_gia_name, danh_muc.name AS danh_muc_name, nha_san_xua.name AS nha_san_xua_name 
    FROM products 
    JOIN tac_gia ON tac_gia.id = products.tacGia_id 
    JOIN danh_muc ON danh_muc.id = products.danh_muc_id 
    JOIN nha_san_xua ON nha_san_xua.id = products.nha_san_xuat_id WHERE 1";

    if ($searchSp != "") {
        $sql .= " AND products.ten LIKE '%" . $searchSp . "%'";
    }

    if ($danh_muc_id > 0) {
        $sql .= " AND products.danh_muc_id = " . $danh_muc_id;
    }
    if ($tacGia_id > 0) {
        $sql .= " AND products.tacGia_id = " . $tacGia_id;
    }
    $sql .= " ORDER BY products.id DESC";
    // echo $sql;
// die;
    $listSach = pdo_query($sql);

    $sql2 = "SELECT * FROM `product_images` WHERE 1";
    $listImage = pdo_query($sql2);
    $list_Products = [];
    foreach ($listSach as $key => $value) {
        $itemProduct = $value;
        $itemProduct['images'] = getImageByProductId($listImage, $value['id']);
        $list_Products[] = $itemProduct;
    }
    //     echo '<pre>';
// print_r($list_Products);
// die;
    return $list_Products;
}
function getImageByProductId($data, $productID)
{
    $thumbnails = array();
    foreach ($data as $item) {
        if ($item['product_id'] == $productID) {
            $thumbnails[] = $item['thumbnail'];
        }
    }

    return $thumbnails;
}
// ...

function select_spct($id)
{
    $sql = "SELECT products.id,products.ten, products.tacGia_id, products.gia, products.gia_sale, products.mo_ta, products.created_at, products.danh_muc_id, tac_gia.name AS tac_gia_name, danh_muc.name AS danh_muc_name, nha_san_xua.name AS nha_san_xua_name FROM products JOIN tac_gia ON tac_gia.id = products.tacGia_id JOIN danh_muc ON danh_muc.id = products.danh_muc_id JOIN nha_san_xua ON nha_san_xua.id = products.nha_san_xuat_id WHERE products.id = $id";

    $listSach = pdo_query_one($sql);
    $sql2 = "SELECT * FROM `product_images` WHERE product_images.product_id = $id";
    $listImage = pdo_query($sql2);
    $listSach['images'] = getImageByProductId($listImage, $id);
    // print_r($listSach);
    // die;
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

function update_sanpham($id, $tenSanPham, $tacGiaId, $danhMucId, $nhaSanXuatId,  $gia, $giaSale, $moTa)
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
    pdo_execute($sql);
}

function insert_imageProducts($product_id, $thumbnail)
{
    $sql = "INSERT INTO 
    `product_images`(
         `product_id`,  `thumbnail`) 
         VALUES (
    '$product_id','$thumbnail')";
    pdo_execute($sql);

}
?>