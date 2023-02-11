<!-- PHP for login -->
<?php

    include 'config.php';
    session_start();

    if(isset($_POST['submit'])){

        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $dec_pass = $_POST['password'];
        $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

        $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

        if(mysqli_num_rows($select) > 0){
            $row = mysqli_fetch_assoc($select);
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['name'];

            if(isset($_POST['remember'])){
                setcookie('emailcookie', $email, time()+60*60*24);
                setcookie('passwordcookie', $dec_pass, time()+60*60*24);
            }

            header('location:../home/home.php');
        }
        else{
            $message[] = 'incorrect email or password!';
        }

    }
?>


<!-- HTML for login -->
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Title -->
  <title>Swastik - Sign In</title>
  <link rel="icon" href="../Images/icons/favicon.png">

  <!--External CSS style Sheets -->
  <link rel="stylesheet" href="login.css">
</head>

<body>
    <section>
        <div class="imgBx">
            <img src="../Images/login/background.jpg" alt="">
        </div>
        <div class="contentBx">
            <div class="formBx">
                <h2>Sign In</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <?php
                        if(isset($message)){
                            foreach($message as $message){
                                echo '<div class="message">'.$message.'</div>';
                            }
                        }
                    ?>
                    <div class="inputBx">
                        <span>Email</span>
                        <input type="email" name="email" placeholder="enter email" class="box" required value="<?php if (isset($_COOKIE['emailcookie'])) { echo $_COOKIE['emailcookie']; } ?> ">
                    </div>

                    <div class="inputBx">
                        <span>Password</span>
                        <input type="password" name="password" placeholder="enter password" class="box" required value="<?php if(isset($_COOKIE['passwordcookie'])) {echo $_COOKIE['passwordcookie'] ; }?>">
                    </div>

                    <div class="remember">
                        <label><input type="checkbox" name="remember"> Remember Me</label>
                    </div>

                    <div class="inputBx">
                        <input type="submit" name="submit" value="Sign In">
                    </div>

                    <div class="inputBx links">
                        <p>Don't have an account? <a href="register.php">Sign Up</a></p>
                    </div>
                </form>

            </div>
        </div>
    </section>
</body>

<!-- Fontawesome JavaScript -->
<script src="https://kit.fontawesome.com/1a04223b0a.js" crossorigin="anonymous"></script>

</html>