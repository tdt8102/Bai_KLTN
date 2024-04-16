<?php
require "connect.php";

// Assign userid
$user_id = $_GET['userid'];

// Get fullname from users table according to users table so we can assign it to class_lecturer
$get_fullname = "SELECT `fullname` from `users` where `user_id`=$user_id;";
$get_fullname_result = mysqli_query($connection, $get_fullname) or die(mysqli_error($connection));
$row = mysqli_fetch_array($get_fullname_result);

$class_name = $_POST["class_name"];
$class_title = $_POST["class_title"];
// Get fullname from users db to assign it to lecturer not post no more 
$class_lecturer = $row[0];

$message = "";

// Check if lecturer column exists in classes table
$check_column_query = "SELECT * FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME = 'classes' AND COLUMN_NAME = 'lecturer'";
$check_column_result = mysqli_query($connection, $check_column_query);

// Check number of rows returned
if (mysqli_num_rows($check_column_result) == 0) {
    // If lecturer column does not exist, add it to the table
    $alter_query = "ALTER TABLE `classes` ADD COLUMN `lecturer` VARCHAR(255)";
    if(mysqli_query($connection, $alter_query)) {
        // Proceed with inserting data into the classes table
        $sql = "INSERT INTO `classes` (`id`, `class_name`, `class_title`, `lecturer`) 
        VALUES (NULL, '$class_name','$class_title', '$class_lecturer');";
                
        if($connection->query($sql) === true){
            /**
             * First, get that created class_id then assign it to class_id in class_list to record which class belongs to which user
             */
            // Get the created class_id with the given class_name
            $get_classid = "SELECT `id` FROM `classes` WHERE `class_name` = '$class_name'";
            $result = mysqli_query($connection, $get_classid) or die(mysqli_error($connection));
            $row = mysqli_fetch_array($result);
            $created_classid = $row[0];

            // Connect class and user in class_list table 
            $sql1 = "INSERT into `class_list`(`class_id`,`user_id`) VALUES($created_classid, $user_id)";
            if($connection->query($sql1) === true){
                require("TrangNguoiDung.php");
            }
            
        } else {
            echo "Error: " . $sql . "<br>" . $connection->error;
            $connection->close();
        }
    } else {
        echo "Error creating lecturer column: " . mysqli_error($connection);
    }
} else {
    // If lecturer column already exists, proceed with inserting data into the classes table
    $sql = "INSERT INTO `classes` (`id`, `class_name`, `class_title`, `lecturer`) 
    VALUES (NULL, '$class_name','$class_title', '$class_lecturer');";
            
    if($connection->query($sql) === true){
        /**
         * First, get that created class_id then assign it to class_id in class_list to record which class belongs to which user
         */
        // Get the created class_id with the given class_name
        $get_classid = "SELECT `id` FROM `classes` WHERE `class_name` = '$class_name'";
        $result = mysqli_query($connection, $get_classid) or die(mysqli_error($connection));
        $row = mysqli_fetch_array($result);
        $created_classid = $row[0];

        // Connect class and user in class_list table 
        $sql1 = "INSERT into `class_list`(`class_id`,`user_id`) VALUES($created_classid, $user_id)";
        if($connection->query($sql1) === true){
            require("TrangNguoiDung.php");
        }
        
    } else {
        echo "Error: " . $sql . "<br>" . $connection->error;
        $connection->close();
    }
}
?>
