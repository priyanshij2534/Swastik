<?php
require_once 'config.php';

if (isset($_POST['submit'])) {

    $inpText = $_POST['search'];
    if ($inpText != '') {
        $sql3 = 'SELECT distinct * FROM healthcare_products WHERE product_name LIKE :product';
        $stmt = $conn->prepare($sql3);
        $stmt->execute(['product' => '%' . $inpText . '%']);
        $result3 = $stmt->fetchAll();
    } else {
        header('location: healthcare.php');
        exit();
    }
} else {
    header('location: healthcare.php');
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
    if ($result3) {

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

                        <form action="../searching/product-details.php" method="post">
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