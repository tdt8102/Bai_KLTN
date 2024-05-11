<?php
require ('connect.php');

// Assign variables using GET method
$id_cmt = $_GET['id_delete'];
$user_id = $_GET['user_id'];

// Xóa dữ liệu từ bảng posts
$sql = "DELETE FROM posts WHERE id_cmt = $id_cmt;";

if ($connection->multi_query($sql) === true) {
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

// $connection->close();
require_once ('QuanLyPost.php');
?>