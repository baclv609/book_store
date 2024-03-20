<?php

include ("../model/connect.php");
include ("../model/danhmuc.php");
include ("../model/nhaXuatBan.php");
include ("../model/tacGia.php");
include ("../model/acc.php");

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

        //Tác giả
        case 'addTg':
            // kieerm tra xem nngười dùng có click nút add hay ko 
            if (isset ($_POST['themMoi'])) {
                $name = $_POST["nameTg"];
                insert_tac_gia($name);
                // $thongBao = "Thêm thành công";
            }
            include ("tacGia/add.php");
            break;
        case 'listTacGia':
            if (isset ($_POST['submit'])) {
                $searchTG = $_POST["searchTg"];
            } else {
                $searchTG = "";
            }
            $listTg = list_tac_gia($searchTG);
            // print_r($listDm);
            // die();
            include ("tacGia/listTacGia.php");
            break;
        case 'deleteTg':
            if (isset ($_GET["id"]) && ($_GET["id"] > 0)) {
                $id = $_GET["id"];
                delete_tac_gia($id);
            }
            $listTg = list_tac_gia("");
            include ("tacGia/listTacGia.php");
            break;

        case 'editTg':
            if (isset ($_GET["id"]) && ($_GET["id"] > 0)) {
                $id = $_GET["id"];
                $tg = edit_tac_gia($id);
                //  print_r($tg);
                // die;
            }
            include ("tacGia/updateTg.php");
            break;
        case 'updateTg':
            if (isset ($_POST['updateTg'])) {
                $id = $_POST["id"];
                $name = $_POST["nametg"];
                // echo $name;
                // die();
                update_tac_gia($id, $name);
            }
            $listTg = list_tac_gia("");
            include ("tacGia/listTacGia.php");
            break;


        // sách
        case 'sach':

            include ("sach/sach.php");
            break;
        case 'addSach':
            // kieerm tra xem nngười dùng có click nút add hay ko 
            if (isset ($_POST['submit'])) {
                $name = $_POST["nameDM"];
                $name = $_POST["nameDM"];
                $name = $_POST["nameDM"];
                $name = $_POST["nameDM"];
            }
            include ("sach/add.php");

            break;
       
            case 'account':
                if (isset ($_POST['submit'])) {
                    $searchName = $_POST["searchName"];
                } else {
                    $searchName = "";
                }
                $listAcc = list_acc($searchName);
                echo("<pre>");
                print_r($listAcc);
                echo("</pre>");
                include ("acc/acc.php");
                break;
            case 'deleteAcc':
                if (isset ($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    delete_acc($id);
                }
                $listAcc = list_acc("");
                include ("acc/acc.php");
                break;
    
            case 'editAcc':
                if (isset ($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    $acc = edit_acc($id);
                    //  print_r($acc);
                    // die;
                }
                include ("acc/updateAcc.php");
                break;
            case 'updateAcc':
                if (isset ($_POST['update'])) {
                    $id = $_POST["id"];
                    $name = $_POST["nameacc"];
                    $avater = $_POST["avater"];
                    $phone = $_POST["phone"];
                    $email = $_POST["email"];

                    update_acc($id, $name, $avater,$phone ,$email);
                }
                $listAcc = list_acc("");
                include ("acc/acc.php");
                break;
        default:
            include ("home.php");
            break;
    }
}
include ("footer.php");
?>