<?php
require ('connect.php');

session_start();

// Assigning POST values to variables.
// Get email and password from login site now pass the user id to get fullname for post 
$email = $_POST['uname'];
$password = $_POST['psw'];

// get username to display in TrangNguoiDung.php
$get_username = "SELECT `username` from `users` where `email` = '$email';";
$get_username_result = mysqli_query($connection, $get_username) or die(mysqli_error($connection));
$get_username_fetch = mysqli_fetch_array($get_username_result);

if (!empty($email) && !empty($password)) {
    // CHECK FOR THE RECORD FROM TABLE
    $sql = "SELECT `user_id`, `email`, `password`, `role` from `users` where email='$email' and password='$password';";

    // Check if status is 1 or not then write session if login is successful
    $status_sql = "SELECT `status` from `users` where `email`='$email';";

    // query to check if username exists or not
    $result = mysqli_query($connection, $sql) or die(mysqli_error($connection));
    $row = mysqli_fetch_array($result);
    $count = mysqli_num_rows($result);

    // query to check if status is 1 or not
    $status_result = mysqli_query($connection, $status_sql) or die(mysqli_error($connection));
    $status = mysqli_fetch_array($status_result);

    if ($count == 1) {
        // If email has been verified
        if ($status[0] == 1) {
            // assign user id to a vsariable
            $user_id = $row[0];

            $_SESSION["role"] = $row[3];
            $_SESSION["email"] = $email;

            // Route to page whose role has defined
            if ($_SESSION["role"] == 1 && isset($_SESSION["email"])) {
                header("Location: ../main_page/TrangNguoiDung.php?username=$get_username_fetch[0]&&userid=$user_id");
            } else if ($_SESSION["role"] == 2 && isset($_SESSION["email"])) {
                header("Location: ../Trang_giao_vien/TrangNguoiDung.php?userid=$user_id");
            } else if ($_SESSION["role"] == 3 && isset($_SESSION["email"])) {
                header("Location: ../Trang_admin/TrangAdmin.php");
            }
        }

        // If email has not been set
        else {
            echo
                "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                    <strong>Please verify your email first
                    <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                        <span aria-hidden=\"true\">&times;</span>
                    </button>
                </div>";
            require ("Login.php");
        }
        //echo "Login Credentials verified";
    } else {
        echo "<script>
                alert('Sai tài khoản hoặc mật khẩu');
                window.location.href = 'Login.php';
              </script>";
    }
} else {
    echo "Something is not right or you have not fill all of the fields";
    die();
}
?>