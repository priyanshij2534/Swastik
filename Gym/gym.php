<?php
require_once 'config.php';

if (isset($_POST['Gym-Registration'])) {
    $subscription_time = $_POST['subscription_time'];
    $preferredTimings = $_POST['preferredTimings'];
    $gymType = $_POST['gymType'];
    $height = $_POST['height'];
    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $date = $_POST['date'];
    $age = $_POST['age'];

    session_start();
    $user_id = $_SESSION['user_id'];

    if($subscription_time == 1){
        if($gymType == 'Basic-Fitness'){
            $price = 1500;
        }
        else if($gymType == 'Advanced-Music-Course'){
            $price = 2500;
        }
        else if($gymType == 'New-Gym-Training'){
            $price = 2000;
        }
        else if($gymType == 'Yoga-Training'){
            $price = 2200;
        }
        else if($gymType == 'Basic-Muscle-Course'){
            $price = 3000;
        }
        else if($gymType == 'Body-Building-Course'){
            $price = 4000;
        }
    }
    else if($subscription_time == 3){
        if($gymType == 'Basic-Fitness'){
            $price = 4000;
        }
        else if($gymType == 'Advanced-Music-Course'){
            $price = 6000;
        }
        else if($gymType == 'New-Gym-Training'){
            $price = 5000;
        }
        else if($gymType == 'Yoga-Training'){
            $price = 5500;
        }
        else if($gymType == 'Basic-Muscle-Course'){
            $price = 6500;
        }
        else if($gymType == 'Body-Building-Course'){
            $price = 700;
        }
    }
    else if($subscription_time == 6){
        if($gymType == 'Basic-Fitness'){
            $price = 8500;
        }
        else if($gymType == 'Advanced-Music-Course'){
            $price = 9000;
        }
        else if($gymType == 'New-Gym-Training'){
            $price = 11000;
        }
        else if($gymType == 'Yoga-Training'){
            $price = 8800;
        }
        else if($gymType == 'Basic-Muscle-Course'){
            $price = 10000;
        }
        else if($gymType == 'Body-Building-Course'){
            $price = 11000;
        }
    }
    else if($subscription_time == 12){
        if($gymType == 'Basic-Fitness'){
            $price = 15000;
        }
        else if($gymType == 'Advanced-Music-Course'){
            $price = 13000;
        }
        else if($gymType == 'New-Gym-Training'){
            $price = 16000;
        }
        else if($gymType == 'Yoga-Training'){
            $price = 16000;
        }
        else if($gymType == 'Basic-Muscle-Course'){
            $price = 17500;
        }
        else if($gymType == 'Body-Building-Course'){
            $price = 18500;
        }
    }

    $select = mysqli_query($conn, "SELECT * FROM current_gym_registration WHERE user_id = '$user_id' ") or die('query failed');

    if (mysqli_num_rows($select) > 0) {
        echo "<script> alert('Already registered!')</script>";
        header('location: gym.php');
    } 
    else {
        $query = "INSERT INTO current_gym_registration (user_id, name, age, email, weight, phone, height, preferredTimings, gymType, gender, date, subscription_time, price) VALUES ('$user_id', '$name', '$age', '$email', '$weight', '$phone', '$height', '$preferredTimings', '$gymType', '$gender', '$date', '$subscription_time', '$price')";
        $register = mysqli_query($conn, $query);

        if ($register) {
            echo "<script> alert('Registration Successfull!'); </script>";
            header('location: gym.php');
        } else {
            echo "<script> alert('Failed to connect!')</script>";
            header('location: gym.php');
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <!-- Title -->
    <title>Swastik - Gym</title>
    <link rel="icon" href="../Images/icons/favicon.png">

    <!--External CSS style Sheets -->
    <link rel="stylesheet" href="gym.css">
    <link rel="stylesheet" href="../styles/styles.css">

    <!-- Navbar CSS style Sheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/css/uikit.min.css">

    <!--Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&family=Poppins:wght@200;400&family=Roboto+Slab&family=Rubik+Bubbles&family=Rubik:ital,wght@0,400;1,300&family=Sacramento&family=Ubuntu&display=swap" rel="stylesheet">
</head>

<body>
    <!-- header -->
    <?php
    include '../section/header.php';
    ?>

    <main>
        <!-- Top -->
        <section class="top">
            <video autoplay loop muted plays-inline class="top-video">
                <source src="../Images/gym/gym-top.mp4">
            </video>

            <div class="top-content">
                <h1>The best way to predict the future is to create it.</h1>

                <?php
                if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0') {
                    echo '<button class="home-visit" role="button" onclick="login()">Register</button>';
                } else {
                    echo '<button class="home-visit" role="button" onclick="togglePopup(\'popup-1\')">Register</button>';
                }
                ?>

            </div>
        </section>

        <!-- Register Form -->
        <section class="Register-form">
            <div class="popup" id="popup-1">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup('popup-1')">&times;</div>
                    <div class="form-container">
                        <header>
                            Gym Registration
                        </header>
                        <p> Please feel welcome to contact our friendly reception staff with any general or gym enquiry.
                            Our staff
                            will receive or return any urgent calls. </p>

                        <form action="#" method="post">
                            <div class="fields">
                                <div class="input-field">
                                    <label>Preferred Timings</label>
                                    <select required name="preferredTimings">
                                        <option hidden selected>Select Timings</option>
                                        <option>5am - 6:30am</option>
                                        <option>7am - 8:30am</option>
                                        <option>9am - 10:30am</option>
                                        <option>11am - 12:30pm</option>
                                        <option>1pm - 2:30pm</option>
                                        <option>5pm - 6:30pm</option>
                                        <option>7pm - 8:30pm</option>
                                        <option>9pm - 10:30pm</option>
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label>Gym Type</label>
                                    <select required name="gymType">
                                        <option value="" selected hidden>Select Gym Type</option>
                                        <option value="Basic-Fitness">Basic Fitness</option>
                                        <option value="Advanced-Music-Course">Advanced Music Course</option>
                                        <option value="New-Gym-Training">New Gym Training</option>
                                        <option value="Yoga-Training">Yoga Training</option>
                                        <option value="Basic-Muscle-Course">Basic Muscle Course</option>
                                        <option value="Body-Building-Course">Body Building Course</option>
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label>Name</label>
                                    <input name="name" type="text" placeholder="Name" required>
                                </div>

                                <div class="input-field">
                                    <label>Email</label>
                                    <input name="email" type="text" placeholder="Email" required>
                                </div>

                                <div class="input-field">
                                    <label>Phone</label>
                                    <input name="phone" type="text" placeholder="Phone" required>
                                </div>

                                <div class="input-field">
                                    <label>Date</label>
                                    <input name="date" type="date" placeholder="Enter your issued date" required>
                                </div>

                                <div class="input-field">
                                    <label>Gender</label>
                                    <select required name="gender">
                                        <option selected hidden>Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Others</option>
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label>Subscription Time</label>
                                    <select required name="subscription_time">
                                        <option value="" selected hidden>Subscription Time</option>
                                        <option value="1">1 month</option>
                                        <option value="3">3 month</option>
                                        <option value="6">6 month</option>
                                        <option value="12">1 year</option>
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label>Weight</label>
                                    <input name="weight" type="text" placeholder="Weight (kg)" required>
                                </div>

                                <div class="input-field">
                                    <label>Height</label>
                                    <input name="height" type="text" placeholder="Height (cm)" required>
                                </div>

                                <div class="input-field">
                                    <label>Age</label>
                                    <input name="age" type="text" placeholder="Age" required>
                                </div>
                            </div>

                            <div class="button">
                                <input type="submit" value="Register" name="Gym-Registration">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features -->
        <section class="features">
            <h2>What are the <b>Features</b> that we provide?</h2>

            <div class="features-main">
                <div class="features-content">
                    <img src="../Images/gym/features-24 hr.jpeg" alt="">
                    <p>Open 24hrs</p>
                </div>
                <div class="features-content">
                    <img src="../Images/gym/features-22,000 sq feet.jpeg" alt="">
                    <p>Space of 22,000 square feet!</p>
                </div>
                <div class="features-content">
                    <img src="../Images/gym/features-personal trainer.jpeg" alt="">
                    <p>Personal Training</p>
                </div>
                <div class="features-content">
                    <img src="../Images/gym/features-spinning studio.jpeg" alt="">
                    <p>Spinning Studio</p>
                </div>
                <div class="features-content">
                    <img src="../Images/gym/features-superior quality.jpeg" alt="">
                    <p>Superior quality, reduced price</p>
                </div>
                <div class="features-content">
                    <img src="../Images/gym/features-Top equipment.jpeg" alt="">
                    <p>Top of the line equipment</p>
                </div>
            </div>
        </section>

        <!-- Diet Recommendation -->
        <section class="diet-recommendation">
            <div class="heading">
                <p>Menu & Nutrition</p>
                <h1>EXPLORE OUR DIET PLAN</h1>
            </div>
            <hr>

            <div class="categories">
                <div class="categories-white-border">
                    <div class="dropdown">
                        <button onclick="myFunction1()" class="dropbtn">WEIGHT LOOSE</button>
                        <div id="myDropdown1" class="dropdown-content">

                            <?php
                            if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0') {
                                echo '
                                <form action="../sign-up/login.php" method="post">
                                    <button name="Weight-Loose-Veg" class="dietType" type="submit">Veg</button>
                                    <button name="Weight-Loose-NonVeg" class="dietType" type="submit">Non-Veg</button>
                                </form>
                                ';
                            } else {
                                echo '
                                <form action="dietPlan.php" method="post">
                                    <button name="Weight-Loose-Veg" class="dietType" type="submit">Veg</button>
                                    <button name="Weight-Loose-NonVeg" class="dietType" type="submit">Non-Veg</button>
                                </form>
                                ';
                            }
                            ?>

                        </div>
                    </div>

                    <div class="dropdown">
                        <button onclick="myFunction2()" class="dropbtn">MAINTAIN</button>
                        <div id="myDropdown2" class="dropdown-content">

                            <?php
                            if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0') {
                                echo '
                                <form action="../sign-up/login.php" method="post">
                                    <button name="Maintain-Veg" class="dietType" type="submit">Veg</button>
                                    <button name="Maintain-NonVeg" class="dietType" type="submit">Non-Veg</button>
                                </form>
                                ';
                            } else {
                                echo '
                                <form action="dietPlan.php" method="post">
                                    <button name="Maintain-Veg" class="dietType" type="submit">Veg</button>
                                    <button name="Maintain-NonVeg" class="dietType" type="submit">Non-Veg</button>
                                </form>
                                ';
                            }
                            ?>

                        </div>
                    </div>

                    <div class="dropdown">
                        <button onclick="myFunction3()" class="dropbtn">WEIGHT GAIN</button>
                        <div id="myDropdown3" class="dropdown-content">

                            <?php
                            if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0') {
                                echo '
                                <form action="../sign-up/login.php" method="post">
                                    <button name="Weight-Gain-Veg" class="dietType" type="submit">Veg</button>
                                    <button name="Weight-Gain-NonVeg" class="dietType" type="submit">Non-Veg</button>
                                </form>
                                ';
                            } else {
                                echo '
                                <form action="dietPlan.php" method="post">
                                    <button name="Weight-Gain-Veg" class="dietType" type="submit">Veg</button>
                                    <button name="Weight-Gain-NonVeg" class="dietType" type="submit">Non-Veg</button>
                                </form>
                                ';
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>

            <div class="categories-details">
                <div class="container">
                    <div class="card">
                        <div class="box">
                            <div class="content">
                                <h2>01</h2>
                                <h3>WEIGHT LOOSE</h3>
                                <p>For most people, a weight loss goal of 1-2 pounds per week is considered safe.
                                    Cutting carbs, eating
                                    more protein, lifting weights, and getting more sleep are actions that can promote
                                    sustainable weight
                                    loss.</p>
                                <a href="https://www.cdc.gov/healthyweight/losing_weight/index.html">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="box">
                            <div class="content">
                                <h2>02</h2>
                                <h3>MAINTAIN</h3>
                                <p>Being active and choosing healthy foods can help you maintain or achieve a healthy
                                    weight, feel more
                                    energetic, and decrease your chances of having other health problems.</p>
                                <a href="https://www.nia.nih.gov/health/maintaining-healthy-weight#:~:text=Being%20active%20and%20choosing%20healthy,of%20physical%20activity%20per%20week.">Read
                                    More</a>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="box">
                            <div class="content">
                                <h2>03</h2>
                                <h3>WEIGHT GAIN</h3>
                                <p>If you want to gain weight healthily, skip the sweets. Opt for nutrient-dense foods
                                    and beverages,
                                    like nuts, dried fruit, high fat dairy products, meat, and shakes.</p>
                                <a href="https://www.healthline.com/nutrition/how-to-gain-weight#underweight-definition">Read
                                    More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Health Calculator -->
        <section class="Health-Calculator">

            <div class="header">
                <h1>Fitness and Health Calculators</h1>
                <p>Explore a variety of free fitness and health calculators including a BMI calculator, body fat
                    calculator,
                    calorie calculator, and many more.</p>
            </div>

            <div class="row1-container">
                <div class="card card-down cyan">
                    <h2>BMI Calculator</h2>
                    <p>Body mass index (BMI) is a measure of body fat based on height and weight that applies to adult
                        men and
                        women.</p>

                    <?php
                    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0') {
                        echo '<button role="button" onclick="login()">Calculate</button>';
                    } else {
                        echo '<button role="button" onclick="togglePopup(\'popup-2\')">Calculate</button>';
                    }
                    ?>

                </div>

                <div class="card red">
                    <h2>Calorie Calculator</h2>
                    <p>This calorie calculator estimates the number of calories needed each day to maintain, lose, or
                        gain weight.
                    </p>
                    <?php
                    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0') {
                        echo '<button role="button" onclick="login()">Calculate</button>';
                    } else {
                        echo '<button role="button" onclick="togglePopup(\'popup-3\')">Calculate</button>';
                    }
                    ?>
                </div>

                <div class="card cyan">
                    <h2>Ideal Weight Calculator</h2>
                    <p>It estimates ideal healthy bodyweight based on age, gender, and height based on several popular
                        formulas.
                    </p>
                    <?php
                    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0') {
                        echo '<button role="button" onclick="login()">Calculate</button>';
                    } else {
                        echo '<button role="button" onclick="togglePopup(\'popup-4\')">Calculate</button>';
                    }
                    ?>
                </div>

                <div class="card card-down blue">
                    <h2>BMR Calculator</h2>
                    <p>It estimates your basal metabolic rate—the amount of energy expended while at rest in a neutrally
                        temperate
                        environment.</p>
                    <?php
                    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0') {
                        echo '<button role="button" onclick="login()">Calculate</button>';
                    } else {
                        echo '<button role="button" onclick="togglePopup(\'popup-5\')">Calculate</button>';
                    }
                    ?>
                </div>
            </div>

            <div class="row2-container">
                <div class="card blue">
                    <h2>Body Fat Calculator</h2>
                    <p>It helps you to find out your body fat percentage, your body type and the number of calories you
                        have to
                        burn.</p>
                    <?php
                    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0') {
                        echo '<button role="button" onclick="login()">Calculate</button>';
                    } else {
                        echo '<button role="button" onclick="togglePopup(\'popup-6\')">Calculate</button>';
                    }
                    ?>
                </div>

                <div class="card orange">
                    <h2>Pace Calculator</h2>
                    <p>It computes pace, time, and distance, given values for two of the variables. It can also be used
                        for
                        training purposes.</p>
                    <button role="button" onclick="togglePopup('popup-7')">Calculate</button>
                </div>
            </div>
        </section>

        <!-- BMI Calculator -->
        <section class="Calculator">
            <div class="popup" id="popup-2">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup('popup-2')">&times;</div>
                    <div class="calculator-container">
                        <header>
                            BMI Calculator
                        </header>

                        <form>
                            <div class="fields">

                                <div class="input-field">
                                    <label>Weight (kg)</label>
                                    <input class="weight-BMI" type="text" placeholder="Weight (kg)" required>
                                </div>

                                <div class="input-field">
                                    <label>Height (m)</label>
                                    <input class="height-BMI" type="text" placeholder="Height (m)" required>
                                </div>

                                <div class="button">
                                    <input class="calculate BMI-calculate" type="button" value="Calculate">
                                </div>

                                <h4 class="BMI-result"></h4>
                                <p class="BMI-result-statement"></p>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Ideal Weight Calculator -->
        <section class="Calculator">
            <div class="popup" id="popup-4">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup('popup-4')">&times;</div>
                    <div class="calculator-container">
                        <header>
                            Ideal Weight Calculator
                        </header>

                        <form>
                            <div class="fields">

                                <div class="input-field">
                                    <label>Gender</label>
                                    <select required class="gender-IdealWeight">
                                        <option value="" selected hidden>Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label>Height (cm)</label>
                                    <input class="height-IdealWeight" type="text" placeholder="Height (cm)" required>
                                </div>

                                <div class="button">
                                    <input class="calculate IdealWeight-calculate" type="button" value="Calculate">
                                </div>

                                <h4 class="IdealWeight-result"></h4>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- BMR Calculator -->
        <section class="Calculator">
            <div class="popup" id="popup-5">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup('popup-5')">&times;</div>
                    <div class="calculator-container">
                        <header>
                            BMR Calculator
                        </header>

                        <form>
                            <div class="fields">

                                <div class="input-field">
                                    <label>Weight(kg)</label>
                                    <input class="weight-BMR" type="text" placeholder="Weight (kg)" required>
                                </div>

                                <div class="input-field">
                                    <label>Height(m)</label>
                                    <input class="height-BMR" type="text" placeholder="Height (m)" required>
                                </div>

                                <div class="input-field">
                                    <label>Age</label>
                                    <input class="age-BMR" type="number" placeholder="Age" required>
                                </div>

                                <div class="input-field">
                                    <label>Gender</label>
                                    <select required class="gender-BMR">
                                        <option value="" selected hidden>Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <div class="button">
                                    <input class="calculate BMR-calculate" type="button" value="Calculate">
                                </div>

                                <h5 class="BMR-result"></h5>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Body Fat Calculator -->
        <section class="Calculator">
            <div class="popup" id="popup-6">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup('popup-6')">&times;</div>
                    <div class="calculator-container">
                        <header>
                            Body Fat Calculator
                        </header>

                        <form>
                            <div class="fields">

                                <div class="input-field">
                                    <label>Weight(kg)</label>
                                    <input class="weight-BodyFat" type="text" placeholder="Weight (kg)" required>
                                </div>

                                <div class="input-field">
                                    <label>Height(m)</label>
                                    <input class="height-BodyFat" type="text" placeholder="Height (m)" required>
                                </div>

                                <div class="input-field">
                                    <label>Age</label>
                                    <input class="age-BodyFat" type="number" placeholder="Age" required>
                                </div>

                                <div class="input-field">
                                    <label>Gender</label>
                                    <select required class="gender-BodyFat">
                                        <option value="" selected hidden>Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <div class="button">
                                    <input class="calculate BodyFat-calculate" type="button" value="Calculate">
                                </div>

                                <h4 class="BodyFat-result"></h4>
                                <p class="BodyFat-result-statement"></p>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Pace Calculator -->
        <section class="Calculator">
            <div class="popup" id="popup-7">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup('popup-7')">&times;</div>
                    <div class="calculator-container">
                        <header>
                            Pace Calculator
                        </header>

                        <form>
                            <div class="fields">

                                <div class="input-field">
                                    <label>Distance(miles)</label>
                                    <input class="distance-Pace" type="text" placeholder="Distance (miles)" required>
                                </div>

                                <div class="input-field">
                                    <label>Time</label>
                                    <input class="hour-Pace" type="text" placeholder="Hour" required>
                                    <input class="min-Pace" type="text" placeholder="Min" required>
                                    <input class="sec-Pace" type="text" placeholder="Sec" required>
                                </div>

                                <div class="button">
                                    <input class="calculate Pace-calculate" type="button" value="Calculate">
                                </div>

                                <h4 class="Pace-result"></h4>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Calorie Calculator -->
        <section class="Calculator">
            <div class="popup" id="popup-3">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup('popup-3')">&times;</div>
                    <div class="calculator-container">
                        <header>
                            Calorie Calculator
                        </header>

                        <form>
                            <div class="fields">

                                <div class="input-field">
                                    <label>Weight</label>
                                    <input class="weight-Calorie" type="text" placeholder="Weight (kg)" required>
                                </div>

                                <div class="input-field">
                                    <label>Height</label>
                                    <input class="height-Calorie" type="text" placeholder="Height (cm)" required>
                                </div>

                                <div class="input-field">
                                    <label>Age</label>
                                    <input class="age-Calorie" type="number" placeholder="Age" required>
                                </div>

                                <div class="input-field">
                                    <label>Gender</label>
                                    <select required class="gender-Calorie">
                                        <option value="" selected hidden>Gender</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>

                                <div class="input-field">
                                    <label>Activity</label>
                                    <select required class="activity-Calorie">
                                        <option value="" selected hidden>Activity</option>
                                        <option value="1">Sedentary</option>
                                        <option value="2">Lightly active</option>
                                        <option value="3">Moderately active</option>
                                        <option value="4">Very active</option>
                                        <option value="5">Extra active</option>
                                    </select>
                                </div>

                                <div class="button">
                                    <input class="calculate Calorie-calculate" type="button" value="Calculate">
                                </div>

                                <h6 class="Calorie-result"></h6>

                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Gym Blogs -->
        <section class="Gym-Blogs">
            <h2>Blogs</h2>
            <div class="Gym-Blogs-cards">
                <div class="Gym-Blogs-card">
                    <a href="https://www.menshealth.com/uk/building-muscle/a28433729/full-body-workouts/">
                        <img src="../Images/gym/blog-1.jpg" alt="Full-Body Workouts">
                        <p>The Benefits of Full-Body Workouts</p>
                    </a>
                </div>

                <div class="Gym-Blogs-card">
                    <a href="https://www.henryford.com/blog/2018/02/7-common-workout-mistakes-avoid">
                        <img src="../Images/gym/blog-2.jpg" alt="Common Workout Mistakes">
                        <p>7 Common Workout Mistakes To Avoid</p>
                    </a>
                </div>

                <div class="Gym-Blogs-card">
                    <a href="https://www.verywellfit.com/in-the-forum-join-a-gym-or-workout-at-home-3976890">
                        <img src="../Images/gym/blog-3.jpg" alt="Benefits of Joining a Gym">
                        <p>The Benefits of Joining a Gym vs. Working Out at Home</p>
                    </a>
                </div>

                <div class="Gym-Blogs-card">
                    <a href="https://telanganatoday.com/here-are-8-reasons-why-people-go-to-gym-that-has-nothing-to-do-about-being-fit">
                        <img src="../Images/gym/blog-4.jpg" alt="8 reasons why people go to gym">
                        <p>8 reasons why people go to gym</p>
                    </a>
                </div>

                <div class="Gym-Blogs-card">
                    <a href="https://steelsupplements.com/blogs/steel-blog/what-is-the-average-cost-of-a-gym-membership">
                        <img src="../Images/gym/blog-5.jpg" alt="AVERAGE COST OF A GYM MEMBERSHIP">
                        <p>WHAT IS THE AVERAGE COST OF A GYM MEMBERSHIP?</p>
                    </a>
                </div>

                <div class="Gym-Blogs-card">
                    <a href="https://www.magicbricks.com/blog/vastu-shastra-for-commercial-gym/124037.html">
                        <img src="../Images/gym/blog-6.jpg" alt="A Vastu Shastra Guide for Commercial Gym">
                        <p>A Vastu Shastra Guide for Commercial Gym</p>
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

<!--Navbar JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit-icons.min.js" charset="utf-8"></script>

<!--External JavaScript -->
<script src="gym.js" charset="utf-8"></script>

<!-- Font Awesome -->
<script src="https://kit.fontawesome.com/1a04223b0a.js" crossorigin="anonymous"></script>

</html>