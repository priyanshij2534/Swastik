<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Swastik - About Us</title>
    <link rel="icon" href="../Images/icons/favicon.png">

    <!-- External CSS stylesheet -->
    <link rel="stylesheet" href="page.css">
    <link rel="stylesheet" href="../styles/styles.css">

    <!--NavBar CSS style Sheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/css/uikit.min.css">
</head>

<body>
    <!-- header -->
    <?php
    include '../section/header.php';
    ?>

    <main>
        <section class="header">
            <div class="carousel-container">
                <input type="radio" name="position" />
                <input type="radio" name="position" />
                <input type="radio" name="position" checked />
                <input type="radio" name="position" />
                <input type="radio" name="position" />
                <div id="carousel">
                    <div class="item">
                        <img src="../Images/pages/gym.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="../Images/pages/test.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="../Images/pages/doctor.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="../Images/pages/product.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="../Images/pages/order.jpg" alt="">
                    </div>
                </div>
            </div>

            <hr>
            <div class="content-container">
                <img class="logo" src="../Images/icons/Swastik-logo.png" alt="">
                
                <div class="content">
                    <p>Swastik is a consumer healthcare “super app” that provides consumers with on-demand, 
                        home delivered access to a wide range of prescription, OTC pharmaceutical, other 
                        consumer healthcare products, comprehensive diagnostic test services, diet recommendations, 
                        health related blogs, and teleconsultations thereby serving their healthcare needs.</p>
                </div>
            </div>
            <hr>
            <div class="content-container">
                <img class="right" src="../Images/pages/doctor.jpg" alt="">
                
                <div class="content">
                    <p>Swastik SurgiCare strives to serve its patients for daycare surgeries, using the latest technology. 
                        We ensure a smooth experience before, during, and after treatment.</p>
                </div>
            </div>
            <hr>
            <div class="content-container">
                <img class="left" src="../Images/pages/medicines.jpg" alt="">
                
                <div class="content">
                    <p>Tired of walking all the way to your local medicine store? Order medicines online at Swastik. 
                        With more than 1 lakh medicines always in stock, you are sure to find what you are looking for, 
                        and that too at affordable prices!</p>
                </div>
            </div>
            <hr>
            <div class="content-container">
                <img class="right" src="../Images/pages/surgery.jpg" alt="">
                
                <div class="content">
                    <p>Swastik surgeries strives to serve its patients for daycare surgeries, using the latest technology. 
                        We ensure a smooth experience before, during, and after treatment.</p>
                </div>
            </div>
            <hr>
            <div class="content-container">
                <img class="left" src="../Images/pages/gym.jpg" alt="">
                
                <div class="content">
                    <p>Free Body Mass Index calculator gives out the BMI value and categorizes BMI based on provided 
                        information from WHO and CDC for both adults and children. And a healthy diet includes the following: 
                        Fruit, vegetables, legumes (e.g. lentils and beans), nuts and whole grains (e.g. unprocessed maize, 
                        millet, oats, wheat and brown rice). At least 400 g (i.e. five portions) of fruit and vegetables 
                        per day (2), excluding potatoes, sweet potatoes, cassava and other starchy roots.</p>
                </div>
            </div>
            <hr>
            <div class="content-container">
                <img class="right" src="../Images/pages/product.jpg" alt="">
                
                <div class="content">
                    <p>Stay safe at home and shop at your convenience from Swastik. All you have to do is place your order 
                        and we will try to deliver it at the earliest.</p>
                </div>
            </div>
            <hr>
            <div class="content-container">
                <img class="left" src="../Images/pages/test.jpg" alt="">
                
                <div class="content">
                    <p>One of the most popular services Swastik offers is diagnostic testing. People need to 
                        book pathological tests for many reasons. But before booking, they wonder if the diagnostic 
                        centre can be trusted to produce accurate results and how long they might have to wait in a 
                        queue to get tested.</p>
                </div>
            </div>
            <hr>
            <div class="content-container">
                <img class="right" src="../Images/pages/blogs.jpg" alt="">
                
                <div class="content">
                    <p>Blogs topics cover ways to live a healthier lifestyle, foods to add to your diet, and more 
                        specific information on common health conditions.</p>
                </div>
            </div>
        </section>
    </main>

    <!-- footer -->
    <footer class="home-footer">
        <div class="home-footer-addr">
            <h1 class="home-footer-logo">Swastik</h1>

            <h2>Contact</h2>

            <address>
                VIT Bhopal<br>

                <a class="home-footer-btn" href="mailto:help.swastik.web@gmail.com">Email Us</a>
            </address>
        </div>

        <ul class="home-footer-nav">
            <li class="nav-item nav-item-extra">
                <h2 class="nav-title">Our services</h2>

                <ul class="nav-ul  nav-ul-extra">
                    <li>
                        <a href="../medicines/medicines.php">Order Medicine</a>
                    </li>

                    <li>
                        <a href="../healthcare/healthcare.php">Daily-Products</a>
                    </li>

                    <li>
                        <a href="../Lab Test/lab-test.php">Lab Tests</a>
                    </li>

                    <li>
                        <a href="../surgery/surgery.php">Surgeries</a>
                    </li>

                    <li>
                        <a href="#">Gym</a>
                    </li>

                    <li>
                        <a href="../Blogs/blogs.php">Blogs</a>
                    </li>
                </ul>
            </li>

            <li class="nav-item">
                <h2 class="nav-title">About our website</h2>

                <ul class="nav-ul">
                    <li>
                        <a href="#"></a>
                    </li>

                    <li>
                        <a href="../pages/about-us.php">About us</a>
                    </li>

                    <li>
                        <a href="../pages/about-developers.php">Developer</a>
                    </li>

                    <li>
                        <a href="#">Partner with Swastik</a>
                    </li>

            </li>
        </ul>
        </li>

        <li class="nav-item">
            <h2 class="nav-title">Legal</h2>

            <ul class="nav-ul">
                <li>
                    <a href="#">Privacy Policy</a>
                </li>

                <li>
                    <a href="#">Terms of Use</a>
                </li>
            </ul>
        </li>
        </ul>

        <div class="links">
            <a href="https://www.facebook.com/"><i class="fa-brands fa-facebook fa-xl media-links;"></i></a>
            <a href="https://www.twitter.com/"><i class="fa-brands fa-twitter fa-xl media-links"></i></a>
            <a href="https://www.instagram.com/"><i class="fa-brands fa-instagram fa-xl media-links"></i></a>
            <a href="https://www.linkedin.com/"><i class="fa-brands fa-linkedin-in fa-xl media-links"></i></i></a>

            <div class="legal-links">
                <span>&copy; 2022 Swastik. All rights reserved.</span>
            </div>
        </div>
    </footer>
</body>

<!--NavBar JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit-icons.min.js" charset="utf-8"></script>

<!-- fontawesome -->
<script src="https://kit.fontawesome.com/1a04223b0a.js" crossorigin="anonymous"></script>

</html>