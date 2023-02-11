<?php
    include('../zoom/config.php');
    include('config.php');
    include('../zoom/api.php');

    if (isset($_POST['book_appointment'])){
        $patient_id = $_POST['patient_id'];
        $appointment_time = $_POST['appointment_time'];
        $password = $_POST['password'];

        $insert_meeting_info = "UPDATE current_appointment SET appointment_time = '$appointment_time' WHERE user_id = $patient_id";
        $update = mysqli_query($conn, $insert_meeting_info);

        $select = mysqli_query($conn, "SELECT * FROM current_appointment WHERE user_id = $patient_id");
        $zoom_row = mysqli_fetch_assoc($select);

        $arr['topic'] = 'Swastik Appointment With '.$zoom_row['doctor_name'].'';
        $arr['start_date'] = date('Y-m-d h:i:s', strtotime($zoom_row['appointment_date']));
        $arr['duration'] = 30;
        $arr['password'] = 'vishal';
        $arr['type'] = '2';
        $result=createMeeting($arr);

        if(isset($result->id)){
            $meeting_url = $result->join_url;
        }

        $insert_meeting_info = "UPDATE current_appointment SET appointment_time = '$appointment_time', zoom_link = '$meeting_url', duration = '30', password = '$password' WHERE user_id = $patient_id";
        $update = mysqli_query($conn, $insert_meeting_info);
        
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Swastik - Admin Doctors</title>
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

    <main>
        <!-- form -->
        <section>
            <div class="page-title">
                Form
            </div>
            <div class="form">
                <div class="content">
                    <div class="form-container">
                        <header>
                            Confirm Appointment
                        </header>
                        <p>
                            Add appointment time.
                        </p>

                        <form action="#" method="post" enctype="multipart/form-data">

                            <div class="fields">
                                <div class="input-field">
                                    <label>Patient Id</label>
                                    <input type="text" name="patient_id" placeholder=" Enter Patient Id" required>
                                </div>

                                <div class="input-field">
                                    <label>Time</label>
                                    <input type="time" name="appointment_time" placeholder=" Enter Appointment Time" required>
                                </div>
                                
                                <div class="input-field">
                                    <label>Meeting Password</label>
                                    <input type="text" name="password" placeholder=" Enter Meeting Password" required>
                                </div>
                            </div>

                            <button type="submit" name="book_appointment" class="btn">
                                <span class="btnText">Confirm Appointment</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- Doctor List -->
        <section>
            <div class="page-title">
                Doctors
            </div>
            <div class="list">
                <?php
                    require_once 'config.php';

                    $sql = " SELECT * FROM current_appointment ";
                    $result = mysqli_query($conn, $sql);

                    while($row = mysqli_fetch_assoc($result)){
                        ?>
                        <button class="card">
                            <img src="../Images/admin/user.jpg" alt="">

                            <div class="content">
                                <p><span>Patient Name</span> - <?= $row['patient_name'] ?></p>
                                <p><span>Patient Id</span> - <?= $row['user_id'] ?></p>
                                <p><span>Patient Email</span> - <?= $row['email'] ?></p>
                                <p><span>Appointment Date</span> - <?= $row['appointment_date'] ?></p>
                            </div>
                        </button> 
                        <?php
                    }
                ?>
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

<!-- fontawesome -->
<script src="https://kit.fontawesome.com/1a04223b0a.js" crossorigin="anonymous"></script>

</html>