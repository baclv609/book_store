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
$listSp_home = list_sach("", "", "");
$list_sach_flashSale_home = list_sach_flashSale_home();
$list_sach_banchay_home = list_sach_banchay_home();
// echo '<pre>';
// var_dump($list_sach_banchay_home);
// die;




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
            $errDangKypass = "";
            $errDangKyuser = "";
            $errDangKyemail = "";

            $email = '';
            $name = '';
            $password = '';
            // nếu có tồn tại và có nhấp vào nút dangky
            if (isset($_POST["submit"])) {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                // print_r([$name,$email,$password]);
                // die();
                $isCheck = true;

                // Kiểm tra tên đăng nhập
                if (!$name) {
                    $isCheck = false;
                    $errDangKyuser = 'Bạn không được để trống tên đăng nhập';
                } else if (ten_dang_nhap_da_ton_tai($name)) {
                    $isCheck = false;
                    $errDangKyuser = 'Tên đăng nhập đã tồn tại trong hệ thống, vui lòng chọn tên khác.';
                }

                //xác thực địa chỉ email
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $isCheck = false;
                    $errDangKyemail = 'Bạn không được để trống email';
                }
                // Kiểm tra email đã tồn tại trong cơ sở dữ liệu hay không
                if ($email && email_da_ton_tai($email)) {
                    $isCheck = false;
                    $errDangKyemail = 'Email đã tồn tại trong hệ thống, vui lòng sử dụng email khác.';
                }

                if(!$password){
                    $isCheck = false;
                    $errDangKypass = 'Bạn không được để trống pass';
                }

                if ($isCheck) {
                    insert_taikhoan($name,$email, $password);
                    $thongbao = "Bạn đăng kí thành công!";
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
                $password = $_POST["password"];
                $checkuser = checkUser($email, $password);

                $isCheck = true;
                if(!$email){
                    $isCheck = false;
                    $errDangNhapuser = 'Bạn không được để trống tên đăng nhập';
                }
                if(!$password){
                    $isCheck = false;
                    $errDangNhappass = 'Bạn không được để trống pass';
                }

                if ($isCheck) {
                    if (is_array($checkuser)) {
                        $_SESSION['email'] = $checkuser;
                        // print_r( ;$_SESSION['user'])
                        $thongbao = "Đăng nhập thành công";
                        header("Location: index.php");
                        exit();
                    } else {
                        $thongBao = "Tài khoản không tồn tại";
                    }
                }
            }
            include ("view/taiKhoan/login.php");
            break;
        case 'logout':
            session_unset();
            header("Location: index.php");
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