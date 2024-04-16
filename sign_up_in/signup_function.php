<?php
    require('connect.php');

    //assgin variables by using POST method
    $username = $_POST['username'];
    $password = $_POST['psw1'];
    $fullname = $_POST['fullname'];
    $birth = $_POST['birthday'];
    $email = $_POST['uname1'];
    $phone = $_POST['PhoneNumber'];
    $role = $_POST['role'];

    // Message to inform what error should be
    $message = "";

    // check if user is here or not so we can add new user with no overlapping situation
    $user_check_query = "SELECT * FROM users WHERE `username`='$username' OR `email`='$email' LIMIT 1";
    $result = mysqli_query($connection, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
        if ($user['username'] === $username) {
            $message = "Tên người dùng đã tồn tại!" ;
            echo "<p>$message</p>";
            echo "<button onclick=\"Trở lại()\">Go Back</button>";
            
            // JavaScript function to go back
            echo "<script>
                    function goBack() {
                        window.history.back();
                    }
                  </script>";
        }

        else if ($user['email'] === $email) {
            $message = "Email đã tồn tại!";
            echo "<p>$message</p>";
            echo "<button onclick=\"goBack()\">Trở lại</button>";
            
            // JavaScript function to go back
            echo "<script>
                    function goBack() {
                        window.history.back();
                    }
                  </script>";
        }
    }

    else{
        $sql = "INSERT INTO `users` (`user_id`, `username`, `password`, `fullname`, `birthdate`, `email`, `phone`, `role`) 
        VALUES (NULL, '$username', '$password', '$fullname', '$birth', '$email', '$phone', '$role');";
                
        if($connection->query($sql) === true){

            //Send mail to verify the account
            $to       = $email;
            $subject  = "Mail verification for $username";
            $message  = "
            <html>
            <body>
                <div>
                    <h1>
                        Hunre classroom with love
                    </h1>
                </div>
                <div>
                    <p>Please click the link below to reset your password</p>
                </div>
                <div>
                    <a href = \"http://localhost:88/Google-classroom-clone-1/sign_up_in/verify.php?username=$username\">Click here to verify that you are $username</a>
                </div>
            </body>
            </html>
            ";
            $headers  = 'From: tadt515@gmail.com' . "\r\n" .
                        'MIME-Version: 1.0' . "\r\n" .
                        'Content-type: text/html; charset=utf-8';

            // Successful registration message
            echo "<p>Đăng ký thành công! hãy click vào nút trở lại để trở về giao diện đăng nhập</p>";
            echo "<button onclick=\"goBack()\">Trở lại</button>";
            
            // JavaScript function to go back
            echo "<script>
                    function goBack() {
                        window.history.back();
                    }
                  </script>";
        }
        else{
            echo "Error: " . $sql . "<br>" . $connection->error;
            $connection->close();
        }
    }

?>
