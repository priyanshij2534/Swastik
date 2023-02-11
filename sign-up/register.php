<!-- PHP for Sign up page -->
<?php

    include 'config.php';

    if(isset($_POST['submit'])){

        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
        $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
        
        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

        if(mysqli_num_rows($select) > 0){
            $message[] = 'user already exist'; 
        }
        else{
            if($pass != $cpass){
                $message[] = 'confirm password not matched!';
            }
            else{
                $insert = mysqli_query($conn, "INSERT INTO `user_form`(name, email, password) VALUES('$name', '$email', '$pass')") or die('query failed');

                if($insert){
                    $message[] = 'registered successfully!';
                    header('location:login.php');
                }
                else{
                    $message[] = 'registeration failed!';
                }
            }
        }
    }
?>

<!-- HTML for Sign up page -->
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Title -->
  <title>Swastik - Sign Up</title>
  <link rel="icon" href="../Images/icons/favicon.png">

  <!--External CSS style Sheets -->
  <link rel="stylesheet" href="login.css">
</head>

<body>
    <section>
        
        <div class="contentBx">
            <div class="formBx">
                <h2>Sign Up</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <?php
                        if(isset($message)){
                            foreach($message as $message){
                                echo '<div class="message">'.$message.'</div>';
                            }
                        }
                    ?>

                    <div class="inputBx">
                        <span>Username</span>
                        <input type="text" name="name" placeholder="enter username" class="box" required>
                    </div>

                    <div class="inputBx">
                        <span>Email</span>
                        <input type="email" name="email" placeholder="enter email" class="box" required>
                    </div>

                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="password" placeholder="enter password" class="box" required>
                    </div>

                    <div class="inputBx">
                        <span>Confirm Password</span>
                        <input type="password" name="cpassword" placeholder="confirm password" class="box" required>
                    </div>

                    <div class="remember">
                        <label><input type="checkbox" name="" required> I agree to all the terms and condition</label>
                    </div>

                    <div class="inputBx">
                        <input type="submit" name="submit" value="Sign Up">
                    </div>

                    <div class="inputBx">
                        <p>Already Sign In? <a href="login.php">Sign In</a></p>
                    </div>
                </form>

            </div>
        </div>
        <div class="imgBx">
            <img src="../Images/login/background.jpg" alt="">
        </div>
    </section>

    <script src="https://kit.fontawesome.com/1a04223b0a.js" crossorigin="anonymous"></script>
</body>

</html>