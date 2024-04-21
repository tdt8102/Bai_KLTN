<?php
$targetDirectory = "uploads/"; // Thư mục lưu trữ tệp đã tải lên
$targetFile = $targetDirectory . basename($_FILES["fileToUpload"]["name"]); // Đường dẫn đầy đủ của tệp sau khi tải lên
$uploadOk = 1; // Biến kiểm tra xem việc upload có thành công không (1: thành công, 0: không thành công)
$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION)); // Định dạng tệp
 
// Kiểm tra xem tệp đã tồn tại chưa
if (file_exists($targetFile)) {
    echo "Tệp đã tồn tại.";
    $uploadOk = 0;
}
 
// Kiểm tra kích thước tệp
if ($_FILES["fileToUpload"]["size"] > 50000000) { // Giới hạn kích thước là 50000KB
    echo "Tệp quá lớn.";
    $uploadOk = 0;
}
 
// Cho phép tệp có các định dạng cụ thể, ví dụ: jpg, png, gif
$allowedFileTypes = array("jpg", "png", "jpeg", "gif");
if (!in_array($imageFileType, $allowedFileTypes)) {
    echo "Chỉ cho phép tải lên tệp ảnh.";
    $uploadOk = 0;
}
 
// Kiểm tra xem biến $uploadOk có giá trị 0 không, nếu có, hiển thị thông báo lỗi
if ($uploadOk == 0) {
    echo "Tệp của bạn không được tải lên.";
} else { // Nếu mọi thứ đều đúng, tiến hành tải lên tệp
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
        echo "Tệp ". htmlspecialchars(basename( $_FILES["fileToUpload"]["name"])). " đã được tải lên thành công.";
    } else {
        echo "Đã xảy ra lỗi khi tải lên tệp.";
    }
}
?>