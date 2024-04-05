<?php
function thongke_gia_DanhMuc()
{
    $sql = "SELECT danh_muc.name, 
    danh_muc.id, 
    COUNT(products.id) AS countSP, 
    SUM(products.luot_ban) AS totalLuotBan, 
    MIN(products.gia) AS minGia, 
    MAX(products.gia) AS maxGia 
FROM products 
JOIN danh_muc ON danh_muc.id = products.danh_muc_id 
GROUP BY danh_muc.id 
ORDER BY totalLuotBan DESC 
LIMIT 5;";
    return pdo_query($sql);
}

function thongke_DoanhThu_thang()
{
    $sql = "SELECT YEAR(created_at) AS nam, MONTH(created_at) AS thang, SUM(gia) AS doanh_thu
    FROM products
    GROUP BY YEAR(created_at), MONTH(created_at)
    ORDER BY YEAR(created_at), MONTH(created_at);";
    return pdo_query($sql);
}
function thongke_DoanhThu_5_thang()
{

    $sql = "SELECT YEAR(created_at) AS nam, MONTH(created_at) AS thang, SUM(gia) AS doanh_thu
FROM products
WHERE created_at >= DATE_SUB(CURDATE(), INTERVAL 5 MONTH)
GROUP BY nam, thang
ORDER BY nam DESC, thang DESC;";
    return pdo_query($sql);
}
function top_10_sach_banChay()
{
    $sql = "SELECT products.luot_ban, products.ten, products.img FROM products ORDER BY products.luot_ban DESC LIMIT 10;";
    return pdo_query($sql);
}
?>