<?php
session_start();

if (isset($_SESSION["email"]) && !empty($_SESSION["email"])) {

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
    <script src="./js/Collapse_sidebar.js"></script>
    <link rel="stylesheet" href="./css/TrangThamGiaLopHoc.css">
    <link rel="stylesheet" href="./css/dropdownAccount.css">
    <script src="./js/Collapse_sidebar.js"></script>
    <title>Document</title>
  </head>

  <body>

    <nav class="navbar navbar-expand-sm navbar-dark bg-info">
      <div id="mySidebar" class="sidebar">
        <?php
        // Kiểm tra xem biến $_GET['userid'] có tồn tại không trước khi sử dụng
        $userid = isset($_GET['userid']) ? $_GET['userid'] : ''; // Nếu không tồn tại, gán giá trị rỗng
        // Get class id and userid
        $id = $_GET['id'];
        ?>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
        <a href="./Trangmonhoc.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Trang lớp học</a>
        <a href="./classlist.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Hiện danh sách học sinh</a>
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

      <ul class="navbar-nav ml-auto">
        <!-- <li class="nav-item dropdown">
      <a class="nav-link Join"href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" title="Tạo hoặc tham gia vào lớp học"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
         <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
       </svg></a>
         
    </li> -->
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown ">
          <a class="nav-link avatar " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor"
              xmlns="http://www.w3.org/2000/svg">
              <path
                d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
              <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
              <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
            </svg>
          </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu1">
            <svg width="30px" height="50px" viewBox="0 0 16 16" class="bi bi-person-circle iconAccount"
              fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z" />
              <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
              <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z" />
            </svg>
            <p class="textAccount"><b>Account Login</b></p>
            <p class="textAccount">AccountLogin@gmail.com</p>
            <hr>
            <a class="dropdown-item textAccount textLogout " href="logout.php">Đăng xuất khỏi tài khoản</a>
          </div>
        </li>
      </ul>
    </nav>

    <div class="form ">
      <div class="item_form1">


        <div class="dropdown">
          <button class="btn btn-info dropdown-toggle" style="" type="button" id="dropdownMenuButton"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            + Tạo bài tập
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item"
              href="./Cau_hoi_trac_nghiem/baitaptracnghiem.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>"">Bài tập trắc nghiệm</a>
                        <a class=" dropdown-item" href="#">Bài tập kiểm tra</a>
            <a class="dropdown-item" href="#">Câu hỏi</a>
          </div>
        </div>
        <b>
          <p class="text-info">Chỉ định bài tập cho lớp học tại đây</p>
        </b>
        <p> Sử dụng chủ đề để sắp xếp bài tập trên lớp vào các mô-đun hoặc đơn vị</p>
        <p> Sắp xếp bài tập theo cách bạn muốn học sinh nhìn thấy</p>
      </div>


  </body>

  </html>
  <?php
} else {
  header("Location: ../sign_up_in/Login.php");
}
?>