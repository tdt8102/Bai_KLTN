<?php
include ('connect.php');
$question = $_POST['question'];
$option_a = $_POST['option_a'];
$option_b = $_POST['option_b'];
$option_c = $_POST['option_c'];
$option_d = $_POST['option_d'];
$answer = $_POST['answer'];
$classId = $_POST['classId'];
// Sử dụng prepared statement để tránh SQL injection
$sql = "INSERT INTO question (question, option_a, option_b, option_c, option_d, answer, class_id) VALUES (?, ?, ?, ?, ?, ?, ?)";

// Chuẩn bị câu lệnh SQL
$stmt = $connection->prepare($sql);

// Bind các giá trị vào statement
$stmt->bind_param("sssssss", $question, $option_a, $option_b, $option_c, $option_d, $answer, $classId);

// Thực thi câu lệnh
if ($stmt->execute()) {
    echo "Thêm câu hỏi thành công";
} else {
    echo "Lỗi: " . $sql . "<br>" . $connection->error;
}

// Đóng kết nối
//     $stmt->close();
//     $connection->close();
// ?>