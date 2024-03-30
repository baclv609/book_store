<?php
ob_start();
session_start();
include ("./model/connect.php");
include ("./model/danhmuc.php");
include ("./model/sach.php");
include ("./model/taiKhoan.php");
include ("./model/tacGia.php");
include ("./model/giohang.php");
// include ("../model/binhLuan.php");
// include ("../model/sach.php");

$listDm = list_danhmuc("");
$listTg = list_tac_gia("");
$listSp_home = list_sach("", "", "");
$list_sach_flashSale_home = list_sach_flashSale_home();
$list_sach_banchay_home = list_sach_banchay_home();
$errDangNhappass = "";
$errDangNhapuser = "";

$errDangKypass = "";
$errDangKyuser = "";
$errDangKyemail = "";

if (!isset($_SESSION['myCart'])) {
    $_SESSION['myCart'] = [];
}
$countProducts = count($_SESSION['myCart']);

include ("view/header.php");
if (isset($_GET["act"])) {
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
            }
            // $listSp = list_sach($danh_muc_id);   
            $listSp = list_sach($danh_muc_id, "", "");

            include ("view/sanpham.php");
            break;
        // lọc ở sản phẩm
        case 'sach':
            if (isset($_POST['submit'])) {
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
            include ("view/sanpham.php");
            break;
        case 'searchsp':
            if ((isset($_POST["submit"])) && ($_POST["submit"]) != "") {
                $kyw = $_POST["kyw"];
            } else {
                $kyw = "";
            }
            $listSp = list_sach(0, $kyw, "");

            include ("view/sanpham.php");
            break;

        case 'sanphamct':
            if ((isset($_GET["idsp"])) && ($_GET["idsp"]) > 0) {
                $id = $_GET["idsp"];
                $sanPhamCt = select_spct($id);
                $list_tacgia_sach_spct = list_tacgia_sach_spct($id);


                $sach_cungLoai = Select_sach_cungLoai($id, $sanPhamCt["danh_muc_id"]);
                $bien_the_bia = select_loai_bia_theo_sach($id);
            } else {
                include ("view/home.php");
            }
            include ("view/sanphamct.php");
            break;

        //đăng kí
        case 'dangky':
            // nếu có tồn tại và có nhấp vào nút dangky
            if (isset($_POST["submit"])) {
                $email = $_POST["email"];
                $name = $_POST["name"];
                $password = $_POST["password"];
                $isCheck = true;

                if (empty($email)) {
                    $isCheck = false;
                    $errDangKyemail = "Cần nhập email";
                }
                if (empty($name)) {
                    $isCheck = false;
                    $errDangKyuser = "Cần nhập tên đăng nhập";
                }
                if (empty($password)) {
                    $isCheck = false;
                    $errDangKypass = "Cần nhập mật khẩu";
                }

                if ($isCheck) {
                    insert_taikhoan($email, $name, $password);
                    $thongbao = "B  ạn đăng kí thành công!";
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
            if (isset($_POST["submit"])) {
                $email = $_POST["email"];
                $password = $_POST["passsword"];

                if (empty($email)) {
                    $isCheck = false;
                    $errDangNhapuser = "Cần nhập email";
                }

                if (empty($password)) {
                    $isCheck = false;
                    $errDangNhappass = "Cần nhập mật khẩu";
                }

                if ($isCheck) {
                    $checkuser = checkUser($email, $password);
                    if (is_array($checkuser)) {
                        $_SESSION['user'] = $checkuser;
                        // print_r( ;$_SESSION['user'])
                        header("Location: index.php");
                        exit();
                    } else {
                        $thongBao = "Tài khoản không tồn tại";
                    }
                }
            }
            include ("view/taiKhoan/login.php");
            break;


        case 'edittk':
            if (isset($_POST['submit'])) {
                // Lấy các giá trị được gửi từ form
                $name = $_POST["name"];
                $sđt = $_POST['phone'];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $dia_chi = $_POST["dia_chi"];
                $id = $_POST['id'];

                $hinhAnh = $_FILES["img"];
                $filename = $hinhAnh["name"];

                $filename = time() . $filename;
                $dir = "./uploads/$filename";

                // Di chuyển tệp tin hình ảnh tải lên vào thư mục uploads
                move_uploaded_file($hinhAnh["tmp_name"], $dir);

                // Gọi hàm update_taikhoan để cập nhật thông tin tài khoản
                update_taikhoan($id, $name, $filename, $sđt, $email, $password, $dia_chi);

                // Cập nhật lại thông tin người dùng trong phiên làm việc
                $_SESSION['user'] = checkUser($email, $password);

                // Chuyển hướng người dùng về trang edittk (chỉnh sửa tài khoản)
                header('Location: index.php?act=edittk');
            }
            include "view/taiKhoan/edittk.php";
            break;
        case 'quenmk':
            $errEmail = '';
            if (isset($_POST['guiemail'])) {
                $email = $_POST['email'];
                if (empty($email)) {
                    $isCheck = false;
                    $errEmail = "Cần nhập email";
                }

                $thongbao = "";
                $checkemail = checkemail($email);
                if (is_array($checkemail)) {
                    $thongbao = "Mật khẩu của bạn là: " . $checkemail['password'];
                } else {
                    $thongbao = "Email này không tồn tại";
                }
            }
            include "view/taikhoan/quenmk.php";
            break;
        case 'logout':
            session_unset();
            header("Location: index.php");
            break;
        case 'giohang':
            $gioHang = select_1_sach();
            include ('./view/giohang.php');
            break;
        case 'add_to_card':
            $gioHang = select_1_sach();
            include ('./view/giohang.php');
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