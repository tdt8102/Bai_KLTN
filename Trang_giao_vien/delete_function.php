<?php
require ('connect.php');

// Assign variables using GET method
$id = $_GET['class_id'];
$class_name = $_GET['class_name'];

// Xóa dữ liệu từ bảng class_list và classes
$sql = "DELETE FROM class_list WHERE class_id = $id; DELETE FROM classes WHERE id = $id;";

if ($connection->multi_query($sql) === true) {
	echo
		"<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
            <strong>Lớp $class_name đã được xóa.</strong>
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
            </button>
        </div>";
} else {
	echo "Error: " . $sql . "<br>" . $connection->error;
}

$connection->close();
require_once ('TrangNguoiDung.php');
?>