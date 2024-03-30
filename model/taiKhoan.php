<?php
// đăng kí
function insert_taikhoan($email, $name, $password)
{
    $sql = "INSERT INTO users(email,name,password) VALUES ('$email','$name','$password')";
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

function update_taikhoan($id, $name, $img, $sđt, $email, $password, $dia_chi)
{
    $sql = "UPDATE users 
    SET 
        name='$name',
        avatar='$img',
        phone='$sđt',
        email='$email',
        password='$password',
        dia_chi='$dia_chi'
        WHERE id = $id";
        // echo '<pre>';
        // echo $sql;
        // die();
        pdo_execute($sql);

}

function select_taiKhoan_id($id)
{
    $sql = "SELECT * FROM `users` WHERE id= $id";
    pdo_execute($sql);
}
// function checkUser($user, $pass)
// {
//     $sql = "SELECT * FROM taikhoan WHERE user = '$user' and pass = '$pass'";
//     $tendm = pdo_query_one($sql);
//     return $tendm;
// }
function checkEmail($email)
{
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $tendm = pdo_query_one($sql);
    return $tendm;
}
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