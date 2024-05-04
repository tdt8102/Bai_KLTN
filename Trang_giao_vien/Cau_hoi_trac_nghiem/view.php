<?php
include ("connect.php");

// Sanitize and validate input
$search = isset($_GET['search']) ? $_GET['search'] : '';
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // Ensure $page is an integer
$class_id = isset($_GET['id']) ? (int) $_GET['id'] : 0; // Ensure $class_id is an integer

// Calculate offset for pagination
$offset = ($page - 1) * 5;

// Prepare and execute SQL query with prepared statements
$sql = $connection->prepare("SELECT * FROM question 
                            WHERE question LIKE CONCAT('%', ?, '%') 
                            AND class_id = ? 
                           ");
$sql->bind_param("si", $search, $class_id);
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

echo $data; // Print the content of the $data variable to display the table
?>