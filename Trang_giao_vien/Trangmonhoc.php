<?php
session_start();

if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {

   ?>
   <?php
   // Bắt đầu hoặc khôi phục phiên (session)
   session_start();

   // Các mã PHP khác ở đây
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
      <link rel="stylesheet" href="./css/style_request2.css">
      <script src="./js/post.js"></script>
      <link rel="stylesheet" href="./css/Trangmonhoc.css">
      <link rel="stylesheet" href="./css/post.css">
      <script src="./js/Collapse_sidebar.js"></script>
      <title>Hanoi University of Natural Resources and Environment</title>
   </head>

   <body>
      <!--Thanh navbar-->
      <nav class="navbar navbar-expand-sm navbar-dark bg-info">
         <div id="mySidebar" class="sidebar">
            <?php
            // Kiểm tra xem biến $_GET['userid'] có tồn tại không trước khi sử dụng
            $userid = isset($_GET['userid']) ? $_GET['userid'] : ''; // Nếu không tồn tại, gán giá trị rỗng
            // Get class id and userid
            $id = $_GET['id'];
            ?>
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            <a class="nav-item" href="./Trangbaitap.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>"">Bài tập trên lớp</a>
               <a href=" ./classlist.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Hiện danh sách học
               sinh</a>
            <a href="./QuanLyPost.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Hiện danh sách bình luận</a>
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
         <!-- <div class="topnav">
               <?php
               // Kiểm tra xem biến $_GET['userid'] có tồn tại không trước khi sử dụng
               $userid = isset($_GET['userid']) ? $_GET['userid'] : ''; // Nếu không tồn tại, gán giá trị rỗng
               // Get class id and userid
               $id = $_GET['id'];
               ?>
               <a class="nav-item" href="Trangbaitap.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>"">Bài tập trên lớp</a>
               <a href="classlist.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Hiện danh sách học sinh</a>
               <a href="QuanLyPost.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Hiện danh sách bình luận</a>
            </div> -->

         <ul class="navbar-nav ml-auto">

            <li class="nav-item dropdown">
               <a class="nav-link avatar " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                     <path
                        d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                     <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                     <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                  </svg>
               </a>
               <div class="dropdown-menu dropdown-menu-right">
                  <a class="dropdown-item textAccount textLogout " href="logout.php">Đăng xuất khỏi tài khoản</a>
               </div>
            </li>

         </ul>
      </nav>


      <!--Form comment-->
      <div class="container">
         <div class="row  ">
            <div class="card mb-3 card_image">
               <img class="card-img card_image" src="./image/a5.jpg" alt="">
               <div class="card-img-overlay">
                  <h2 class="card-title text-light"></h2>
                  <p class="card-text text-light">

                  </p>
                  <?php
                  // TRang người dùng chưa pas ID vi nó ko hiểu cái $_GET['id']; lấy từ đâu?
                  $class_id = $_GET['id'];
                  require ('connect.php');

                  $sql = "SELECT `id`, `class_name`, `class_title` from classes where `id` = '$class_id'";

                  $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
                  $row = mysqli_fetch_array($result);

                  echo "<p class=\"card-text text-light displaySubject \">$row[1]</p>";
                  echo "<p class=\"card-text text-light\">Mã lớp học: $row[0]</p>";
                  echo "<p class=\"card-text text-light\">Chủ đề: $row[2]</p>";
                  ?>
               </div>
            </div>
         </div>
         <?php
         $id = "";
         if (isset($_GET['id'])) {
            $id = $_GET['id'];
         }

         $username = "";
         if (isset($_GET['username'])) {
            $username = $_GET['username'];
         }
         ?>
         <form class="" action="processTrangMonHoc.php?class_id=<?php echo $id ?>&username=<?php echo $username ?>"
            method="POST" enctype="multipart/form-data">
            <?php
            $id = "";
            $post_content = "";

            if (isset($_GET["id"])) {
               $id = $_GET["id"];
               require "connect.php";
               $sql = "SELECT * FROM `posts` WHERE id_cmt = '$id';";
               $result = $connection->query($sql) or die($connection->error);

               //$row= $result->fetch_assoc();
               $row = $result->fetch_assoc();
               // $post_content = $row["post_content"];
            }
            ?>
         </form>
         <?php
         require "connect.php";
         $sql = "SELECT * FROM `posts` WHERE `class_id` = $id";
         $result = $connection->query($sql);
         echo "BẢN TIN";

         /*while ($row = $result->fetch_assoc())
         {*/

         // Add a if there is no posts related to the class so bring out there is nothing else While
         while ($row = $result->fetch_assoc()) {
            ?>
            <div class="shadow-lg p-3 mb-5 bg-light rounded p1">
               <div class="form-group shadow-textarea">
                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor"
                     xmlns="http://www.w3.org/2000/svg">
                     <path
                        d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
                     <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                     <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
                  </svg>
                  <p class="p1">
                  <p class="c">
                     <?php
                     $user_id = isset($_GET["userid"]) ? $_GET["userid"] : null;
                     $class_id = isset($_GET["id"]) ? $_GET["id"] : null;
                     $class_id = $_GET['id'];
                     require ('connect.php');

                     $getname = "SELECT class_name FROM classes WHERE id='$class_id'";
                     $truyvan = mysqli_query($connection, $getname);
                     $class_name = mysqli_fetch_array($truyvan)['class_name'];


                     echo "<br>";

                     $sql = "SELECT fullname, post_content
                                                FROM posts 
                                                INNER JOIN classes ON posts.class_id = classes.id
                                                INNER JOIN users ON posts.user_id = users.user_id
                                                WHERE class_name LIKE '%$class_name%'
                                                ORDER BY posts.id_cmt DESC LIMIT 0,5";

                     $result = mysqli_query($connection, $sql);

                     while ($row = mysqli_fetch_array($result)) {
                        echo $row['fullname'] . ": ";

                        echo $row['post_content'];
                        echo "<br>";
                     }
                     ?>
                  <form action="them_binhluan.php?id=<?php echo $id ?> && userid=<?php echo $user_id ?>" method="post"
                     enctype="multipart/form-data">
                     <input type="text" name="noidung">
                     <button type="submit" class="btn btn-info">Gửi</button>
                  </form>
                  <!-- <?php echo $row["post_content"] ?> -->
                  </p>
                  <!-- <a 
                                       class="btn btn-warning delete" 
                                       role="button" 
                                       href="delete_posts.php?id=<?php echo $row["id"]; ?> &&  class_id=<?php echo $_GET['id']; ?> ">
                                       Xóa bài
                                    </a> -->

                  </p>
                  <!-- test binh luan -->

                  <!-- <?php

                  $user_id = isset($_GET["userid"]) ? $_GET["userid"] : null;
                  $class_id = isset($_GET["id"]) ? $_GET["id"] : null;
                  $class_id = $_GET['id'];
                  require ('connect.php');

                  $getname = "SELECT class_name FROM classes WHERE id='$class_id'";
                  $truyvan = mysqli_query($connection, $getname);
                  $class_name = mysqli_fetch_array($truyvan)['class_name'];

                  echo $class_name;
                  echo "<br>";
                  // Đoạn mã này không cần thiết, vì bạn đã echo $class_name ở trên
                  // echo $row['class_name'];
            
                  $sql = "SELECT fullname, post_content
                                                FROM posts 
                                                INNER JOIN classes ON posts.class_id = classes.id
                                                INNER JOIN users ON posts.user_id = users.user_id
                                                WHERE class_name LIKE '%$class_name%'
                                                ORDER BY posts.id_cmt DESC LIMIT 0,5";

                  $result = mysqli_query($connection, $sql);

                  while ($row = mysqli_fetch_array($result)) {
                     echo $row['fullname'] . ":";
                     echo "<br>";
                     echo $row['post_content'];
                     echo "<br>";
                     echo "<br>";
                  }
                  ?>
                                    <form action="them_binhluan.php?id=<?php echo $id ?> && userid=<?php echo $user_id ?>" method="post" enctype="multipart/form-data">
                                       <input type="text" name="noidung">
                                       <button type="submit"> Binh luan</button>
                                    </form> -->
                  <!-- test binh luan -->
                  <hr>
               </div>
            </div>
            <?php
         }
         ?>
      </div>
   </body>

   </html>
   <?php
} else {
   header("Location: ../sign_up_in/Login.php");
}
?>