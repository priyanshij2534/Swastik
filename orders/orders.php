<?php
    require_once 'configuration.php';

    session_start();
    error_reporting(E_ALL ^ E_NOTICE);  
    $user_id = $_SESSION['user_id'];

    if ($user_id != '') {
        $sql1 = 'SELECT * FROM current_product_orders WHERE user_id LIKE :userId';
        $stmt = $conn->prepare($sql1);
        $stmt->execute(['userId' => '%' . $user_id . '%']);
        $result1 = $stmt->fetchAll();
        
        $sql2 = 'SELECT * FROM current_orders WHERE user_id LIKE :userId';
        $stmt = $conn->prepare($sql2);
        $stmt->execute(['userId' => '%' . $user_id . '%']);
        $result2 = $stmt->fetchAll();
       
        $sql3 = 'SELECT * FROM current_test_orders WHERE user_id LIKE :userId';
        $stmt = $conn->prepare($sql3);
        $stmt->execute(['userId' => '%' . $user_id . '%']);
        $result3 = $stmt->fetchAll();
       
        $sql4 = 'SELECT * FROM current_gym_registration WHERE user_id LIKE :userId';
        $stmt = $conn->prepare($sql4);
        $stmt->execute(['userId' => '%' . $user_id . '%']);
        $result4 = $stmt->fetchAll();
       
        $sql5 = 'SELECT * FROM current_appointment WHERE user_id LIKE :userId';
        $stmt = $conn->prepare($sql5);
        $stmt->execute(['userId' => '%' . $user_id . '%']);
        $result5 = $stmt->fetchAll();
    } 
    else {
        header('location: search.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Swastik - Orders</title>
    <link rel="icon" href="../Images/icons/favicon.png">

    <!--External CSS style Sheets -->
    <link rel="stylesheet" href="orders.css">
    <link rel="stylesheet" href="../styles/styles.css">

    <!--NavBar CSS style Sheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/css/uikit.min.css">
</head>

<body>
    <!-- header -->
    <?php
    include '../section/header.php';
    ?>

    <section class="products">
        <h1 class="title">HealthCare Products</h1>
        <?php
            if ($result1) {
                foreach ($result1 as $row) {
                    echo'
                    <div class="container">
                        <form method = "post" action = "complete_order.php">
                            <div class="content">
                                <h3>'.$row['product_name'].'</h3>
                                <hr>    

                                <input type="hidden" name="lblItemName" value="<?php echo $ItemName; ?>">                                
                                <label>
                                    Price * <span>'.$row['price'].' Rs.</span>
                                </label><br>
                                <div class="gap"></div>

                                <label>(Inclusive of all taxes)<br>
                                    * Get the best price on this product on orders above Rs 1299</label><br>
                                <div class="gap"></div>

                                <label><span>Quantity - '.$row['quantity'].'</span></label><br>
                                <div class="gap"></div>

                                <label>
                                    Net Price * <span>'.$row['net_price'].' Rs.</span>
                                </label><br>
                                <div class="gap"></div>

                                <label>Delivery Charges - <span>Free</span></label><br>
                                <div class="gap"></div>
                                <hr>

                                <button type = "submit" name = "complete-product" value = "'.$row['product_order_id'].'" class="cancel-order">
                                    Cancel Order
                                </button>
                            </div>
                        </form>
                    </div>
                    ';
                }
            }

            else {
                echo'
                <div class="container" style = "min-height: 100px;">
                    <div class="content">

                        <label><span>No Orders Yet</span></label><br>
                        <div class="gap"></div>

                        <button class="cancel-order">
                            <a href = "../searching/search.php" style = "text-decoration: none; color: #fff;">Shop Now</a>
                        </button>
                    </div>
                </div>
                ';
            }
        ?>
    </section>

    <section class="medicines">
        <h1 class="title">Medicines</h1>
        <?php
            if ($result2) {
                foreach ($result2 as $row) {
                    echo'
                    <div class="container">
                        <form method = "post" action = "complete_order.php">
                            <div class="content">
                                <h3>'.$row['medicine_name'].'</h3>
                                <hr>
                
                                <label>
                                    Price * <span>'.$row['price'].' Rs.</span>
                                </label><br>
                                <div class="gap"></div>
                
                                <label>(Inclusive of all taxes)<br>
                                    * Get the best price on this product on orders above Rs 1299</label><br>
                                <div class="gap"></div>
                
                                <label>Quantity - <span>'.$row['quantity'].'</span></label><br>
                                <div class="gap"></div>
                
                                <label>
                                    Net Price * <span>'.$row['net_price'].' Rs.</span>
                                </label><br>
                                <div class="gap"></div>

                                <label>Delivery Charges - <span>Free</span></label><br>
                                <div class="gap"></div>
                                <hr>
                
                                <button type = "submit" name = "complete-medicine" value = "'.$row['medicine_order_id'].'" class="cancel-order">
                                    Cancel Order
                                </button>
                            </div>
                        </form>
                    </div>
                    ';
                }
            }

            else {
                echo'
                <div class="container" style = "min-height: 100px;">
                    <div class="content">

                        <label><span>No Orders Yet</span></label><br>
                        <div class="gap"></div>

                        <button class="cancel-order">
                            <a href = "../searching/search.php" style = "text-decoration: none; color: #fff;">Shop Now</a>
                        </button>
                    </div>
                </div>
                ';
            }
        ?>
    </section>

    <section class="lab-test">
        <h1 class="title">Lab Test</h1>
        <?php
            if ($result3) {
                foreach ($result3 as $row) {
                    echo'
                    <div class="container">
                        <form method = "post" action = "complete_order.php">
                            <div class="content">
                                <h3>'.$row['test_name'].'</h3>
                                <hr>
                
                                <label>(Inclusive of all taxes)<br>
                                    * Get the best price on this product on orders above Rs 1299</label><br>
                                <div class="gap"></div>
                
                                <label>Patient Name - <span>'.$row['patient_name'].'</span></label><br>
                                <div class="gap"></div>
                
                                <label>Date - <span>'.$row['date'].'</span></label><br>
                                <div class="gap"></div>
                
                                <label>Time - <span>'.$row['time'].'</span></label><br>
                                <div class="gap"></div>
                                <hr>
                
                                <button type = "submit" name = "complete-test" value = "'.$row['test_order_id'].'" class="cancel-order">
                                    Cancel Order
                                </button>
                            </div>
                        </form>
                    </div>
                    ';
                }
            }

            else {
                echo'
                <div class="container" style = "min-height: 100px;">
                    <div class="content">

                        <label><span>No Orders Yet</span></label><br>
                        <div class="gap"></div>

                        <button class="cancel-order">
                            <a href = "../searching/search.php" style = "text-decoration: none; color: #fff;">Shop Now</a>
                        </button>
                    </div>
                </div>
                ';
            }
        ?>
    </section>

    <section class="gym-registration">
        <h1 class="title">Gym Registration</h1>
        <?php
            if ($result4) {
                foreach ($result4 as $row) {
                    echo'
                    <div class="container">
                        <form method = "post" action = "complete_order.php">
                            <div class="content">
                                <h3>Gym Registration</h3>
                                <hr>
                
                                <label>
                                    Joining Date : <span>'.$row['date'].'</span>
                                </label><br>
                                <div class="gap"></div>
                
                                <label>
                                    Expiry Date : <span>18-02-2023</span>
                                </label><br>
                                <div class="gap"></div>
                
                                <label>
                                    Gym Type : <span>'.$row['gymType'].'</span>
                                </label><br>
                                <div class="gap"></div>
                
                                <label>
                                    Preffered Timings : <span>'.$row['preferredTimings'].'</span>
                                </label><br>
                                <div class="gap"></div>
                                <hr>
                
                                <label class="sub-heading">
                                    Swastik Gym Contact Details
                                </label><br>
                                <div class="gap"></div>
                
                                <label>
                                    Contact No. : <span>+91 1234567891</span>
                                </label><br>
                                <div class="gap"></div>
                                <div class="gap"></div>

                                <button type = "submit" name = "complete-subscription" value = "'.$row['registration_id'].'" class="cancel-order">
                                    Cancel Subscription
                                </button>
                            </div>
                        </form>
                    </div>
                    ';
                }
            }

            else {
                echo'
                <div class="container" style = "min-height: 100px;">
                    <div class="content">

                        <label><span>No Orders Yet</span></label><br>
                        <div class="gap"></div>

                        <button class="cancel-order">
                            <a href = "../searching/search.php" style = "text-decoration: none; color: #fff;">Shop Now</a>
                        </button>
                    </div>
                </div>
                ';
            }
        ?>
    </section>

    <section class="appointment">
        <h1 class="title">Appointment</h1>
        <?php
            if ($result5) {
                foreach ($result5 as $row) {
                    echo'
                    <div class="container">
                        <form method = "post" action = "complete_order.php">
                            <div class="content">
                                <h3>Appointment</h3>
                                <hr>

                                <label>
                                    User Id : <span>'.$row['user_id'].'</span>
                                </label><br>
                                <div class="gap"></div>

                                <label>
                                    Appointment Id : <span>'.$row['appointment_id'].'</span>
                                </label><br>
                                <div class="gap"></div>

                                <label>
                                    Doctor : <span>'.$row['doctor_name'].'</span>
                                </label><br>
                                <div class="gap"></div>

                                <label>
                                    Date : <span>'.$row['appointment_date'].'</span>
                                </label><br>
                                <div class="gap"></div>

                                <label>
                                    Time : <span>'.$row['appointment_time'].'</span>
                                </label><br>
                                <div class="gap"></div>
                                <hr>

                                <label class="sub-heading">
                                    Appointment Details
                                </label><br>
                                <div class="gap"></div>

                                <label>
                                    <a href = "'.$row['zoom_link'].'">Link : <span>Meeting with Dr. Sudeep Mishra</span></a>
                                </label><br>
                                <div class="gap"></div>

                                <label>
                                    Password : <span>'.$row['password'].'</span>
                                </label><br>
                                <div class="gap"></div>
                                <div class="gap"></div>

                                <button type = "submit" name = "complete-appointent" value = "'.$row['appointment_id'].'" class="cancel-order">
                                    Cancel Appointment
                                </button>
                            </div>
                        </form>
                    </div>
                    ';
                }
            }

            else {
                echo'
                <div class="container" style = "min-height: 100px;">
                    <div class="content">

                        <label><span>No Orders Yet</span></label><br>
                        <div class="gap"></div>

                        <button class="cancel-order">
                            <a href = "../searching/search.php" style = "text-decoration: none; color: #fff;">Shop Now</a>
                        </button>
                    </div>
                </div>
                ';
            }
        ?>
    </section>

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

<!--External JavaScript -->
<script src="orders.js" charset="utf-8"></script>

</html>