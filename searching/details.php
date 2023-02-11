<?php
require_once 'config.php';

if (isset($_POST['submit'])) {

    $inpText = $_POST['search'];
    if ($inpText != '') {
        $sql1 = 'SELECT distinct * FROM medicines WHERE medicine_name LIKE :medicines';
        $stmt = $conn->prepare($sql1);
        $stmt->execute(['medicines' => '%' . $inpText . '%']);
        $result1 = $stmt->fetchAll();

        $sql2 = 'SELECT distinct * FROM lab_tests WHERE test_name LIKE :tests';
        $stmt = $conn->prepare($sql2);
        $stmt->execute(['tests' => '%' . $inpText . '%']);
        $result2 = $stmt->fetchAll();

        $sql3 = 'SELECT distinct * FROM healthcare_products WHERE product_name LIKE :product';
        $stmt = $conn->prepare($sql3);
        $stmt->execute(['product' => '%' . $inpText . '%']);
        $result3 = $stmt->fetchAll();
    } else {
        header('location: search.php');
        exit();
    }
} else {
    header('location: search.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <!-- Title -->
    <title>Swastik - Details</title>
    <link rel="icon" href="../Images/icons/favicon.png">

    <!--External CSS style Sheets -->
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="../Lab Test/lab-test.css">
    <link rel="stylesheet" href="../medicines/medicines.css">
    <link rel="stylesheet" href="../healthcare/healthcare.css">
    <link rel="stylesheet" href="../styles/styles.css">

    <!--NavBar CSS style Sheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/css/uikit.min.css">
</head>

<body>
    <!-- header -->
    <?php
    include '../section/header.php';
    ?>

    <?php
    if ($result1 || $result2 || $result3) {
        foreach ($result1 as $row) {
            echo '
            <section class="meds-details">

                <div class="details-container">
                    <div class="meds-image">
                        <img src="data:medicine_image;base64,'.base64_encode($row['medicine_image']).'" alt = "Doctor" " >
                    </div>

                    <div class="meds-content">
                        <h3>'.$row['medicine_name'].'</h3>
                        <hr>

                        <label>Best Price * <span>'.$row['medicine_price'].' Rs.</span></label><br>
                        <div class="gap"></div>
                        <label>(Inclusive of all taxes)<br>
                            * Get the best price on this product on orders above Rs 1299</label><br>
                        <div class="gap"></div>
                        <label><span>Quantity - *'. $row['tablet_num'].' </span></label><br>
                        <div class="gap"></div>
                        <label>* Country of Origin: India</label><br>
                        <div class="gap"></div>
                        <label>* Delivery charges if applicable will be applied at checkout</label><br>
                        <hr>
                        
                        <form action="meds-details.php" method="post">
                            <button type = "submit" name="medicine_submit" value = "'.$row['medicine_name'].'" class="cart">More Info</button>
                        </form>
                    </div>
                </div>

            </section>
            ';
        }

        foreach ($result2 as $row) {
            echo '
            <section class="test-details">

                <div class="details-container">
                    <div class="test-image">
                        <video autoplay muted loop no-control>
                            <source src="../Images/Lab test/test-details.mp4" type="video/mp4">
                        </video>
                    </div>
        
                    <div class="test-content">
                        <h3>'.$row['test_name'].'</h3>
                        <hr>
        
                        <label>Best Price * <span>'.$row['test_price'].'Rs.</span></label><br>
                        <div class="gap"></div>
                        <label>(Inclusive of all taxes)<br>
                            * Get the best price on this product on orders above Rs 1299</label><br>
                        <div class="gap"></div>
                        <label>Sample Type: <span>'.$row['sample_type'].'</span></label><br>
                        <div class="gap"></div>
                        <label>Fasting: <span>'.$row['fasting'].'</span></label><br>
                        <div class="gap"></div>
                        <label>Tube Type: <span>'.$row['tube_type'].'</span></label><br>
                        <div class="gap"></div>
                        <hr>
                                
                        <form action="lab-details.php" method="post">
                            <button type = "submit" name="lab_submit" value = "'.$row['test_name'].'" class="cart">More Info</button>
                        </form>
                    
                    </div>
                </div>
            </section>
            ';
        }

        foreach ($result3 as $row) {
            echo '
            <section class="product-details">

                <div class="details-container">
                    <div class="product-image">
                        <img src="data:product_image;base64,'.base64_encode($row['product_image']).'" alt = "Product" " >
                    </div>

                    <div class="product-content">
                        <h3>'.$row['product_name'].'</h3>
                        <hr>

                        <label>Best Price * <span>'.$row['product_price'].' Rs.</span></label><br>
                        <div class="gap"></div>
                        <label>(Inclusive of all taxes)<br>
                            * Get the best price on this product on orders above Rs 1299</label><br>
                        <div class="gap"></div>
                        <label>Brand: <span>'.$row['product_brand'].'</span></label><br>
                        <div class="gap"></div>
                        <label>Expiry Time: <span>'.$row['expiry_date'].'</span></label><br>
                        <div class="gap"></div>
                        <label>* Delivery charges if applicable will be applied at checkout</label><br>
                        <hr>

                        <form action="product-details.php" method="post">
                            <button type = "submit" name="product_submit" value = "'.$row['product_name'].'" class="cart">More Info</button>
                        </form>
                    </div>
                </div>

            </section>
            ';
        }
    }
    ?>

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
<script src="search.js"></script>
<script src="../Lab Test/lab-test.js"></script>
<script src="../medicines/medicines.js"></script>

</html>