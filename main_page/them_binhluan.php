<?php
    require('connect.php');
    $class_id = $_GET['id'];
    $user_id = $_GET['userid'];
    echo $class_id;

    echo "<br>";

    $noidung = $_POST['noidung'];

    echo $noidung;

    $sql = "INSERT INTO posts (id_cmt, post_content, class_id, user_id)  
    VALUES (NULL, '$noidung', '$class_id', '$user_id') ";

    mysqli_query($connection, $sql);

    header("location: Trangmonhoc.php?id=$class_id && userid=$user_id")
?>
