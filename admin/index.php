<?php

include ("../model/connect.php");
include ("../model/danhmuc.php");
include ("../model/nhaXuatBan.php");

include ("header.php");
if (isset ($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {

        // danh mục
        case 'addDm':
            // kieerm tra xem nngười dùng có click nút add hay ko 
            if (isset ($_POST['themMoi'])) {
                $name = $_POST["nameDM"];
                insert_danhmuc($name);
                // $thongBao = "Thêm thành công";
            }
            include ("danhMuc/add.php");
            break;
        case 'listDm':
            if (isset ($_POST['submit'])) {
                $searchName = $_POST["searchName"];
            } else {
                $searchName = "";
            }
            $listDm = list_danhmuc($searchName);
            include ("danhMuc/danhmuc.php");
            break;
        case 'deleteDm':
            if (isset ($_GET["id"]) && ($_GET["id"] > 0)) {
                $id = $_GET["id"];
                delete_danhmuc($id);
            }
            $listDm = list_danhmuc("");
            include ("danhMuc/danhmuc.php");
            break;

        case 'editDm':
            if (isset ($_GET["id"]) && ($_GET["id"] > 0)) {
                $id = $_GET["id"];
                $dm = edit_danhmuc($id);
                //  print_r($dm);
                // die;
            }
            include ("danhMuc/updateDm.php");
            break;
        case 'updateDm':
            if (isset ($_POST['update'])) {
                $id = $_POST["id"];
                $name = $_POST["namedm"];
                // echo  $id;
                // echo  $name;
                // print_r([$id,$name]);
                // die();
                update_danhmuc($id, $name);
            }
            $listDm = list_danhmuc("");
            include ("danhMuc/danhmuc.php");
            break;

        // Nha xuat ban
        case 'addNxb':
            // kieerm tra xem nngười dùng có click nút add hay ko 
            if (isset ($_POST['themMoi'])) {
                $name = $_POST["nameNxb"];
                insert_NhaXuatBan($name);
                // $thongBao = "Thêm thành công";
            }
            include ("NXB/add.php");
            break;
        case 'nhaXuatBan':
            if (isset ($_POST['submit'])) {
                $searchNXB = $_POST["searchNXB"];
            } else {
                $searchNXB = "";
            }
            $listNxb = list_NhaXuatBan($searchNXB);
            include ("NXB/nhaxuatban.php");
            break;
        case 'deleteNxb':
            if (isset ($_GET["id"]) && ($_GET["id"] > 0)) {
                $id = $_GET["id"];
                delete_NhaXuatBan($id);
            }
            $listNxb = list_NhaXuatBan("");
            include ("NXB/nhaxuatban.php");
            break;

        case 'editNxb':
            if (isset ($_GET["id"]) && ($_GET["id"] > 0)) {
                $id = $_GET["id"];
                $Nxb = edit_NhaXuatBan($id);
                //  print_r($dm);
                // die;
            }
            include ("NXB/updateNxb.php");
            break;
        case 'updateNxb':
            if (isset ($_POST['update'])) {
                $id = $_POST["id"];
                $name = $_POST["nameNxb"];
                update_NhaXuatBan($id, $name);
            }
            $listNxb = list_NhaXuatBan("");
            include ("NXB/nhaxuatban.php");
            break;


        // sách
        case 'sach':

            include ("sach/sach.php");
            break;

        default:
            include ("home.php");
            break;
    }
}
include ("footer.php");
?>