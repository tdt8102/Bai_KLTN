<?php
	/**
	 * We need to delete from both class_list and classes for classes not just classes
	 */
	require "connect.php";

	$class_id = $_POST['class_id']; // Giả sử class_id là khóa chính của bảng

	// Các trường dữ liệu mới từ form sửa đổi
	$class_id = $_POST['class_id'];
	$user_id = $_POST['user_id'];
	$lecturer = $_POST['lecturer'];
	// Câu lệnh SQL để cập nhật thông tin lớp học
	$sql = "DELETE FROM class_list WHERE class_id='$class_id'";

	// Thực thi câu lệnh SQL và kiểm tra kết quả
	if ($conn->query($sql) === TRUE) {
		echo "Thông tin lớp học đã được cập nhật thành công";
	} else {
		echo "Lỗi: " . $sql . "<br>" . $conn->error;
	}
?>