<?php
require_once 'config.php';

if (isset($_POST['submit'])) {

    $inpText = $_POST['search'];
    if ($inpText != '') {
        $sql1 = 'SELECT distinct * FROM medicines WHERE medicine_name LIKE :medicines';
        $stmt = $conn->prepare($sql1);
        $stmt->execute(['medicines' => '%' . $inpText . '%']);
        $result1 = $stmt->fetchAll();
    } else {
        header('location: medicines.php');
        exit();
    }
} else {
    header('location: medicines.php');
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
    <link rel="stylesheet" href="medicines.css">
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
                        
                        <form action="../searching/meds-details.php" method="post">
                            <button type = "submit" name="medicine_submit" value = "'.$row['medicine_name'].'" class="cart">More Info</button>
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
<script src="medicines.js"></script>

</html>