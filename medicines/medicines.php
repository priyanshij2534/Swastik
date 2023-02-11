<?php
    include_once 'configuration.php';

    if(isset($_POST['booking'])){
        $appointment_description = $_POST['appointment_description'];
        $patient_name = $_POST['patient_name'];
        $phone_number = $_POST['phone_number'];
        $doctor_name = $_POST['doctor_name'];
        $email = $_POST['email'];
        $date = $_POST['date'];

        session_start();
        $user_id = $_SESSION['user_id'];
        
        $query = "INSERT INTO current_appointment (user_id, doctor_name, patient_name, email, phone_number, appointment_date, appointment_description) VALUES ('$user_id', '$doctor_name', '$patient_name','$email', '$phone_number', '$date', '$appointment_description')" or die('query failed');
        $appointment = mysqli_query($conn, $query);
        
        if($appointment){
            header('location:medicines.php');
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
    <title>Swastik - Medicines</title>
    <link rel="icon" href="../Images/icons/favicon.png">

    <!--owl carousel CSS style Sheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!-- CSS style Sheets -->
    <link rel="stylesheet" href="medicines.css">
    <link rel="stylesheet" href="../styles/styles.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/css/uikit.min.css">
</head>

<body>
    <!-- header -->
    <?php
        include '../section/header.php';
    ?>

    <main>
        <!-- banner -->
        <section class="banner">
            <img src="../Images/medicines/banner.jpg" alt="" class="banner-img">

            <h1 class="title">
                Looking for
            </h1>

            <div class="banner-slide active">
                <div class="slide">
                    <div class="content">
                        <h3>Medical Prescription?</h3>
                    </div>
                </div>
            </div>

            <div class="banner-slide">
                <div class="slide">
                    <div class="content">
                        <h3>Personalised attention?</h3>
                    </div>
                </div>
            </div>

            <div class="banner-slide">
                <div class="slide">
                    <div class="content">
                        <h3>Medical services that you can trust</h3>
                    </div>
                </div>
            </div>

            <p class="banner-text">We provide the best of Medicines and care you deserve</p>

            <?php
            if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0'){
                echo '<button class="online" role="button" onclick="login()">Make An Appointment</button>';
            }
            else{
                echo '<button class="online" role="button" onclick="togglePopup(\'popup-1\')">Make An Appointment</button>';
            }
            ?>
            
            <!-- roadmap -->
            <div class="roadmap">
                <div class="card-container">
                    <div class="card">
                        <div class="card-image">
                            <img src="../Images/medicines/cash-on-delivery.png" alt="">
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
                            <img src="../Images/medicines/budget.png" alt="">
                        </div>
                        <div class="card-content">
                            <h3>Reasonable Price</h3>
                            <p>We know how important to be in the budget and here you will find all our prices are
                                less than the market price.</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-image">
                            <img src="../Images/medicines/quality.png" alt="">
                        </div>
                        <div class="card-content">
                            <h3>Quality Medicines</h3>
                            <p>Yes, you dont need to worry about the quality and expiry date of the medicines.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        
        <!-- Appointment Form -->
        <section class="appointment-form">
            <div class="popup" id="popup-1">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup('popup-1')">&times;</div>
                    <div class="form-container">
                        <header>
                            Book An Appointment
                        </header>
                        <p>
                            Please feel welcome to contact our friendly reception staff with any general or medical
                            enquiry.
                            Our doctors will receive or return any urgent calls.
                        </p>

                        <form action="#" method="post">

                            <div class="fields">
                                <div class="input-field">
                                    <label>Doctor</label>
                                    <select required name="doctor_name">
                                        <option disabled selected>Select Doctor</option>
                                        <?php
                                            require_once 'configuration.php';

                                            $sql = " SELECT * FROM doctors ";
                                            $result = mysqli_query($conn, $sql);

                                            while($row = mysqli_fetch_assoc($result)){
                                                ?>
                                                <option><?= $row['doctor_name'] ?></option>
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
                                    <input type="text" name="email" placeholder="Email" required>
                                </div>

                                <div class="input-field">
                                    <label>Patient Phone Number</label>
                                    <input type="number" name="phone_number" placeholder="Phone" required>
                                </div>

                                <div class="input-field">
                                    <label>Date</label>
                                    <input type="date" name="date" placeholder="Enter your issued date" required>
                                </div>
                            </div>

                            <br>
                            <hr>

                            <p>Kindly provide your health description:</p>

                            <div class="fields">
                                <div class="input-field">
                                    <label>Description Of Disease</label>
                                    <textarea type="text" name = "appointment_description" placeholder="About your health issue...." class="description"></textarea>
                                </div>
                            </div>

                            <button type="submit" name="booking" class="btn">
                                <span class="btnText">Book Your Visit</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Search medicine -->
        <section class="find-meds">
            <div class="imgBx">
                <div class="background"></div>
                <img src="../Images/medicines/pharmacy.jpg" alt="">
            </div>

            <div class="contentBx">
                <h1 class="title">Search For A Medicine</h1>

                <div class="search-container">
                    <form action="details.php" method="post" class="search-bar">
                        <input type="text" name="search" id="search" placeholder="Search Meds" autocomplete="off">
                        <button type="submit" name="submit" id="meds-details-button"><img
                                src="../Images/icons/search.png" alt=""></button>
                    </form>
                </div>

                <div class="meds-list">
                    <div class="no-scrollbar" id="show-list"></div>
                </div>

                <div class="workflow">
                    <h2 class="workflow-title">Here Is How It Works</span></h2>

                    <div class="card-container no-scrollbar">
                        <button class="card">
                            <div class="content">
                                <ul>
                                    <li class="card-title">Find Medicines</li>
                                    <li class="details">Find the medicines as per your Prescription</li>
                                </ul>
                            </div>
                        </button>

                        <button class="card">
                            <div class="content">
                                <ul>
                                    <li class="card-title">Place Your Order</li>
                                    <li class="details">Order the medicines and upload your doctor Prescription</li>
                                </ul>
                            </div>
                        </button>

                        <button class="card">
                            <div class="content">
                                <ul>
                                    <li class="card-title">Verification</li>
                                    <li class="details">Ordered Medicines and the Prescription will be verified by
                                        Swastik Doctors</li>
                                </ul>
                            </div>
                        </button>

                        <button class="card">
                            <div class="content">
                                <ul>
                                    <li class="card-title">Delivery</li>
                                    <li class="details">After Verification medicines will Be Delivered at your Home
                                    </li>
                                </ul>
                            </div>
                        </button>
                    </div>

                </div>

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
                                        Appreciate your help during covid times when i was ordering some medicines for
                                        my 89 yr old mother BP and cough syrup which other similar e tailers had
                                        mentioned that it will take nearly a week to deliver but i got it from you super
                                        fast and i was frankly very happy for the same especially stock had exhausted
                                        for my mother and was anxious to get it
                                    </p>

                                    <p class="review-text">
                                        Your customer support staff are really verry good. And the hear us, help us with
                                        verry much polite manner, which is very impressive
                                    </p>

                                    <p class="review-text">
                                        As an NRI for me personally netmeds offers a great relief in getting medicines
                                        for my family from finger tip without any hazzles all the time with very limited
                                        lead time on all orders. very happy to be a customer and surely recommend it to
                                        all those require medicines in reasonable cost and routine basis.
                                    </p>
                                </div>

                                <div class="sliders" onclick="side_slide(-1)">
                                    <i class="fa-solid fa-arrow-left"></i> 
                                </div>

                                <div class="sliders" onclick="side_slide(1)">
                                    <i class="fa-solid fa-arrow-right"></i>
                                </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="column-2">
                        <div class="background"></div>
                        <img src="../Images/medicines/review.jpg" alt="">
                    </div>

                </div>
        </section>

        <!-- Blogs -->
        <section class="Blogs">
            <h2 class="medicine-heading">Blogs</h2>
            <div class="medicine-cards">
                <div class="medicine-card">
                    <a class="medicine-links"
                        href="https://www.kevinmd.com/2023/01/it-can-happen-to-you-too-women-in-medicine-also-experience-domestic-abuse.html">
                        <img src="../Images/medicines/medicine-blog-3.jpg" alt="">
                        <p>It can happen to you too: Women in medicine also experience domestic abuse </p>
                    </a>
                </div>

                <div class="medicine-card">
                    <a class="medicine-links"
                        href="https://www.kevinmd.com/2022/12/why-have-we-let-our-diseased-health-care-system-go-untreated.html">
                        <img src="../Images/medicines/medicine-blog-1.jpg" alt="">
                        <p>Why have we let our diseased health care system go untreated?</p>
                    </a>
                </div>

                <div class="medicine-card">
                    <a class="medicine-links"
                        href="https://www.kevinmd.com/2023/01/you-can-take-your-teeth-to-the-grave.html">
                        <img src="../Images/medicines/medicine-blog-2.jpg" alt="">
                        <p>You can take your teeth to the grave</p>
                    </a>
                </div>

                <div class="medicine-card">
                    <a class="medicine-links"
                        href="https://www.kevinmd.com/2022/12/doctors-trained-abroad-will-save-rural-health-care.html">
                        <img src="../Images/medicines/medicine-blog-4.jpg" alt="">
                        <p>Doctors trained abroad will save rural health care</p>
                    </a>
                </div>

                <div class="medicine-card">
                    <a class="medicine-links" 
                        href="https://www.kevinmd.com/2022/12/is-it-really-a-woke-nightmare-for-medical-schools.html">
                        <img src="../Images/medicines/medicine-blog-5.jpg" alt="">
                        <p>Is it really a woke nightmare for medical schools?</p>
                    </a>
                </div>

                <div class="medicine-card">
                    <a class="medicine-links"
                        href="https://www.kevinmd.com/2023/01/understanding-patients-religious-and-spiritual-beliefs-promotes-healing.html">
                        <img src="../Images/medicines/medicine-blog-6.jpg" alt="">
                        <p>Understanding patients’ religious and spiritual beliefs promotes healing</p>
                    </a>
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

<!-- owl carousel javascript -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- fontawesome -->
<script src="https://kit.fontawesome.com/1a04223b0a.js" crossorigin="anonymous"></script>

<!-- external JavaScript -->
<script src="medicines.js" charset="utf-8"></script>

</html>