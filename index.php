<?php

include ("./model/connect.php");
include ("./model/danhmuc.php");
include ("./model/sach.php");
// include ("../model/tacGia.php");
// include ("../model/binhLuan.php");
// include ("../model/sach.php");

$listDm = list_danhmuc("");

include ("view/header.php");
if (isset ($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {

        case 'sanpham':
            // if ((isset($_POST["kyw"])) && ($_POST["kyw"]) != "") {
            //     $kyw = $_POST["kyw"];
            // } else {
            //     $kyw = "";
            // }
            if ((isset($_GET["iddm"])) && ($_GET["iddm"]) > 0) {
                $danh_muc_id = $_GET["iddm"];
            } else {
                $danh_muc_id = 0;
            }
            $listSp = list_sach($danh_muc_id);
           
            include ("view/sanpham.php");
            break;
        case 'sanphamct':
            if ((isset ($_GET["idsp"])) && ($_GET["idsp"]) > 0) {
                $id = $_GET["idsp"];
                // echo $id;
                // die();
                $sanPhamCt = select_spct($id);
            //     echo '<pre>';
            // print_r($sanPhamCt);
            // die();
                $sach_cungLoai = Select_sach_cungLoai($id, $sanPhamCt["danh_muc_id"]);
            //          echo '<pre>';
            // print_r($sach_cungLoai);
            // die();
            } else {
                include ("view/home.php");
            }
            include ("view/sanphamct.php");
            break;
        default:
            include ("view/home.php");
            break;
    }
}else{

    include ("view/home.php");
}

include ("view/footer.php");
?>