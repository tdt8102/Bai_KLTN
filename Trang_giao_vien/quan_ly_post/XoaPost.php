<?php
require ('connect.php');

// Assign variables using GET method
$id_cmt = $_GET['id_delete'];

// Xóa dữ liệu từ bảng posts
$sql = "DELETE FROM posts WHERE id_cmt = $id_cmt;";

if ($connection->multi_query($sql) === true) {
    echo
        "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
            <strong>Bình luận đã được xóa.</strong>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
            </button>
        </div>";
} else {
    echo "Error: " . $sql . "<br>" . $connection->error;
}

// $connection->close();
require_once ('QuanLyPost.php');
?>