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
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;900&family=Poppins:wght@200;400&family=Roboto+Slab&family=Rubik+Bubbles&family=Rubik:ital,wght@0,400;1,300&family=Sacramento&family=Ubuntu&display=swap"
        rel="stylesheet">
</head>

<body>
    <!-- header -->
    <?php
    include '../section/header.php';
    ?>

    <!-- Diet Plan -->
    <section class="diet-plan">

        <?php
        require_once 'config.php';

        if (isset($_POST['Weight-Loose-Veg'])) {
            $select = array();
            $select[0] = mysqli_query($conn, "SELECT * FROM dietplan_weightloss_veg WHERE dayId=412501");
            $select[1] = mysqli_query($conn, "SELECT * FROM dietplan_weightloss_veg WHERE dayId=412502");
            $select[2] = mysqli_query($conn, "SELECT * FROM dietplan_weightloss_veg WHERE dayId=412503");
            $select[3] = mysqli_query($conn, "SELECT * FROM dietplan_weightloss_veg WHERE dayId=412504");
            $select[4] = mysqli_query($conn, "SELECT * FROM dietplan_weightloss_veg WHERE dayId=412505");
            $select[5] = mysqli_query($conn, "SELECT * FROM dietplan_weightloss_veg WHERE dayId=412506");
            $select[6] = mysqli_query($conn, "SELECT * FROM dietplan_weightloss_veg WHERE dayId=412507");
            echo '<h1>Weight Loose - Veg</h1>';
        }
        else if (isset($_POST['Weight-Loose-NonVeg'])) {
            $select = array();
            $select[0] = mysqli_query($conn, "SELECT * FROM dietplan_weightloss_nonveg WHERE dayId=412501");
            $select[1] = mysqli_query($conn, "SELECT * FROM dietplan_weightloss_nonveg WHERE dayId=412502");
            $select[2] = mysqli_query($conn, "SELECT * FROM dietplan_weightloss_nonveg WHERE dayId=412503");
            $select[3] = mysqli_query($conn, "SELECT * FROM dietplan_weightloss_nonveg WHERE dayId=412504");
            $select[4] = mysqli_query($conn, "SELECT * FROM dietplan_weightloss_nonveg WHERE dayId=412505");
            $select[5] = mysqli_query($conn, "SELECT * FROM dietplan_weightloss_nonveg WHERE dayId=412506");
            $select[6] = mysqli_query($conn, "SELECT * FROM dietplan_weightloss_nonveg WHERE dayId=412507");
            echo '<h1>Weight Loose - NonVeg</h1>';
        }
        else if (isset($_POST['Maintain-Veg'])) {
            $select = array();
            $select[0] = mysqli_query($conn, "SELECT * FROM dietplan_maintain_veg WHERE dayId=412501");
            $select[1] = mysqli_query($conn, "SELECT * FROM dietplan_maintain_veg WHERE dayId=412502");
            $select[2] = mysqli_query($conn, "SELECT * FROM dietplan_maintain_veg WHERE dayId=412503");
            $select[3] = mysqli_query($conn, "SELECT * FROM dietplan_maintain_veg WHERE dayId=412504");
            $select[4] = mysqli_query($conn, "SELECT * FROM dietplan_maintain_veg WHERE dayId=412505");
            $select[5] = mysqli_query($conn, "SELECT * FROM dietplan_maintain_veg WHERE dayId=412506");
            $select[6] = mysqli_query($conn, "SELECT * FROM dietplan_maintain_veg WHERE dayId=412507");
            echo '<h1>Maintain - Veg</h1>';
        }
        else if (isset($_POST['Maintain-NonVeg'])) {
            $select = array();
            $select[0] = mysqli_query($conn, "SELECT * FROM dietplan_maintain_nonveg WHERE dayId=412501");
            $select[1] = mysqli_query($conn, "SELECT * FROM dietplan_maintain_nonveg WHERE dayId=412502");
            $select[2] = mysqli_query($conn, "SELECT * FROM dietplan_maintain_nonveg WHERE dayId=412503");
            $select[3] = mysqli_query($conn, "SELECT * FROM dietplan_maintain_nonveg WHERE dayId=412504");
            $select[4] = mysqli_query($conn, "SELECT * FROM dietplan_maintain_nonveg WHERE dayId=412505");
            $select[5] = mysqli_query($conn, "SELECT * FROM dietplan_maintain_nonveg WHERE dayId=412506");
            $select[6] = mysqli_query($conn, "SELECT * FROM dietplan_maintain_nonveg WHERE dayId=412507");
            echo '<h1>Maintain - NonVeg</h1>';
        }
        else if (isset($_POST['Weight-Gain-Veg'])) {
            $select = array();
            $select[0] = mysqli_query($conn, "SELECT * FROM dietplan_weightgain_veg WHERE dayId=412501");
            $select[1] = mysqli_query($conn, "SELECT * FROM dietplan_weightgain_veg WHERE dayId=412502");
            $select[2] = mysqli_query($conn, "SELECT * FROM dietplan_weightgain_veg WHERE dayId=412503");
            $select[3] = mysqli_query($conn, "SELECT * FROM dietplan_weightgain_veg WHERE dayId=412504");
            $select[4] = mysqli_query($conn, "SELECT * FROM dietplan_weightgain_veg WHERE dayId=412505");
            $select[5] = mysqli_query($conn, "SELECT * FROM dietplan_weightgain_veg WHERE dayId=412506");
            $select[6] = mysqli_query($conn, "SELECT * FROM dietplan_weightgain_veg WHERE dayId=412507");
            echo '<h1>Weight Gain - Veg</h1>';
        }
        else if (isset($_POST['Weight-Gain-NonVeg'])) {
            $select = array();
            $select[0] = mysqli_query($conn, "SELECT * FROM dietplan_weightgain_nonveg WHERE dayId=412501");
            $select[1] = mysqli_query($conn, "SELECT * FROM dietplan_weightgain_nonveg WHERE dayId=412502");
            $select[2] = mysqli_query($conn, "SELECT * FROM dietplan_weightgain_nonveg WHERE dayId=412503");
            $select[3] = mysqli_query($conn, "SELECT * FROM dietplan_weightgain_nonveg WHERE dayId=412504");
            $select[4] = mysqli_query($conn, "SELECT * FROM dietplan_weightgain_nonveg WHERE dayId=412505");
            $select[5] = mysqli_query($conn, "SELECT * FROM dietplan_weightgain_nonveg WHERE dayId=412506");
            $select[6] = mysqli_query($conn, "SELECT * FROM dietplan_weightgain_nonveg WHERE dayId=412507");
            echo '<h1>Weight Gain - NonVeg</h1>';
        }

        $i = 0;
        $j = 0;
        while ($i < 7) {
            $i++;
            ?>

            <h2>Day-<?php echo $i ?></h2>
            <div class="table-box">
                <div class="table-row table-head">
                    <div class="table-cell first-cell">
                        <p>Meal Type</p>
                    </div>
                    <div class="table-cell second-cell">
                        <p>Food for Consumption</p>
                    </div>
                </div>

                <?php
                while ($row_day1 = mysqli_fetch_assoc($select[$j])) {
                    ?>

                    <div class="table-row">
                        <div class="table-cell first-cell">
                            <p>
                                <?= $row_day1['mealType'] ?>
                            </p>
                        </div>
                        <div class="table-cell second-cell">
                            <p>
                                <?= $row_day1['meal'] ?>
                            </p>
                        </div>
                    </div>

                    <?php
                }
                ?>

            </div>
        <?php $j++; } ?>


    </section>

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