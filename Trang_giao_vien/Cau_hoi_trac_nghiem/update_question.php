<?php 

    include('connect.php');
    //lay cai gia tri da dc chuyen du lieu
    
    try {
        $id = $_POST['id'];
        $question = $_POST['question'];
        $option_a = $_POST['option_a'];
        $option_b = $_POST['option_b'];
        $option_c = $_POST['option_c'];
        $option_d = $_POST['option_d'];
        $answer = $_POST['answer'];

        $sql = "UPDATE question 
        SET question = '$question', option_a = '$option_a', option_b = '$option_b', option_c = '$option_c', option_d = '$option_d', answer = '$answer'
        WHERE id_quest = '$id'";


        // Chuẩn bị câu lệnh SQL
        $stmt = $connection->prepare($sql);

        // Thực thi câu lệnh
        if ($stmt->execute()) {
            echo "Cập nhật câu hỏi thành công";
        } else {
            echo "Cập nhật câu hỏi thất bại " . $sql . "<br>" . $connection->error;
        }
    } catch (Exception $e) {
        echo "Lỗi cập nhật câu hỏi: ".$e;
    }
?>