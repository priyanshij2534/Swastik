<?php
include_once 'config.php';

if (isset($_POST['booking'])) {
    $phone_number = $_POST['phone_number'];
    $doctor_name = $_POST['doctor_name'];
    $username = $_POST['username'];
    $description = $_POST['description'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    session_start();
    $user_id = $_SESSION['user_id'];

    $select = mysqli_query($conn, "SELECT * FROM appointment WHERE appointment_id = '$user_id' ") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        echo "<script> alert('Already registered!')</script>";
        header('location: surgery.php');
    }

    $query = "INSERT INTO appointment (appointment_id, doctor_name, username, email, phone_number, appointment_date, appointment_time, appointment_description) VALUES ('$user_id', '$doctor_name', '$username', '$email', '$phone_number', '$date', '$time', '$description')" or die('query failed');
    $appointment = mysqli_query($conn, $query);

    if ($appointment) {
        $message[] = 'Appointment Booked!';
        header('location:surgery.php');
    } else {
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
    <title>Swastik - Hospital</title>
    <link rel="icon" href="../Images/icons/favicon.png">

    <!--External CSS style Sheets -->
    <link rel="stylesheet" href="swastik-hospital.css">
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

                <img src="../Images/pages/swastik-hospital.jpg" alt="swastik-hospital">

                <h1 class="title">
                    Looking for
                </h1>

                <div class="banner-slide active">
                    <div class="slide">
                        <div class="content">
                            <h3>Experienced Doctors?</h3>
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

            </div>

            <!-- facilities -->
            <div class="facilities">
                <div class="card-container">
                    <a href="../surgery/surgery.php" class="card">
                        <div class="card-image">
                            <img src="../Images/surgery/qualification.png" alt="Surgery">
                        </div>
                        <div class="card-content">
                            <h3>Swastik - Surgeries</h3>
                        </div>
                    </a>

                    <a href="../Lab Test/lab-test.php" class="card">
                        <div class="card-image">
                            <img src="../Images/pages/laboratory.png" alt="Laboratory">
                        </div>
                        <div class="card-content">
                            <h3>Swastik - Laboratory</h3>
                        </div>
                    </a>

                    <a href="../medicines/medicines.php" class="card">
                        <div class="card-image">
                            <img src="../Images/pages/pharmacy.png" alt="Pharmacy">
                        </div>
                        <div class="card-content">
                            <h3>Swastik - Pharmacy</h3>
                        </div>
                    </a>

                </div>
            </div>

        </section>

        <!-- About Hospital -->
        <section class="about-hospital">
            <div class="imgBx">
                <img src="../Images/pages/doctor.png" alt="doctor">
            </div>

            <div class="contentBx">
                <h1 class="title">Welcome to Your Health Center</h1>
                <p>Swastik Hospital is one of the largest chains of multispecialty hospitals and tertiary care centers
                    in the country today. Swastik Hospital is a chain of 11 multispecialty hospitals, offering treatment
                    in over 35+ medical disciplines, holding an aggregate capacity of over 2062 beds with more than 500
                    active physicians, and 3000+ employees.</p>

                <p>Known for exceptional patient care for 28 years, we have our presence in 5 states of the country and
                    OPDs extended to a total of 11 states. Swastik Hospital is today known for setting high standards of
                    excellence in Healthcare, Clinical Care, Home Care, and Research.</p>

                <h2 class="title">Contact Details</h2>
                <p> <span>Helpline</span>: +91 76529832 <br> <span>Email</span>: help.swastik.web@gmail.com</p>
            </div>
        </section>

        <!-- Doctors -->
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

                    while ($i < 6) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <div class="card">
                            <div class="doctor-profile">
                                <?php echo '<img src="data:doctor_profile;base64,' . base64_encode($row['doctor_profile']) . '" alt = "Doctor" " >'; ?>
                            </div>
                            <div class="content">
                                <ul>
                                    <li class="name">
                                        <?= $row['doctor_name'] ?>
                                    </li>
                                    <li class="post">
                                        <?= $row['doctor_post'] ?>
                                    </li>
                                    <li class="work">
                                        <?= $row['doctor_work'] ?>
                                    </li>
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

                while ($i < 3) {
                    $row = mysqli_fetch_assoc($result)
                        ?>
                    <button class="surgery-details">
                        <?php echo '<img src="data:surgery_image;base64,' . base64_encode($row['surgery_image']) . '" alt = "Surgery" class="surgery-image" " >'; ?>

                        <div class="details">
                            <h2><span>
                                    <?= $row['surgery_name'] ?>
                            </h2>
                            <p>
                                <?= $row['surgery_description'] ?>
                            </p>
                        </div>
                    </button>
                    <?php
                    $i++;
                }
                ?>
            </div>

            <div class="surgery-button">
                <a href="../pages/all-surgery.php">
                    <button class="view-all" role="button">View All Surgery</button>
                </a>
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
<script src="swastik-hospital.js" charset="utf-8"></script>


</html>