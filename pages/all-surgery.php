<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Swastik - Surgeries</title>
    <link rel="icon" href="../Images/icons/favicon.png">

    <!-- External CSS stylesheet -->
    <link rel="stylesheet" href="page.css">
    <link rel="stylesheet" href="../styles/styles.css">

    <!--NavBar CSS style Sheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/css/uikit.min.css">
</head>

<body>
    <!-- header -->
    <?php
    include '../section/header.php';
    ?>

    <!-- Surgery List -->
    <section class="surgery">
        <div class="page-title">
            Surgeries
        </div>
        <div class="list">
            <?php
            require_once 'config.php';

            $sql = " SELECT * FROM surgery ";
            $result = mysqli_query($conn, $sql);
            $num_rows = mysqli_num_rows($result);

            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <button class="card">
                    <?php echo '<img src="data:surgery_image;base64,' . base64_encode($row['surgery_image']) . '" alt = "Surgery" " >'; ?>

                    <div class="content">
                        <p class="name"><span>Name</span> - <?= $row['surgery_name'] ?></p>
                        <p class="description"><span>Description</span> - <?= $row['surgery_description'] ?></p>
                    </div>
                </button>
            <?php
            }
            ?>
        </div>
    </section>

    <!-- footer -->
    <?php
    include '../section/footer.php';
    ?>
</body>

<!--NavBar JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit.min.js" charset="utf-8"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/js/uikit-icons.min.js" charset="utf-8"></script>

<!-- fontawesome -->
<script src="https://kit.fontawesome.com/1a04223b0a.js" crossorigin="anonymous"></script>

</html>