<?php
// function insert_sach($tenSanPham, $tacGia_id, $danh_muc_id, $nha_san_xuat_id, $img, $gia, $gia_sale, $mo_ta, $created_at)
// {
//     $sql = "INSERT INTO `products`(`ten`, `tacGia_id`, `danh_muc_id`, `nha_san_xuat_id`, `img`, `gia`, `gia_sale`, `mo_ta`, `created_at`) 
//     VALUES 
//     ('$tenSanPham', '$tacGia_id', '$danh_muc_id', '$nha_san_xuat_id', '$img', '$gia', '$gia_sale', '$mo_ta', '$created_at')";
//     pdo_execute($sql);
// }
function insert_sach(
    $tenSanPham,
    $danhMucId,
    $nhaSanXuatId,
    $filename,
    $gia,
    $giaSale,
    $moTa,
    $created_at
) {
    // Thực hiện truy vấn SQL để chèn dữ liệu vào bảng "sách"
    $sql = "INSERT INTO products (ten, danh_muc_id, nha_san_xuat_id, img, gia, gia_sale, mo_ta, created_at) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $conn = pdo_get_connection();
    $stmt = $conn->prepare($sql);
    $stmt->execute([$tenSanPham, $danhMucId, $nhaSanXuatId, $filename, $gia, $giaSale, $moTa, $created_at]);
    return $conn->lastInsertId();
}
function insert_sach_tac_gia($sachId, $tacGiaId)
{
    $sql = "INSERT INTO produt_tac_gia (product_id, tac_gia_id) 
            VALUES ('$sachId', '$tacGiaId')";
    pdo_execute($sql);
}
function delete_sach($id)
{
    $sql = "DELETE FROM products WHERE id = $id";
    pdo_query($sql);
}
function list_sach($danh_muc_id, $searchSp, $tacGia_id)
{
    $sql = "SELECT tac_gia.id as idig, tac_gia.name, products.id , products.ten, products.img, products.gia, products.danh_muc_id, products.gia_sale, products.mo_ta, products.created_at, danh_muc.name AS danh_muc_name, nha_san_xua.name AS nha_san_xua_name 
    FROM products 
    JOIN danh_muc ON danh_muc.id = products.danh_muc_id 
    JOIN nha_san_xua ON nha_san_xua.id = products.nha_san_xuat_id
    JOIN produt_tac_gia ON produt_tac_gia.product_id = products.id
    JOIN tac_gia ON produt_tac_gia.tac_gia_id = tac_gia.id WHERE 1";

    if ($searchSp != "") {
        $sql .= " AND products.ten LIKE '%" . $searchSp . "%'";
    }

    if ($danh_muc_id > 0) {
        $sql .= " AND products.danh_muc_id = " . $danh_muc_id;
    }

    if ($tacGia_id ) {
        $sql .= " AND tac_gia.id IN ($tacGia_id) " ;
    }

    // Sort the results by product ID in descending order
    $sql .= " ORDER BY products.id DESC";

    // Execute the SQL query and retrieve the list of products
    $listSach = pdo_query($sql);

    // Return the list of products
    return $listSach;
}
// function loc_tacgia($tacGia_id){
//     $sql = "SELECT tac_gia.name, products.id, products.ten, products.img, products.gia, products.danh_muc_id, products.gia_sale, products.mo_ta, products.created_at, danh_muc.name AS danh_muc_name, nha_san_xua.name AS nha_san_xua_name 
//     FROM products 
//     JOIN danh_muc ON danh_muc.id = products.danh_muc_id 
//     JOIN nha_san_xua ON nha_san_xua.id = products.nha_san_xuat_id
//     JOIN produt_tac_gia ON produt_tac_gia.product_id = products.id
//     JOIN tac_gia ON produt_tac_gia.tac_gia_id = tac_gia.id WHERE 1";
//     if ($tacGia_id = 'produt_tac_gia.tac_gia_id') {
//         $sql .= " AND produt_tac_gia.tac_gia_id = " . $tacGia_id;
//     }
//     $loc_tacgia = pdo_query($sql);
//     return $loc_tacgia;
// }
function list_sach_flashSale_home()
{
    // SQL query to select the necessary data from the 'products' table and join it with other related tables
    $sql = "SELECT * FROM products WHERE gia_sale IS NOT NULL AND gia_sale <> 0;";

    $listSach = pdo_query($sql);

    return $listSach;
}

