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
    <link rel="stylesheet" href="./css/dropdownAccount.css">
    <script src="./js/Collapse_sidebar.js"></script>
    <link rel="stylesheet" href="./css/TrangThamGiaLopHoc.css">
    

    <title>Document</title>
    
</head>
<style>
    @media screen and (min-width:768px){
    .col-3item{
        -ms-flex:0 0 33.3%;
        flex:0 0 33.3%;
        max-width:33.3%;
    }
    }

    @media screen and (min-width:992px){
    .col-4item{
        -ms-flex:0 0 25%;
        flex:0 0 25%;
        max-width:25%;
    }
    }

    @media screen and (min-width:1200px){
    .col-xl-5item{
        -ms-flex:0 0 20%;
        flex:0 0 20%;
        max-width:20%;
    }
    }
</style>
<body>
   <!--Modal Tham gia lớp học bằng mã code-->
   <div class="modal fade right" id="ModalJoinClass" tabindex="-1" role="dialog" aria-hidden="true">
   <div class="modal-dialog-full-width modal-dialog momodel modal-fluid" role="document">
       <div class="modal-content-full-width modal-content ">
           <div class=" modal-header-full-width">
               <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
                 <button type="button" class="close " data-dismiss="modal" aria-label="Close">
                     <span style="font-size: 1.8em;" aria-hidden="true">&times;</span>
                 </button>
                 <a class= "navbar-brand" href=""> Tham gia lớp học</a>
               
            </nav>
           </div>
           <div class="modal-body">
 
             <div class="form">
                <div class="item_form2">
                    <h5>Mã lớp(class id)</h5>
                    <p>Đề nghị giáo viên của bạn cung cấp mã lớp(class id) rồi nhập mã
                        vào đây
                    </p>   
                        <?php
                            $userid = $_GET['userid'];
                        ?>
                        <form action="addLophoc.php?userid=<?php echo $userid?>&&username=<?php echo $_GET['username']?>" method = "post">
                            <input id="code_Class" type="text" placeholder="Mã lớp(class id)" name="code_Class" required>
                            <button type = "submit" id="btn_Thamgia">Tham gia</button>
                        </form>
                </div>
            </div>
            <div class="form1">
                <div class="text_suggestions">
                    <p><b>Cách đăng nhập bằng mã lớp học</b></p>
                    <li>
                        Sử dụng tài khoản được cấp phép
                    </li>
                    <li>
                        Sử dụng mã lớp học là một con số, không có
                        dấu hoặc ký hiệu
                    </li>
                    <p>Nếu bạn đang gặp vấn đề khi tham gia lớp học
                        , hãy liên hệ giáo viên tạo lớp học
                    </p>
                </div>
        
            </div>
           </div>
       </div>
   </div>
 </div>


<!-- Modal Tạo lớp học bởi giáo viên-->
<!-- Form đăng ký sử dụng javascript-->
<div id = "id01" class= "modal_FormCreateClass">
   <form class="modal-content1 animate" action="" method="=post">
       <div class="container">
           <h1>Tạo lớp học</h1>
           <label for="name1"><b>Tên lớp học</b></label>
           <input type="text" placeholder="Tên lớp học (bắt buộc)" name="name1" required>

           <label for="name2"><b>Chủ đề</b></label>
           <input type="text" placeholder="Chủ đề" name="name2" required>

           <label for="name3"><b>Phòng</b></label>
           <input type="text" placeholder="Phòng" name="name" required>

           
           <!--Khi nhấn nút cancel thì đóng form đăng ký lại-->
       <div class="clearfix">
           <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
           <button type="submit" class= "btn_CreateClass">Tạo</button>
           
       </div>
           

       </div>
   </form>

