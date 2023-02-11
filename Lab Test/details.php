<?php
require_once 'config.php';

if (isset($_POST['submit'])) {

    $inpText = $_POST['search'];
    if ($inpText != '') {
        $sql2 = 'SELECT distinct * FROM lab_tests WHERE test_name LIKE :tests';
        $stmt = $connection->prepare($sql2);
        $stmt->execute(['tests' => '%' . $inpText . '%']);
        $result2 = $stmt->fetchAll();
    } else {
        header('location: lab-test.php');
        exit();
    }
} else {
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
    <link rel="stylesheet" href="search.css">
    <link rel="stylesheet" href="lab-test.css">
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
    if ($result2) {
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
                                
                        <form action="../searching/lab-details.php" method="post">
                            <button type = "submit" name="lab_submit" value = "'.$row['test_name'].'" class="cart">More Info</button>
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
<script src="lab-test.js"></script>

</html>