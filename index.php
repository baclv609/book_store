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
                // $searchSP = $_POST["kyw"];
            } else {
                $danh_muc_id = "";
                // $searchSP = "";
            }
            // $listSp = list_sach($danh_muc_id);   
            $listSp = list_sach($danh_muc_id, "");
           
            include ("view/sanpham.php");
            break;

            case 'searchsp':
                if ((isset($_POST["submit"])) && ($_POST["submit"]) != "") {
                    $kyw = $_POST["kyw"];
                } else {
                    $kyw = "";
                }
                $listSp = list_sach(0, $kyw);
               
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





            // login
            case 'dangnhap':
                // if ((isset($_POST["dangnhap"])) && ($_POST["dangnhap"])) {
                //     $user = $_POST["user"];
                //     $pass = $_POST["password"];
                //     $isCheck = true; 
    
                //     if (empty($user)) {
                //         $errDangNhapuser = "Nhập user";
                //         $isCheck = false;
                //     }
                //     if (empty($pass)) {
                //         $errDangNhappass = "Nhập pass";
                //         $isCheck = false;
                //     }
    
                //     if ($isCheck) {
                //         // $checkuser = checkUser($user, $pass);
                //         if (is_array($checkuser)) {
                //             // nếu có 1 mảng thì tức là bạn đã đăng nhập thành công
                //             $_SESSION['user'] = $checkuser;
                //             header("Location: index.php");
                //             exit(); // Thêm câu lệnh exit() để dừng thực hiện mã nguồn tiếp theo
                //         } else {
                //             $thongBao = "Tài khoản không tồn tại";
                //         }
                //     }
                // }
                include("view/taiKhoan/login.php");
                break;

                case 'dangky':
                    include("view/taiKhoan/sigin.php");
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