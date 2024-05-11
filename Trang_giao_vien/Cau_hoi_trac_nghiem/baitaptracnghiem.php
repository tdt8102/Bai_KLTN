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
    <?php
    include ("connect.php")

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
        <script src="https://code.jquery.com/jquery-3.7.1.js"
            integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
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
                                    học sinh</a>
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
               <a href="classlist.php?id=<?php echo $id ?>&&userid=<?php echo $userid ?>">Hiện danh sách học sinh</a>
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
                                        <a class="dropdown-item textAccount textLogout " href="../logout.php">Đăng xuất khỏi
                                            tài
                                            khoản</a>
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

                <td width="90%" valign="top">
                    <div class="content">
                        <div class="container">

                            <div class="row">
                                <!-- phan tim kiem -->
                                <div class="col-sm-4">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Tìm kiếm" id="txtSearch" />
                                        <div class="input-group-btn">
                                            <button class="hidden" type="submit" id="btnSearch">
                                                <span class="glyphicon glyphicon-search"></span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- ket thuc phan tim kiem -->

                                <!-- phan` ohan trang -->
                                <!-- <div class="col-sm-6">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination" style="margin: 0px; padding-top: 0px; margin-left:10px;" id="pagination">

                        </ul>
                    </nav>
                </div> -->
                                <!-- ket thuc phan`phan trang -->

                                <div class="col-md-2 text-right">
                                    <button id="btnQuestion" class="btn btn-success">Thêm câu hỏi</button>
                                </div>
                            </div>

                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Câu hỏi</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody id='questions'>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </td>


            </tr>
        </table>
    </body>

    </html>
    <?php include ('mdlQuestion.php') ?>
    <script type="text/javascript">

        var page = 1;
        //trong su kien trang dc load xong thi goi toi ham load ds cau hoi
        $(document).ready(function () {
            $('#btnSearch').click();
        })

        $('#btnQuestion').click(function () {
            //Khi them moi mac dinh id cua cau hoi la 1 chuoi trong
            $('#txtQuestionId').val('');

            //set cac gia tri mac dinh cho cac input khi them moi 
            $('#txaQuestion').val('');
            $('#txaOptionA').val('');
            $('#txaOptionB').val('');
            $('#txaOptionC').val('');
            $('#txaOptionD').val('');

            //rs gia tri cho cac radio button-> k chon cai nao
            $('#rdOptionA').prop('checked', false);
            $('#rdOptionB').prop('checked', false);
            $('#rdOptionC').prop('checked', false);
            $('#rdOptionD').prop('checked', false);

            $('#modalQuestion').modal();
        });

        $('#btnSearch').click(function () {
            let search = $('#txtSearch').val().trim();
            ReadData(search, <?php echo $id ?>);
            Pagination(search);
        });

        //su kien update cau hoi
        $(document).on('click', "input[name='update']", function () {
            // var bid = this.id;
            var trid = $(this).closest('tr').attr('id');// lay id cua dong dc chon tren table khi click vao button co ten la update
            GetDetail(trid);//lay du lieu cau hoi dua vao id tim dc o tren va do du lieu vao cho cac input
            /*
                trong truong hop xem chi tiet cua cau hoi khong cho nguoi dung chinh sua cac gia tri va nhan nut xac nhan
            */

            $('#txaQuestion').attr('readonly', false);
            $('#txaOptionA').attr('readonly', false);
            $('#txaOptionB').attr('readonly', false);
            $('#txaOptionC').attr('readonly', false);
            $('#txaOptionD').attr('readonly', false);
            $('#txaQuestion').attr('readonly', false);

            $('#rdOptionA').attr('disabled', false);
            $('#rdOptionB').attr('disabled', false);
            $('#rdOptionC').attr('disabled', false);
            $('#rdOptionD').attr('disabled', false);

            $('#txtQuestionId').val(trid);
            $('#btnSubmit').show();
        });
        //su kien xem chi tiet cau hoi
        $(document).on('click', "input[name='view']", function () {
            var bid = this.id;
            var trid = $(this).closest('tr').attr('id');
            GetDetail(trid);
            /*
                trong truong hop xem chi tiet cua cau hoi khong cho nguoi dung
                chinh sua cac gia tri va nhan nut xac nhan
            */


            $('#txaQuestion').attr('readonly', 'readonly');
            $('#txaOptionA').attr('readonly', 'readonly');
            $('#txaOptionB').attr('readonly', 'readonly');
            $('#txaOptionC').attr('readonly', 'readonly');
            $('#txaOptionD').attr('readonly', 'readonly');
            $('#txaQuestion').attr('readonly', 'readonly');

            $('#rdOptionA').attr('disabled', 'readonly');
            $('#rdOptionB').attr('disabled', 'readonly');
            $('#rdOptionC').attr('disabled', 'readonly');
            $('#rdOptionD').attr('disabled', 'readonly');

            $('#btnSubmit').hide();
        });
        //su kien xoa cau hoi
        $(document).on('click', "input[name='delete']", function () {
            // var bid = this.id;

            var trid = $(this).closest('tr').attr('id');// lay id cua dong dc chon tren table khi click vao button co ten la update

            if (confirm("Bạn chắc chắn muốn xóa câu hỏi này không?") == true) {
                $.ajax({
                    url: 'delete_question.php',
                    type: 'post',
                    data: {
                        id: trid
                    },
                    success: function (data) {
                        alert(data);
                        ReadData();
                    }
                });
            }
        });
        //ham load thong tin cau hoi dua vao id
        function GetDetail(id) {//ham lay cau hoi dua vao id cau hoi

            $.ajax({
                url: 'detail.php',//chi duong dan toi file detail.php de lay thong tin cau hoi
                type: 'get',//phuong thuc get
                data: {
                    id: id//truyen tham so co gia tri bang gia tri cua id cau hoi
                },
                success: function (data) {
                    // Handle the success response here

                    var q = jQuery.parseJSON(data); //ep du lieu tra ve qua json
                    // console.log(q)

                    $('#txaQuestion').val(q['question']);//set gia tri cho textarea co id la txaQuestion

                    $('#txaOptionA').val(q['option_a']);//set gia tri cho textarea co id la txaOption_a(dap an A)
                    $('#txaOptionB').val(q['option_b']);//set gia tri cho textarea co id la txaOption_b(dap an B)
                    $('#txaOptionC').val(q['option_c']);//set gia tri cho textarea co id la txaOption_c(dap an C)
                    $('#txaOptionD').val(q['option_d']);//set gia tri cho textarea co id la txaOption_d(dap an D)

                    $('#modalQuestion').modal();//hien modal co id la modalQuestion

                    // console.log(q['answer']);
                    switch (q['answer']) {// dung switch case dua vao gia tri cua answer de tick dung dap an cua cau hoi
                        case 'A':
                            $('#rdOptionA').prop('checked', true);
                            break;
                        case 'B':
                            $('#rdOptionB').prop('checked', true);
                            break;
                        case 'C':
                            $('#rdOptionC').prop('checked', true);
                            break;
                        case 'D':
                            $('#rdOptionD').prop('checked', true);
                            break;
                    }
                }
            });
        }
        //ham load ds cau hoi
        function ReadData(search, id) {
            $.ajax({
                url: 'view.php',
                type: 'get',
                data: {
                    search: search,
                    page: page,
                    id: id
                },
                success: function (data) {
                    $('#questions').empty();
                    $('#questions').append(data);

                }
            });
        }
        //ham phan trang
        function Pagination(search) {
            $.ajax({
                url: 'pagination.php',
                type: 'get',
                data: {
                    search: search
                },
                success: function (data) {
                    console.log(data);
                    if (data <= 1) {
                        $('#pagination').hide();
                    } else {
                        $('#pagination').show();
                        $('#pagination').empty();
                        let pagi = '';
                        for (i = 1; i <= data; i++) {
                            pagi += '<li class="page-item" data-li=' + i + '><a class="page-link" href="#">' + i + '</a></li>';
                        }
                        $('#pagination').append(pagi);
                    }
                }
            });
        }
        //search
        $('#txtSearch').on('keypress', function (e) {
            if (e.which === 13) {

                $('#btnSearch').click();
            }
        })



        $("#pagination").on("click", "li a", function (event) {
            event.preventDefault();
            page = $(this).text();
            ReadData($('#txtSearch').val());
        });


    </script>
    <?php
} else {
    header("Location: ../sign_up_in/Login.php");
}
?>