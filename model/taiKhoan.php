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
function checkUser($email, $password){
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

function update_taikhoan($id, $name, $sđt, $email, $password){
    $sql = "UPDATE users SET name= '" . $name . "', phone= '" . $sđt . "', email= '" . $email . "', password= '".$password."' WHERE id = " . $id;
    echo $sql;
    die();
    pdo_execute($sql);

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
