<?php

include ("../model/connect.php");
include ("../model/danhmuc.php");

include ("header.php");
if (isset ($_GET["act"])) {
    $act = $_GET["act"];
    switch ($act) {
        case 'sach':

            include ("sach/sach.php");
            break;

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
            if (isset($_POST['submit'])) {
                $searchName = $_POST["searchName"];
            } else {
                $searchName = "";
            }
            // $listSp = list_sanpham($searchName, $id_danhMuc);
            $listDm = list_danhmuc($searchName);
            // echo'list dm';
            include ("danhMuc/danhmuc.php");
            break;
        case 'deleteDm':
            if (isset ($_GET["id"]) && ($_GET["id"] > 0)) {
                $id = $_GET["id"];
                delete_danhmuc($id);
            }
            $listDm = list_danhmuc();
            include ("danhMuc/danhmuc.php");
            break;

        case 'editDm':
            if (isset ($_GET["id"]) && ($_GET["id"] > 0)) {
                $id = $_GET["id"];
                $dm = edit_danhmuc($id);
            }
            include ("danhMuc/updateDm.php");
            break;
        case 'updateDm':
            if (isset ($_POST['update'])) {
                $id = $_POST["id"];
                $tenLoai = $_POST["tenLoai"];
                update_danhmuc($id, $tenLoai);
                $thongBao = "Cập nhật thành công";
            }
            $listDm = list_danhmuc();
            include ("danhMuc/listDm.php");
            break;
        default:
            include ("home.php");
            break;
    }
}
include ("footer.php");
?>