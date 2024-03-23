<?php
session_start();
include ("./model/connect.php");
include ("./model/danhmuc.php");
include ("./model/sach.php");
include ("./model/taiKhoan.php");
include ("./model/tacGia.php");
// include ("../model/binhLuan.php");
// include ("../model/sach.php");

$listDm = list_danhmuc("");
$listTg = list_tac_gia("");

$errDangNhappass = "";
$errDangNhapuser = "";

$errDangKypass = "";
$errDangKyuser = "";
$errDangKyemail = "";


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
            if ((isset ($_GET["iddm"])) && ($_GET["iddm"]) > 0) {
                $danh_muc_id = $_GET["iddm"];
                // $searchSP = $_POST["kyw"];
            } else {
                $danh_muc_id = "";
                // $searchSP = "";
            }
            // $listSp = list_sach($danh_muc_id);   
            $listSp = list_sach($danh_muc_id, "", "");

            include ("view/sanpham.php");
            break;
        // lọc ở sản phẩm
        case 'sach':
            if (isset ($_POST['submit'])) {
                $tacGia_id = $_POST["tacGia_id"];
                $danh_muc_id = $_POST["danh_muc_id"];
                $searchSP = $_POST["searchSP"];
            } else {
                $searchSP = "";
                $danh_muc_id = "";
                $searchSP = "";
            }
            // $listDm = list_danhmuc("");
            // $listTg = list_tac_gia("");
            $listSp = list_sach($danh_muc_id, $searchSP, $tacGia_id);
            // echo '<pre>';
            //  var_dump($list_Sach);
            //             die;
            include ("view/sanpham.php");
            break;
        case 'searchsp':
            if ((isset ($_POST["submit"])) && ($_POST["submit"]) != "") {
                $kyw = $_POST["kyw"];
            } else {
                $kyw = "";
            }
            $listSp = list_sach(0, $kyw, "");

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

        //đăng kí
        case 'dangky':
            // nếu có tồn tại và có nhấp vào nút dangky
            if (isset ($_POST["submit"])) {
                $email = $_POST["email"];
                $name = $_POST["name"];
                $password = $_POST["password"];
                $isCheck = true;

                if ($email == '') {
                    $isCheck = false;
                    $errDangKyemail = "Cần nhập email";
                }
                if ($name == '') {
                    $isCheck = false;
                    $errDangKyuser = "Cần nhập tên đăng nhập";
                }
                if ($password == '') {
                    $isCheck = false;
                    $errDangKypass = "Cần nhập mật khẩu";
                }

                if ($isCheck) {
                    insert_taikhoan($email, $name, $password);
                    $thongbao = "bạn đăng kí thành công!";
                }
            }

            include ("view/taiKhoan/sigin.php");
            break;

        // đăng nhập
        case 'dangnhap':
            $email = "";
            $password = "";
            $errDangNhapuser = '';
            $errDangNhappass = '';

            $isCheck = true;
            if (isset ($_POST["submit"])) {
                $email = $_POST["email"];
                $password = $_POST["passsword"];

                if (empty ($email)) {
                    $isCheck = false;
                    $errDangNhapuser = "Cần nhập email";
                }

                if (empty ($password)) {
                    $isCheck = false;
                    $errDangNhappass = "Cần nhập mật khẩu";
                }

                if ($isCheck) {
                    $checkuser = checkUser($email, $password);
                    if (is_array($checkuser)) {
                        // nếu có 1 mảng thì tức là bạn đã đăng nhập thành công
                        $_SESSION['user'] = $checkuser;
                        header("Location: index.php");
                        exit(); // Thêm câu lệnh exit() để dừng thực hiện mã nguồn tiếp theo
                    } else {
                        $thongBao = "Tài khoản không tồn tại";
                    }
                }
            }
            include ("view/taiKhoan/login.php");
            break;


        default:
            include ("view/home.php");
            break;
    }
} else {
    include ("view/home.php");
}

include ("view/footer.php");
?>