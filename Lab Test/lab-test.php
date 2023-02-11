<?php
    include_once 'configuration.php';

    if(isset($_POST['home-booking']) || isset($_POST['lab-booking'])){
        $patient_email = mysqli_real_escape_string($conn, $_POST['patient_email']);
        $patient_phone = mysqli_real_escape_string($conn, $_POST['patient_phone']);
        $patient_name = mysqli_real_escape_string($conn, $_POST['patient_name']);
        $test_name = mysqli_real_escape_string($conn, $_POST['test-name']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $details = mysqli_real_escape_string($conn, $_POST['details']);
        $gender = mysqli_real_escape_string($conn, $_POST['gender']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $time = mysqli_real_escape_string($conn, $_POST['time']);
        $city = mysqli_real_escape_string($conn, $_POST['city']);

        $select = mysqli_query($conn, "SELECT * FROM lab_tests WHERE test_name = '$test_name'") or die ("query failed!!");
        $test_row = mysqli_fetch_assoc($select);
        $test_id = $test_row['test_id'];

        session_start();
        $user_id = $_SESSION['user_id'];
        
        if(isset($_POST['home-booking'])){
            $visit_type = 'Home';
        }
        else if(isset($_POST['lab-booking'])){
            $visit_type = 'Swastik Lab';
        }

        $query = "INSERT INTO current_test_orders (user_id, test_id, patient_name, patient_email, patient_number, date, time, gender, address, city, details, visit_type) VALUES ('$user_id', '$test_id', '$patient_name', '$patient_email', '$patient_phone', '$date', '$time', '$gender', '$address', '$city', '$details', '$visit_type')" or die('query failed');
        $booking = mysqli_query($conn, $query);
        
        if($booking){
            header('location:lab-test.php');
        }
        else{
            echo "<script> alert('failed to connect'); </script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Swastik - Lab Test</title>
    <link rel="icon" href="../Images/icons/favicon.png">

    <!--external CSS style Sheets -->
    <link rel="stylesheet" href="lab-test.css">
    <link rel="stylesheet" href="../styles/styles.css">

    <!--navbar CSS style Sheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/css/uikit.min.css">

    <!--owl carousel CSS style Sheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

</head>

<body>
    <!-- header -->
    <?php
        include '../section/header.php';
    ?>

    <main>
        <!-- Banners -->
        <section class="banner">
            <img src="../Images/Lab test/banner.jpg" alt="" class="banner-img">

            <h3 class="title">
                Excellence, Dedicated, and Experienced Laboratory Technologists!
            </h3>

            <div class="banner-slide active">
                <div class="slide">
                    <div class="content">
                        <h1>Stuble Clinical & Laboratory Test!</h1>
                    </div>
                </div>
            </div>

            <div class="banner-slide">
                <div class="slide">
                    <div class="content">
                        <h1>Quality Laboratory Testing Services!</h1>
                    </div>
                </div>
            </div>


            <p class="banner-text">
                We are cuntinuously harnessing our medical experties to build best test offering while investing in technology to
                transform the delivery of health care.</p>

            <div class="button-container">
                
                <?php
                if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0'){
                    echo '<button class="online" role="button" onclick="login()">Book A Home Visit</button>
                    <button class="online" role="button" onclick="login()">Book A Lab Visit</button>';
                }
                else{
                    echo '<button class="online" role="button" onclick="togglePopup(\'popup-1\')">Book A Home Visit</button>
                    <button class="online" role="button" onclick="togglePopup(\'popup-2\')">Book A Lab Visit</button>';
                }
                ?>
            </div>

            <!-- roadmap -->
            <div class="roadmap">
                <div class="card-container">
                    <div class="card">
                        <div class="card-image">
                            <img src="../Images/Lab test/cash-on-delivery.png" alt="">
                        </div>
                        <div class="card-content">
                            <h3>Cash On Devilery</h3>
                            <p>We are accepting cash on delivery payment method for your convenience and smoother
                                process.
                            </p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-image">
                            <img src="../Images/Lab test/budget.png" alt="">
                        </div>
                        <div class="card-content">
                            <h3>Reasonable Price</h3>
                            <p>We know how important to be in the budget and here you will find all our prices are
                                less than the market price.</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-image">
                            <img src="../Images/Lab test/testing.png" alt="">
                        </div>
                        <div class="card-content">
                            <h3>Quality Test</h3>
                            <p>Yes, you dont need to worry about the quality of the test.</p>
                        </div>
                    </div>

                </div>
            </div>

        </section>

        <!-- Home Visit Form -->
        <section class="test-form">
            <div class="popup" id="popup-1">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup('popup-1')">&times;</div>
                    <div class="form-container">
                        <header>
                            Book A Home Visit
                        </header>
                        <p>
                            Please feel welcome to contact our friendly reception staff with any general or medical enquiry.
                            Our
                            doctors will receive or return any urgent calls.
                        </p>

                        <form action="#" method="post">

                            <div class="fields">
                                <div class="input-field">
                                    <label>Select Services</label>
                                    <select required name = "test-name">
                                        <option disabled selected>Select Test</option>
                                        <?php
                                            require_once 'config.php';

                                            $sql = " SELECT * FROM lab_tests ";
                                            $result = mysqli_query($conn, $sql);

                                            while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                                <option><?= $row['test_name'] ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label>Patient Name</label>
                                    <input type="text" name="patient_name" placeholder="Name" required>
                                </div>

                                <div class="input-field">
                                    <label>Patient Email</label>
                                    <input type="text" name="patient_email" placeholder="Email" required>
                                </div>

                                <div class="input-field">
                                    <label>Patient Phone Number</label>
                                    <input type="number" name="patient_phone" placeholder="Phone" required>
                                </div>

                                <div class="input-field">
                                    <label>Date</label>
                                    <input type="date" name="date" placeholder="Enter your issued date" required>
                                </div>

                                <div class="input-field">
                                    <label>Time</label>
                                    <select required name="time">
                                        <option disabled selected>Select Time</option>
                                        <option>9am - 11am</option>
                                        <option>1pm - 7pm</option>
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label>Gender</label>
                                    <select required name="gender">
                                        <option disabled selected>Select Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Other</option>
                                    </select>
                                </div>
                            </div>

                            <br>
                            <hr>

                            <p>Kindly provide your personal informations below:</p>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Street Address</label>
                                    <input type="text" name="address" placeholder="Enter Your Street Address" required>
                                </div>

                                <div class="input-field">
                                    <label>City</label>
                                    <input type="text" name="city" placeholder="Enter Your City" required>
                                </div>

                                <div class="input-field">
                                    <label>Additional Details</label>
                                    <input type="text" name="details" placeholder="Details">
                                </div>
                            </div>

                            <button type="submit" name="home-booking" class="nextBtn">
                                <span class="btnText">Book Your Visit</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Lab Visit Form -->
        <section class="test-form">
            <div class="popup" id="popup-2">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup('popup-2')">&times;</div>
                    <div class="form-container">
                        <header>
                            Book A Lab Visit
                        </header>
                        <p>
                            Please feel welcome to contact our friendly reception staff with any general or medical enquiry.
                            Our doctors will receive or return any urgent calls.
                        </p>

                        <form action="#" method="post">

                            <div class="fields">
                                <div class="input-field">
                                    <label>Select Services</label>
                                    <select required name="test-name">
                                        <option disabled selected>Select Test</option>
                                        <?php
                                            require_once 'config.php';

                                            $sql = " SELECT * FROM lab_tests ";
                                            $result = mysqli_query($conn, $sql);

                                            while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                                <option><?= $row['test_name'] ?></option>
                                                <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label>Patient Name</label>
                                    <input type="text" name="patient_name" placeholder="Name" required>
                                </div>

                                <div class="input-field">
                                    <label>Patient Email</label>
                                    <input type="text" name="patient_email" placeholder="Email" required>
                                </div>

                                <div class="input-field">
                                    <label>Patient Phone Number</label>
                                    <input type="number" name="patient_phone" placeholder="Phone" required>
                                </div>

                                <div class="input-field">
                                    <label>Date</label>
                                    <input type="date" name="date" placeholder="Enter your issued date" required>
                                </div>

                                <div class="input-field">
                                    <label>Time</label>
                                    <select required name="time">
                                        <option disabled selected>Select Time</option>
                                        <option>9am - 11am</option>
                                        <option>1pm - 7pm</option>
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label>Gender</label>
                                    <select required name="gender">
                                        <option disabled selected>Select Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Others</option>
                                    </select>
                                </div>
                            </div>

                            <br>
                            <hr>

                            <p>Kindly provide your personal informations below to send your reports after the test:</p>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Street Address</label>
                                    <input type="text" name="address" placeholder="Enter Your Street Address" required>
                                </div>

                                <div class="input-field">
                                    <label>City</label>
                                    <input type="text" name="city" placeholder="Enter Your City" required>
                                </div>

                                <div class="input-field">
                                    <label>Additional Details</label>
                                    <input type="text" name="details" placeholder="Details">
                                </div>
                            </div>

                            <button type="submit" name="lab-booking" class="nextBtn" onclick="togglePopup('popup-2')">
                                <span class="btnText">Book Your Visit</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Search Test -->
        <section class="find-test">
            <div class="imgBx">
                <div class="background"></div>
                <img src="../Images/Lab test/search.png" alt="">
            </div>

            <div class="contentBx">
                <h1 class="title">Search For A Lab Test</h1>

                <div class="search-container">
                    <form action="details.php" method="post" class="search-bar">
                        <input type="text" name="search" id="search" placeholder="Search Test" autocomplete="off">
                        <button type="submit" name="submit" id="test-details-button"><img src="../Images/icons/search.png" alt=""></button>
                    </form>
                </div>

                <div class="test-list">
                    <div class="no-scrollbar" id="show-list"></div>
                </div>

                <div class="our-services">

                    <div class="wrapper">
                        <div class="carousel owl-carousel">
                            <div class="card">
                                <div class="image-content">
                                    <span class="overlay"></span>
                                    <div class="card-image">
                                        <img src="../Images/Lab test/cbc.jpg" alt="" class="card-img">
                                    </div>
                                </div>
                                <div class="card-content">
                                    <h2 class="name">Complete Blood Count</h2>
                                    <p class="description">A complete blood count (CBC) is a blood test used to evaluate your overall health and detect a wide range of disorders, including anemia, infection and leukemia. A complete blood count test measures several components and features of your blood, including: Red blood cells, which carry oxygen.</p>
                                    <a href="https://www.mayoclinic.org/tests-procedures/complete-blood-count/about/pac-20384919#:~:text=A%20complete%20blood%20count%20(CBC,blood%20cells%2C%20which%20carry%20oxygen">
                                        <button class="button">View More</button>
                                    </a>

                                </div>
                            </div>

                            <div class="card">
                                <div class="image-content">
                                    <span class="overlay"></span>
                                    <div class="card-image">
                                        <img src="../Images/Lab test/ppbs.jpg" alt="" class="card-img">
                                    </div>
                                </div>
                                <div class="card-content">
                                    <h2 class="name">Post Prandial Blood Sugar </h2>
                                    <p class="description">The word postprandial means after a meal; therefore, PPG concentrations refer to plasma glucose concentrations after eating. Many factors determine the PPG profile. In nondiabetic individuals, fasting plasma glucose concentrations (i.e., following an overnight 8- to 10-h fast) generally range from 70 to 110 mg/dl.</p>
                                    <a href="https://joinzoe.com/learn/postprandial-blood-sugar">
                                        <button class="button">View More</button>
                                    </a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="image-content">
                                    <span class="overlay"></span>
                                    <div class="card-image">
                                        <img src="../Images/Lab test/platelet.jpg" alt="" class="card-img">
                                    </div>
                                </div>
                                <div class="card-content">
                                    <h2 class="name">Platelet Count</h2>
                                    <p class="description">A platelet count test measures the number of platelets in your blood. A lower than normal platelet count is called thrombocytopenia. This condition can cause you to bleed too much after a cut or other injury that causes bleeding. A higher than normal platelet count is called thrombocytosis. This can make your blood clot more than you need it to. Blood clots can be dangerous because they can block blood flow.</p>
                                    <a href="https://medlineplus.gov/lab-tests/platelet-tests/#:~:text=A%20platelet%20count%20test%20measures,platelet%20count%20is%20called%20thrombocytosis.">
                                        <button class="button">View More</button>
                                    </a>
                                </div>
                            </div>

                            <div class="card">
                                <div class="image-content">
                                    <span class="overlay"></span>
                                    <div class="card-image">
                                        <img src="../Images/Lab test/rtpcr.jpg" alt="" class="card-img">
                                    </div>
                                </div>
                                <div class="card-content">
                                    <h2 class="name">RT-PCR</h2>
                                    <p class="description">RT-PCR Test means real-time reverse transcription polymerase chain reaction test. RT-PCR test procedure is used for detecting nucleic acid from SARS-CoV-2 in nasopharyngeal or oropharyngeal swab specimens from people who have been diagnosed with COVID-19. This is accomplished by utilising fluorescence to monitor the amplification reaction, a technique known as quantitative PCR (qPCR).</p>
                                    <a href="https://www.iaea.org/newscenter/news/how-is-the-covid-19-virus-detected-using-real-time-rt-pcr#:~:text=RT%E2%80%93PCR%20is%20a%20variation,RT%2C%20to%20allow%20for%20amplification.">
                                        <button class="button">View More</button>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- Roadmap -->
        <section class="workflow">
            <div class="header">
                <div class="row">
                    <div class="column">
                        <h3>How To Order And Prepare For A Test!</h3>
                        <h2>Preparing For Your Test Help Ensure All Goes Smoothly</h2>
                    </div>
                    <div class="column">
                        <p>To reduce your wait time, complete the personal information on the form in advance. Although most
                            routine tests are covered under your provincial health insurance plan, some tests may not be
                            covered with knowledge is power.<br><br>
                            we connect directly with patients to deliver their results so they have valuable health
                            information when they need it most, we care about our people.
                        </p>
                    </div>
                </div>
            </div>

            <div class="main">
                <div class="content no-scrollbar">
                    <div class="card">
                        <div class="card-number">
                            01.
                        </div>
                        <div class="icon">
                            <img src="../Images/Lab test/icon-1.png" alt="">
                        </div>
                        <div class="details">
                            <h2>Find A Test</h2>
                            <h3>Find the lab test as per your requirements.</h3>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-number">
                            02.
                        </div>
                        <div class="icon">
                            <img src="../Images/Lab test/icon-2.png" alt="">
                        </div>
                        <div class="details">
                            <h2>Make An Appointment</h2>
                            <h3>You can book an appointment online or contact us to send you one of our lab experts.</h3>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-number">
                            03.
                        </div>
                        <div class="icon">
                            <img src="../Images/Lab test/icon-3.png" alt="">
                        </div>
                        <div class="details">
                            <h2>Collect A Sample</h2>
                            <h3>Samples can be collected in our office, a lab, or the patient can collect the sample at
                                home.</h3>
                        </div>
                    </div>
                    
                    <div class="card">
                        <div class="card-number">
                            04.
                        </div>
                        <div class="icon">
                            <img src="../Images/Lab test/icon-4.png" alt="">
                        </div>
                        <div class="details">
                            <h2>Get Your Results</h2>
                            <h3>Results are available for most tests within 7 days of samples reaching the lab.</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer">
                <p>Our focus is on providing patients the best possible care.</p>
            </div>
        </section>

        <!-- Reviews -->
        <section class="reviews">
            <div class="row">

                <div class="column-1">
                    <h1>Why People Love Us!</h1>
                    <div class="row">
                        <div class="column-11">
                            <h1> “</h1>
                        </div>

                        <div class="column-12">
                            <div class="content">
                                <div class="review-container">
                                    <p class="review-text">
                                        Their Doctors Include Qualified Practitioners Who Come From A Range Of Backgrounds
                                        And Bring With Them A Diversity Of Skills And Special Intrests. They Alse Have
                                        Nurses On Staff Who Are Available To Triage Any Urgent Matters.
                                    </p>

                                    <p class="review-text">
                                        They Hve Cultivated A Loyal Following Of Functional And Integrative Medicine
                                        Professionals, Unified By A Desire To Prevent Disease And Attain Health. They Alued
                                        Partners In Provoding Only High Quality Testing to Help Us Achieve Clinical Results
                                        Faster.
                                    </p>
                                </div>

                                <div class="sliders" onclick="side_slide(-1)">
                                    <i class="fa-solid fa-arrow-left fa-2xl"></i>
                                </div>

                                <div class="sliders" onclick="side_slide(1)">
                                    <i class="fa-solid fa-arrow-right fa-2xl"></i>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>

                <div class="column-2">
                    <div class="background"></div>
                    <img src="../Images/Lab test/review.jpg" alt="">
                </div>

            </div>
        </section>

    </main>

    <!-- footer -->
    <?php
        include '../section/footer.php';
    ?>

</body>

<!-- navbar JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit-icons.min.js" charset="utf-8"></script>

<!-- fontawesome -->
<script src="https://kit.fontawesome.com/1a04223b0a.js" crossorigin="anonymous"></script>

<!-- owl carousel javascript -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- external javascript -->
<script src="lab-test.js" charset="utf-8"></script>

</html>