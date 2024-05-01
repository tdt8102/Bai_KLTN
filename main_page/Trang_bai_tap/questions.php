<?php
    include('connect.php');

    $sql = "SELECT * FROM question 
            ORDER BY RAND()
            LIMIT 10";

    $result = $connection->query($sql); // Execute the query
    // $index = 1;
    // $data = '';
    // while ($row = $result->fetch_assoc()) {
    //     $data.=  '<div class="row" style="display: flex; flex-direction: column; margin-left:10px;">';
    //         $data.=   '<h5 style="font-weight:bold;"><span class="text-danger">Câu '.$index.': </span>'.$row['question'].'</h5>';
            
    //         $data.=  '<fieldset id="group'.$index.' ">';
    //         $data.=   '<div class="radio col-md-12">';
    //         $data.=       '<label><input type="radio" class="rdOptionA" name="group'.$index.' "><span>A: </span>'.$row['option_a'].'</label>';
    //         $data.=   '</div>';

    //         $data.=   '<div class="radio col-md-12">';
    //         $data.=       '<label><input type="radio" class="rdOptionB" name="group'.$index.' "><span>B: </span>'.$row['option_b'].'</label>';
    //         $data.=   '</div>';

    //         $data.=   '<div class="radio col-md-12">';
    //         $data.=       '<label><input type="radio" class="rdOptionC" name="group'.$index.' "><span>C: </span>'.$row['option_c'].'</label>';
    //         $data.=   '</div>';

    //         $data.=   '<div class="radio col-md-12">';
    //         $data.=       '<label><input type="radio" class="rdOptionD" name="group'.$index.' "><span>D: </span>'.$row['option_d'].'</label>';
    //         $data.=   '</div>';
    //         $data.=  '</fieldset>';
    //         $data.=  '<input type="hidden" name="answer" value=" '.$row['answer'].' ">';
    //     $data.=  '</div>';
    //     $index++;   
    // }
    // echo $data;
    $rows = array(); // Mảng lưu trữ các hàng

    while ($row = $result->fetch_assoc()) {
    $rows[] = $row; // Thêm hàng vào mảng
}
    echo json_encode($rows, JSON_UNESCAPED_UNICODE);
?>
