<?php
    include_once 'config.php';

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
    <title>Swastik - Surgery</title>
    <link rel="icon" href="../Images/icons/favicon.png">

    <!--External CSS style Sheets -->
    <link rel="stylesheet" href="surgery.css">
    <link rel="stylesheet" href="../styles/styles.css">

    <!--External CSS style Sheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/css/uikit.min.css">
</head>

<body>
    <!-- header -->
    <?php
        include '../section/header.php';
    ?>

    <main>
        <!-- banner -->
        <section>
            <div class="banner">

                <img src="../Images/surgery/banner.jpg" alt="">

                <h1 class="title">
                    Looking for
                </h1>

                <div class="banner-slide active">
                    <div class="slide">
                        <div class="content">
                            <h3>Experienced Surgeons?</h3>
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

                <p>We provide the best of doctors, technology and care you deserve</p>

                <div class="surgery-category-button">
                    <button class="surgery-name">Piles</button>
                    <button class="surgery-name">Fistula</button>
                    <button class="surgery-name">Fissure</button>
                    <button class="surgery-name">Pilodinal Sinus</button>
                    <button class="surgery-name">Varicose Veins</button>
                    <button class="surgery-name">Varicocele</button>
                    <button class="surgery-name">Kidney Stone</button>
                    <button class="surgery-name">Phimosis</button>
                    <button class="surgery-name">Appendix</button>
                    <button class="surgery-name">Knee Replacement</button>
                </div>

                <?php
                if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0'){
                    echo '<button class="online" role="button" onclick="login()">Make An Appointment</button>';
                }
                else{
                    echo '<button class="online" role="button" onclick="togglePopup(\'popup-1\')">Make An Appointment</button>';
                }
                ?>

            </div>

            <!-- roadmap -->
            <div class="roadmap">
                <div class="card-container">
                    <div class="card">
                        <div class="card-image">
                            <img src="../Images/surgery/insurance.png" alt="">
                        </div>
                        <div class="card-content">
                            <h3>We are Accepting all Insurance</h3>
                            <p>We are accepting all major health insurance for your convenience and smoother
                                process.
                            </p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-image">
                            <img src="../Images/surgery/budget.png" alt="">
                        </div>
                        <div class="card-content">
                            <h3>Our Packages are Budget Friendly</h3>
                            <p>We know how important to be in the budget and here you will find all our prices are
                                pocket friendly.</p>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-image">
                            <img src="../Images/surgery/qualification.png" alt="">
                        </div>
                        <div class="card-content">
                            <h3>Group of Certified and Experienced Doctors</h3>
                            <p>Yes, you dont need to worry about how well the treatment will be and who will be
                                treating, We are certified.</p>
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
                                            require_once 'config.php';

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

        <!-- doctors -->
        <section class="doctors">
            <h2 class="title">Meet our <span>Medical Specialists</span></h2>

            <div class="details">
                <div class="card-container no-scrollbar">

                    <?php
                        require_once 'config.php';

                        $sql = " SELECT * FROM doctors ";
                        $result = mysqli_query($conn, $sql);
                        $num_rows = mysqli_num_rows($result);

                        $i = 0;

                        while($i < 6){
                            $row = mysqli_fetch_assoc($result);
                            ?>
                            <div class="card">
                                <div class="doctor-profile">
                                    <?php echo '<img src="data:doctor_profile;base64,'.base64_encode($row['doctor_profile']).'" alt = "Doctor" " >';?>
                                </div>
                                <div class="content">
                                    <ul>
                                        <li class="name"><?= $row['doctor_name'] ?></li>
                                        <li class="post"><?= $row['doctor_post'] ?></li>
                                        <li class="work"><?= $row['doctor_work'] ?></li>
                                    </ul>
                                </div>
                            </div> 
                            <?php
                            $i++;
                        }
                    ?>

                </div>
            </div>
            
            <a href="../pages/all-doctors.php">
                <button class="view-all" role="button">View All Doctors</button>
            </a>

        </section>

        <!-- Surgeries -->
        <section class="surgeries">
            <h1 class="title">Surgeries We Cover</h1>

            <div class="container">
                <?php
                    require_once 'config.php';

                    $sql = " SELECT * FROM surgery ";
                    $result = mysqli_query($conn, $sql);
                    $num_rows = mysqli_num_rows($result);
                    $i = 0;

                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <button class="surgery-details">
                            <?php echo '<img src="data:surgery_image;base64,'.base64_encode($row['surgery_image']).'" alt = "Surgery" class="surgery-image" " >';?>
                            
                            <div class="details">
                                <h2><span><?= $row['surgery_name'] ?></h2>
                                <p><?= $row['surgery_description'] ?></p>
                            </div>
                        </button> 
                        <?php
                    }
                ?>

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
                                        Would like to thank Megha from the TPA team for the promptness and support
                                        provided which helped in speedy discharge with minimal follow up.She was very
                                        helpful through the period of admission and helped in timely discharge with
                                        documentation being completed at the earliest as was required for the discharge.
                                    </p>

                                    <p class="review-text">
                                        Dr. Sudeep Mishra was all very friendly and helpful. I especially loved how Dr.
                                        Rahul Dev really took his time to explain my conditions with me as well as my
                                        treatment options. I had 13 mm Gallbladder stone with full of pus. Dr. Rahul Dev
                                        operated so nicely. I also very grateful to his all team members who assists him
                                        to do operation successfully. I had a great visit and the doctor's demeanor has
                                        really put me at ease so I highly recommend Dr. Rahul Dev.
                                    </p>

                                    <p class="review-text">
                                        Dr. Sudeep Mishra was all very friendly and helpful. I especially loved how Dr.
                                        Rahul Dev really took his time to explain my conditions with me as well as my
                                        treatment options. I had 13 mm Gallbladder stone with full of pus. Dr. Rahul Dev
                                        operated so nicely. I also very grateful to his all team members who assists him
                                        to do operation successfully. I had a great visit and the doctor's demeanor has
                                        really put me at ease so I highly recommend Dr. Rahul Dev.
                                    </p>

                                    <p class="review-text">
                                        Had irritation in the eyes. Dr. Atul Singh did the check up. Very satisfied with
                                        the diagnosis and treatment. The doctor was very professional and efficient and
                                        explained everything. Charu Sharma from the reception assisted me. She was
                                        extremely helpful, sweet and polite
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
                    <img src="../Images/surgery/review.jpg" alt="">
                </div>

            </div>
        </section>

        <!-- work-flow -->
        <section class="workflow">
            <p class="title">It's really easy<br> <span>Here Is How It Works</span></p>

            <div class="details">
                <div class="card-container no-scrollbar">

                    <div class="card">
                        <div class="image">
                            <img src="../Images/surgery/workflow-1.jpg" alt="">
                        </div>
                        <div class="content">
                            <ul>
                                <li class="name">Connect with Care Expert</li>
                                <li class="post">Share your surgery needs, preferences, special requests</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="image">
                            <img src="../Images/surgery/workflow-2.jpg" alt="">
                        </div>
                        <div class="content">
                            <ul>
                                <li class="name">Hospital & Doctor Recommendations</li>
                                <li class="post">Select an experienced surgeon & premium hospital that match your
                                    requirement</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="image">
                            <img src="../Images/surgery/workflow-3.jpg" alt="">
                        </div>
                        <div class="content">
                            <ul>
                                <li class="name">Surgery closure</li>
                                <li class="post">Assisted transport & hospital admission. Cashless & no stress
                                    settlement</li>
                            </ul>
                        </div>
                    </div>

                    <div class="card">
                        <div class="image">
                            <img src="../Images/surgery/workflow-4.jpg" alt="">
                        </div>
                        <div class="content">
                            <ul>
                                <li class="name">Post-surgery support and feedback</li>
                                <li class="post">Free doctor consultation & lab test. Share feedback on the process &
                                    Care Expert</li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <!-- Blogs -->
        <section class="Blogs">
            <h2 class="title">Blogs</h2>

            <div class="surgery-blog-main">

                <div class="surgery-blog-left">
                    <div class="surgery-blog-img1">
                        <a
                            href="https://www.altru.org/blog/2022/june/altru-s-emergency-medical-services-keeping-our-c/">
                            <img src="../Images/surgery/surgery-blog-3.jpg" alt="">
                        </a>
                    </div>
                    <a class="surgery-blog-link"
                        href="https://www.altru.org/blog/2022/june/altru-s-emergency-medical-services-keeping-our-c/">
                        <b>Altru’s Emergency Medical Services | Keeping Our Communities Safe</b> - If you’ve attended a
                        large gathering in our area, like a concert at the Alerus Center, a hockey game at the Ralph
                        Engelstad Arena....</a>
                </div>

                <div class="surgery-blog-right">
                    <div class="surgery-blog-img2">
                        <a
                            href="https://medicine.iu.edu/blogs/surgery/iu-surgery-residents-gain-valuable-lessons-to-take-back-to-operating-room">
                            <img src="../Images/surgery/surgery-blog-1.jfif" alt="">
                        </a>
                    </div>
                    <a class="surgery-blog-link"
                        href="https://medicine.iu.edu/blogs/surgery/iu-surgery-residents-gain-valuable-lessons-to-take-back-to-operating-room">
                        <b>IU Surgery residents gain valuable lessons to take back to Operating Room</b></a>

                    <div class="surgery-blog-img3">
                        <a
                            href="https://health.mountsinai.org/blog/expert-advice-on-rsv-and-other-respiratory-illnesses-in-children/">
                            <img src="../Images/surgery/surgery-blog-2.jpg" alt="">
                        </a>
                    </div>
                    <a class="surgery-blog-link"
                        href="https://health.mountsinai.org/blog/expert-advice-on-rsv-and-other-respiratory-illnesses-in-children/">
                        <b>Expert Advice on RSV and Other Respiratory Illnesses in Children</b></a>
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

<!-- external JavaScript -->
<script src="surgery.js" charset="utf-8"></script>


</html>