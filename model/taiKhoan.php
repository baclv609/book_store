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
function check_user($name, $password){
    $sql = "SELECT * FROM users WHERE name = '".$name."' AND password = '".$password."'";
    $sp = pdo_query_one($sql);
    return $sp;
}

?>