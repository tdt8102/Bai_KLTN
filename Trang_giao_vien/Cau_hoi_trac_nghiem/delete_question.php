<?php
    include('connect.php'); // Assuming you have your database connection here

    try {
        $id = $_POST['id'];
        $sql = "DELETE FROM question WHERE id_quest = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param("i", $id); // Assuming id_question is an integer

        if ($stmt->execute()) {
            echo "Xóa câu hỏi thành công";
        } else {
            echo "Xóa câu hỏi thất bại " . $stmt->error;
        }
    } catch (\Throwable $th) {
        echo "Lỗi xóa câu hỏi: ".$th->getMessage();
    }
?>
