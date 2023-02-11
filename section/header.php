<?php
    require_once 'config.php';

    session_start();

    if(isset($_GET['logout'])){
        unset($user_id);
        session_destroy();
        header('location:../home/home.php');
    }

    echo'
    <header class="page-header uk-box-shadow-medium uk-background-default" uk-sticky>

            <div class="uk-container uk-container-expand uk-height-1-1">

                <nav class="uk-height-1-1" uk-navbar="dropbar: true">

                    <a href="../home/home.php" class="uk-flex uk-flex-middle">
                        <img width="178" height="38" src="../Images/icons/Swastik-logo.png" alt="Swastik">
                    </a>

                    <ul class="uk-navbar-nav uk-navbar-center uk-visible@l">
                        <li>
                            <a href="../home/home.php">Home</a>
                        </li>';

                        if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0'){}
                        else{
                            $user_id = $_SESSION['user_id'];

                            $select = mysqli_query($conn, "SELECT * FROM admin WHERE id = '$user_id'") or die('query failed');

                            if (mysqli_num_rows($select) > 0) {
                                echo '
                                <li>
                                    <a href="../admin/admin.php">Admin</a>
                                </li>';
                            }
                        }
                        
                        echo'
                        <li>
                            <a href="../medicines/medicines.php">Medicines</a>
                        </li>
                        
                        <li>
                            <a href="../Lab Test/lab-test.php">Lab Test</a>
                        </li>
                        
                        <li>
                            <a href="../healthcare/healthcare.php">Health Care</a>
                        </li>

                        <li>
                            <a href="../Blogs/blogs.php">Blog</a>
                        </li>

                        <li>
                            <a href="../Gym/gym.php">Gym</a>
                        </li>

                        <li>
                            <a href="../surgery/surgery.php">Surgery</a>
                        </li>

                    </ul>

                    <div class="uk-navbar-right">';

                        if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0'){
                            echo '<a href="../sign-up/login.php" class="uk-icon-link" id="cart-icon" uk-icon="bag" aria-label="Open Cart"></a>';
                        }
                        else{
                            echo'<a href="../orders/orders.php" class="uk-icon-link" id="cart-icon" uk-icon="bag" aria-label="Open Cart"></a>';
                        }

                        echo'
                        <a href="../searching/search.php" class="uk-icon-link" id="cart-icon" uk-icon="search" aria-label="Open Cart"></a>';

                        if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0'){
                            echo '<a href="../sign-up/login.php" class="uk-icon-link" id="user-icon" uk-icon="user" aria-label="Login">Hi, login</a>';
                        }
                        else{
                            echo'<a href="../home/home.php?logout=<?php echo $user_id; ?>" class="uk-icon-link" id="logout-icon" uk-icon="sign-out" aria-label="Logout">Sign-Out</a>';
                        }

                        echo'
                        <button class="uk-margin-left uk-hidden@l" uk-toggle="target: #offcanvas" uk-icon="icon: menu"
                            type="button" aria-label="Toggle Mobile Menu"></button>
                    </div>
                </nav>
            </div>

            <div class="offcanvas uk-hidden@l" id="offcanvas" uk-offcanvas="flip: true; overlay: true; mode: reveal">
                <div class="uk-offcanvas-bar">
                    <button class="uk-offcanvas-close" type="button" uk-close aria-label="Close Mobile Menu"></button>

                    <ul class="top-menu uk-nav uk-margin-top">
                        <li>
                            <a href="../home/home.php">
                                Home
                            </a>
                        </li>';

                        if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0'){}
                        else{
                            $user_id = $_SESSION['user_id'];

                            $select = mysqli_query($conn, "SELECT * FROM admin WHERE id = '$user_id'") or die('query failed');

                            if (mysqli_num_rows($select) > 0) {
                                echo '
                                <li>
                                    <a href="../admin/admin.php">
                                        Admin
                                        </a>
                                </li>';
                            }
                        }

                        echo'
                        <li>
                            <a href="../medicines/medicines.php">
                                Medicines
                            </a>
                        </li>

                        <li>
                            <a href="../Lab Test/lab-test.php">
                                Lab Test
                            </a>
                        </li>

                        <li>
                            <a href="../healthcare/healthcare.php">
                                Health Care
                            </a>
                        </li>

                        <li>
                            <a href="../Blogs/blogs.php">
                                Blog
                            </a>
                        </li>

                        <li>
                            <a href="../Gym/gym.php">
                                Gym
                            </a>
                        </li>

                        <li>
                            <a href="../surgery/surgery.php"> 
                                Surgery
                            </a>
                        </li>

                    </ul>
                </div>
            </div>

        </header>
    ';
