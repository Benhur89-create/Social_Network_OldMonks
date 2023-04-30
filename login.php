<?php

session_start();
error_reporting(0);

include("includes/connection.php");

    if(isset($_POST['login'])) {
        $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
        $pass = htmlentities(mysqli_real_escape_string($con, $_POST['password']));
        
        


         //Retrieving Password from DB to verify with hash
         $select_pass = "select user_pass FROM users2 WHERE user_email = '$email'";
         $result = mysqli_query($con, $select_pass);
         $row = mysqli_fetch_assoc($result);
         $hashed_password = $row['user_pass'];


         if(password_verify($pass, $hashed_password)){
            echo "<script>alert('Password Correct')</script>"; //alert to confirm hash verified
               
    }

    //Input validation used in Login page to prevent SQL injection by making sure the input is in an email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //echo("$email is an invalid email address");
        echo "<script>alert('Email is not in the correct format. Please enter a valid email Id registered with us.')</script>";
        goto end;
      } 

    //Blocked users by admin privileges
    $select_block_users = "select * from users2 where user_email='$email' and user_pass='$hashed_password' and block = 1";
    $block_query = mysqli_query($con, $select_block_users);
    $check_block_user = mysqli_num_rows($block_query);
    
    //Checking hashed and unhashed passwords
    $select_users = "select * from users2 where user_email='$email' and user_pass='$hashed_password' and status='verified'";
    $query = mysqli_query($con, $select_users);
    $check_user = mysqli_num_rows($query);
    

    if($check_block_user == 1) {
       echo "<script>alert('You have been blocked by admin')</script>";  //Script to throw message for blocked users
    }
   
    elseif( $check_user == 1) {
        $_SESSION['user_email'] = $email;
        echo "<script>window.open('home.php', '_self')</script>";
    }
        else {
            echo "<script>alert('Your Email or Password is incorrect')</script>"; //Script to throw error message
        }


    }end: 
     

?>
