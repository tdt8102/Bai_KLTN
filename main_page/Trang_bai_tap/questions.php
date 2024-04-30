<?php
    include('connect.php');

    $sql = "SELECT * FROM question 
            ORDER BY RAND()
            LIMIT 5";

    $result = $connection->query($sql); // Execute the query
    $index = 1;
    $data = '';
    while ($row = $result->fetch_assoc()) {
       $data.= '<div class="row" style="display: flex; flex-direction: column; margin-left:10px;">';
        $data.=  '<h5 style="font-weight:bold;"><span class="text-danger">Câu '.$index++.': </span>'.$row['question'].'</h5>';
        $data.=  '<div class="radio col-md-12">';
        $data.=      '<label><input type="radio" name="optradio" id="rdOptionA" >'.$row['option_a'].'</label>';
        $data.=  '</div>';

        $data.=  '<div class="radio col-md-12">';
        $data.=      '<label><input type="radio" name="optradio" id="rdOptionB">'.$row['option_b'].'</label>';
        $data.=  '</div>';

        $data.=  '<div class="radio col-md-12">';
        $data.=      '<label><input type="radio" name="optradio" id="rdOptionC" >'.$row['option_c'].'</label>';
        $data.=  '</div>';

        $data.=  '<div class="radio col-md-12">';
        $data.=      '<label><input type="radio" name="optradio" id="rdOptionD">'.$row['option_d'].'</label>';
        $data.=  '</div>';
       $data.= '</div>';
    }

    echo $data;
?>
