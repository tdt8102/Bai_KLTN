<?php
    include("connect.php");
    $search = $_GET['search'];
    $sql = $connection->prepare("SELECT * FROM question WHERE question LIKE CONCAT('%', ?, '%')");
    $sql->bind_param("s", $search);
    $sql->execute();
    $index = 1;
    $data = '';
    $result = $sql->get_result(); // Get result set from prepared statement
    while ($row = $result->fetch_assoc()) { // Fetch associative array
        $data .= '<tr id=' . $row['id_quest'] . '>';

        $data .= '<th scope="row">' . ($index++) . '</th>';
        $data .= '<td>' . $row['question'] . '</td>'; // Use $row instead of $result
        $data .= '<td>';
        $data .= '<input type="button" class="btn btn-info" value="Xem" name="view">&nbsp';
        $data .= '<input type="button" class="btn btn-warning" value="Sửa" name="update">&nbsp';
        $data .= '<input type="button" class="btn btn-danger" value="Xóa" name="delete">';
        $data .= '</td>';
        $data .= '</tr>';
}

echo $data; // In nội dung của biến $data để hiển thị bảng
?>
