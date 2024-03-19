<?php
    function insert_binhLuan($nd)
    {
        $sql = "INSERT INTO binh_luan(content) VALUES ('$nd')";
        pdo_execute($sql);
    }

    function list_binhLuan($searchBl)
    {
        $sql = "SELECT * FROM binh_luan WHERE 1";
        if ($searchBl != "") {
            $sql .= " AND name LIKE '%" . $searchBl . "%'";
        }
        $sql .= " ORDER BY id desc";
        // echo $sql;
        // die();
        $listBl = pdo_query($sql);
        return $listBl;
    }

    function delete_binhLuan($id)
    {
        $sql = "DELETE FROM binh_luan WHERE id = $id";
        pdo_query($sql);
    }
