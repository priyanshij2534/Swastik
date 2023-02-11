<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Swastik - Admin</title>
    <link rel="icon" href="../Images/icons/favicon.png">

    <!-- External CSS stylesheet -->
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="../styles/styles.css">

    <!--NavBar CSS style Sheets -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.10.1/dist/css/uikit.min.css">
</head>

<body>
    <!-- header -->
    <?php
        include '../section/header.php';
    ?>

    <section class="admin">
        <h1 class="title">Admin Section</h1>
        <div class="container">
            <?php
                require_once 'config.php';
                $level = '100';
                $user_id = $_SESSION['user_id'];
                $select_admin = mysqli_query($conn, "SELECT * FROM admin WHERE level = '$level' AND id ='$user_id' ") or die('query failed');

                if (mysqli_num_rows($select_admin) > 0) {
                    echo'
                        <div class="card">
                            <a href="admin-form.php">
                                <img src="../Images/admin/admin.jpg" alt="Admin - Admin">
                                <div class="content">
                                    <p>Edit Admins</p>
                                </div>
                            </a>
                        </div>
                    ';
                }
            ?>

            <div class="card">
                <a href="doctor-form.php">
                    <img src="../Images/admin/doctors.jpg" alt="Doctor - Admin">
                    <div class="content">
                        <p>Edit Doctors Data</p>
                    </div>
                </a>
            </div>

            <div class="card">
                <a href="healthcare-form.php">
                    <img src="../Images/admin/healthcare.jpg" alt="Healthcare - Admin">
                    <div class="content">
                        <p>Edit HealthCare Data</p>
                    </div>
                </a>
            </div>

            <div class="card">
                <a href="test-form.php">
                    <img src="../Images/admin/lab-test.jpg" alt="Lab Test - Admin">
                    <div class="content">
                        <p>Edit Lab Test Data</p>
                    </div>
                </a>
            </div>

            <div class="card">
                <a href="medicines-form.php">
                    <img src="../Images/admin/medicines.jpg" alt="Medicines - Admin">
                    <div class="content">
                        <p>Edit Medicines Data</p>
                    </div>
                </a>
            </div>

            <div class="card">
                <a href="surgeries-form.php">
                    <img src="../Images/admin/surgery.jpg" alt="Surgery - Admin">
                    <div class="content">
                        <p>Edit Surgery Data</p>
                    </div>
                </a>
            </div>

            <div class="card">
                <a href="orders.php">
                    <img src="../Images/admin/orders.jpg" alt="Orders - Admin">
                    <div class="content">
                        <p>Orders</p>
                    </div>
                </a>
            </div>

            <div class="card">
                <a href="appointment_form.php">
                    <img src="../Images/admin/appointment.jpg" alt="Orders - Admin">
                    <div class="content">
                        <p>Appointments</p>
                    </div>
                </a>
            </div>

            <div class="card">
                <a href="user.php">
                    <img src="../Images/admin/user.jpg" alt="Users">
                    <div class="content">
                        <p>Users Data</p>
                    </div>
                </a>
            </div>

        </div>
    </section>

    <!-- Footer -->
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