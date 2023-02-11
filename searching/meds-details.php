<?php
require_once 'config.php';

if (isset($_POST['medicine_submit'])) {
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);  

    $medicineName = $_POST['medicine_submit'];
    if($medicineName != ''){

        $sql = 'SELECT * FROM medicines WHERE medicine_name = :medicine_name';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['medicine_name' => $medicineName]);
        $row1 = $stmt->fetch();
        $_SESSION['medicine_id'] = $row1['medicine_id'];
        $_SESSION['medicine_price'] = $row1['medicine_price'];
        $_SESSION['med_name'] = $row1['medicine_name'];
    }
    else {
        header('location: search.php');
        exit();
    }
} 
else {
    header('location: search.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <!-- Title -->
    <title>Swastik - Medicine Details</title>
    <link rel="icon" href="../Images/icons/favicon.png">

    <!--External CSS style Sheets -->
    <link rel="stylesheet" href="../medicines/medicines.css">
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
        <section class="meds-details">

            <div class="details-container">
                <div class="meds-image">
                    <?php echo '<img src="data:medicine_image;base64,'.base64_encode($row1['medicine_image']).'" alt = "Doctor" " >';?>
                </div>

                <div class="meds-content">
                    <h3><?= $row1['medicine_name']?></h3>
                    <hr>

                    <label>Best Price * <span><?= $row1['medicine_price']?> Rs.</span></label><br>
                    <div class="gap"></div>
                    <label>(Inclusive of all taxes)<br>
                        * Get the best price on this product on orders above Rs 1299</label><br>
                    <div class="gap"></div>
                    <label><span>Quantity - *<?= $row1['tablet_num']?> </span></label><br>
                    <div class="gap"></div>
                    <label>* Country of Origin: India</label><br>
                    <div class="gap"></div>
                    <label>* Delivery charges if applicable will be applied at checkout</label><br>
                    <hr>

                    <?php
                        if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == '' || $_SESSION['user_id'] == '0'){
                            echo '<button class="cart" onclick="login()">Add To Cart</button>';
                        }
                        else{
                            echo '<button class="cart" onclick="togglePopup(\'popup-1\')">Add To Cart</button>';
                        }
                    ?>
                </div>
            </div>

            <div class="details-container">
                <div class="meds-text">
                    <h3>Introduction</h3>
                    <p><?= $row1['medicine_introduction']?></p>
                </div>

                <div class="meds-text">
                    <h3>Uses Of <?= $row1['medicine_name']?></h3>
                    <p><?= $row1['medicine_use']?></p>
                </div>

                <div class="meds-text">
                    <h3>How <?= $row1['medicine_name']?> Works</h3>
                    <p><?= $row1['medicine_work']?></p>
                </div>

                <div class="meds-text">
                    <h3>Direction For Use</h3>
                    <p><?= $row1['medicine_direction_use']?></p>
                </div>

                <div class="meds-text">
                    <h3>Side Effects Of <?= $row1['medicine_name']?></h3>
                    <p><?= $row1['medicine_effects']?></p>
                </div>

                <div class="meds-text">
                    <h3>Warning And Precautions</h3>
                </div>

                <div class="meds-text">
                    <h4>Pregnancy</h4>
                    <p><?= $row1['medicine_warning_pregnancy']?></p>
                </div>

                <div class="meds-text">
                    <h4>Alcohol</h4>
                    <p><?= $row1['medicine_warning_alcohol']?></p>
                </div>

                <div class="meds-text">
                    <h4>Kidney</h4>
                    <p><?= $row1['medicine_warning_kidney']?></p>
                </div>

                <div class="meds-text">
                    <h4>Liver</h4>
                    <p><?= $row1['medicine_warning_liver']?></p>
                </div>

                <div class="meds-text">
                    <h4>Allergy</h4>
                    <p><?= $row1['medicine_warning_allergy']?></p>
                </div>

            </div>

        </section>

        <!-- ADD TO CART -->
        <section class="appointment-form">
            <div class="popup" id="popup-1">
                <div class="overlay"></div>
                <div class="content">
                    <div class="close-btn" onclick="togglePopup('popup-1')">&times;</div>
                    <div class="form-container" style="width: 500px; height: 400px; overflow: hidden;">
                        <header>
                            Add To Cart
                        </header>

                        <form action="../medicines/order.php" method="post">

                            <div class="fields">
                                <div class="input-field">
                                    <label>Quantity</label>
                                    <input type="number" name="quantity" placeholder="Enter Quantity" style="width: 200px;" required>
                                </div>
                            </div>

                            <button type="submit" name="order" class="btn">
                                <span class="btnText">Add to Cart</span>
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

<!--External JavaScript -->
<script src="../medicines/medicines.js" crossorigin="anonymous"></script>

</html>