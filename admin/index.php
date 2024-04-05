<?php
ob_start();
session_start();
if (isset($_SESSION['user']) && $_SESSION['user']['is_admin'] == 1) {

    include ("../model/connect.php");
    include ("../model/danhmuc.php");
    include ("../model/nhaXuatBan.php");
    include ("../model/tacGia.php");
    include ("../model/acc.php");
    include ("../model/binhLuan.php");
    include ("../model/sach.php");
    include ("../model/bia.php");
    include ("../model/giohang.php");

    include ("header.php");
    if (isset($_GET["act"])) {
        $act = $_GET["act"];
        switch ($act) {
            // danh mục
            case 'addDm':
                // kieerm tra xem nngười dùng có click nút add hay ko 
                if (isset($_POST['themMoi'])) {
                    $name = $_POST["nameDM"];
                    insert_danhmuc($name);
                    // $thongBao = "Thêm thành công";
                    // echo '<script>window.location.reload();</script>';
                }
                include ("danhMuc/add.php");
                break;
            case 'listDm':
                if (isset($_POST['submit'])) {
                    $searchName = $_POST["searchName"];
                } else {
                    $searchName = "";
                }
                $listDm = list_danhmuc($searchName);
                include ("danhMuc/danhmuc.php");
                break;
            case 'deleteDm':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    delete_danhmuc($id);
                }
                $listDm = list_danhmuc("");
                include ("danhMuc/danhmuc.php");
                break;

            case 'editDm':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    $dm = edit_danhmuc($id);
                    //  print_r($dm);
                    // die;
                }
                include ("danhMuc/updateDm.php");
                break;
            case 'updateDm':
                if (isset($_POST['update'])) {
                    $id = $_POST["id"];
                    $name = $_POST["namedm"];
                    update_danhmuc($id, $name);
                }
                $listDm = list_danhmuc("");
                include ("danhMuc/danhmuc.php");
                break;

            // Nha xuat ban
            case 'addNxb':
                if (isset($_POST['themMoi'])) {
                    $name = $_POST["nameNxb"];
                    insert_NhaXuatBan($name);
                    // $thongBao = "Thêm thành công";
                }
                include ("NXB/add.php");
                break;
            case 'nhaXuatBan':
                if (isset($_POST['submit'])) {
                    $searchNXB = $_POST["searchNXB"];
                } else {
                    $searchNXB = "";
                }
                $listNxb = list_NhaXuatBan($searchNXB);
                include ("NXB/nhaxuatban.php");
                break;
            case 'deleteNxb':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    delete_NhaXuatBan($id);
                }
                $listNxb = list_NhaXuatBan("");
                include ("NXB/nhaxuatban.php");
                break;

            case 'editNxb':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    $Nxb = edit_NhaXuatBan($id);
                }
                include ("NXB/updateNxb.php");
                break;
            case 'updateNxb':
                if (isset($_POST['update'])) {
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
                if (isset($_POST['themMoi'])) {
                    $name = $_POST["nameTg"];
                    insert_tac_gia($name);
                    // $thongBao = "Thêm thành công";
                }
                include ("tacGia/add.php");
                break;
            case 'listTacGia':
                if (isset($_POST['submit'])) {
                    $searchTG = $_POST["searchTg"];
                } else {
                    $searchTG = "";
                }
                $listTg = list_tac_gia($searchTG);
                include ("tacGia/listTacGia.php");
                break;
            case 'deleteTg':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    delete_tac_gia($id);
                }
                $listTg = list_tac_gia("");
                include ("tacGia/listTacGia.php");
                break;
            case 'editTg':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    $tg = edit_tac_gia($id);
                }
                include ("tacGia/updateTg.php");
                break;
            case 'updateTg':
                if (isset($_POST['updateTg'])) {
                    $id = $_POST["id"];
                    $name = $_POST["nametg"];
                    update_tac_gia($id, $name);
                }
                $listTg = list_tac_gia("");
                include ("tacGia/listTacGia.php");
                break;

            //Bình luận
            case 'comment':
                if (isset($_POST['submit'])) {
                    $searchBl = $_POST["searchBl"];
                } else {
                    $searchBl = "";
                }
                $listBl = list_binhLuan($searchBl);
                include ("binhLuan/comment.php");
                break;
            case 'deleteBl':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    delete_binhLuan($id);
                }
                $listBl = list_binhLuan("");
                include ("binhLuan/comment.php");
                break;

            // sách
            case 'sach':
                if (isset($_POST['submit'])) {
                    $searchSP = $_POST["searchSP"];
                    $danh_muc_id = $_POST["danh_muc_id"];
                } else {
                    $searchSP = "";
                    $danh_muc_id = "";
                }
                $listDm = list_danhmuc("");
                $listTg = list_tac_gia("");
                $list_Sach = list_sach($danh_muc_id, $searchSP, "");
                include ("sach/sach.php");
                break;
            case 'addSach':
                if (isset($_POST['submit'])) {
                    // Lấy các giá trị từ form
                    $tenSanPham = $_POST['name'];
                    $nhaSanXuatId = $_POST['nha_san_xuat_id'];
                    $danhMucId = $_POST['danh_muc_id'];
                    $gia = $_POST['gia'];
                    $giaSale = $_POST['gia_sale'];
                    $moTa = $_POST['mo_ta'];
                    $created_at = date('Y-m-d H:i:s');
                    $filename = $_FILES["img"]["name"];
                    $target_dir = "../uploads/";
                    $target_file = $target_dir . basename($_FILES["img"]["name"]);

                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                    $sachId = insert_sach($tenSanPham, $danhMucId, $nhaSanXuatId, $filename, $gia, $giaSale, $moTa, $created_at);
                    // Lưu thông tin về tác giả
                    if (!empty($_POST['tacGia_id'])) {
                        $tacGiaIds = $_POST['tacGia_id'];
                        foreach ($tacGiaIds as $tacGiaId) {
                            // echo  $tacGiaId;
                            insert_sach_tac_gia($sachId, $tacGiaId);
                        }
                    }
                }
                $listTg = list_tac_gia("");
                $listNxb = list_NhaXuatBan("");
                $listDm = list_danhmuc("");

                include ("sach/add.php");
                break;
            case 'editSp':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];

                    $listTg = list_tac_gia("");
                    $listDm = list_danhmuc("");
                    $listNxb = list_NhaXuatBan("");
                    $SP = select_spct($id);
                }
                include ("sach/updateSp.php");
                break;

            case 'updateSp':
                if (isset($_POST['submit'])) {
                    $id = $_POST["id"];
                    $tenSanPham = $_POST['name'];
                    $nhaSanXuatId = $_POST['nha_san_xuat_id'];
                    $danhMucId = $_POST['danh_muc_id'];
                    $gia = $_POST['gia'];
                    $giaSale = $_POST['gia_sale'];
                    $moTa = $_POST['mo_ta'];

                    // Xóa tất cả các tác giả liên quan đến sản phẩm
                    delete_tacgia_by_sanpham($id);

                    // Thêm mới các tác giả cho sản phẩm
                    if (!empty($_POST['tacGia_id'])) {
                        $tacGiaIds = $_POST['tacGia_id'];
                        foreach ($tacGiaIds as $tacGiaId) {
                            // echo  $tacGiaId;
                            insert_sach_tac_gia($id, $tacGiaId);
                        }
                    }
                    $hinhAnh = $_FILES["img"];
                    $filename = $hinhAnh["name"];

                    if ($filename) {
                        $filename = time() . $filename;
                        $dir = "../uploads/$filename";

                        if (move_uploaded_file($hinhAnh["tmp_name"], $dir)) {
                            update_sanpham_coHinhAnh($id, $tenSanPham, $danhMucId, $nhaSanXuatId, $filename, $gia, $giaSale, $moTa);
                        }
                    } else {
                        update_sanpham_KhongHinhAnh($id, $tenSanPham, $nhaSanXuatId, $danhMucId, $gia, $giaSale, $moTa);
                    }
                }
                $listDm = list_danhmuc("");
                $listTg = list_tac_gia("");
                $list_Sach = list_sach("", "", "");

                include ("sach/sach.php");
                break;

            case 'deleteSp':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    delete_sach($id);
                }
                $list_Sach = list_sach("", "", "");
                include ("sach/sach.php");
                break;

            // thêm bìa sách
            case 'BiaSach':
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];
                }
                include ("Bia_sach/add.php");
                break;

            case 'insertBia':
                if (isset($_POST['submit'])) {
                    $id_sach = $_POST['id'];
                    $loai_bia = $_POST['loai_bia'];
                    $muc_tang = $_POST['muc_tang'];
                    // Ví dụ:
                    $bia_id = insert_bia_bienthe($loai_bia, $muc_tang);
                    // thêm vào bảng trung gian
                    insert_trung_gian_bia_product($id_sach, $bia_id);
                }
                $list_Sach = list_sach("", "", "");

                include ("sach/sach.php");
                break;
            case 'account':
                if (isset($_POST['submit'])) {
                    $searchName = $_POST["searchName"];
                } else {
                    $searchName = "";
                }
                $listAcc = list_acc($searchName);
                include ("acc/acc.php");
                break;
            case 'deleteAcc':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    delete_acc($id);
                }
                $listAcc = list_acc("");
                include ("acc/acc.php");
                break;

            case 'editAcc':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    $acc = edit_acc($id);
                }
                include ("acc/updateAcc.php");
                break;
            case 'updateAcc':
                if (isset($_POST['update'])) {
                    $id = $_POST["id"];
                    $is_admin = $_POST["is_admin"];
                    update_acc($id, $is_admin);
                }
                $listAcc = list_acc("");
                include ("acc/acc.php");
                break;
            case 'logout':
                session_unset();
                header("Location: index.php");
                break;

            // đơn hàng
            case 'order':
                $list_order_cart = select_order_cart();
                include ("donhang/donhang.php");
                break;
            case 'ChiTietDonHang':
                if (isset($_GET["id"]) && ($_GET["id"] > 0)) {
                    $id = $_GET["id"];
                    $list_order_cart_where_id = select_ChiTietDonHang_where_id($id);
                    $gioHang = select_gio_hang_item_thanhtoan_where_id($id);
                }
                include ("donhang/ChiTietDonHang.php");
                break;
            case 'updateChiTietDonHang':
                if (isset($_POST['submit'])) {
                    $id = $_POST["id"];
                    $selectedStatus = $_POST['status_id'];
                    update_status_ChiTietDonHang($id, $selectedStatus);
                }
                $list_order_cart = select_order_cart();
                include ("donhang/donhang.php");
                break;

            case 'thongKe':

                include ("thongke/thongke.php");
                break;

            default:
                include ("home.php");
                break;
        }
    }
    include ("footer.php");
} else {
    include ("login.php");
}

?>