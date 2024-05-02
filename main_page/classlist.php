<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./css/style_request2.css">
    <script src="./js/Collapse_sidebar.js"></script>
    <link rel="stylesheet" href="./css/TrangThamGiaLopHoc.css">
    <link rel="stylesheet" href="./css/Trangmonhoc.css">
    <link rel="stylesheet" href="./css/table.css" />
    <title>Danh sach lop</title>
</head>

<body>
    <!--Thanh navbar-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div id="mySidebar" class="sidebar">
            <?php
            // Kiểm tra xem biến $_GET['userid'] có tồn tại không trước khi sử dụng
            $userid = isset($_GET['userid']) ? $_GET['userid'] : ''; // Nếu không tồn tại, gán giá trị rỗng
            // Get class id and userid
            $id = $_GET['id'];
            ?>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a href="./Trangmonhoc.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Trang lớp học</a>
            <a class="nav-item"
                href="./Trang_bai_tap/Trangbaitap.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>"">Bài tập trên lớp</a>
               <a href=" ./classlist.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Hiện danh sách học
                sinh</a>
        </div>
        <div id="main">
            <button class="openbtn" onclick="openNav()">
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-justify" fill="currentColor"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                </svg> </button>
        </div>

        <a class="navbar-brand"
            href="TrangNguoiDung.php?username=<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>&userid=<?php echo isset($_GET['userid']) ? $_GET['userid'] : ''; ?>">
            <img src="./image/HUNRE_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Hanoi University of Natural Resources and Environment
        </a>

        <div class="topnav">
            <?php
            // Get class id and userid
            $id = $_GET['id'];
            $userid = $_GET['userid'];
            ?>
        </div>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link avatar " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                        <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        <path fill-rule="evenodd"
                            d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                    </svg>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item textAccount textLogout " href="logout.php">Đăng xuất khỏi tài khoản</a>
                </div>
            </li>
        </ul>
    </nav>

    <!--Teacher section-->
    <h2 class=" m-auto text-warning">Teachers</h2>
    <?php require_once ("connect.php"); ?>

    <?php
    $class_id = $_GET['id'];
    $sql = "SELECT user_id from class_list where class_id = $class_id;";
    $result = $connection->query($sql) or die(mysqli_error($connection));
    ?>

    <!--SQL Table read-->
    <section>
        <table>
            <tr>
                <th>Full name</th>
            </tr>

            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?php
                        $user_id = $row['user_id'];
                        $get_fullname = "SELECT `fullname`,`role` from `users` where `user_id` = $user_id";
                        $result_fullname = mysqli_query($connection, $get_fullname) or die(mysqli_error($connection));
                        $row_fullname = mysqli_fetch_array($result_fullname);
                        if ($row_fullname[1] == 2) {
                            echo "<p class = \"text-danger\">$row_fullname[0]</p>";
                        }
                        ?>
                    </td>
                </tr>

                <?php
            }
            ?>
        </table>
    </section>

    <!--Student section-->
    <h2 class="mt-5 text-success">Students</h2>
    <!--SQL Table read-->
    <?php
    $class_id = $_GET['id'];
    $sql = "SELECT user_id from class_list where class_id = $class_id;";
    $result = $connection->query($sql) or die(mysqli_error($connection));
    ?>
    <section>
        <table>
            <tr>
                <th>Fullname</th>
            </tr>

            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <tr>
                    <td>
                        <?php
                        $user_id = $row['user_id'];
                        $get_fullname = "SELECT `fullname`,`role` from `users` where `user_id` = $user_id";
                        $result_fullname = mysqli_query($connection, $get_fullname) or die(mysqli_error($connection));
                        $row_fullname = mysqli_fetch_array($result_fullname);

                        if ($row_fullname[1] == 1) {
                            echo $row_fullname[0];
                        }

                        ?>
                    </td>
                    <td>
                        <?php
                        // Get class id and userid
                        $id = $_GET['id'];
                        $userid = $_GET['userid'];

                        if ($row_fullname[1] == 1) {
                            ?>
                            <?php
                        }
                        ?>
                    </td>
                </tr>

                <?php
            }
            ?>
        </table>
    </section>
</body>

</html>