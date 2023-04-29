<?php
include("includes/connection.php");

    if(isset($_POST['sign_up'])) {
        $first_name = htmlentities(mysqli_real_escape_string($con, $_POST['firstname']));
        $last_name = htmlentities(mysqli_real_escape_string($con, $_POST['lastname']));
        $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));
        $pass = htmlentities(mysqli_real_escape_string($con, $_POST['password']));
        $country = htmlentities(mysqli_real_escape_string($con, $_POST['country']));
        $gender = htmlentities(mysqli_real_escape_string($con, $_POST['gender']));
        $birthday = htmlentities(mysqli_real_escape_string($con, $_POST['dob']));
        $status = "verified";
        $posts = "no";
        $newgid = sprintf('%05d', rand(0, 99999));

        $username = strtolower($first_name . "_" . $last_name . " " . $newgid);
        $check_username_query = "select user_name from users2 where user_email='$email'";
        $run_username = mysqli_query($con, $check_username_query);

        //Catching invalid birth year

        $datetime = DateTime::createFromFormat('m-d-Y', $birthday); 
        if ($datetime && $datetime->format('m-d-Y') == $birthday) {
         $year = $datetime->format('Y');
         if ($year < 1910 && $year > 2005) {
           
            // the birthyear is invalid
           goto end2;
          }
        } 

         //Setting Password Validation variables for strong password to reduce successful brutefoce attack

         $uppercase = preg_match('@[A-Z]@', $pass);
         $lowercase = preg_match('@[a-z]@', $pass);
         $number    = preg_match('@[0-9]@', $pass);
         $specialChars = preg_match('@[^\w]@', $pass);

         //Code to catch invalid emails and terminate the rest of the process using goto

         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo("$email is an invalid email address");
            goto end;
          } 

          

          
          
          
          
         //Password validation for strong password
         if(strlen($pass) < 9 || !$uppercase || !$lowercase || !$number || !$specialChars ) {
             echo "<script>alert('Password should be minimum nine characters, have at least one Uppercase, Lowercase, Number and Special Characters')</script>";
             exit();
         }
         
         $hashed_pass =password_hash($pass, PASSWORD_DEFAULT); //hashing the above password 

        $check_email = "select * from users2 where user_email='$email'"; //Checking existing emails in the database with the email entered by the new user
        $run_email = mysqli_query($con, $check_email);

        $check = mysqli_num_rows($run_email);

        if($check == 1) {
            echo "<script>alert('Email already exists')</script>"; //Throwing message for existing emails in the database
            echo "<script>window.open('signup.php', '_self')</script>";
            exit();
        }

        $rand = rand(1, 3);

            if($rand == 1) {
                $profile_pic = "img1.png";
            }
            else if($rand == 2) {
                $profile_pic = "img2.png";
            }
            else {
                $profile_pic = "img3.png";
            }

            $insert = "insert into users2 (f_name, l_name, user_name, 
            describe_user, Relationship, user_pass, user_email, 
            user_country, user_gender, user_birthday, user_image, 
            user_cover, user_reg_date, status, posts, recovery_account)
            values ('$first_name', '$last_name', '$username',
            'Im active', '----', '$hashed_pass', '$email', '$country', 
            '$gender', '$birthday', '$profile_pic', 'default.jpg', 
            NOW(), '$status', '$posts', '')";//using $hashed_pass

           
            
            $query = mysqli_query($con, $insert);

            if($query) {
                echo "<script>alert('$first_name you are signed in successfully')</script>";
                echo "<script>window.open('signin.php', '_self')</script>";
                
            }
            else {
                echo "<script>alert('Registration failed: please try again')</script>";
                echo "<script>window.open('signup.php', '_self')</script>";
            }
            end: 
            echo "<script>alert('Registration failed: Invalid email, please try again')</script>"; //Throwing message for invalid email
            echo "<script>window.open('signup.php', '_self')</script>";

            end2:
            echo "<script>alert('Invalid birthyear: User must be alive and over 18 years of age') : </script>" . $birthday; //Throwing message for invalid birthyear
            echo "<script>window.open('signup.php', '_self')</script>";
    }

?>
