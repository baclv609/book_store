<?php
// đăng kí
function insert_taikhoan($name,$email, $password)
{
    $sql = "INSERT INTO users(name,email,password) VALUES ('$name','$email','$password')";
    // echo $sql;
    // die;
    pdo_execute($sql);
}
// echo "tai khoan";
// die;

// đăng nhập
function checkUser($email, $password)
{
    $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
    $sp = pdo_query_one($sql);
    return $sp;
}

function list_Alltaikhoan()
{
    $sql = "SELECT * FROM users ORDER BY id desc"; // sắp xếp 
    $listTk = pdo_query($sql);

    return $listTk;
}

function email_da_ton_tai($email)
{
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $em = pdo_query_one($sql);
    return $em;
}

function ten_dang_nhap_da_ton_tai($name)
{
    $sql = "SELECT * FROM users WHERE name = '$name'";
    $user = pdo_query_one($sql);
    return $user;
}
// function insert_taiKhoan($user, $pass, $email)
// {
//     $sql = "INSERT INTO taikhoan(user, pass, email) 
//     VALUES ('$user','$pass','$email')";
//     pdo_execute($sql);
// }
// function checkUser($user, $pass)
// {
//     $sql = "SELECT * FROM taikhoan WHERE user = '$user' and pass = '$pass'";
//     $tendm = pdo_query_one($sql);
//     return $tendm;
// }
// function checkEmail($email)
// {
//     $sql = "SELECT * FROM taikhoan WHERE email = '$email'";
//     $tendm = pdo_query_one($sql);
//     return $tendm;
// }
// function update_taikhoan($id, $user, $pass, $email, $adress, $tel)
// {
//     $sql = "UPDATE taikhoan 
//     SET 
//     user='$user',
//     pass='$pass',
//     email='$email',
//     adress='$adress',
//     tel='$tel'
//     WHERE id='$id'";
//     pdo_execute($sql);
// }
// function delete_taikhoan($id)
// {
//     $sql = "DELETE FROM taikhoan WHERE id = $id";
//     pdo_query($sql);
// }
?>