<?php
	/**
	 * We need to delete from both class_list and classes for classes not just classes
	 */
	require "connect.php";

	$class_id = $_POST['class_id']; // Giả sử class_id là khóa chính của bảng

	// Các trường dữ liệu mới từ form sửa đổi
	$class_name = $_POST['class_name'];
	$class_title = $_POST['class_title'];
	$class_code = $_POST['class_code'];
	$lecturer = $_POST['lecturer'];
	// Câu lệnh SQL để cập nhật thông tin lớp học
	$sql = "UPDATE classes SET class_name='$class_name', class_title='$class_title', class_code='$class_code', lecturer='$lecturer' WHERE id='$class_id'";

	// Thực thi câu lệnh SQL và kiểm tra kết quả
	if ($conn->query($sql) === TRUE) {
		echo "Thông tin lớp học đã được cập nhật thành công";
	} else {
		echo "Lỗi: " . $sql . "<br>" . $conn->error;
	}
?>