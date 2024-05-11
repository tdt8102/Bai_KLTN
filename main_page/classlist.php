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
    <link rel="stylesheet" href="./css/table.css">
    <link rel="icon" href="https://stf.hcmunre.edu.vn/Upload/images/brand-logo/HUNRE_Logo.png" type="image/x-icon">
    <title>Đại học Tài Nguyên và Môi Trường Hà Nội</title>
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
            Đại học Tài Nguyên và Môi Trường Hà Nội
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
    <h2 class="m-auto text-warning">Teachers</h2>
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
                <th>Ngày sinh</th>
                <th>Email</th>
                <th>Số điện thoại</th>
            </tr>

            <?php
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['user_id'];
                $get_user_info = "SELECT `fullname`, `birthdate`, `email`, `phone`, `role` FROM `users` WHERE `user_id` = $user_id AND `role` = 2"; // chỉ lấy thông tin của giáo viên (role = 2)
                $result_user_info = mysqli_query($connection, $get_user_info) or die(mysqli_error($connection));
                $row_user_info = mysqli_fetch_array($result_user_info);

                // Kiểm tra xem có dữ liệu trả về không
                if (mysqli_num_rows($result_user_info) > 0) {
                    ?>
                    <tr>
                        <td><?php echo $row_user_info['fullname']; ?></td>
                        <td><?php echo $row_user_info['birthdate']; ?></td>
                        <td><?php echo $row_user_info['email']; ?></td>
                        <td><?php echo $row_user_info['phone']; ?></td>
                    </tr>
                    <?php
                }
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
                <th>Ngày sinh</th>
                <th>Email</th>
                <th>Số điện thoại</th>
                <!-- <th>Action</th> -->
            </tr>

            <?php
            while ($row = $result->fetch_assoc()) {
                $user_id = $row['user_id'];
                $get_user_info = "SELECT `fullname`, `birthdate`, `email`, `phone`, `role` FROM `users` WHERE `user_id` = $user_id AND `role` = 1"; // chỉ lấy thông tin của học sinh (role = 1)
                $result_user_info = mysqli_query($connection, $get_user_info) or die(mysqli_error($connection));
                $row_user_info = mysqli_fetch_array($result_user_info);

                // Kiểm tra xem có dữ liệu trả về không
                if (mysqli_num_rows($result_user_info) > 0) {
                    ?>
                    <tr>
                        <td><?php echo $row_user_info[0]; ?></td>
                        <td><?php echo $row_user_info[1]; ?></td>
                        <td><?php echo $row_user_info[2]; ?></td>
                        <td><?php echo $row_user_info[3]; ?></td>
                        <!-- <td>
                            <a href="XoaHocSinh.php?fullname=<?php echo $row_user_info[0]; ?>&student_id=<?php echo $row['user_id']; ?>&id=<?php echo $id; ?>&userid=<?php echo $userid; ?>"
                                class="btn btn-danger">Delete</a>
                        </td> -->
                    </tr>
                    <?php
                } else {
                    // echo "<tr><td colspan='5'></td></tr>"; // Hiển thị dấu gạch nếu không có học sinh nào
                }
            }
            ?>
        </table>
    </section>
</body>

</html>