<?php
    include('connect.php');

    $search = $_GET['search'];

    $sql = $connection->prepare("SELECT COUNT(*) AS count FROM question 
                                WHERE question LIKE CONCAT('%', ?, '%')");

    $sql->bind_param("s", $search);
    $sql->execute();

    $result = $sql->get_result();
    $row = $result->fetch_assoc();
    $count = $row['count'];

    $pages = $count%5==0?$count/5:floor($count/5)+1;

    echo json_encode($pages, JSON_UNESCAPED_UNICODE);
?>

