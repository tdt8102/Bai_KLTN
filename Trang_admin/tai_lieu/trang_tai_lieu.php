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

        <nav class="navbar navbar-expand-sm navbar-dark bg-info">
            <div id="mySidebar" class="sidebar">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                <a href="../TrangAdmin.php">Quản lý Users</a>
                <a href="../quan_ly_class/QuanLyClass.php">Quản lý Classes</a>
                <a href="../quan_ly_post/QuanLyPost.php">Quản lý Posts</a>
                <a href="../tai_lieu/trang_tai_lieu.php">Quản lý Tài liệu</a>
            </div>
            <div id="main">
                <button class="openbtn" onclick="openNav()">
                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-justify" fill="currentColor"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M2 12.5a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                    </svg> </button>
            </div>
            <a class="navbar-brand" href="#">
                <img src="../image/cap-1.png" width="35" height="35" class="d-inline-block align-top" alt="">
                Admin Panel
            </a>
            <div class="topnav">
                <a href="../TrangAdmin.php">Quản lý Users</a>
                <a href="../quan_ly_class/QuanLyClass.php">Quản lý Classes</a>
                <a href="../quan_ly_post/QuanLyPost.php">Quản lý Posts</a>
                <a href="../tai_lieu/trang_tai_lieu.php">Quản lý Tài liệu</a>
            </div>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <!-- <a class="nav-link Join"href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" title="Tạo hoặc tham gia vào lớp học"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                    </svg></a>
                    <div class="dropdown-menu dropdown-menu-right" > -->
                    <!-- <a id="modalActivate"  data-toggle="modal" data-target="#ModalJoinClass" href="" class="dropdown-item" href="#">Thêm lớp học</a>
                        
                        <a onclick= "document.getElementById('id01').style.display='block'"
                        style="width:100%;" class="dropdown-item" href="PhanQuyenuser.php">---</a> -->
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav">
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
                        <a class="dropdown-item" href="#">Tài khoản của tôi</a>
                        <a class="dropdown-item" href="#">Đăng nhập bằng tài khoản khác</a>
                        <a class="dropdown-item" href="../logout.php">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div class="content">
            <div class="container">
                <h2>Tải xuống file</h2>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Tên file</th>
                            <!-- <th>Dung lượng file</th> -->
                            <th>Loại file</th>
                            <th>Ngày tải file lên</th>
                            <th>Tải xuống</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Hiển thị các file đã tải lên và các liên kết tải xuống
                        $sql = "SELECT * FROM files ";
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
                                        <a href="delete.php?id=<?php echo $row['id']; ?>&userid=<?php echo $userid; ?>"
                                            class="btn btn-danger">Xóa</a>
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


    </body>

    </html>
    <?php
} else {
    header("Location: .../sign_up_in/Login.php");
}
?>