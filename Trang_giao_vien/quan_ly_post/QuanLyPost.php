<?php
session_start();

if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {
    // Include the file where $connection is established
    require_once "connect.php"; // Adjust the path as necessary

    // Check if $_GET['userid'] is set, assign to $user_id if set, otherwise set it to null
    $user_id = isset($_GET['userid']) ? $_GET['userid'] : null;

    // Check if $_GET['id'] is set, assign to $id if set, otherwise set it to null
    $id = isset($_GET['id']) ? $_GET['id'] : null;

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
    </head>

    <body>
        <table width="100%">
            <!-- phan dau -->
            <tr>
                <td colspan="3">
                    <div class="fixed-div">
                        <nav class="navbar navbar-expand-sm navbar-dark bg-info">
                            <div id="mySidebar" class="sidebar">
                                <?php
                                // Kiểm tra xem biến $_GET['userid'] có tồn tại không trước khi sử dụng
                                $userid = isset($_GET['userid']) ? $_GET['userid'] : ''; // Nếu không tồn tại, gán giá trị rỗng
                                // Get class id and userid
                                $id = $_GET['id'];
                                ?>
                                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
                                <a class="nav-item"
                                    href="./Trangbaitap.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>"">Bài tập trên lớp</a>
                        <a href=" ./classlist.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Hiện danh sách
                                    học
                                    sinh</a>
                                <a href="./quan_ly_post/QuanLyPost.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Hiện
                                    danh
                                    sách bình
                                    luận</a>
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
                                <img src="../image/HUNRE_logo.png" width="40" height="40" class="d-inline-block align-top"
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
                                    sinh viên</a>
                                <a href="../quan_ly_post/QuanLyPost.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Danh
                                    sách bình luận</a>
                            </div>
                            <!-- <div class="topnav">
               <?php
               // Kiểm tra xem biến $_GET['userid'] có tồn tại không trước khi sử dụng
               $userid = isset($_GET['userid']) ? $_GET['userid'] : ''; // Nếu không tồn tại, gán giá trị rỗng
               // Get class id and userid
               $id = $_GET['id'];
               ?>
               <a class="nav-item" href="Trangbaitap.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>"">Bài tập trên lớp</a>
               <a href="classlist.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Hiện danh sách  sinh viên</a>
               <a href="QuanLyPost.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Hiện danh sách bình luận</a>
            </div> -->

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
                                        <a class="dropdown-item textAccount textLogout " href="logout.php">Đăng xuất khỏi
                                            tài
                                            khoản</a>
                                    </div>
                                </li>

                            </ul>
                        </nav>
                    </div>
                </td>
            </tr>

            <!-- phan ben trai -->
            <tr class="box-left">
                <td width="20%" ; height="100%" valign="top" padding-top="20px" overflow-y=" scroll">
                    <!-- <div class="fixed-div"> -->
                    <div class="left">
                        <div class="container-fluid">
                            <div class="content">
                                <h4>Danh sách lớp</h4>
                                <div class="row">

                                    <?php
                                    // get class_id from class_list to view them according to user
                                    $get_classid = "SELECT `class_id` FROM `class_list` WHERE `class_list`.`user_id` = $user_id;";
                                    $result = $connection->query($get_classid);
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <div class="col-xl-5item col-4item col-3item col-sm-6 cel">
                                            <div class="ccard cardColor_shadow">
                                                <div class="card-header border-secondary">
                                                    <h4 class="card-title">
                                                        <!--Passing username to get id from it in the next page-->
                                                        <a href="../Trangmonhoc.php?id=<?php echo $row['class_id']; ?>&&userid=<?php $user_id = $_GET['userid'];
                                                           echo $user_id; ?>">
                                                            <h5 class="card-title text-info">
                                                                <?php
                                                                // get all data from table classes
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
                        <!-- </div> -->
                    </div>
                </td>
                <!-- phan content -->
                <td width="90%" valign="top">
                    <div class="content">
                        <div class="container">
                            <?php
                            $class_id = $_GET['id'];
                            $sql = "SELECT p.*, u.fullname FROM `posts` p JOIN `users` u ON p.user_id = u.user_id WHERE class_id = '$class_id'";
                            $result = $connection->query($sql) or die(mysqli_error($connection));
                            ?>

                            <!--SQL Table read-->
                            <section>
                                <table>
                                    <tr>
                                        <th>ID cmt</th>
                                        <th>Post content</th>
                                        <th>Class ID</th>
                                        <th>User ID</th>
                                        <th>Name</th>
                                        <th>Admin Action</th>
                                    </tr>

                                    <?php
                                    while ($row = $result->fetch_assoc()) {
                                        ?>
                                        <tr>
                                            <td><?php echo $row['id_cmt']; ?></td>
                                            <td><?php echo $row['post_content']; ?></td>
                                            <td><?php echo $row['class_id']; ?></td>
                                            <td><?php echo $row['user_id']; ?></td>
                                            <td><?php echo $row['fullname']; ?></td>
                                            <td>
                                                <a href="EditPost.php?id_cmt=<?php echo $row['id_cmt']; ?>&post_content=<?php echo $row['post_content']; ?>& id=<?php echo $row['class_id']; ?>&user_id=<?php echo $row['user_id']; ?>"
                                                    class="btn btn-warning">Update</a>
                                                <button
                                                    onclick="confirmDelete(<?php echo $row['id_cmt']; ?>, '<?php echo $row['post_content']; ?>', <?php echo $row['class_id']; ?>, <?php echo $row['user_id']; ?>)"
                                                    class="btn btn-danger">Delete</button>
                                            </td>
                                        </tr>

                                        <?php
                                    }
                                    ?>
                                </table>
                            </section>
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </body>

    </html>
    <script>
        function confirmDelete(id_cmt, post_content, class_id, user_id) {
            if (confirm("Bạn có chắc chắn muốn xóa bình luận này không?")) {
                window.location.href = "XoaPost.php?id_delete=" + id_cmt + "&post_content=" + post_content + "&id=" + class_id + "&userid=" + user_id;
            }
        }
    </script>
    <?php
} else {
    header("Location: .../sign_up_in/Login.php");
}
?>