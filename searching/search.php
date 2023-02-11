<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Swastik - Medicines</title>
    <link rel="icon" href="../Images/icons/favicon.png">

    <!--owl carousel CSS style Sheets -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <!--External CSS style Sheets -->
    <link rel="stylesheet" href="search.css">
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
        <!-- Search medicine -->
        <section class="find-item">

            <div class="contentBx">
                <h1>What Are You Looking For?</h1>

                <div class="search-container">
                    <form action="details.php" method="post" class="search-bar">
                        <input type="text" name="search" id="search" placeholder="Search Products / Tests / Medicines" autocomplete="off">
                        <button type="submit" name="submit"><img src="../Images/icons/search.png" alt=""></button>
                    </form>
                </div>

                <div class="searched-list">
                    <div class="no-scrollbar" id="show-list"></div>
                </div>

            </div>
        </section>
        
        <!-- All Items -->
        <section>
            <div class="items">
                <form action="meds-details.php" method="post">
                    <p class="title">Medicines</p>
                    <?php
                        require_once 'configuration.php';
                        
                        $sql = " SELECT * FROM medicines";
                        $result = mysqli_query($conn, $sql);
                        
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <button type="submit" name="medicine_submit" value = "<?= $row['medicine_name'] ?>">
                                    <p><?= $row['medicine_name'] ?></p>
                                </button>
                            <?php
                        }
                    ?>  
                </form>

                <form action="product-details.php" method="post">
                    <p class="title">HealthCare Products</p>
                    <?php
                        require_once 'configuration.php';
                        
                        $sql = " SELECT * FROM healthcare_products";
                        $result = mysqli_query($conn, $sql);
                        
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <button type="submit" name="product_submit" value = "<?= $row['product_name'] ?>">
                                    <p><?= $row['product_name'] ?></p>
                                </button>
                            <?php
                        }
                    ?> 
                </form>

                <form action="lab-details.php" method="post">
                    <p class="title">Lab Tests</p>
                    <?php
                        require_once 'configuration.php';
                        
                        $sql = " SELECT * FROM lab_tests";
                        $result = mysqli_query($conn, $sql);
                        
                        while($row = mysqli_fetch_assoc($result)){
                            ?>
                                <button type="submit" name="lab_submit" value = "<?= $row['test_name'] ?>">
                                    <p><?= $row['test_name'] ?></p>
                                </button>
                            <?php
                        }
                    ?>  
                </form>
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

<!-- owl carousel javascript -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<!-- fontawesome -->
<script src="https://kit.fontawesome.com/1a04223b0a.js" crossorigin="anonymous"></script>

<!-- external JavaScript -->
<script src="search.js" charset="utf-8"></script>

</html>