</div>
 
 <!-- Trang chính-->
      <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
         <a class="navbar-brand" href="#">
            <img src="HUNRE_Logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            Hanoi University of Natural Resources and Environment
         </a>

         <ul class="navbar-nav ml-auto">
             <li class="nav-item dropdown">
               <a class="nav-link Join"href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-toggle="tooltip" title="Tạo hoặc tham gia vào lớp học"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-plus-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                </svg></a>
                  <div class="dropdown-menu dropdown-menu-right" >
                    <a id="modalActivate"  data-toggle="modal" data-target="#ModalJoinClass" href="" class="dropdown-item" href="#">Tham gia lớp học</a>
                    <!--
                    <a onclick= "document.getElementById('id01').style.display='block'"
                    style="width:100%;" class="dropdown-item" href="#">Tạo lớp học</a>-->
                  </div>
             </li>
         </ul>
         <ul class="navbar-nav">
            <li class="nav-item dropdown">
               <a class="nav-link avatar "
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                  <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                  <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                  <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                </svg>
               </a>

               <!--Updated account dropdown list-->
               <div class="dropdown-menu dropdown-menu-right dropdown-menu1" >
                    <svg width="30px" height="50px" viewBox="0 0 16 16" class="bi bi-person-circle iconAccount" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
                    <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                    <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
                    </svg>
                    <p class="textAccount"><b>Kính chào quý bạn</b></p>
                    <p class="textAccount">
                        <?php
                            /**
                             * Get full name then display it in that account box
                             */
                            // get fullname from id

                            require("connect.php");
                            $user_id = $_GET['userid'];
                            $sql = " SELECT `fullname` from `users` where `user_id` = '$user_id';";
                            $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
                            $row = mysqli_fetch_array($result);

                            echo "<p class=\"textAccount text-success\"><b>$row[0]</b></p>";
                        ?>
                    </p>
                    <hr>
                    <a class="dropdown-item textAccount textLogout " href="logout.php">Đăng xuất khỏi tài khoản</a>
                </div>
            </li>
         </ul>
      </nav>
      <!--View Class card source code-->
    <div class="container-fluid">
        <div class="content">
        <div class="row">
            <?php
                // get class_id from class_list to view them according to user
                $get_classid = "SELECT `class_id` FROM `class_list` WHERE `class_list`.`user_id` = $user_id;";
                $result = $connection->query($get_classid);
                while ($row = $result->fetch_assoc())
            {
            ?>
            <div class= "col-xl-5item col-4item col-3item col-sm-6 cel">
                    <div class="ccard cardColor_shadow">
                    <div class="card-header border-secondary">
                        <h4 class="card-title">
                            
                        <!--Passing username to get id from it in the next page-->
                        <a href="Trangmonhoc.php?id=<?php echo $row['class_id'];?>&&userid=<?php $user_id = $_GET['userid']; echo $user_id;?>">
                            <h5 class="card-title text-info">
                                <?php 
                                    // get all data from table classes
                                    $sql = "SELECT * from `classes` where `id` = $row[class_id];";
                                    $result1 = mysqli_query($connection, $sql) or die(mysqli_error($connection));
                                    $row1 = mysqli_fetch_array($result1);
                                    if (strlen($row1["class_name"]) >= 20) {
                                        echo mb_substr($row1["class_name"], 0, 15,'UTF-8'). " ... ";
                                    }
                                    else {
                                        echo $row1["class_name"];
                                    }                                
                                ?>
                            </h5>
                        </a>                               
                        </h4>
                    </div>                 
                    <div class="card-body">
                        <h5 class="card-title p1" style="font-size:15px">Chủ đề: <?php echo $row1["class_title"]?></h5>
                        <p class="card-text text-dark " style="font-size:15px">
                            <b> <?php echo $row1["lecturer"]; ?></b>
                        </p>
                    </div>
                    
                    <div class= "card-footer border-secondary">
                    <a class="btn btn-secondary"  role="button" href="EditLopHoc.php?id=<?php echo $row1['id']?> && class_name=<?php echo $row1['class_name']?> && class_title=<?php echo $row1['class_title']?> && lecturer=<?php echo $row1['lecturer']?>" >Sửa</a> |
                    <!--Adding username and userid to pass it to delete_function-->
                    <?php
                        // Re-assign username and userid
                        $username = $_GET['username'];
                    ?>
                    <a class="btn btn-danger" role="button" href="delete_function.php?id=<?php echo $row1["id"]?>&&username=<?php echo $username?>&&userid=<?php echo $user_id?>" class="delete">Xóa</a>                       
                    
                    
                    </div>
                    </div>
            </div>
            <?php
            }
            ?>              
        </div>
        </div>
    </div>

</body>
</html>
