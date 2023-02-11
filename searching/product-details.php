<?php
require_once 'config.php';

if (isset($_POST['product_submit'])) {
    session_start();
    error_reporting(E_ALL ^ E_NOTICE);  

    $medicineName = $_POST['product_submit'];
    if($medicineName != ''){

        $sql = 'SELECT * FROM healthcare_products WHERE product_name = :product_name';
        $stmt = $conn->prepare($sql);
        $stmt->execute(['product_name' => $medicineName]);
        $row1 = $stmt->fetch();
        $_SESSION['product_id'] = $row1['product_id'];
        $_SESSION['product_price'] = $row1['product_price'];
        $_SESSION['product_name'] = $row1['product_name'];
        $_SESSION['product_image'] = base64_encode($row1['product_image']);

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
    <title>Swastik - Product Details</title>
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
                    <?php echo '<img src="data:product_image;base64,'.base64_encode($row1['product_image']).'" alt = "Doctor" " >';?>
                </div>

                <div class="meds-content">
                    <h3><?= $row1['product_name']?></h3>
                    <hr>

                    <label>Best Price * <span><?= $row1['product_price']?> Rs.</span></label><br>
                    <div class="gap"></div>
                    <label>(Inclusive of all taxes)<br>
                        * Get the best price on this product on orders above Rs 1299</label><br>
                    <div class="gap"></div>
                    <label><span>Brand - <?= $row1['product_brand']?> </span></label><br>
                    <div class="gap"></div>
                    <label><span>Expiry Time - <?= $row1['expiry_date']?> </span></label><br>
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
                    <h3>Description</h3>
                    <p><?= $row1['product_description']?></p>
                </div>

                <div class="meds-text">
                    <h3>Benefits Of <?= $row1['product_name']?></h3>
                    <ul>
                        <li><?= $row1['product_benefit_1']?></li>
                        <li><?= $row1['product_benefit_2']?></li>
                        <li><?= $row1['product_benefit_3']?></li>
                        <li><?= $row1['product_benefit_4']?></li>
                    </ul>
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

                        <form action="../healthcare/order.php" method="post">

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