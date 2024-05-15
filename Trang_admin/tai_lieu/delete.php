<?php
session_start();

if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {



    if (isset($_GET['id']) && isset($_GET['userid'])) {
        // Include the file where $connection is established
        require_once "connect.php";

        // Lấy id của file cần xóa từ URL
        $file_id = $_GET['id'];
        $userid = $_GET['userid'];

        // Lấy thông tin file từ cơ sở dữ liệu
        $sql = "SELECT filename FROM files WHERE id=$file_id";
        $result = $connection->query($sql);

        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();
            $file_path = "../../Trang_giao_vien/tai_lieu/uploads/" . $row["filename"];

            // Xóa file từ thư mục uploads
            if (file_exists($file_path)) {
                unlink($file_path);
            }

            // Xóa file từ cơ sở dữ liệu
            $sql = "DELETE FROM files WHERE id = $file_id";
            if ($connection->query($sql) === TRUE) {
                // Xóa thành công, chuyển hướng người dùng trở lại trang hiển thị file
                header("Location: trang_tai_lieu.php");
                exit;
            } else {
                echo "Lỗi: " . $connection->error;
            }

        } else {
            echo "File không tồn tại.";
        }
    } else {
        echo "Thiếu thông tin cần thiết.";
    }
} else {
    header("Location: .../sign_up_in/Login.php");
}
?>