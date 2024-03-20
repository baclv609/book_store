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
            // if ((isset($_GET["iddm"])) && ($_GET["iddm"]) > 0) {
            //     $iddm = $_GET["iddm"];
            // } else {
            //     $iddm = 0;
            // }
            $listSp = list_sach();
            // echo '<pre>';
            // print_r($listSp);
            // die();
            include("view/sanpham.php");
            break;

        default:
            include ("view/home.php");
            break;
    }
}
// include ("view/home.php");

include ("view/footer.php");
?>