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
    <script src="./js/Collapse_sidebar.js"></script> 
    <script src="./js/post.js"></script> 
    <link rel="stylesheet" href="../css/TrangThamGiaLopHoc.css">
    <link rel="stylesheet" href="../css/dropdownAccount.css">
    <link rel="stylesheet" href="../css/Trangmonhoc.css">
    <script
    src="https://code.jquery.com/jquery-3.7.1.js"
    integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <title>Document</title>
</head>
<body>

  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">

    <a class="navbar-brand" href="../TrangNguoiDung.php?username=<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>&userid=<?php echo isset($_GET['userid']) ? $_GET['userid'] : ''; ?>">
      <img src="../image/HUNRE_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
      Hanoi University of Natural Resources and Environment
    </a>
    <div class="topnav">
      <?php
        // Get class id and userid
        $id = $_GET['id'];
        $userid = $_GET['userid'];
      ?>
      <a href="../Trangmonhoc.php?id=<?php echo $id?>&&userid=<?php echo $userid;?>">
        Trang lớp học
      </a>
    </div>
    <ul class="navbar-nav ml-auto">      
      <li class="nav-item dropdown">
        <a class="nav-link avatar " data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
            <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
          </svg>
        </a>
        <div class="dropdown-menu dropdown-menu-right" >
          <a class="dropdown-item textAccount textLogout " href="logout.php">Đăng xuất khỏi tài khoản</a>
        </div>
      </li> 
    </ul>
  </nav>
  <div class="container">
    <div class="panel-group">

      <div class="panel panel-primary">
        <div class="panel-heading">Làm bài tập trắc nghiệm</div>
        <div class="panel-body">
          <div class="row">
            <div class="col-sm-12 text-right">
              <button type="button" name="button" class="btn btn-success" id="btnStart">Bắt đầu</button>
            </div>
          </div>
          <div id="questions"></div>
          <div class="row">
              <div class="col-sm-12 text-center">
                <button type="button" class="btn btn-warning" id="btnFinish">Kết thúc bài kiểm tra</button>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>

<script type="text/javascript">
  $(document).ready(function(){
    $('#btnFinish').hide();
  });

  $('#btnStart').click(function(){
    GetQuestions();
    $('#btnFinish').show();
    $(this).hide();
  });

  $('#btnFinish').click(function(){
    $(this).hide();
    $('#btnStart').show();
    CheckResult();
    // $('#questions').html('');
  });

  function CheckResult(){
    alert(1);
  }

  function GetQuestions(){
    $.ajax({
      url:'questions.php',
      type:'get',
      success:function(data){
        $('#questions').html(data);
      }
    });
  }
</script>