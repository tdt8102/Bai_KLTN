<?php
session_start();

if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
    // Include the file where $connection is established
    require_once "connect.php"; // Điều chỉnh đường dẫn nếu cần

    // Kiểm tra xem $_GET['userid'] và $_GET['id'] có tồn tại không
    $userid = isset($_GET['userid']) ? $_GET['userid'] : '';
    $id = isset($_GET['id']) ? $_GET['id'] : '';

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/style_request2.css">
        <script src="../js/post.js"></script>
        <link rel="stylesheet" href="../css/Trangmonhoc.css">
        <link rel="stylesheet" href="../css/post.css">
        <script src="../js/Collapse_sidebar.js"></script>
        <link rel="stylesheet" href="../css/table.css" />
        <link rel="icon" href="https://stf.hcmunre.edu.vn/Upload/images/brand-logo/HUNRE_Logo.png" type="image/x-icon">
        <title>Đại học Tài Nguyên và Môi Trường Hà Nội</title>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    </head>

    <body>
        <table width="100%">
            <tr>
                <td colspan="3">
                    <div class="fixed-div">
                        <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                            <div id="mySidebar" class="sidebar">
                                <?php
                                // Kiểm tra xem biến $_GET['userid'] có tồn tại không trước khi sử dụng
                                $userid = isset($_GET['userid']) ? $_GET['userid'] : ''; // Nếu không tồn tại, gán giá trị rỗng
                                // Get class id and userid
                                $id = $_GET['id'];
                                ?>
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                                <a href="../Trangmonhoc.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Trang lớp
                                    học</a>
                                <a class="nav-item"
                                    href="../Trangbaitap.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>"">Bài tập trên lớp</a>
                                <a href=" ../classlist.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Hiện
                                    danh sách học
                                    sinh</a>
                            </div>

                            <div id="main">
                                <button class="openbtn" onclick="openNav()">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-justify"
                                        fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                                    </svg> </button>
                            </div>

                            <a class="navbar-brand"
                                href="../TrangNguoiDung.php?username=<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>&userid=<?php echo isset($_GET['userid']) ? $_GET['userid'] : ''; ?>">
                                <img src="../image/HUNRE_logo.png" width="30" height="30" class="d-inline-block align-top"
                                    alt="">
                                Đại học Tài Nguyên và Môi Trường Hà Nội
                            </a>
                            <div class="topnav">
                                <?php
                                // Kiểm tra xem biến $_GET['userid'] có tồn tại không trước khi sử dụng
                                $userid = isset($_GET['userid']) ? $_GET['userid'] : ''; // Nếu không tồn tại, gán giá trị rỗng
                                // Get class id and userid
                                $id = $_GET['id'];
                                ?>
                                <a class="nav-item"
                                    href="../Trangbaitap.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>"">Bài tập trên lớp</a>
                           <a href=" ../classlist.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Danh sách
                                    học sinh</a>
                            </div>

                            <ul class="navbar-nav ml-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link avatar " data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle"
                                            fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                                            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                            <path fill-rule="evenodd"
                                                d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                                        </svg>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item textAccount textLogout " href="../logout.php">Đăng xuất khỏi
                                            tài khoản</a>
                                    </div>
                                </li>
                            </ul>

                        </nav>
                    </div>
                </td>
            </tr>
            <!-- Phần bên trái -->
            <tr class="box-left">
                <td width="20%" ; height="100%" valign="top" padding-top="20px" overflow-y=" scroll">
                    <div class="left">
                        <div class="container-fluid">
                            <div class="content">
                                <h4>Danh sách lớp</h4>
                                <div class="row">
                                    <?php
                                    // Lấy class_id từ class_list để hiển thị theo người dùng
                                    $get_classid = "SELECT `class_id` FROM `class_list` WHERE `class_list`.`user_id` = $userid;";
                                    $result = $connection->query($get_classid);
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <div class="col-xl-5item col-4item col-3item col-sm-6 cel">
                                            <div class="ccard cardColor_shadow">
                                                <div class="card-header border-secondary">
                                                    <h4 class="card-title">
                                                        <a
                                                            href="../Trangmonhoc.php?id=<?php echo $row['class_id']; ?>&userid=<?php echo $userid; ?>">
                                                            <h5 class="card-title text-info">
                                                                <?php
                                                                // Lấy tất cả dữ liệu từ bảng classes
                                                                $sql = "SELECT * from `classes` where `id` = $row[class_id];";
                                                                $result1 = mysqli_query($connection, $sql) or die(mysqli_error($connection));
                                                                $row1 = mysqli_fetch_array($result1);
                                                                if (strlen($row1["class_name"]) >= 20) {
                                                                    echo mb_substr($row1["class_name"], 0, 15, 'UTF-8') . " ... ";
                                                                } else {
                                                                    echo $row1["class_name"];
                                                                }
                                                                ?>
                                                            </h5>
                                                        </a>
                                                    </h4>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                <td width="80%" valign="top">
                    <div class="content">
                        <div class="container">

                            <h2>Tải xuống file</h2>
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Tên file</th>
                                        <th>Loại file</th>
                                        <th>Ngày tải file lên</th>
                                        <th>Tải xuống</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Hiển thị các file đã tải lên và các liên kết tải xuống
                                    $class_id = $_GET['id'];
                                    $sql = "SELECT * FROM files WHERE class_id = '$class_id'";
                                    $result = $connection->query($sql);
                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            $file_path = "../../Trang_giao_vien/tai_lieu/uploads/" . $row['filename'];
                                            ?>
                                            <tr>
                                                <td><?php echo $row['filename']; ?></td>
                                                <!-- <td><?php echo $row['filesize']; ?> bytes</td> -->
                                                <td><?php echo $row['filetype']; ?></td>
                                                <td><?php echo $row['upload_date']; ?></td>
                                                <td>
                                                    <a href="<?php echo $file_path; ?>" class="btn btn-primary" download>Tải
                                                        xuống</a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <tr>
                                            <td colspan="4">Chưa có file nào được tải lên.</td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </body>

    </html>
    <?php
} else {
    header("Location: .../sign_up_in/Login.php");
}
?>