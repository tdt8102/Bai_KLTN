<?php
require ('connect.php');
// Gán các biến bằng phương thức POST nếu có
$id_cmt = isset($_POST['id_cmt']) ? $_POST['id_cmt'] : '';
$post_content = isset($_POST['post_content']) ? $_POST['post_content'] : '';
$class_id = isset($_POST['class_id']) ? $_POST['class_id'] : '';
$user_id = isset($_POST['user_id']) ? $_POST['user_id'] : '';


// Lấy id_cmt và username bằng phương thức GET
$id_cmt = isset($_GET['id_cmt']) ? $_GET['id_cmt'] : '';
$user = isset($_GET['username']) ? $_GET['username'] : '';

// Prepare the SQL statement
$sql = "UPDATE `posts` SET `post_content`=?, `class_id`=?, user_id=? WHERE id_cmt=?";

// Prepare the statement
$stmt = $connection->prepare($sql);

// Bind parameters
$stmt->bind_param("sssi", $post_content, $class_id, $user_id, $id_cmt);

// Execute the statement
if ($stmt->execute()) {
    echo
        "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                <strong>bình luận đã được cập nhật.</strong>
                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                    <span aria-hidden=\"true\">&times;</span>
                </button>
            </div>";
} else {
    echo "Error: " . $sql . "<br>" . $stmt->error;
}

// Close the statement and connection
$stmt->close();
// Close the database connection
// $connection->close();
require_once ('QuanLyPost.php');
?>