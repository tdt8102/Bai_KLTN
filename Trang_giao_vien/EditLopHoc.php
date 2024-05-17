<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/style_request2.css">
    <link rel="stylesheet" href="style.css">
    <title>Chỉnh sửa lớp học</title>
</head>

<body>
    <div class="item_form1" style="    padding: 60px;
    /* text-align: center; */
    margin: 20px 0 12px 0;
    position: relative;">
        <form action="EditLopHoc_function.php?id=<?php echo htmlspecialchars($_GET['id'] ?? '', ENT_QUOTES); ?> 
            &username=<?php echo htmlspecialchars($_GET['username'] ?? '', ENT_QUOTES); ?>
            &userid=<?php echo htmlspecialchars($_GET['userid'] ?? '', ENT_QUOTES); ?>" method="POST"
            enctype="multipart/form-data">
            <div class="item_form1">
                <?php
                $id = $_GET['id'] ?? '';
                $class_name = "";
                $class_title = "";
                $lecturer = "";

                if (!empty($id)) {
                    require "connect.php";
                    $sql = "SELECT * FROM classes WHERE id = ?";
                    $stmt = $connection->prepare($sql);
                    $stmt->bind_param("i", $id);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();
                    $class_name = $row["class_name"];
                    $class_title = $row["class_title"];
                    $lecturer = $row["lecturer"];
                }
                ?>
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($id, ENT_QUOTES); ?>">
                <h1>Chỉnh sửa lớp học</h1>
                <div class="mb-3">
                    <label for="class_name"><b>Tên lớp học</b></label>
                    <div class="input-group">
                        <input value="<?php echo htmlspecialchars($class_name, ENT_QUOTES); ?>" type="text"
                            class="form-control" id="class_name" placeholder="Tên lớp học (bắt buộc)" name="class_name"
                            required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="class_title"><b>Chủ đề</b></label>
                    <div class="input-group">
                        <input value="<?php echo htmlspecialchars($class_title, ENT_QUOTES); ?>" type="text"
                            class="form-control" id="class_title" placeholder="Chủ đề" name="class_title" required>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="class_code"><b>Người dạy</b></label>
                    <div class="input-group">
                        <input value="<?php echo htmlspecialchars($lecturer, ENT_QUOTES); ?>" type="text"
                            class="form-control" id="class_code" placeholder="Người dạy" name="lecturer" required>
                    </div>
                </div>
                <button class="btn btn-danger btn-lg btn-block" type="button"
                    onclick="window.history.back()">Hủy</button>
                <button class="btn btn-success btn-lg btn-block" type="submit">Chỉnh sửa</button>
            </div>
        </form>
    </div>
</body>

</html>