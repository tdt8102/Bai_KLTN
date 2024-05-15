<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if a file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        $target_dir = "uploads/"; // Thay đổi đường dẫn đến thư mục mong muốn cho các file được tải lên
        $target_file = $target_dir . basename($_FILES["file"]["name"]);
        $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if the file is allowed (bạn có thể sửa đổi để chỉ cho phép các loại file cụ thể)
        $allowed_types = array("jpg", "jpeg", "png", "gif", "pdf");
        if (!in_array($file_type, $allowed_types)) {
            echo "Xin lỗi, chỉ các file JPG, JPEG, PNG, GIF và PDF được phép.";
        } else {
            // Di chuyển file đã tải lên vào thư mục được chỉ định
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
                // Nếu tải lên file thành công, lưu thông tin vào cơ sở dữ liệu
                $filename = $_FILES["file"]["name"];
                $filesize = $_FILES["file"]["size"];
                $filetype = $_FILES["file"]["type"];

                // Kết nối cơ sở dữ liệu
                require_once "connect.php";

                // Lấy id và userid từ URL
                $user_id = isset($_GET['userid']) ? $_GET['userid'] : null;
                $id = isset($_GET['id']) ? $_GET['id'] : null;

                // Insert thông tin file vào cơ sở dữ liệu
                $sql = "INSERT INTO files (filename, filesize, filetype, class_id) VALUES ('$filename', $filesize, '$filetype', '$id' )";

                if ($connection->query($sql) === TRUE) {
                    // Nếu thành công, chuyển hướng về trang trước đó với id và userid
                    header("Location: trang_tai_lieu.php?id=$id&userid=$user_id");
                } else {
                    echo "Xin lỗi, có lỗi xảy ra khi tải lên file và lưu thông tin vào cơ sở dữ liệu: " . $connection->error;
                }

                $connection->close();
            } else {
                echo "Xin lỗi, có lỗi xảy ra khi tải lên file của bạn.";
            }
        }
    } else {
        echo "Không có file nào được tải lên.";
        // Lấy id và userid từ URL để chuyển hướng
        $user_id = isset($_GET['userid']) ? $_GET['userid'] : null;
        $id = isset($_GET['id']) ? $_GET['id'] : null;

        header("Location: trang_tai_lieu.php?id=$id&userid=$user_id");
        exit;
    }
}
?>