<?php
//Connect to Db
require ("../connect.php");
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <!--custom css-->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/style_request2.css">
    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>

    <title>Update post</title>
</head>

<body>

    <!--Form for admin to insert into sql table-->
    <div class="item_form1">
        <form method="post"
            action="EditPost_function.php?id_cmt=<?php echo $_GET['id_cmt'] ?>&post_content=<?php echo $_GET['post_content'] ?>&id=<?php echo $_GET['id']; ?>&user_id=<?php echo $_GET['user_id']; ?>">

            <div class="container item_form1">
                <h2>
                    Update for
                    <?php
                    $post_content = $_GET['post_content'];
                    echo "<p class = \"text-success d-inline\">$post_content</p>";
                    ?>
                </h2>
                <div>
                    <label for="id_cmt"><b>ID Cmt</b></label>
                    <input type="text" name="id_cmt" value="<?php echo $_GET['id_cmt'] ?>" required>
                </div>

                <div>
                    <label for="post_content"><b>Nội dung post</b></label>
                    <input type="text" name="post_content" value="<?php echo $_GET['post_content'] ?>" required>
                </div>

                <div>
                    <label for="class_id"><b>Class ID</b></label>
                    <input type="text" name="class_id" value="<?php echo $_GET['id'] ?>" required>
                </div>

                <div>
                    <label for="user_id"><b>User ID</b></label>
                    <input type="text" name="user_id" value="<?php echo $_GET['user_id'] ?>" required>
                </div>

                <!--Khi nhấn nút cancel thì đóng form đăng ký lại-->
                <div class="clearfix">
                    <button type="button" class="btn btn-danger btn-lg btn-block"" onclick="
                        goToAdminPage()">Cancel</button>
                    <button type="submit" class="btnOnClick btn btn-primary btn-lg btn-block">Update</button>

                </div>


            </div>
        </form>
        <script>
            function goToAdminPage() {
                // Prevent default form submission
                event.preventDefault();
                // You can optionally add other logic here, like showing a confirmation message
                var id = '<?php echo isset($_GET["id"]) ? $_GET["id"] : ""; ?>';
                window.location.href = "QuanLyPost.php?id=" + id;
                return false;
            }
        </script>
    </div>

</body>

</html>