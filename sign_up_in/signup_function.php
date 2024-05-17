<?php
require ('connect.php');

// Assign variables by using POST method
$username = $_POST['username'];
$password = $_POST['psw1'];
$fullname = $_POST['fullname'];
$birth = $_POST['birthday'];
$email = $_POST['uname1'];
$phone = $_POST['PhoneNumber'];
$role = $_POST['role'];

// Check if user already exists
$user_check_query = "SELECT * FROM users WHERE `username`='$username' OR `email`='$email' LIMIT 1";
$result = mysqli_query($connection, $user_check_query);
$user = mysqli_fetch_assoc($result);

if ($user) { // if user exists
    if ($user['username'] === $username) {
        $message = "Tên người dùng đã tồn tại";
        echo "<script>
                alert('$message');
                window.location.href = 'Login.php';
              </script>";
    } else if ($user['email'] === $email) {
        $message = "Mail đã tồn tại";
        echo "<script>
                alert('$message');
                window.location.href = 'Login.php';
              </script>";
    }
} else {
    $sql = "INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `birthdate`, `email`, `phone`, `role`) 
        VALUES (NULL, '$username', '$password', '$fullname', '$birth', '$email', '$phone', '$role');";

    if ($connection->query($sql) === true) {
        echo "<script>
                alert('Người dùng đã được thêm vào hệ thống');
                window.location.href = 'Login.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
    }

    $connection->close();
}
?>