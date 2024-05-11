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
    <title>Hunre classroom</title>
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
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
      crossorigin="anonymous"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css"
      integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css"
      integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"
      integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
      crossorigin="anonymous"></script>
    <link rel="icon" href="https://stf.hcmunre.edu.vn/Upload/images/brand-logo/HUNRE_Logo.png" type="image/x-icon">
  </head>

  <body>
    <table width="100%">
      <tr>
        <td colspan="3">
          <div class="fixed-div">
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
                <a href="../Trangmonhoc.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Trang lớp học</a>
                <a class="nav-item" href="./Trangbaitap.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>"">Bài tập trên lớp</a>
               <a href=" ../classlist.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Hiện danh sách học
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
                href="../TrangNguoiDung.php?username=<?php echo isset($_GET['username']) ? $_GET['username'] : ''; ?>&userid=<?php echo isset($_GET['userid']) ? $_GET['userid'] : ''; ?>">
                <img src="../image/HUNRE_logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
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
                    <a class="dropdown-item textAccount textLogout " href="../logout.php">Đăng xuất khỏi tài khoản</a>
                  </div>
                </li>
              </ul>

            </nav>
          </div>
        </td>
      </tr>

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
        <td width="80%" valign="top">
          <div class="content">
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
                    <div class="row">
                      <div class="col-sm-12 text-center">
                        <h4 id="mark"></h4>
                      </div>
                    </div>
                  </div>
                </div>


              </div>
            </div>
          </div>
        </td>

      </tr>
    </table>
  </body>

  </html>

  <script type="text/javascript">
    $(document).ready(function () {
      $('#btnFinish').hide();
    });

    let questions;

    $('#btnStart').click(function () {
      GetQuestions();
      $('#btnFinish').show();
      $(this).hide();
    });

    $('#btnFinish').click(function () {
      $(this).hide();
      $('#btnStart').show();
      CheckResult();
      // $('#questions').html('');
    });

    function CheckResult() {
      let mark = 0;
      $('#questions div.row').each(function (k, v) {
        //buoc 1: lay dap an dung cua cau hoi
        let id = $(v).find('h5').attr('id');

        // let id = $(v).attr('id');// lay thuoc tinh id cua the h5 = cau hoi => lay id cau hoi
        let question = questions.find(x => x.id_quest == id);// tim cau hoi trong mang question dua vao id da co o tren
        let answer = question['answer'];//lay dap an dung cua cau hoi
        // console.log(answer);

        //buoc 2: lay dap an cua nguoi dung - radio duoc check
        let choice = $(v).find('fieldset input[type="radio"]:checked').attr('class');
        if (choice == answer) {
          // console.log('Câu có id: '+id+' Đúng');
          mark += 1;//moi cau dung dc cong 2 diem
        } else {
          console.log('Câu có id: ' + id + ' Sai');
        }
        //buoc 3: kiem tra dap an cua nguoi dung co dung hay khong
      });
      // console.log('Điểm của bạn là ' +mark);
      $('#mark').text('Điểm của bạn là ' + mark);
    }

    function GetQuestions() {
      $.ajax({
        url: 'questions.php',
        type: 'post', // Thay đổi type thành 'post'
        data: { id: <?php echo $id ?>, userid: <?php echo $userid ?> }, // Truyền dữ liệu id và userid
        success: function (data) {
          questions = jQuery.parseJSON(data);
          let index = 1;
          let d = '';

          $.each(questions, function (k, v) {
            d += '<div class="row" style="display: flex; flex-direction: column; margin-left:10px;">';
            d += '<h5 style="font-weight:bold;" id="' + v['id_quest'] + '"><span class="text-danger">Câu ' + index + ': </span>' + v['question'] + '</h5>';

            d += '<fieldset id="group' + index + ' ">';
            d += '<div class="radio col-md-12">';
            d += '<label><input type="radio" class="A" name="group' + index + ' "><span>A: </span>' + v['option_a'] + '</label>';
            d += '</div>';

            d += '<div class="radio col-md-12">';
            d += '<label><input type="radio" class="B" name="group' + index + ' "><span>B: </span>' + v['option_b'] + '</label>';
            d += '</div>';

            d += '<div class="radio col-md-12">';
            d += '<label><input type="radio" class="C" name="group' + index + ' "><span>C: </span>' + v['option_c'] + '</label>';
            d += '</div>';

            d += '<div class="radio col-md-12">';
            d += '<label><input type="radio" class="D" name="group' + index + ' "><span>D: </span>' + v['option_d'] + '</label>';
            d += '</div>';
            d += '</fieldset>';
            d += '</div>';
            index++;
          });
          $('#questions').html(d);
        }
      });
    }
  </script>
  <?php
} else {
  header("Location: ../sign_up_in/Login.php");
}
?>