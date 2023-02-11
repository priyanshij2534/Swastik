<?php
    require_once 'config.php';

    session_start();
    error_reporting(E_ALL ^ E_NOTICE);  

    if (isset($_POST['lab_submit'])) {
        $testName = $_POST['lab_submit'];
        if ($testName != '') {
            $sql = 'SELECT * FROM lab_tests WHERE test_name = :test_name';
            $stmt = $conn->prepare($sql);
            $stmt->execute(['test_name' => $testName]);
            $row = $stmt->fetch();
            $_SESSION['price'] = $row['test_price'];
            $_SESSION['booking_test_id'] = $row['test_id'];
            $_SESSION['booking_test_name'] = $row['test_name'];
        } 
        else {
            header('location: lab-test.php');
            exit();
        }
    } 
    else {
        header('location: lab-test.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <!-- Title -->
    <title>Swastik - Lab Test Details</title>
    <link rel="icon" href="../Images/icons/favicon.png">

    <!--External CSS style Sheets -->
    <link rel="stylesheet" href="../Lab Test/lab-test.css">
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
        <!-- Medicine Details -->
        <section class="test-details">

            <div class="details-container">
                <div class="test-image">
                    <video autoplay muted loop no-control>
                        <source src="../Images/Lab test/test-details.mp4" type="video/mp4">
                    </video>
                </div>

                <div class="test-content">
                    <h3><?= $row['test_name'] ?></h3>
                    <hr>

                    <label>Best Price * <span><?= $row['test_price'] ?> Rs.</span></label><br>
                    <div class="gap"></div>
                    <label>(Inclusive of all taxes)<br>
                        * Get the best price on this product on orders above Rs 1299</label><br>
                    <div class="gap"></div>
                    <label>Sample Type: <span><?= $row['sample_type'] ?></span></label><br>
                    <div class="gap"></div>
                    <label>Fasting: <span><?= $row['fasting'] ?></span></label><br>
                    <div class="gap"></div>
                    <label>Tube Type: <span><?= $row['tube_type'] ?></span></label><br>
                    <div class="gap"></div>
                    <hr>

                    <?php
                        if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0'){
                            echo '<button type="submit" name="Test-order" class="cart" onclick="login()">Add To Cart</button>';
                        }
                        else{
                            echo '<button type="submit" name="Test-order" class="cart" onclick="togglePopup(\'popup-1\')">Add To Cart</button>';
                        }
                    ?>
                </div>
            </div>

            <div class="details-container">
                <div class="test-text">
                    <h3>Description</h3>
                    <p><?= $row['test_description'] ?></p>
                </div>
            </div>

        </section>

        <!-- Cart Form -->
        <section class="test-form">
            <div class="popup" id="popup-1">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup('popup-1')">&times;</div>
                    <div class="form-container">
                        <header>
                            Book <?= $row['test_name'] ?> Test
                        </header>
                        <p>
                            Please feel welcome to contact our friendly reception staff with any general or medical enquiry.
                            Our
                            doctors will receive or return any urgent calls.
                        </p>

                        <form action="../Lab Test/booking.php" method="post">

                            <div class="fields">
                                <div class="input-field">
                                    <label>Patient Name</label>
                                    <input type="text" name="patient-name" placeholder="Name" required>
                                </div>

                                <div class="input-field">
                                    <label>Patient Email</label>
                                    <input type="text" name="patient-email" placeholder="Email" required>
                                </div>

                                <div class="input-field">
                                    <label>Patient Phone Number</label>
                                    <input type="number" name="patient-phone" placeholder="Phone" required>
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

                                <div class="input-field">
                                    <label>Visit Type</label>
                                    <select required name="visit-type">
                                        <option disabled selected>Select Visit Type</option>
                                        <option>Home</option>
                                        <option>Swastik Lab</option>
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

                            <button type="submit" name="booking" class="nextBtn">
                                <span class="btnText">Book Your Test</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <!-- footer -->
    <?php
        include '../section/footer.php';
    ?>
</body>

<!--NavBar JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit-icons.min.js" charset="utf-8"></script>

<!--Fontawesome JavaScript -->
<script src="https://kit.fontawesome.com/1a04223b0a.js" crossorigin="anonymous"></script>

<!-- External JavaScript -->
<script src="../Lab Test/lab-test.js"></script>

</html>