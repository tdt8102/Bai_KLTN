<?php
    require('connect.php');
    // Gán các biến bằng phương thức POST nếu có
        $id = isset($_POST['id']) ? $_POST['id'] : '';
        $class_name = isset($_POST['class_name']) ? $_POST['class_name'] : '';
        $class_title = isset($_POST['class_title']) ? $_POST['class_title'] : '';
        $lecturer = isset($_POST['lecturer']) ? $_POST['lecturer'] : '';


        // Lấy id và username bằng phương thức GET
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        $user = isset($_GET['username']) ? $_GET['username'] : '';

        // Prepare the SQL statement
        $sql = "UPDATE `classes` SET `class_name`=?, `class_title`=?, lecturer=? WHERE id=?";

        // Prepare the statement
        $stmt = $connection->prepare($sql);

        // Bind parameters
        $stmt->bind_param("sssi", $class_name, $class_title, $lecturer, $id);

        // Execute the statement
        if($stmt->execute()) {
            echo 
            "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                <strong>$class_name đã được cập nhật.</strong>
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
    require_once('QuanLyClass.php');
?>