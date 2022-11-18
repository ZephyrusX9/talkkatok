<?php 
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($email) && !empty($password)){
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
        $recaptchaResponse = $_POST['g-recaptcha-response'];
        $request = "https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$recaptchaResponse}";
        $content = file_get_contents($request);
        $json = json_decode($content);
            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
                $user_pass = md5($password);
                $enc_pass = $row['password'];
                if($user_pass === $enc_pass){
                    $status = "Active now";
                    $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                    if($sql2){
                        $_SESSION['unique_id'] = $row['unique_id'];
                        if ($json->success == "true"){
                            echo "success";
                        }else{

                            echo 'You have failed to pass the reCAPTCHA';
                        }
                    }else{
                        echo "Something went wrong. Please try again!";
                    }
                }else{
                    echo "Password is Incorrect!";
                }
            }else{
                echo "$email - This email not Exist!";
            }

    }else{
        echo "All input fields are required!";
    }
?>