<?php
require('connect.php');

// Gán các biến bằng phương thức POST nếu có
$user_id = isset($_POST['userid']) ? $_POST['userid'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['psw1']) ? $_POST['psw1'] : '';
$fullname = isset($_POST['name']) ? $_POST['name'] : '';
$birth = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
$email = isset($_POST['email']) ? $_POST['email'] : '';
$phone = isset($_POST['PhoneNumber']) ? $_POST['PhoneNumber'] : '';
$role = isset($_POST['role']) ? $_POST['role'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';

// Lấy id và username bằng phương thức GET
$id = isset($_GET['id']) ? $_GET['id'] : '';
$user = isset($_GET['username']) ? $_GET['username'] : '';

// Truy vấn để cập nhật thông tin
$sql = "UPDATE `users` SET `username`=?, `password`=?, `fullname`=?, `birthdate`=?, `email`=?, `phone`=?, `role`=?, `status`=? WHERE `user_id`=?";

// Chuẩn bị và ràng buộc các tham số
$stmt = $connection->prepare($sql);
$stmt->bind_param("ssssssiii", $username, $password, $fullname, $birth, $email, $phone, $role, $status, $user_id);

// Thực thi câu lệnh
if ($stmt->execute()) {
    echo 
    "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
        <strong>$user đã được cập nhật
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
            <span aria-hidden=\"true\">&times;</span>
        </button>
    </div>";
} else {
    echo "Lỗi: " . $sql . "<br>" . $connection->error;
}

// Đóng câu lệnh và kết nối
$stmt->close();

require_once('TrangAdmin.php');
?>
