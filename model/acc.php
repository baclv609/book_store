<?php
// function insert_danhmuc($name)
// {
//     $sql = "INSERT INTO users(name) VALUES ('$name')";
//     pdo_execute($sql);
// }
function delete_acc($id)
{
    $sql = "DELETE FROM users WHERE id = $id";
    pdo_query($sql);
}
function list_acc($searchName)
{
    $sql = "SELECT * FROM users WHERE 1";
    if ($searchName != "") {
        $sql .= " AND name LIKE '%" . $searchName . "%'";
    }
    $sql .= " ORDER BY id desc";
    // echo $sql;
    // die();
    $listAcc = pdo_query($sql);
    return $listAcc;
}
function edit_acc($id)
{
    $sql = "SELECT * FROM users WHERE id = $id";
    $acc = pdo_query_one($sql);
    return $acc;
}
function update_acc($id, $name, $avater,$phone ,$email)
{
    $sql = "UPDATE `users` 
    SET `id`='$id',
    `name`='$name',
    `avater`='$avater',
    `phone`='$phone',
    `email`='$email'
     
     WHERE id = $id";
    pdo_execute($sql);
}
?>