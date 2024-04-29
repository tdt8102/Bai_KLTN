<?php 
include("connect.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
</head>
<body>
    <div class="container">

    <div class="row">
        <!-- phan tim kiem -->
        <div class="col-sm-4">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Tìm kiếm" id="txtSearch"/>
                <div class="input-group-btn">
                    <button class="btn btn-primary" type="submit" id="btnSearch">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>
                </div>
            </div>
        </div>
        <!-- ket thuc phan tim kiem -->
        <div class="col-sm-6">
        
        </div>
        <div class="col-md-2 text-right">
            <button id="btnQuestion" class="btn btn-success">+</button>
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
</body>
</html>
<?php include('mdlQuestion.php') ?>
<script type="text/javascript">

    //trong su kien trang dc load xong thi goi toi ham load ds cau hoi
    $(document).ready(function(){
        $('#btnSearch').click();
    })

    $('#btnQuestion').click(function(){
        //Khi them moi mac dinh id cua cau hoi la 1 chuoi trong
        $('#txtQuestionId').val('');

        //set cac gia tri mac dinh cho cac input khi them moi 
        $('#txaQuestion').val('');
        $('#txaOptionA').val('');
        $('#txaOptionB').val('');
        $('#txaOptionC').val('');
        $('#txaOptionD').val('');

        //rs gia tri cho cac radio button-> k chon cai nao
        $('#rdOptionA').prop('checked',false);
        $('#rdOptionB').prop('checked',false);
        $('#rdOptionC').prop('checked',false);
        $('#rdOptionD').prop('checked',false);

        $('#modalQuestion').modal();
    });

    $('#btnSearch').click(function(){
        let search = $('#txtSearch').val().trim();
        ReadData(search);
    });

//su kien update cau hoi
    $(document).on('click',"input[name='update']",function(){
        // var bid = this.id;
        var trid = $(this).closest('tr').attr('id');// lay id cua dong dc chon tren table khi click vao button co ten la update
        GetDetail(trid);//lay du lieu cau hoi dua vao id tim dc o tren va do du lieu vao cho cac input
        /*
            trong truong hop xem chi tiet cua cau hoi khong cho nguoi dung chinh sua cac gia tri va nhan nut xac nhan
        */

        $('#txaQuestion').attr('readonly',false);
        $('#txaOptionA').attr('readonly',false);
        $('#txaOptionB').attr('readonly',false);
        $('#txaOptionC').attr('readonly',false);
        $('#txaOptionD').attr('readonly',false);
        $('#txaQuestion').attr('readonly',false);
                    
        $('#rdOptionA').attr('disabled',false);
        $('#rdOptionB').attr('disabled',false);
        $('#rdOptionC').attr('disabled',false);
        $('#rdOptionD').attr('disabled',false);

        $('#txtQuestionId').val(trid);
        $('#btnSubmit').show();
    });
//su kien xem chi tiet cau hoi
    $(document).on('click',"input[name='view']",function(){
        var bid = this.id;
        var trid = $(this).closest('tr').attr('id');
        GetDetail(trid);
        /*
            trong truong hop xem chi tiet cua cau hoi khong cho nguoi dung
            chinh sua cac gia tri va nhan nut xac nhan
        */


        $('#txaQuestion').attr('readonly','readonly');
        $('#txaOptionA').attr('readonly','readonly');
        $('#txaOptionB').attr('readonly','readonly');
        $('#txaOptionC').attr('readonly','readonly');
        $('#txaOptionD').attr('readonly','readonly');
        $('#txaQuestion').attr('readonly','readonly');
                    
        $('#rdOptionA').attr('disabled','readonly');
        $('#rdOptionB').attr('disabled','readonly');
        $('#rdOptionC').attr('disabled','readonly');
        $('#rdOptionD').attr('disabled','readonly');

        $('#btnSubmit').hide();
    });
//su kien xoa cau hoi
    $(document).on('click',"input[name='delete']",function(){
        // var bid = this.id;

        var trid = $(this).closest('tr').attr('id');// lay id cua dong dc chon tren table khi click vao button co ten la update
        
        if(confirm("Bạn chắc chắn muốn xóa câu hỏi này không?") == true){
            $.ajax({
                url:'delete_question.php',
                type:'post',
                data:{
                    id:trid
                },
                success:function(data){
                    alert(data);
                    ReadData();
                }
            });
        }
    });
//ham load thong tin cau hoi dua vao id
    function GetDetail(id){//ham lay cau hoi dua vao id cau hoi
        
        $.ajax({
            url: 'detail.php',//chi duong dan toi file detail.php de lay thong tin cau hoi
            type: 'get',//phuong thuc get
            data: {
                id: id//truyen tham so co gia tri bang gia tri cua id cau hoi
            },
            success:function(data){
                // Handle the success response here
                
                var q = jQuery.parseJSON( data); //ep du lieu tra ve qua json
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
                            $('#rdOptionA').prop('checked',true);
                            break;
                        case 'B':
                            $('#rdOptionB').prop('checked',true);
                            break;
                        case 'C':
                            $('#rdOptionC').prop('checked',true);
                            break;
                        case 'D':
                            $('#rdOptionD').prop('checked',true);
                            break;
                    }      
                }
        });
    }
//ham load ds cau hoi
    function ReadData(search){
        $.ajax({
            url:'view.php',
            type:'get',
            data:{
                search:search
            },
            success:function(data){
                $('#questions').empty();
                $('#questions').append(data);
                
            }
        })
    }

   
</script>    