function list_sach_banchay_home()
{
    $sql = "SELECT products.id, products.ten, products.img, products.gia, products.danh_muc_id, products.gia_sale, products.mo_ta, products.created_at, danh_muc.name AS danh_muc_name, nha_san_xua.name AS nha_san_xua_name 
    FROM products 
    JOIN danh_muc ON danh_muc.id = products.danh_muc_id 
    JOIN nha_san_xua ON nha_san_xua.id = products.nha_san_xuat_id   
    ORDER BY products.id DESC
    LIMIT 5;";
    // SELECT products.id, products.tacGia_id, products.ten, products.img, products.gia, products.danh_muc_id, products.gia_sale, products.mo_ta, products.created_at, tac_gia.name AS tac_gia_name, danh_muc.name AS danh_muc_name, nha_san_xua.name AS nha_san_xua_name 
// FROM products 
// JOIN tac_gia ON tac_gia.id = products.tacGia_id 
// JOIN danh_muc ON danh_muc.id = products.danh_muc_id 
// JOIN nha_san_xua ON nha_san_xua.id = products.nha_san_xuat_id   
    $listSach = pdo_query($sql);
    return $listSach;
}
function select_spct($id)
{
    $sql = "SELECT products.id,products.ten, products.img, products.gia, products.gia_sale, products.mo_ta, products.created_at, products.danh_muc_id,  danh_muc.name AS danh_muc_name, nha_san_xua.name AS nha_san_xua_name
     FROM products 
     JOIN danh_muc ON danh_muc.id = products.danh_muc_id 
     JOIN nha_san_xua ON nha_san_xua.id = products.nha_san_xuat_id 
     WHERE products.id = $id";

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

function update_sanpham_coHinhAnh($id, $tenSanPham, $danhMucId, $nhaSanXuatId, $filename, $gia, $giaSale, $moTa)
{

    $sql = "UPDATE `products` SET 
`ten`='$tenSanPham',
`danh_muc_id`='$danhMucId',
`nha_san_xuat_id`='$nhaSanXuatId',
`img`='$filename',
`gia`='$gia',
`gia_sale`='$giaSale',
`mo_ta`='$moTa' 
 WHERE  id='$id'";
    pdo_execute($sql);
}
function update_sanpham_KhongHinhAnh($id, $tenSanPham, $nhaSanXuatId, $danhMucId, $gia, $giaSale, $moTa)
{
    $sql = "UPDATE `products` SET 
    `ten`='$tenSanPham',
    `danh_muc_id`='$danhMucId',
    `nha_san_xuat_id`='$nhaSanXuatId',
    `gia`='$gia',
    `gia_sale`='$giaSale',
    `mo_ta`='$moTa' 
     WHERE  id='$id'";
    pdo_execute($sql);

}
function delete_tacgia_by_sanpham($id)
{
    $sql = "DELETE FROM `produt_tac_gia` WHERE produt_tac_gia.product_id = $id";
    pdo_query($sql);
}
function update_sach_tac_gia($sachId, $tacGiaId, $id)
{
    $sql = "UPDATE produt_tac_gia SET tac_gia_id=$tacGiaId WHERE id=$id AND product_id=$sachId";
    pdo_execute($sql);
}
function select_loai_bia_theo_sach($id)
{
    $sql = "SELECT bien_the.loai_bia, bien_the.muc_tang, products.id, bien_the.id
            FROM products 
            JOIN trung_gian_bia_product ON trung_gian_bia_product.product_id = products.id 
            JOIN bien_the ON trung_gian_bia_product.bia_id = bien_the.id 
            WHERE products.id = $id 
            ORDER BY bien_the.muc_tang ASC";
    $select_loai_bia_theo_sach = pdo_query($sql);
    return $select_loai_bia_theo_sach;
}
function list_tacgia_sach_spct($id)
{
    $sql = "SELECT tac_gia.name AS tac_gia_name, tac_gia.id
    FROM products
    JOIN produt_tac_gia ON produt_tac_gia.product_id = products.id
    JOIN tac_gia ON produt_tac_gia.tac_gia_id = tac_gia.id
    WHERE products.id = $id";
    $tg_spct = pdo_query($sql);
    return $tg_spct;
}

function list_tacgia_sach($id)
{
    $sql = "SELECT tac_gia.id, produt_tac_gia.id as 'tac_gia_id' FROM products 
 JOIN produt_tac_gia on products.id = produt_tac_gia.product_id
 JOIN tac_gia on tac_gia.id = produt_tac_gia.tac_gia_id
 WHERE products.id =$id";
    $tg_spct = pdo_query($sql);
    return $tg_spct;
}

?>