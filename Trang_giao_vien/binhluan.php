<?php
session_start();
require "connect.php";
include "./binhluan_function.php";
if (isset($_SESSION['user_id']) && ($_SESSION['user_id'] > 0)) {
    isset($_SESSION['fullname']);
    if (isset($_SESSION['fullname']) && ($_SESSION['fullname'] != "")) {
        $user = $_SESSION['fullname'];
    } else {
        $user = "";
    }

    if (isset($_POST['guibinhluan']) && ($_POST['guibinhluan'] != "")) {
        $class_id = $_POST['class_id'];
        $post_content = $_POST['post_content'];
        $fullname = $_POST['fullname'];
        $user_id = $_SESSION['sid'];
        thembl($fullname, $user_id, $class_id, $post_content);
    }
    $dsbl = showbl();
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tài liệu</title>
    </head>

    <body>
        <hr>
        <form action="binhluan.php" method="post">
            <input type="text" name="fullname" value="<?= $user ?>">
            <input type="hidden" name="class_id" value="<?= $_GET['class_id'] ?>">
            <textarea name="post_content" id="" cols="30" rows="10"></textarea>
            <input type="submit" value="Gửi" name="guibinhluan">
        </form>
        </hr>
        <?php
        foreach ($dsbl as $bl) {
            echo $bl['fullname'] . ' - ' . $bl['post_content'] . "<br>";
        }
        ?>
    </body>

    </html>
<?php
} else {
    echo "<a>Chưa đăng nhập</a>";
}
?>