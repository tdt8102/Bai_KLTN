<?php
include ('connect.php');
$class_id = $_POST['id'];
$sql = "SELECT * FROM question 
            WHERE class_id = $class_id
            ORDER BY RAND()
            LIMIT 10";

$result = $connection->query($sql); // Execute the query
$rows = array(); // Mảng lưu trữ các hàng

while ($row = $result->fetch_assoc()) {
    $rows[] = $row; // Thêm hàng vào mảng
}
echo json_encode($rows, JSON_UNESCAPED_UNICODE);
?>