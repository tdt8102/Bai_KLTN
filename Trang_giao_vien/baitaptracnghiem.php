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


    



    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Câu hỏi</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>

    <div class="row">
        <div class="col-md-12 text-right">
            <button id="btnQuestion" class="btn btn-success">+</button>
        </div>
    </div>
    <?php
        include("connect.php");

        $sql = $connection->prepare("SELECT * FROM question");
        $sql->execute();
        $index=1;
        $result = $sql->get_result(); // Get result set from prepared statement
        while ($row = $result->fetch_assoc()){ // Fetch associative array
            echo '<tr>';

            echo '<th scope="row">'.($index++).'</th>';
            echo '<td>'.$row['question'].'</td>'; // Use $row instead of $result
            echo    '<td>';
            echo    '<button type="" class="btn btn-info">Xem</button>&nbsp';
            echo    '<button type="" class="btn btn-warning">Sửa</button>&nbsp';
            echo    '<button type="" class="btn btn-danger">Xóa</button>&nbsp';
            echo '</td>';
            echo '</tr>';
        }
    ?>

  </tbody>
</table>
    </div>    
</body>
</html>
<script type="text/javascript">
    $('#btnQuestion').click(function(){
        alert(1);
    });
</script>    